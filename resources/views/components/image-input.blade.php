@props(['image' => null, 'images' => null])

<input type="file" {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md']) }}>

<div class="grid gap-4 mt-4">
    <div class="grid grid-cols-6 gap-4">
        @if ($image)
            <div>
                <img class="h-auto max-w-full rounded-lg" src="{{ $image }}">
            </div>
        @elseif ($images)
            @foreach ($images as $item)
                <img class="h-auto max-w-full rounded-lg" src="{{ $item }}">
            @endforeach
        @endif
    </div>
</div>

 
