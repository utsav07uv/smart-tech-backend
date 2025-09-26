<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'subtotal' => ['required', 'integer|float'],
            'discount_amount' => ['required', 'integer|float'],
            'gst' => ['required', 'integer|float'],
            'shipping_cost' => ['required', 'integer|float'],
            'total' => ['required', 'integer|float'],
        ]);
        
        try {

            $input = [
                ...$validated,
                'order_number' => 
            ]

            $order = Order::query()->create([
                'user_id' => Auth::id(),
            ]);

            $item = $order->orderItems()->firstOrCreate(
                ['product_id' => $id],
                ['quantity' => $request->quantity ?? 1]
            );

            return back();

        } catch (\Throwable $th) {
            toastr()->error('Something went wrong: ' . $th->getMessage());
            return back();
        }
    }
}
