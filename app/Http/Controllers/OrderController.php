<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Enums\StockMovementType;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\StockMovement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                if ($request->has('cart_item_ids')) {
                    $cart = Cart::findOrFail($request->cart_id);

                    $cartItems = $cart->cartItems()
                        ->whereIn('cart_items.id', json_decode($request->cart_item_ids))
                        ->with('product')
                        ->get();

                    if ($cartItems->isEmpty()) {
                        throw new \Exception("No cart items selected.");
                    }

                    $wholeSubtotal = $cartItems->sum(fn($i) => $i->product->price * $i->quantity);
                    $wholeDiscount = $cartItems->sum(fn($i) => $i->product->calculateDiscount() * $i->quantity);
                    $wholeTotal    = $wholeSubtotal - $wholeDiscount;

                    $cartItemsGrouped = $cartItems->groupBy(fn($i) => $i->product->user_id);
                    $vendorCount = $cartItemsGrouped->count();

                    $order = Order::create([
                        'user_id'            => Auth::id(),
                        'order_number'       => generate_order_number(),
                        'shipping_address_id' => Auth::user()->defaultAddress()->id,
                        'status'             => OrderStatus::PAYMENTPENDING,
                        'order_at'           => now(),
                        'subtotal'           => $wholeSubtotal,
                        'discount_amount'    => $wholeDiscount,
                        'shipping_cost'      => $vendorCount * 10,
                        'gst'                => 0.1 * $wholeTotal,
                        'total'              => $wholeTotal + (0.1 * $wholeTotal) + ($vendorCount * 10),
                    ]);

                    foreach ($cartItemsGrouped as $sellerId => $items) {
                        $subtotal = $items->sum(fn($i) => $i->product->price * $i->quantity);
                        $discount = $items->sum(fn($i) => $i->product->calculateDiscount() * $i->quantity);
                        $totalWithoutGst = $subtotal - $discount;

                        $order->orderVendors()->create([
                            'vendor_id'       => $sellerId,
                            'subtotal'        => $subtotal,
                            'discount_amount' => $discount,
                            'gst'             => 0.1 * $totalWithoutGst,
                            'shipping_cost'   => 10,
                            'total'           => $totalWithoutGst + (0.1 * $totalWithoutGst) + 10,
                        ]);

                        foreach ($items as $item) {
                            StockMovement::create([
                                'product_id' => $item->product->id,
                                'type'       => StockMovementType::OUT->value,
                                'quantity'   => $item->quantity,
                                'reference'  => $order->order_number,
                                'note'       => 'Sold to user',
                                'user_id'    => Auth::id(),
                            ]);
                        }
                    }

                    CartItem::whereIn('id', $cartItems->pluck('id'))->delete();
                }
            });

            toastr()->success('Order placed successfully.');
            return back();
        } catch (\Throwable $th) {
            toastr()->error('Something went wrong: ' . $th->getMessage());
            return back();
        }
    }
}
