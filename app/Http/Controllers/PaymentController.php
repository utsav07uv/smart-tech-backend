<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Enums\PaymentStatus;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function store(Request $request)
    {
        try {

            DB::transaction(function () use ($request) {

                $user = Auth::user();

                $order = Order::with('orderVendors')->findOrFail($request->order_id);

                if (! $order) {
                    throw new \Exception("Order not found.");
                }

                foreach ($order->orderVendors as $orderVendor) {
                    $orderVendor->payments()->create([
                        'user_id'      => $user->id,
                        'order_number'        => $order->order_number,
                        'method'           => 'cod',
                        'amount'        => $orderVendor->total,
                        'status' => PaymentStatus::PENDING
                    ]);

                    $orderVendor->update([
                        'status' => OrderStatus::PROCESSING
                    ]);
                }

                $order->update([
                    'status' => OrderStatus::PROCESSING
                ]);
            });

            toastr()->success('Order confirmed successfully.');

            // return redirect(route('frontend.checkout.success', $order->order_number));
        } catch (\Throwable $th) {
            toastr()->error($th->getMessage());
            return back();
        }
    }
}
