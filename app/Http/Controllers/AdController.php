<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ads = Ad::query()->get();
        return view('backend.ad.index', [
            'ads' => $ads
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.ad.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'offer' => ['nullable', 'string'],
            'url' => ['required', 'string'],
            'placement' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'image' => ['required', 'file']
        ]);

        try {

            if ($request->hasFile('image')) {
                $filePath = upload_image($request->image, 'uploads/ad');
            }

            $input = [
                ...$validated,
                'slug' => Str::slug($validated['name']),
                'status' => 1,
                'order' => (Ad::max('order') ?? 0) + 1,
                'image' => $filePath,
                'created_by' => Auth::id()
            ];

            Ad::query()->create($input);

            toastr()->success('Ad created successfully.');

            return redirect()->route('ad.index');
        } catch (\Throwable $th) {
            toastr()->error($th->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ad = Ad::findOrFail($id);
        return view('backend.ad.show', [
            'ad' => $ad
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ad = Ad::findOrFail($id);
        return view('backend.ad.edit', [
            'ad' => $ad
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'offer' => ['nullable', 'string'],
            'url' => ['required', 'string'],
            'placement' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'file']
        ]);

        try {

            $ad = Ad::findOrFail($id);

            $input = array_merge($validated, [
                'slug' => Str::slug($validated['name']),
            ]);

            if ($request->hasFile('image')) {
                $input['image'] = upload_image($request->file('image'), 'uploads/ad');
                delete_file_if_exists($ad->getRawOriginal('image'));
            }

            $ad->update($input);

            toastr()->success('Ad updated successfully.');
            
            return redirect()->route('ad.index');
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

            $ad = Ad::findOrFail($id);

            delete_file_if_exists($ad->getRawOriginal('image'));

            $ad->delete();

            toastr()->success('Ad deleted successfully.');

            return redirect()->route('ad.index');
        } catch (\Throwable $th) {
            toastr()->error($th->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function toggle($id)
    {
        try {

            $ad = Ad::findOrFail($id);

            $ad->update([
                'status' => !$ad->status
            ]);

            toastr()->success('Ad toggled successfully.');

            return redirect()->route('ad.index');
        } catch (\Throwable $th) {
            toastr()->error($th->getMessage());
            return redirect()->back()->withInput();
        }
    }
}
