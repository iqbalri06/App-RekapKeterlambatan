@extends('layouts.template')

@section('content')
    <div class="p-10 mt-10 sm:ml-64">
        <h1 class="text-2xl mb-1 font-bold">Data Keterlambatan</h1>
        <h3 class="mb-2"><a href="{{ route('dashboard') }}">Dashboard</a> / <span class="font-semibold">Data Keterlambatan</span></h3>
        @if (Session::get('success'))
            <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Success alert!</span> {{ Session::get('success') }}
                </div>
            </div>
        @endif
        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
                data-tabs-toggle="#default-tab-content" role="tablist">
                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile"
                        type="button" role="tab" aria-controls="profile" aria-selected="false">Data
                        Keseluruhan</button>
                </li>
                <li class="me-2" role="presentation">
                    <button
                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab"
                        aria-controls="dashboard" aria-selected="false">Data Rekapitulasi</button>
                </li>

            </ul>
        </div>


        <div id="default-tab-content">

            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel"
                aria-labelledby="profile-tab">
                <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
                    <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                        <!-- Start coding here -->
                        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                            <div
                                class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                                <div class="w-full md:w-1/2">
                                    <form class="pb-4 p-5 bg-white dark:bg-gray-900 flex" method="get" action="">

                                        <div class="relative mt-1">
                                            <div
                                                class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                                </svg>
                                            </div>
                                            <input type="text" name="search"
                                                class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Search Name">
                                        </div>
                                        <button class="ml-2 shadow p-2 rounded-xl bg-gray-600 text-white"
                                            type="submit">Search</button>
                                    </form>
                                </div>
                                <div
                                    class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                                    <a href="{{ route('admin.data-telat.create') }}"><button type="button"
                                            class="flex items-center justify-center text-white bg-blue-400 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path clip-rule="evenodd" fill-rule="evenodd"
                                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                            </svg>
                                            Add Data
                                        </button></a>
                                    <div class="flex items-center space-x-3 w-full md:w-auto">
                                        <a href="{{ route('admin.data-telat.downloadExcel') }}"
                                            class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                                class="h-4 w-4 mr-2 text-gray-400" viewbox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Export Excel
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="overflow-x-auto">
                                <table id="dataTable" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead class="text-left text-xs text-white uppercase bg-gradient-to-r from-blue-500 to-blue-700 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">No.</th>
                                            <th scope="col" class="px-6 py-3">Nama</th>
                                            <th scope="col" class="px-6 py-3">Tanggal & Waktu</th>
                                            <th scope="col" class="px-6 py-3">Informasi</th>
                                            <th scope="col" class="px-6 py-3">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($lates as $data)
                                            <tr class="border-b dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                                                <th scope="row" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ ($lates->currentpage() - 1) * $lates->perpage() + $loop->index + 1 }}
                                                </th>
                                                <td class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $data['student']['name'] }}
                                                </td>
                                                <td class="px-6 py-3">{{ $data['date_time_late'] }}</td>
                                                <td class="px-6 py-3">{{ $data['information'] }}</td>
                                                <td class="px-6 py-4 space-x-2 flex">
                                                    <a href="{{ route('admin.data-telat.edit', $data['id']) }}" class="text-blue-600 dark:text-blue-500 hover:underline bg-blue-100 dark:bg-blue-800 py-1 px-2 rounded-md transition">Edit</a>
                                                    <form action="{{ route('admin.data-telat.destroy', $data['id']) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button onclick="return confirm('Apakah Yakin Hapus Data Rombel?')" class="text-white bg-red-500 hover:bg-red-600 py-1 px-2 rounded-md transition">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>
                                                
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                
                                <div class="mt-3 p-3">
                                    @if ($lates->count())
                                        {{ $lates->links() }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>


            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel"
                aria-labelledby="dashboard-tab">
                <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
                    <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                        <!-- Start coding here -->
                        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                            <div
                                class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                                <div class="w-full md:w-1/2">
                                    <form class="pb-4 p-5 bg-white dark:bg-gray-900 flex" method="get"
                                        action="{{ route('admin.rombel.index') }}">

                                        <div class="relative mt-1">
                                            <div
                                                class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                                </svg>
                                            </div>
                                            <input type="text" name="search"
                                                class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Search Name">
                                        </div>
                                        <button class="ml-2 shadow p-2 rounded-xl bg-gray-600 text-white"
                                            type="submit">Search</button>
                                    </form>
                                </div>
                                <div
                                    class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                                    <a href="{{ route('admin.data-telat.create') }}"><button type="button"
                                            class="flex items-center justify-center text-white bg-blue-400 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path clip-rule="evenodd" fill-rule="evenodd"
                                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                            </svg>
                                            Add Data
                                        </button></a>
                                    <div class="flex items-center space-x-3 w-full md:w-auto">
                                        <a href=""><button id="filterDropdownButton"
                                                data-dropdown-toggle="filterDropdown"
                                                class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                                type="button">
                                                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                                    class="h-4 w-4 mr-2 text-gray-400" viewbox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                Export Excel
                                            </button></a>
                                    </div>
                                </div>
                            </div>
                            <div class="overflow-x-auto">
                                <table id="dataTable" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead
                                        class="text-center text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-4 py-3">No.</th>
                                            <th scope="col" class="px-4 py-3">NIS</th>
                                            <th scope="col" class="px-4 py-3">Nama</th>
                                            <th scope="col" class="px-4 py-3">Jumlah Keterlambatan</th>
                                            <th scope="col" class="px-4 py-3">Actions</th>
                                            <th scope="col" class="px-4 py-3"></th>
                                        </tr>
                                    </thead>

                                    @php
                                        $namaSebelumnya = null;
                                        $no = 1;
                                    @endphp

                                    <tbody>
                                        @foreach ($lates as $data)
                                            @if ($data['student']['name'] != $namaSebelumnya)
                                                <tr class="border-b dark:border-gray-700 text-center">
                                                    <th>{{ $no }}
                                                    </th>
                                                    <th scope="row"
                                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $data['student']['nis'] }} </th>
                                                    <th scope="row"
                                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $data['student']['name'] }} </th>
                                                    <th scope="row"
                                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $lates->where('student.nis', $data['student']['nis'])->count() }}
                                                    </th>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <button onclick="window.location.href='{{ route('admin.data-telat.show', ['student_id' => $data->student_id]) }}'" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-red-700 dark:hover:bg-red-900 focus:outline-none dark:focus:ring-red-800">
                                                                Detail
                                                            </button>
                                                    <th scope="row"
                                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        @if ($lates->where('student.nis', $data['student']['nis'])->count() >= 3)
                                                            <a
                                                                href="{{ route('admin.data-telat.downloadPDF', $data['id']) }}">
                                                                <button type="button"
                                                                    class="flex items-center justify-center text-white bg-blue-400 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                                                    <svg class="h-3.5 w-3.5 mr-2" fill="currentColor"
                                                                        viewbox="0 0 20 20"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        aria-hidden="true">
                                                                        <path clip-rule="evenodd" fill-rule="evenodd"
                                                                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                                                    </svg>
                                                                    Cetak Surat
                                                                </button>
                                                            </a>
                                                        @endif
                                                    </th>
                                                </tr>
                                            @endif
                                            @php
                                                $namaSebelumnya = $data['student']['name'];
                                                $no++
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-3 p-3">
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>

    </div>
@endsection
