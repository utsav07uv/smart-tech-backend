<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\WishlistItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function store($id)
    {
        try {
            $wishlist = Wishlist::firstOrCreate([
                'user_id' => Auth::id(),
            ]);

            $item = $wishlist->wishlistItems()->firstOrCreate([
                'product_id' => $id,
            ]);

            if ($item->wasRecentlyCreated) {
                toastr()->success('Product added to wishlist successfully.');
            } else {
                toastr()->info('Product is already in your wishlist.');
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

            WishlistItem::where('product_id', $id)->delete();
            toastr()->success('Product removed from wishlist successfully.');
            return back();

        } catch (\Throwable $th) {
            toastr()->error('Something went wrong: ' . $th->getMessage());
            return back();
        }
    }

    public function clear()
    {
        try {

            $wishlist = Wishlist::where('user_id', Auth::id())->first();

            $wishlist->wishlistItems()->delete();

            toastr()->success('Wishlist cleared successfully.');
            return back();

        } catch (\Throwable $th) {
            toastr()->error('Something went wrong: ' . $th->getMessage());
            return back();
        }
    }
}
