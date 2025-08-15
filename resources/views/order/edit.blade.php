<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update order') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="page-container">
            <div class="table-container">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <input type="text" id="product-search" placeholder="Поиск по имени" class="border p-2 w-60 rounded">
                    </div>
                    <table class="table-base">
                        <thead class="bg-gray-900">
                        <tr>
                            <th class="table-head-cell">ID</th>
                            <th class="table-head-cell">Name</th>
                            <th class="table-head-cell">Description</th>
                            <th class="table-head-cell">Image</th>
                            <th class="table-head-cell">Price</th>
                            <th class="table-head-cell">Category</th>
                            <th class="table-head-cell">Date</th>
                            <th class="table-head-cell text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody class="table-body">
                        @foreach($products as $product)
                            <tr>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $product->id }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $product->name }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $product->description }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">
                                    <img src="{{ asset('storage/product/' . $product->image) }}" alt="{{$product->name}}" class="w-20 h-20">
                                </td>
                                <td class="table-body-cell">{{ $product->price }}</td>
                                <td class="table-body-cell">{{ $product->category->name ?? '_' }}</td>
                                <td class="table-body-cell">{{ $product->created_at->format('d M Y H:i') }}</td>
                                <td class="table-body-cell" colspan="2">
                                    <form method="POST" action="{{ route('orderProduct.updateProduct', $order->id) }}"
                                          class="flex items-center gap-2">
                                        @csrf
                                        {{ method_field('PATCH') }}
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="number" name="quantity" min="1" value="1" class="border p-1 w-16 inline-block">
                                        <button type="submit" class="btn-details">Добавить</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.querySelector('#product-search').addEventListener('input', function () {
            const query = this.value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');

            rows.forEach(function(row) {
                const name = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                row.style.display = name.includes(query) ? '' : 'none';
            });
        });
    </script>
</x-app-layout>
