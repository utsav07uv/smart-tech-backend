<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ad
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex items-center justify-end my-2">
                <x-link :href="route('ad.create')">Create</x-link>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <table id="ad-table">
                        <thead>
                            <tr>
                                <th>
                                    <span class="flex items-center">
                                        Image
                                    </span>
                                </th>

                                <th>
                                    <span class="flex items-center">
                                        Name
                                    </span>
                                </th>
                                
                                <th>
                                    <span class="flex items-center">
                                        Offer
                                    </span>
                                </th>

                                <th>
                                    <span class="flex items-center">
                                        Url
                                    </span>
                                </th>

                                <th>
                                    <span class="flex items-center">
                                        Placement
                                    </span>
                                </th>

                                <th>
                                    <span class="flex items-center">
                                        Status
                                    </span>
                                </th>

                                <th>
                                    <span class="flex items-center">
                                        Action
                                    </span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ads as $ad)
                                <tr>
                                    <td>
                                        <img class="w-10 h-10 rounded-sm" src="{{ $ad->image }}" alt="{{ $ad->name }}">
                                    </td>
                                    <td>{{ $ad->name ?? 'N/A' }}</td>
                                    <td>{{ $ad->offer ?? 'N/A' }}</td>
                                    <td>{{ $ad->url ?? 'N/A' }}</td>
                                    <td>{{ config('constants.ad_placement_sections')[$ad->placement] ?? 'N/A' }}</td>
                                    <td>
                                        <span
                                            class="{{ $ad->status === 1 ? "bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300" : "bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300"}} text-xs font-medium me-2 px-2.5 py-0.5 rounded-full">{{ $ad->status === 1 ? "Published" : "Draft" }}</span>
                                    </td>
                                    <td>
                                        <div class="flex gap-2">
                                            <a href="{{ route('ad.edit', $ad->id) }}">
                                                <i class="fa-solid fa-pen-to-square text-emerald-500"></i>
                                            </a>

                                            <a href="{{ route('ad.show', $ad->id) }}">
                                                <i class="fa-solid fa-eye text-blue-500"></i>
                                            </a>

                                            <form action="{{ route('ad.toggle', $ad->id) }}" method="POST">
                                                @csrf
                                                <button type="submit">
                                                    <i class="fa-solid fa-toggle-on text-amber-500 cursor-pointer"></i>
                                                </button>
                                            </form>

                                            <a href="javascript:void(0)">
                                                <button data-modal-target="delete-popup-modal"
                                                    data-modal-toggle="delete-popup-modal" type="button">
                                                    <i class="fa-solid fa-trash text-red-500"></i>
                                                </button>
                                            </a>

                                            <div id="delete-popup-modal" tabindex="-1"
                                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                <div class="relative p-4 w-full max-w-md max-h-full">
                                                    <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                                        <button type="button"
                                                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                            data-modal-hide="delete-popup-modal">
                                                            <svg class="w-3 h-3" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 14 14">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                            </svg>
                                                            <span class="sr-only">Close modal</span>
                                                        </button>
                                                        <div class="p-4 md:p-5 text-center">
                                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 20 20">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                            </svg>
                                                            <h3
                                                                class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                                Are you sure you want to delete this ad?</h3>
                                                            <div class="flex justify-center gap-3">
                                                                <form action="{{ route('ad.destroy', $ad->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method("DELETE")
                                                                    <button data-modal-hide="delete-popup-modal"
                                                                        type="submit"
                                                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                                        Delete
                                                                    </button>
                                                                </form>

                                                                <button data-modal-hide="delete-popup-modal" type="button"
                                                                    class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                                                    Cancel
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script>

            if (document.getElementById("ad-table") && typeof simpleDatatables.DataTable !== 'undefined') {
                const dataTable = new simpleDatatables.DataTable("#ad-table", {
                    paging: true,
                    perPage: 10,
                    perPageSelect: [10, 25, 50, 250, 500],
                    sortable: false
                });
            }

        </script>
    @endpush
</x-app-layout>