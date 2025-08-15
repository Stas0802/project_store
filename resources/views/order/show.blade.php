<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order Details') }}
        </h2>
    </x-slot>
    <div class="py-12">
{{--        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">--}}
{{--            <div class="bg-white shadow sm:rounded-lg p-6">--}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="col-span-2 bg-white shadow rounded-lg p-6 space-y-2">
                        <h3 class="text-lg font-medium text-gray-900">Заказ {{ $order->order_number }}</h3>
                        <p>Клиент: {{ $order->costumer_name }} {{ $order->costumer_surname }}</p>
                        <p>Телефон: {{ $order->phone_number }}</p>
                        <p>Доставка: {{ $order->delivery }}</p>
                        <p>Дата: {{ $order->created_at->format('d M Y H:i') }}</p>
                    </div>
                   <div class="bg-white shadow sm:rounded-lg p-6 space-y-4">
                       <h4 class="text-md font-semibold text-gray-800 text-center">Action:</h4>


                       <form method="POST" action="{{ route('order.destroy', $order->id) }}">
                           @csrf
                           {{ method_field('DELETE') }}
                           <button type="submit" class="btn-delete w-full">Delete order</button>
                       </form>

                       <form method="GET" action="{{ route('order.edit', $order->id) }}">
                           <button type="submit" class="btn-update w-full">Update customer data</button>
                       </form>
                       <a href="{{ route('orderProduct.edit', $order->id) }}" class="btn-details w-full text-center">Add product</a>
                           <form method="POST" action="{{ route('order.updateStatus', $order->id) }}"
                                 class="flex flex-col-reverse items-center gap-2">
                               @csrf
                               @method('PATCH')
                               <label for="status_id" class="block text-sm font-medium text-gray-700">Статус:</label>
                               <select name="status_id" id="status_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                   @foreach($statuses as $status)
                                       <option value="{{ $status->id }}" {{ $order->status_id == $status->id ? 'selected' : '' }}>
                                           {{ $status->name }}
                                       </option>
                                   @endforeach
                               </select>
                               <button type="submit" class="btn-update w-full">Update statuses</button>
                           </form>
                   </div>
                </div>

                <h4 class="mt-6 font-semibold text-gray-800">Products in orders:</h4>
                <table class="table-base">
                    <thead class="bg-gray-900">
                    <tr>
                        <th class="table-head-cell">Product</th>
                        <th class="table-head-cell">Category</th>
                        <th class="table-head-cell">Quantity</th>
                        <th class="table-head-cell">Price</th>
                        <th class="table-head-cell">Action</th>
                        <th class="table-head-cell">Action</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($order->products as $product)
                        <tr>
                            <td class="table-body-cell">{{ $product->name }}</td>
                            <td class="table-body-cell">{{ $product->category->name ?? '—' }}</td>
                            <td class="table-body-cell">{{ $product->pivot->quantity }}</td>
                            <td class="table-body-cell">{{ $product->pivot->price }}</td>
                            <td class="table-body-cell">
                                <a href="{{ route('orderProduct.edit', $order->id) }}" class="btn-update">update</a></td>
                            <td class="table-body-cell">
                                <form method="POST" action="{{ route('orderProduct.deleteProduct', [$order->id, $product]) }}">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn-delete">Delete</button>
                                </form>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
                <p class="mt-4 font-bold">Итого: {{ number_format($total, 2) }} грн</p>
            </div>
{{--        </div>--}}
{{--    </div>--}}
</x-app-layout>
