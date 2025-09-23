<div>
    <x-input-label for="name" :value="__('Name')" />
    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', @$ad->name)" required
        autofocus autocomplete="name" />
    <x-input-error :messages="$errors->get('name')" class="mt-2" />
</div>

<div>
    <x-input-label for="offer" :value="__('Offer')" />
    <x-text-input id="offer" class="block mt-1 w-full" type="text" name="offer" :value="old('offer', @$ad->offer)"
        autofocus autocomplete="offer" />
    <x-input-error :messages="$errors->get('offer')" class="mt-2" />
</div>

<div>
    <x-input-label for="url" :value="__('Url')" />
    <x-text-input id="url" class="block mt-1 w-full" type="text" name="url" :value="old('url', @$ad->url)" autofocus
        autocomplete="url" />
    <x-input-error :messages="$errors->get('url')" class="mt-2" />
</div>

<div class="mt-4">
    <x-input-label for="placement" :value="__('Placement Section')" />
    <x-select-input id="placement" class="block mt-1 w-full" name="placement"
        :options="config('constants.ad_placement_sections')" :selected="old('placement', @$product->placement)" required
        autofocus autocomplete="placement" />
    <x-input-error :messages="$errors->get('section_id')" class="mt-2" />
</div>

<div>
    <x-input-label for="description" :value="__('Description')" />
    <x-text-area-input id="description" class="block mt-1 w-full" name="description" :value="old('description', @$ad->description)" autofocus autocomplete="description" />
    <x-input-error :messages="$errors->get('description')" class="mt-2" />
</div>

<div>
    <x-input-label for="image" :value="__('Image')" />
    <x-image-input id="image" name="image" class="mt-1 block w-full" :value="old('image')" :image="@$product->image"
        autofocus autocomplete="image" />
    <x-input-error class="mt-2" :messages="$errors->get('image')" />
</div>

<div class="flex items-center mt-4">
    <x-primary-button>
        Save
    </x-primary-button>
</div>