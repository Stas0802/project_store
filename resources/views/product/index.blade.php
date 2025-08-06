<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All products') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 uppercase">ID</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 uppercase">Name</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 uppercase">Description</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 uppercase">Image</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 uppercase">Price</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 uppercase">Category</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 uppercase">Date</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 uppercase">Action</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 uppercase">Action</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($products as $product)
                            <tr>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $product->id }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $product->name }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $product->description }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">
                                    <img src="{{ asset('storage/product/' . $product->image) }}" alt="{{$product->name}}" class="w-20 h-20">
                                </td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $product->price }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-700">{{ $product->category->name ?? '_' }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $product->created_at->format('d M Y H:i') }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">
                                    <form action="{{route('product.destroy', $product)}}" method="POST">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <button type="submit">delete</button>
                                    </form>
                                </td>
                                <td class="px-4 py-2 text-sm text-gray-700"><a href="{{ route('product.edit', $product) }}">update</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
