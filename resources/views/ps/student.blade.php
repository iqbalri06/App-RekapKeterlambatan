@extends('layouts.template')

@section('content')
    <div class="p-4 sm:p-10 mt-10 sm:ml-64">
        <h1 class="text-2xl mb-4 font-bold mb-4">Data Siswa {{ Auth::user()->name }}</h1>
        <h3 class="mb-2"><a href="{{ route('dashboard') }}">Dashboard</a> / <span class="font-semibold">Data Siswa</span></h3>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

            <form class="pb-4 p-5 bg-red-500 dark:bg-gray-900 flex" method="get" action="{{ route('indexSiswa') }}">
                <div class="relative mt-1">
                    <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-black dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" name="searchSiswa"
                        class="block pt-2 ps-10 text-black border border-black rounded-lg w-full sm:w-80 bg-red-500 focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500"
                        placeholder="Search Name">
                </div>
                <button class="ml-2 shadow p-2 rounded-xl bg-white text-red-500 hover:bg-gray-100 dark:text-gray-900"
                    type="submit">Search</button>
            </form>

            <div class="flex items-end justify-between mb-2 sm:mb-4 me-2">
                <div class="overflow-hidden rounded-lg border dark:border-gray-700 w-full mt-4">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-800 dark:text-gray-200">
                        <thead class="text-xs text-white bg-red-500 dark:bg-red-700">
                            <tr>
                                <th scope="col" class="px-4 py-2">No.</th>
                                <th scope="col" class="px-4 py-2">NIS</th>
                                <th scope="col" class="px-4 py-2">Nama</th>
                                <th scope="col" class="px-4 py-2">Rombel</th>
                                <th scope="col" class="px-4 py-2">Rayon</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ ($students->currentpage() - 1) * $students->perpage() + $loop->index + 1 }}
                                    </th>
                                    <th scope="row"
                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $student['nis'] }}
                                    </th>
                                    <td class="px-4 py-3">
                                        {{ $student['name'] }}
                                    </td>
                                    <td class="px-4 py-3">
                                        {{ $student['rombel']['rombel'] }}
                                    </td>
                                    <td class="px-4 py-3">
                                        {{ $student['rayon']['rayon'] }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if ($students->count())
                    {{ $students->links() }}
                @endif
            </div>
        </div>
    </div>
@endsection
