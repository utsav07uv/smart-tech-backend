<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function store($id)
    {
        try {
            $cart = Cart::firstOrCreate([
                'user_id' => Auth::id(),
            ]);

            $item = $cart->cartItems()->firstOrCreate([
                'product_id' => $id,
                'quantity' => 1
            ]);

            if ($item->wasRecentlyCreated) {
                toastr()->success('Product added to cart successfully.');
            } else {
                toastr()->info('Product is already in your cart.');
            }

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
            toastr()->success('Product added to cart successfully.');
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
