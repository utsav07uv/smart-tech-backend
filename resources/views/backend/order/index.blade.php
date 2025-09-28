<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Order
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <table id="order-table">
                        <thead>
                            <tr>
                                <th>
                                    <span class="flex items-center">
                                        Order
                                    </span>
                                </th>

                                <th>
                                    <span class="flex items-center">
                                        Placed on
                                    </span>
                                </th>

                                <th>
                                    <span class="flex items-center">
                                        Discount
                                    </span>
                                </th>

                                <th>
                                    <span class="flex items-center">
                                        Total
                                    </span>
                                </th>

                                <th>
                                    <span class="flex items-center">
                                        Customer
                                    </span>
                                </th>

                                <th>
                                    <span class="flex items-center">
                                        Vendor
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
                            @foreach ($orderVendors as $index => $orderVendor)
                                <tr class="{{ $orderVendor->status->bgColor() }} {{ $orderVendor->status->textColor() }}">
                                    <td>{{ $orderVendor->order?->order_number }}</td>
                                    <td>{{ $orderVendor->created_at->format('M d, Y') }}</td>
                                    <td>{{ $orderVendor->discount_amount }}</td>
                                    <td>{{ $orderVendor->total }}</td>
                                    <td>
                                        <p class="mb-0">{{ $orderVendor->order?->user?->name }}</p>
                                    </td>
                                    <td>
                                        <p class="mb-0">{{ $orderVendor->vendor?->name }}</p>
                                    </td>
                                    <td>{{ $orderVendor->status->label() }}</td>
                                    <td>
                                        <div class="flex gap-2">
                                            <a href="{{ route('order.show', $orderVendor->id) }}">
                                                <i class="fa-solid fa-eye text-blue-500"></i>
                                            </a>
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

            if (document.getElementById("order-table") && typeof simpleDatatables.DataTable !== 'undefined') {
                const dataTable = new simpleDatatables.DataTable("#order-table", {
                    paging: true,
                    perPage: 10,
                    perPageSelect: [10, 25, 50, 250, 500],
                    sortable: false
                });
            }

        </script>
    @endpush
</x-app-layout>