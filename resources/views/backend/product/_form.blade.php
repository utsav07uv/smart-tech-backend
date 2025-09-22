<div>
    <x-input-label for="name" :value="__('Name')" />
    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', @$product->name)"
        required autofocus autocomplete="name" />
    <x-input-error class="mt-2" :messages="$errors->get('name')" />
</div>

<div>
    <x-input-label for="color" :value="__('Color')" />
    <x-text-input id="color" name="color" type="text" class="mt-1 block w-full" :value="old('color', @$product->color)" required autofocus autocomplete="color" />
    <x-input-error class="mt-2" :messages="$errors->get('color')" />
</div>

<div>
    <x-input-label for="size" :value="__('Size')" />
    <x-text-input id="size" name="size" type="text" class="mt-1 block w-full" :value="old('size', @$product->size)"
        required autofocus autocomplete="size" />
    <x-input-error class="mt-2" :messages="$errors->get('size')" />
</div>

<div>
    <x-input-label for="model" :value="__('Model')" />
    <x-text-input id="model" name="model" type="text" class="mt-1 block w-full" :value="old('model', @$product->model)" required autofocus autocomplete="model" />
    <x-input-error class="mt-2" :messages="$errors->get('model')" />
</div>

<div>
    <x-input-label for="sku" :value="__('Sku')" />
    <x-text-input id="sku" name="sku" type="text" class="mt-1 block w-full" :value="old('sku', @$product->sku)"
        required autofocus autocomplete="sku" />
    <x-input-error class="mt-2" :messages="$errors->get('sku')" />
</div>

<div>
    <x-input-label for="price" :value="__('Price')" />
    <x-text-input id="price" name="price" type="number" class="mt-1 block w-full" :value="old('price', @$product->price)" required autofocus autocomplete="price" />
    <x-input-error class="mt-2" :messages="$errors->get('price')" />
</div>

<div>
    <x-input-label for="discount" :value="__('Discount')" />
    <x-text-input id="discount" name="discount" type="number" class="mt-1 block w-full" :value="old('discount', @$product->discount ?? 0)" required autofocus autocomplete="discount" />
    <x-input-error class="mt-2" :messages="$errors->get('discount')" />
</div>

<div class="mt-4">
    <x-input-label for="category_id" :value="__('Category')" />
    <x-select-input id="category_id" class="block mt-1 w-full" name="category_id"
        :options="\App\Models\Category::pluck('name', 'id')" :selected="old('category_id', @$product->category_id)"
        autofocus autocomplete="category_id" />
    <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
</div>

<div class="mt-4">
    <x-input-label for="section_id" :value="__('Homepage Section')" />
    <x-select-input id="section_id" class="block mt-1 w-full" name="section_id"
        :options="config('constants.frontend_sections')" :selected="old('section_id', @$product->section_id)" autofocus
        autocomplete="section_id" />
    <x-input-error :messages="$errors->get('section_id')" class="mt-2" />
</div>

<div>
    <x-input-label for="description" :value="__('Description')" />
    <x-trix-input id="description" name="description" :value="old('description', default: @$product->description)" autocomplete="off" required autofocus autocomplete="description" />
    <x-input-error class="mt-2" :messages="$errors->get('description')" />
</div>

<div>
    <x-input-label for="image" :value="__('Featured Image')" />
    <x-image-input id="image" name="image" class="mt-1 block w-full" :value="old('image')" :image="@$product->image"
        autofocus autocomplete="image" />
    <x-input-error class="mt-2" :messages="$errors->get('image')" />
</div>

<div>
    <x-input-label for="images" :value="__('Gallery')" />
    <x-image-input id="images" name="images[]" class="mt-1 block w-full" multiple :value="old('images')"
        :images="@$product->images" autofocus autocomplete="images" />
    <x-input-error class="mt-2" :messages="$errors->get('images')" />
</div>

<div class="flex items-center gap-4">
    <x-primary-button>Save</x-primary-button>
</div>