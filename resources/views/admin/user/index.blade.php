@extends('layouts.template')

@section('content')
    <div class="p-10 mt-10 sm:ml-64">
        <h1 class="text-2xl mb-1 font-bold">Data User</h1>
        <h3 class="mb-2"><a href="{{ route('dashboard') }}" class="text-blue-500">Dashboard</a> / <span class="font-semibold">Data User</span></h3>

        @if (Session::get('success'))
            <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Success alert!</span> {{ Session::get('success') }}
                </div>
            </div>
        @endif

        <div class="overflow-x-auto">
            <div class="p-2 mt-2 text-lg font-semibold text-white bg-blue-500 dark:text-white dark:bg-gray-800">
                <a href="{{ route('admin.user.create') }}" class="px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0 text-blue-500 hover:text-white">
                    Tambah User
                </a>
            </div>
            <table class="w-full mt-5 text-sm text-left rtl:text-right text-gray-700 dark:text-gray-400 bg-white dark:bg-gray-800">
                <thead class="text-xs text-white uppercase bg-blue-500 dark:bg-blue-700">
                    <tr>
                        <th class="px-6 py-3">No.</th>
                        <th class="px-6 py-3">Name</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">Role</th>
                        <th class="px-6 py-3">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="bg-gray-100 dark:bg-gray-900">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ ($users->currentPage() - 1) * $users->perPage() + $loop->index + 1 }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $user['name'] }}</td>
                            <td class="px-6 py-4">{{ $user['email'] }}</td>
                            <td class="px-6 py-4">{{ $user['role'] }}</td>
                            <td class="px-6 py-4 text-left">
                                <a href="{{ route('admin.user.edit', $user['id']) }}" class="text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            @if ($users->count())
                {{ $users->links() }}
            @endif
        </div>
    </div>
@endsection
