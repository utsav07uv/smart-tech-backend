<div>
    <x-input-label for="name" :value="__('Name')" />
    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', @$category->name)"
        required autofocus autocomplete="name" />
    <x-input-error class="mt-2" :messages="$errors->get('name')" />
</div>

<div>
    <x-input-label for="description" :value="__('Description')" />
    <x-text-area-input id="description" name="description" class="mt-1 block w-full" rows="5" :value="old('description', @$category->description)" autofocus autocomplete="description" />
    <x-input-error class="mt-2" :messages="$errors->get('description')" />
</div>

<div>
    <x-input-label for="image" :value="__('Image')" />
    <x-image-input id="image" name="image" class="mt-1 block w-full" :value="old('image')" :image="@$category->image" autofocus
        autocomplete="image" />
    <x-input-error class="mt-2" :messages="$errors->get('image')" />
</div>



<div class="flex items-center gap-4">
    <x-primary-button>Save</x-primary-button>
</div>