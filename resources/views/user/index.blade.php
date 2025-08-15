<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All users') }}
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
                            <th class="table-head-cell">Имя</th>
                            <th class="table-head-cell">Email</th>
                            <th class="table-head-cell">Date</th>
                            <th class="table-head-cell">Action</th>
                            <th class="table-head-cell">Action</th>
                        </tr>
                        </thead>
                        <tbody class="table-body">
                        @foreach($users as $user)
                            <tr>
                                <td class="table-body-cell">{{ $user->name }}</td>
                                <td class="table-body-cell">{{ $user->email }}</td>
                                <td class="table-body-cell">{{ $user->created_at->format('d M Y H:i') }}</td>
                                <td class="table-body-cell">
                                    <form action="{{route('user.destroy', $user->id)}}" method="POST">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="btn-delete">delete</button>
                                    </form>
                                </td>
                                <td class="table-body-cell">
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn-update">update</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
