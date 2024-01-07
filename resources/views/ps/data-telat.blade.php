@extends('layouts.template')

@section('content')
    <div class="p-10 mt-10 sm:ml-64">
        <h1 class="text-2xl mb-4 font-bold">Data Keterlambatan {{ Auth::user()->name }}</h1>
        <h3 class="mb-4"><a href="{{ route('dashboard') }}">Dashboard</a> / <span class="font-semibold">Data Keterlambatan</span></h3>

        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4 bg-red-500 dark:bg-gray-800 rounded-lg">
            <div class="w-full md:w-1/2">
                <form class="pb-4 p-5 bg-white dark:bg-gray-900 flex" method="get" action="{{ route('indexDataTelat') }}">
                    <div class="relative mt-1">
                        <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="text" name="searchSiswa"
                            class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search Name">
                    </div>
                    <button class="ml-4 shadow p-2 rounded-xl bg-red-600 text-dark" type="submit">Search</button>
                </form>
            </div>
            <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                <div class="flex items-center space-x-3 w-full md:w-auto">
                    <a href="{{ route('downloadExcel') }}"
                        class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-4 w-4 mr-2 text-gray-400"
                            viewbox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                                clip-rule="evenodd" />
                        </svg>
                        Export Excel
                    </a>
                </div>
            </div>
        </div>

        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg bg-red-600" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Keseluruhan Data</button>
                </li>
                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Rekapitulasi Data</button>
                </li>
            </ul>
        </div>

        <div id="default-tab-content">
            <!-- Content for Keseluruhan Data -->
            <div class="hidden p-4 rounded-lg bg-red-200 dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="overflow-y-auto max-h-screen">
                    <table id="dataTable"
                        class="overflow-y-auto w-full text-sm text-center text-gray-500 dark:text-gray-400">
                        <thead class="text-center text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">No.</th>
                                <th scope="col" class="px-4 py-3">NIS | Nama</th>
                                <th scope="col" class="px-4 py-3">Tanggal</th>
                                <th scope="col" class="px-4 py-3">Informasi</th>
                                <th scope="col" class="px-4 py-3"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr class="border-b dark:border-gray-700 text-center">
                                    <th scope="row"
                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ ($students->currentpage() - 1) * $students->perpage() + $loop->index + 1 }}
                                    </th>
                                    <th scope="row"
                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $student['student']['nis'] }} | {{ $student['student']['name'] }}
                                    </th>
                                    <td class="px-4 py-3">{{ $student['date_time_late'] }}</td>
                                    <td class="px-4 py-3">{{ $student['information'] }}</td>
                                    <td class="px-4 py-3">
                                        <button class="text-white bg-blue-400 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
                                                onclick="window.location.href='{{ route('detailStudent', $student->student_id) }}'">
                                            Show
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        @if ($students->count())
                            {{ $students->links() }}
                        @endif
                    </table>
                </div>
            </div>

            <!-- Content for Rekapitulasi Data -->
            <div class="hidden p-4 rounded-lg bg-red-200 dark:bg-gray-800" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                <div class="overflow-x-auto">
                    <table id="dataTable" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-center text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">No.</th>
                                <th scope="col" class="px-4 py-3">NIS</th>
                                <th scope="col" class="px-4 py-3">Nama</th>
                                <th scope="col" class="px-4 py-3">Jumlah Keterlambatan</th>
                                <th scope="col" class="px-4 py-3">Action</th>
                                <th scope="col" class="px-4 py-3"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $uniqueNames = [];
                            @endphp

                            @foreach ($students as $student)
                                @unless (in_array($student['student']['name'], $uniqueNames))
                                    <tr class="border-b dark:border-gray-700 text-center">
                                        <th scope="row"
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ ($students->currentpage() - 1) * $students->perpage() + $loop->index + 1 }}
                                        </th>
                                        <th scope="row"
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $student['student']['nis'] }}
                                        </th>
                                        <td class="px-4 py-3">{{ $student['student']['name'] }}</td>
                                        <td class="px-4 py-3">
                                            {{ $students->where('student.nis', $student['student']['nis'])->count() }}
                                        </td>
                                        <td class="px-4 py-3">
                                            <button class="text-white bg-blue-400 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
                                                    onclick="window.location.href='{{ route('detailStudent', $student['student_id']) }}'">
                                                Show
                                            </button>
                                        </td>
                                        <td class="px-4 py-3">
                                            @if ($students->where('student.nis', $student['student']['nis'])->count() >= 3)
                                                <a href="{{ route('downloadPDF', $student['id']) }}">
                                                    <button type="button"
                                                        class="flex items-center justify-center text-white bg-blue-400 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                            <path clip-rule="evenodd" fill-rule="evenodd"
                                                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                                        </svg>
                                                        Cetak Surat
                                                    </button>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>

                                    @php
                                        $uniqueNames[] = $student['student']['name'];
                                    @endphp
                                @endunless
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
