<?php

namespace App\Http\Controllers;

use App\Enums\StockMovementType;
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
        $products = Product::query()->with('category:id,name')->get();
        return view('backend.product.index', [
            'products' => $products
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
            'description' => ['required', 'string'],
            'color' => ['required_without:size'],
            'size' => ['required_without:color'],
            'sku' => ['required', 'string'],
            'model' => ['nullable', 'string'],
            'price' => ['required'],
            'discount' => ['required'],
            'category_id' => ['required', 'integer'],
            'section_id' => ['required', 'integer'],
            'image' => ['required', 'file'],
            'images' => ['nullable', 'array'],
        ]);

        try {

            if ($request->hasFile('image')) {
                $filePath = upload_image($request->image, 'uploads/product');
            }

            if ($request->hasFile('images')) {
                $filesPath = upload_multiple_images($request->images, 'uploads/product');
            }

            $input = [
                ...$validated,
                'slug' => Str::slug($validated['name']),
                'status' => 1,
                'order' => (Product::max('order') ?? 0) + 1,
                'image' => $filePath ?? null,
                'images' => $filesPath ?? null,
                'user_id' => auth()->id(),
            ];

            Product::query()->create($input);

            toastr()->success('Product created successfully.');

            return redirect()->route('product.index');

        } catch (\Throwable $th) {
            toastr()->error($th->getMessage());
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
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'color' => ['required_without:size'],
            'size' => ['required_without:color'],
            'sku' => ['required', 'string'],
            'model' => ['nullable', 'string'],
            'price' => ['required'],
            'discount' => ['required'],
            'category_id' => ['required', 'integer'],
            'section_id' => ['required', 'integer'],
            'image' => ['nullable', 'file'],
            'images' => ['nullable', 'array'],
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

            if ($request->hasFile('images')) {
                $input['images'] = upload_multiple_images($request->file('images'), 'uploads/product');
                delete_files_if_exists($product->getRawOriginal('images'));
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
            delete_files_if_exists($product->getRawOriginal('images'));

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
