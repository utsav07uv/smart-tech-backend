<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Enums\StockMovementType;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\StockMovement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $order = collect();

        try {
            
            DB::transaction(function () use ($request, &$order) {

                $user = Auth::user();

                if (! $user->defaultAddress) {
                    throw new \Exception("No shipping address found.");
                }

                if (! $request->has('cart_item_ids')) {
                    throw new \Exception("No cart items provided.");
                }

                $cart = Cart::findOrFail($request->cart_id);

                $cartItemIds = collect(json_decode($request->cart_item_ids, true))
                    ->filter()
                    ->unique()
                    ->values();

                $cartItems = $cart->cartItems()
                    ->whereIn('id', $cartItemIds)
                    ->with(['product' => function ($q) {
                        $q->lockForUpdate();
                    }])
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
                    'user_id'             => $user->id,
                    'order_number'        => generate_order_number(),
                    'shipping_address_id' => $user->defaultAddress->id,
                    'status'              => OrderStatus::PAYMENTPENDING,
                    'order_at'            => now(),
                    'subtotal'            => $wholeSubtotal,
                    'discount_amount'     => $wholeDiscount,
                    'shipping_cost'       => $vendorCount * 10,
                    'gst'                 => 0.1 * $wholeTotal,
                    'total'               => $wholeTotal + (0.1 * $wholeTotal) + ($vendorCount * 10),
                ]);

                foreach ($cartItemsGrouped as $sellerId => $items) {
                    $subtotal = $items->sum(fn($i) => $i->product->price * $i->quantity);
                    $discount = $items->sum(fn($i) => $i->product->calculateDiscount() * $i->quantity);
                    $totalWithoutGst = $subtotal - $discount;

                    $orderVendor = $order->orderVendors()->create([
                        'vendor_id'       => $sellerId,
                        'subtotal'        => $subtotal,
                        'discount_amount' => $discount,
                        'gst'             => 0.1 * $totalWithoutGst,
                        'shipping_cost'   => 10,
                        'total'           => $totalWithoutGst + (0.1 * $totalWithoutGst) + 10,
                        'status'          => OrderStatus::PAYMENTPENDING
                    ]);

                    foreach ($items as $item) {
                        $product   = $item->product;
                        $price     = $product->price;
                        $discount  = $product->calculateDiscount();
                        $total     = ($price - $discount) * $item->quantity;

                        if ($product->stock < $item->quantity) {
                            throw new \Exception("Insufficient stock for product: {$product->name}");
                        }

                        OrderItem::create([
                            'order_vendor_id' => $orderVendor->id,
                            'product_id'      => $product->id,
                            'quantity'        => $item->quantity,
                            'price'           => $price,
                            'discount'        => $product->discount,
                            'total'           => $total,
                        ]);

                        StockMovement::create([
                            'product_id' => $product->id,
                            'type'       => StockMovementType::OUT->value,
                            'quantity'   => $item->quantity,
                            'reference'  => $order->order_number,
                            'note'       => 'Sold to user',
                            'user_id'    => $user->id,
                        ]);

                        $product->decrement('stock', $item->quantity);
                    }
                }

                // CartItem::whereIn('id', $cartItems->pluck('id'))->delete();
            });

            toastr()->success('Order placed successfully.');

            return redirect(route('frontend.checkout', $order->order_number));
        } catch (\Throwable $th) {
            toastr()->error($th->getMessage());
            return back();
        }
    }
}
