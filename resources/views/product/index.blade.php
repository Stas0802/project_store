<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All products') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="page-container">
            <div class="table-container">
                <div class="p-6 text-gray-900">
                    <table class="table-base">
                        <div class="mb-4">
                            <input type="text" id="product-search" placeholder="Поиск по имени" class="border p-2 w-60 rounded">
                        </div>
                        <thead class="bg-gray-900">
                        <tr>
                            <th class="table-head-cell">ID</th>
                            <th class="table-head-cell">Name</th>
                            <th class="table-head-cell">Description</th>
                            <th class="table-head-cell">Image</th>
                            <th class="table-head-cell">Price</th>
                            <th class="table-head-cell">Category</th>
                            <th class="table-head-cell">Date</th>
                            <th class="table-head-cell">Action</th>
                            <th class="table-head-cell">Action</th>
                        </tr>
                        </thead>
                        <tbody class="table-body">
                        @foreach($products as $product)
                            <tr>
                                <td class="table-body-cell">{{ $product->id }}</td>
                                <td class="table-body-cell">{{ $product->name }}</td>
                                <td class="table-body-cell">{{ $product->description }}</td>
                                <td class="table-body-cell">
                                    <img src="{{ asset('storage/product/' . $product->image) }}" alt="{{$product->name}}" class="w-20 h-20">
                                </td>
                                <td class="table-body-cell">{{ $product->price }}</td>
                                <td class="table-body-cell">{{ $product->category->name ?? '_' }}</td>
                                <td class="table-body-cell">{{ $product->created_at->format('d M Y H:i') }}</td>
                                <td class="table-body-cell">
                                    <form action="{{route('product.destroy', $product)}}" method="POST">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="btn-delete">Delete</button>
                                    </form>
                                </td>
                                <td class="table-body-cell"><a href="{{ route('product.edit', $product) }}" class="btn-update">update</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
