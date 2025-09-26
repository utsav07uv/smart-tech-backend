<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function store(Request $request, $id)
    {
        try {
            $cart = Cart::firstOrCreate([
                'user_id' => Auth::id(),
            ]);

            $item = $cart->cartItems()->firstOrCreate(
                ['product_id' => $id],
                ['quantity' => $request->quantity ?? 1]
            );

            if ($item->wasRecentlyCreated) {
                toastr()->success('Product added to cart successfully.');
            } else {
                toastr()->info('Product updated in your cart.');
            }

            return back();
        } catch (\Throwable $th) {
            toastr()->error('Something went wrong: ' . $th->getMessage());
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            CartItem::where(['product_id' => $id])->update(
                ['quantity' => $request->quantity ?? 1]
            );

            toastr()->info('Product updated in your cart.');

            return back();
        } catch (\Throwable $th) {
            toastr()->error('Something went wrong: ' . $th->getMessage());
            return back();
        }
    }

    public function destroy($id)
    {
        try {
            CartItem::where('product_id', $id)->delete();
            toastr()->success('Product removed from cart successfully.');
            return back();
        } catch (\Throwable $th) {
            toastr()->error('Something went wrong: ' . $th->getMessage());
            return back();
        }
    }

    public function clear()
    {
        try {

            $cart = Cart::where('user_id', Auth::id())->first();

            $cart->cartItems()->delete();

            toastr()->success('Cart cleared successfully.');
            return back();
        } catch (\Throwable $th) {
            toastr()->error('Something went wrong: ' . $th->getMessage());
            return back();
        }
    }
}
