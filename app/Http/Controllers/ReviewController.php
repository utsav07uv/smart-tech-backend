<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'rating' => ['required', 'integer'],
            'comment' => ['required', 'string'],
            'user_id' => ['required', 'exists:users,id'],
            'product_id' => ['required', 'exists:products,id'],
        ]);

        try {

            Review::query()->create($validated);

            toastr()->success('Review submitted successfully.');

            return back();

        } catch (\Throwable $th) {
            toastr()->error($th->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         $validated = $request->validate([
            'rating' => ['required', 'integer'],
            'comment' => ['required', 'string'],
            'user_id' => ['required', 'exists:users,id'],
            'product_id' => ['required', 'exists:products,id'],
        ]);

        try {

            $review = Review::find($id);

            $review->update($validated);

            toastr()->success('Review updated successfully.');

            return back();

        } catch (\Throwable $th) {
            toastr()->error($th->getMessage());
            return redirect()->back()->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {

            $review = Review::findOrFail($id);
            $review->delete();
            toastr()->success('Review deleted successfully.');

            return back();
        } catch (\Throwable $th) {
            toastr()->error($th->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function toggle($id)
    {
        try {

            $category = Category::findOrFail($id);

            $category->update([
                'status' => !$category->status
            ]);

            toastr()->success('Category toggled successfully.');

            return redirect()->route('category.index');
        } catch (\Throwable $th) {
            toastr()->error($th->getMessage());
            return redirect()->back()->withInput();
        }
    }
}
