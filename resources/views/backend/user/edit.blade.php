<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Category
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                User Information
                            </h2>
                        </header>

                        <form method="post" action="{{ route('admin.user.update', $user->id) }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @include('backend.user._form')
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>