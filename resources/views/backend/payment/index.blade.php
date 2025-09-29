<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Payment
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <table id="payment-table">
                        <thead>
                            <tr>
                                <th>
                                    <span class="flex items-center">
                                        Order
                                    </span>
                                </th>

                                <th>
                                    <span class="flex items-center">
                                        Customer
                                    </span>
                                </th>

                                <th>
                                    <span class="flex items-center">
                                        Method
                                    </span>
                                </th>
                                
                                <th>
                                    <span class="flex items-center">
                                        Currency
                                    </span>
                                </th>

                                

                                <th>
                                    <span class="flex items-center">
                                        Total
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
                            @foreach ($payments as $index => $payment)
                                <tr>
                                    <td>{{ $payment?->order_number }}</td>
                                    <td>{{ $payment->customer?->name }}</td>
                                    <td>{{ $payment->method }}</td>
                                    <td>{{ $payment->currency }}</td>
                                    <td>{{ $payment->amount }}</td>  
                                    <td>{{ $payment->status->label() }}</td>
                                    <td>
                                        <div class="flex gap-2">
                                            <a href="{{ route('payment.show', $payment->id) }}">
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

            if (document.getElementById("payment-table") && typeof simpleDatatables.DataTable !== 'undefined') {
                const dataTable = new simpleDatatables.DataTable("#payment-table", {
                    paging: true,
                    perPage: 10,
                    perPageSelect: [10, 25, 50, 250, 500],
                    sortable: false
                });
            }

        </script>
    @endpush
</x-app-layout>