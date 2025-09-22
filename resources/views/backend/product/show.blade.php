<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Product Detail
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div class="max-w-xl">
                        <section>
                            <header>
                                <h2 class="text-lg font-medium text-gray-900">
                                    Product Information
                                </h2>
                                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                    This is some information about the product.
                                </p>
                            </header>

                            <div class="py-5 sm:p-0">
                                <dl class="sm:divide-y sm:divide-gray-200">
                                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Image
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            <img class="w-20 h-20 rounded-sm" src="{{ $product?->image }}"
                                                alt="{{ $product?->name }}">
                                        </dd>
                                    </div>
                                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Name
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{ $product?->name ?? 'N/A' }}
                                        </dd>
                                    </div>
                                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Price
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            <span>AUD {{ $product->price ?? 0 }}</span> <span class="text-amber-500 ms-4">{{ $product->discount ?? 0 }} % discount</span>
                                        </dd>
                                    </div>

                                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Category
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{ $product->category?->name ?? 'N/A' }}
                                        </dd>
                                    </div>

                                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Stock
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{ $product->stock ?? 0 }}
                                        </dd>
                                    </div>
                                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Color
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{ $product->color ?? 'N/A' }}
                                        </dd>
                                    </div>

                                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Size
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{ $product->size ?? 'N/A' }}
                                        </dd>
                                    </div>

                                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Model
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{ $product->model ?? 'N/A' }}
                                        </dd>
                                    </div>

                                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                        <dt class="text-sm font-medium text-gray-500">
                                            SKU
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{ $product->sku ?? 'N/A' }}
                                        </dd>
                                    </div>

                                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Description
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {!! str()->limit($product->description, 150) ?? 'N/A' !!}
                                        </dd>
                                    </div>

                                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Seller
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{ $product->seller?->name }}<br>
                                            <p class="text-xs italic">({{ $product->seller?->role->label() }})</p>
                                        </dd>
                                    </div>
                                </dl>
                            </div>
                        </section>
                    </div>

                    <div>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                Images
                            </h2>
                            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                Product related images
                            </p>
                        </header>
                        @if ($product->images)
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
                                @foreach ($product->images as $item)
                                    @php
                                        $ext = strtolower(pathinfo($item, PATHINFO_EXTENSION));
                                        $imageExt = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                                    @endphp

                                    <div class="flex flex-col items-center py-3 sm:py-5">
                                        @if (in_array($ext, $imageExt))
                                            <a href="{{ $item }}" target="_blank">
                                                <img src="{{ $item }}" class="h-30 w-30 object-cover rounded-lg border"
                                                    alt="Document">
                                            </a>
                                        @else
                                            <a href="{{ $item }}" target="_blank" class="text-gray-700 hover:text-blue-600">
                                                <i class="fas fa-file fa-3x"></i>
                                            </a>
                                            <span class="text-xs mt-2 truncate w-20">{{ strtoupper($ext) }} File</span>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-sm text-gray-500 sm:my-10 md:mt-10 text-center">No images uploaded.</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>