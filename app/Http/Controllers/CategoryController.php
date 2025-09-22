<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::query()->get();
        return view('backend.category.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.category.create');
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
                $filePath = upload_image($request->image, 'uploads/category');
            }

            $input = [
                ...$validated,
                'slug' => Str::slug($validated['name']),
                'status' => 1,
                'order' => (Category::max('order') ?? 0) + 1,
                'image' => $filePath
            ];

            Category::query()->create($input);

            toastr()->success('Category created successfully.');

            return redirect()->route('category.index');
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
        $category = Category::findOrFail($id);
        return view('backend.category.edit', [
            'category' => $category
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

            $category = Category::findOrFail($id);

            $input = array_merge($validated, [
                'slug' => Str::slug($validated['name']),
            ]);

            if ($request->hasFile('image')) {
                $input['image'] = upload_image($request->file('image'), 'uploads/category');
                delete_file_if_exists($category->getRawOriginal('image'));
            }

            $category->update($input);

            toastr()->success('Category updated successfully.');
            
            return redirect()->route('category.index');
        } catch (\Throwable $th) {
            toastr()->error($th->getMessage());
            return back()->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {

            $category = Category::findOrFail($id);

            delete_file_if_exists($category->getRawOriginal('image'));

            $category->delete();

            toastr()->success('Category deleted successfully.');

            return redirect()->route('category.index');
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
