<?php

namespace App\Http\Controllers;

use App\Enums\StockMovementType;
use App\Models\Category;
use App\Models\Product;
use App\Models\StockMovement;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class StockMovementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stocks = StockMovement::query()->with(['product:id,name', 'recordedBy:id,name,role'])->get();
        return view('backend.stock.index', [
            'stocks' => $stocks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productOptions = Product::pluck('name', 'id');
        return view('backend.stock.create', [
            'productOptions' => $productOptions
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'quantity'   => ['required', 'integer', 'min:1'],
            'type'       => ['required', Rule::enum(StockMovementType::class)],
            'product_id' => ['required', 'integer', 'exists:products,id'],
            'reference'  => ['nullable', 'string'],
            'note'       => ['nullable', 'string'],
        ]);

        try {
            DB::transaction(function () use ($validated) {
                $product = Product::where('id', $validated['product_id'])->lockForUpdate()->first();

                if (!$product) {
                    throw new Exception('Product not found.');
                }

                $product->stockMovements()->create([
                    ...$validated,
                    'user_id' => auth()->id(),
                ]);

                $currentStock = $validated['type'] === StockMovementType::IN->value
                    ? $product->stock + $validated['quantity']
                    : $product->stock - $validated['quantity'];

                if ($currentStock < 0) {
                    throw new Exception("Negative stock count.");
                }

                $product->update(['stock' => $currentStock]);
            });

            toastr()->success('Stock updated successfully.');
            return redirect()->route('stock.index');
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
        $stock = StockMovement::findOrFail($id);
        $productOptions = Product::pluck('name', 'id');
        return view('backend.stock.edit', [
            'stock' => $stock,
            'productOptions' => $productOptions
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'quantity'   => ['required', 'integer', 'min:1'],
            'type'       => ['required', Rule::enum(StockMovementType::class)],
            'product_id' => ['required', 'integer', 'exists:products,id'],
            'reference'  => ['nullable', 'string'],
            'note'       => ['nullable', 'string'],
        ]);

        try {
            DB::transaction(function () use ($validated, $id) {

                $stock = StockMovement::findOrFail($id);

                $product = Product::where('id', $stock->product_id)->lockForUpdate()->first();

                if (!$product) {
                    throw new Exception('Product not found.');
                }

                $oldQuantity = $stock->quantity;
                $oldType     = $stock->type;

                if ($oldType === StockMovementType::IN->value) {
                    $product->stock -= $oldQuantity;
                } else {
                    $product->stock += $oldQuantity;
                }

                if ($validated['type'] === StockMovementType::IN->value) {
                    $product->stock += $validated['quantity'];
                } else {
                    $product->stock -= $validated['quantity'];
                }

                if ($product->stock < 0) {
                    throw new Exception("Negative stock count.");
                }

                $product->save();

                $stock->update($validated);
            });

            toastr()->success('Stock updated successfully.');
            return redirect()->route('stock.index');
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

            $stock = StockMovement::findOrFail($id);

            $product = Product::where('id', $stock->product_id)->lockForUpdate()->first();

            $currentStock = $stock->type === StockMovementType::IN->value
                ? $product->stock - $stock->quantity
                : $product->stock + $stock->quantity;

            if ($currentStock < 0) {
                throw new Exception("Negative stock count.");
            }

            $product->stock = $currentStock;
            $product->save();

            $stock->delete();

            toastr()->success('Stock deleted successfully.');
            return redirect()->route('stock.index');
        } catch (\Throwable $th) {
            toastr()->error($th->getMessage());
            return redirect()->back()->withInput();
        }
    }
}
