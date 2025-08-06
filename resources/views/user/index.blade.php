<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 uppercase">Имя</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 uppercase">Email</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 uppercase">Action</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 uppercase">Action</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($users as $user)
                            <tr>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $user->name }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $user->email }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">
                                    <form action="{{route('user.destroy', $user->id)}}" method="POST">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <button type="submit">delete</button>
                                    </form>
                                </td>
                                <td class="px-4 py-2 text-sm text-gray-700"><a href="{{ route('user.edit', $user->id) }}">update</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
