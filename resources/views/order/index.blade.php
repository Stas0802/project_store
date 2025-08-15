<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="page-container">
            <div class="table-container">
                <div class="p-6 text-gray-900">
                    <table class="table-base">
                        <thead class="bg-gray-900">
                        <tr>
                            <th class="table-head-cell">ID</th>
                            <th class="table-head-cell">Customer name</th>
                            <th class="table-head-cell">Phone number</th>
                            <th class="table-head-cell">Date</th>
                            <th class="table-head-cell">Status</th>
                            <th class="table-head-cell">Action</th>
                        </tr>
                        </thead>
                        <tbody class="table-body">
                        @foreach($orders as $order)
                            <tr>
                                <td class="table-body-cell">{{ $order->id }}</td>
                                <td class="table-body-cell">{{ $order->costumer_name }}</td>
                                <td class="table-body-cell">{{ $order->phone_number }}</td>
                                <td class="table-body-cell">{{ $order->created_at->format('d M Y H:i') }}</td>
                                <td class="table-body-cell">{{ $order->status->name }}</td>
                                <td class="table-body-cell"><a href="{{ route('order.show', $order) }}"
                                    class="btn-details">details</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

