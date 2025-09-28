<div class="mt-4">
    <x-input-label for="product_id" :value="__('Product')" />
    <x-select-input id="product_id" class="block mt-1 w-full" name="product_id"
        :options="$productOptions" :selected="old('product_id', @$stock->product_id)" required
        autofocus autocomplete="product_id" />
    <x-input-error :messages="$errors->get('product_id')" class="mt-2" />
</div>

<div class="mt-4">
    <x-input-label for="type" :value="__('Movement Type')" />
    <x-select-input id="type" class="block mt-1 w-full" name="type"
        :options="\App\Enums\StockMovementType::pluck()" :selected="old('type', @$stock->type)" required
        autofocus autocomplete="type" />
    <x-input-error :messages="$errors->get('type')" class="mt-2" />
</div>

<div>
    <x-input-label for="quantity" :value="__('Quantity')" />
    <x-text-input id="quantity" name="quantity" type="number" class="mt-1 block w-full" :value="old('quantity', @$stock->quantity ?? 0)" required autofocus autocomplete="quantity" />
    <x-input-error class="mt-2" :messages="$errors->get('quantity')" />
</div>

<div>
    <x-input-label for="reference" :value="__('Reference')" />
    <x-text-input id="reference" name="reference" type="text" class="mt-1 block w-full" :value="old('reference', @$stock->reference)"
        required autofocus autocomplete="reference" />
    <x-input-error class="mt-2" :messages="$errors->get('reference')" />
</div>

<div>
    <x-input-label for="note" :value="__('Note')" />
    <x-text-area-input id="note" name="note" class="mt-1 block w-full" rows="5" :value="old('note', @$stock->note)" autofocus autocomplete="note" />
    <x-input-error class="mt-2" :messages="$errors->get('note')" />
</div>

<div class="flex items-center gap-4">
    <x-primary-button>Save</x-primary-button>
</div>