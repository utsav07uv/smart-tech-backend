<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            User Details
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
                                    User Information
                                </h2>
                                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                    This is some information about the user.
                                </p>
                            </header>

                            <div class="py-5 sm:p-0">
                                <dl class="sm:divide-y sm:divide-gray-200">
                                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Avatar
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            <img class="w-10 h-10 rounded-sm" src="{{ $user->avatar }}"
                                                alt="{{ $user->name }}">
                                        </dd>
                                    </div>
                                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Name
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{ $user->name }}
                                        </dd>
                                    </div>
                                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Email address
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{ $user->email }}
                                        </dd>
                                    </div>
                                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Phone number
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{ $user->phone ?? 'N/A' }}
                                        </dd>
                                    </div>
                                    {{-- <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Address
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            123 Main St<br>
                                            Anytown, USA 12345
                                        </dd>
                                    </div> --}}
                                </dl>
                            </div>

                            <div class="flex items-center gap-4 mt-4">
                                @if (!$user->isApproved())
                                    <form action="{{ route('admin.user.login.approve', $user->id) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Approve
                                            Account</button>
                                    </form>
                                @else
                                    <form action="{{ route('admin.user.login.disable', $user->id) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Disable
                                            Account</button>
                                    </form>
                                @endif
                            </div>
                        </section>
                    </div>
                    <div>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                Documents
                            </h2>
                            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                User uploaded documents
                            </p>
                        </header>
                        @if ($user->documents)
                            <div class="grid grid-cols-3 gap-6">
                                @foreach ($user->documents as $item)
                                    @php
                                        $ext = strtolower(pathinfo($item, PATHINFO_EXTENSION));
                                        $imageExt = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                                    @endphp

                                    <div class="flex flex-col items-center py-3 sm:py-5">
                                        @if (in_array($ext, $imageExt))
                                            <a href="{{ $item }}" target="_blank">
                                                <img src="{{ $item }}" class="h-20 w-20 object-cover rounded-lg border"
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
                            <div class="text-sm text-gray-500 sm:my-10 md:mt-10 text-center">No documents uploaded.</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>