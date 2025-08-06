<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
{{--                    @if(session('success'))--}}
{{--                        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded shadow">--}}
{{--                            {{ session('success') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 uppercase">ID</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 uppercase">Name</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 uppercase">Image</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 uppercase">Date</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 uppercase">Action</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 uppercase">Action</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($categories as $category)
                            <tr>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $category->id }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $category->name }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">
                                    <img src="{{ asset('storage/category/' . $category->image) }}" alt="{{$category->name}}" class="w-20 h-20">
                                </td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $category->created_at->format('d M Y H:i') }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">
                                    <form action="{{route('category.destroy', $category)}}" method="POST">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <button type="submit">delete</button>
                                    </form>
                                </td>
                                <td class="px-4 py-2 text-sm text-gray-700"><a href="{{ route('category.edit', $category) }}">update</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

