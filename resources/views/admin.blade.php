<title>Admin</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Area') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th cope="col" class="px-6 py-3">User id</th>
                                <th cope="col" class="px-6 py-3">User name</th>
                                <th cope="col" class="px-6 py-3">Email</th>
                                <th cope="col" class="px-6 py-3">Admin</th>
                            </tr>
                            @foreach($users as $user)
                        </thead>
                        <tbody class="text-xs">
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap" >{{$user->id}}</td>
                                <td class="px-6 py-4">{{$user->name}}</td>
                                <td class="px-6 py-4">{{$user->email}}</td>
                                @if ($user->admin === 0)
                                <td class="px-6 py-4">False</td>
                                @else
                                <td class="px-6 py-4">True</td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>