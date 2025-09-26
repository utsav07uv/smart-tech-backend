<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Category;
use App\Models\Review;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AddressController extends Controller
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
            'name' => ['required', 'string'],
            'state' => ['required', 'string'],
            'city' => ['required', 'string'],
            'user_id' => ['required', 'exists:users,id'],
            'address_line1' => ['required', 'string'],
            'postal_code' => ['required', 'string'],
        ]);

        try {

            $defaultAddressExists = Address::where([
                'user_id' => Auth::id(),
                'is_default' => true
            ])->exists();

            $validated['is_default'] = $defaultAddressExists ? false : true;

            Address::query()->create($validated);

            toastr()->success('Address added successfully.');

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
        
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            
            $address = Address::findOrFail($id);

            if($address->is_default) {
                throw new Exception('Default address cannot be deleted.');
            }

            $address->delete();

            toastr()->success('Address deleted successfully.');

            return back();
        } catch (\Throwable $th) {
            toastr()->error($th->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function markAsDefault($id)
    {
        try {

            Address::where([
                'user_id' => Auth::id(),
            ])->update([
                'is_default' => false
            ]);

            $address = Address::findOrFail($id);

            $address->update([
                'is_default' => true
            ]);

            toastr()->success('Address marked as default successfully.');

            return back();
        } catch (\Throwable $th) {
            toastr()->error($th->getMessage());
            return redirect()->back()->withInput();
        }
    }
}
