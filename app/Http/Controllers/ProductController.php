<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Product::query()->get();
        return view('backend.product.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'image' => ['required', 'file']
        ]);

        try {

            if ($request->hasFile('image')) {
                $filePath = upload_image($request->image, 'uploads/product');
            }

            $input = [
                ...$validated,
                'slug' => Str::slug($validated['name']),
                'status' => 1,
                'order' => (Product::max('order') ?? 0) + 1,
                'image' => $filePath
            ];

            Product::query()->create($input);

            toastr()->success('Product created successfully.');

            return redirect()->route('product.index');
        } catch (\Throwable $th) {
            toastr()->error('Failed to create.', $th->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('backend.product.edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name'        => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'image'       => ['nullable', 'file'],
        ]);

        try {

            $product = Product::findOrFail($id);

            $input = array_merge($validated, [
                'slug' => Str::slug($validated['name']),
            ]);

            if ($request->hasFile('image')) {
                $input['image'] = upload_image($request->file('image'), 'uploads/product');
                delete_file_if_exists($product->getRawOriginal('image'));
            }

            $product->update($input);

            toastr()->success('Product updated successfully.');
            
            return redirect()->route('product.index');
        } catch (\Throwable $th) {
            toastr()->error('Failed to update product.', $th->getMessage());
            return back()->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {

            $product = Product::findOrFail($id);

            delete_file_if_exists($product->getRawOriginal('image'));

            $product->delete();

            toastr()->success('Product deleted successfully.');

            return redirect()->route('product.index');
        } catch (\Throwable $th) {
            toastr()->error('Failed to create.', $th->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function toggle($id)
    {
        try {

            $product = Product::findOrFail($id);

            $product->update([
                'status' => !$product->status
            ]);

            toastr()->success('Product toggled successfully.');

            return redirect()->route('product.index');
        } catch (\Throwable $th) {
            toastr()->error('Failed to toggle.', $th->getMessage());
            return redirect()->back()->withInput();
        }
    }
}
