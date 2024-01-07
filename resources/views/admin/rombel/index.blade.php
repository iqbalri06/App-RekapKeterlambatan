@extends('layouts.template')

@section('content')
    <div class="p-10 mt-10 sm:ml-64">
        <div class="container mx-auto p-4">
            <h1 class="text-2xl mb-1 font-bold">Data Rombel</h1>
            <h3 class="mb-2 font-base"><a href="{{ route('dashboard') }}" class="text-blue-500">Dashboard</a> / <span class="font-semibold">Data Rombel</span></h3>

            @if (Session::get('success'))
                <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">Success alert!</span> {{ Session::get('success') }}
                    </div>
                </div>
            @endif

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <form class="pb-4 p-5 bg-white dark:bg-gray-900 flex flex-wrap" method="get" action="{{ route('admin.rombel.index') }}">
                    <div class="relative mt-1 w-full sm:w-1/2 lg:w-1/5">
                        <input type="text" name="search" class="block pt-2 ps-15 text-sm text-gray-900 border border-gray-300 rounded-lg w-full sm:w-auto bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Rombel">
                    </div>
                    <button class="mt-2 w-20 sm:mt-0 shadow p-2 rounded-xl bg-gray-600 text-white" type="submit">Search</button>

                    <div class="ml-auto mt-2 sm:mt-0 sm:ml-2">
                        <button class="inline-flex items-end justify-center p-0.5 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                            <a href="{{ route('admin.rombel.create') }}" class="px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                Tambah Rombel
                            </a>
                        </button>
                    </div>
                </form>

                <div class="mb-2 me-2">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-700 dark:text-gray-400 bg-white dark:bg-gray-800">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">No.</th>
                                <th scope="col" class="px-6 py-3">Rombel</th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($rombels as $rombel)
                                <tr class="bg-gray-100 dark:bg-gray-900">
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ ($rombels->currentpage() - 1) * $rombels->perpage() + $loop->index + 1 }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $rombel['rombel'] }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <a href="{{ route('admin.rombel.edit', $rombel['id']) }}" class="text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                        <form action="{{ route('admin.rombel.delete', $rombel['id']) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-600 dark:text-red-500 hover:underline" onclick="return confirm('Apakah Yakin Hapus Data Rombel?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-3">
                @if ($rombels->count())
                    {{ $rombels->links() }}
                @endif
            </div>
        </div>
    </div>
@endsection
