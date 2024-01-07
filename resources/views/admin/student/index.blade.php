@extends('layouts.template')

@section('content')
    <div class="p-4 lg:p-10 mt-10 sm:ml-0 lg:ml-64">
        <h1 class="text-2xl font-bold mb-2">Data Siswa</h1>
        <h3 class="text-base mb-4"><a href="{{ route('dashboard') }}">Dashboard</a> / <span class="font-semibold">Data Siswa</span></h3>

        @if (Session::get('success'))
            <!-- Success Alert -->
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

        <form class="pb-4 p-5 bg-white dark:bg-gray-900 flex flex-col sm:flex-row" method="get" action="{{ route('admin.student.index') }}">
            <div class="relative mt-1 mb-2 sm:mb-0 sm:me-2">
                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="text" name="search" class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-full sm:w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Name">
            </div>
            <button class="ml-0 mt-2 sm:mt-0 sm:ml-2 shadow p-2 rounded-xl bg-gray-600 text-white" type="submit">Search</button>
            <div class="ml-auto mt-2 sm:mt-0 sm:ml-2">
                <button class="inline-flex items-end justify-center p-0.5 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                    <a href="{{ route('admin.student.create') }}" class="px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                        Tambah Siswa
                    </a>
                </button>
            </div>
        </form>

        <div class="flex items-center mb-4 sm:mb-2">
            <div class="overflow-x-auto mx-auto shadow-lg">
                <table class="w-full mt-5 text-sm text-left rtl:text-right text-gray-700 dark:text-gray-400 bg-white dark:bg-gray-800">
                    <thead class="text-xs text-white uppercase bg-gradient-to-br from-cyan-500 to-blue-500 dark:bg-gradient-to-br dark:from-cyan-500 dark:to-blue-500">
                        <tr>
                            <th scope="col" class="px-16 py-3">No.</th>
                            <th scope="col" class="px-16 py-3">NIS</th>
                            <th scope="col" class="px-16 py-3">Nama</th>
                            <th scope="col" class="px-16 py-3">Rombel</th>
                            <th scope="col" class="px-16 py-3">Rayon</th>
                            <th scope="col" class="px-16 py-3">Edit</th>
                        </tr>
                    </thead>
                    @php $no = ($students->currentpage() - 1) * $students->perpage() + 1 @endphp
                    @foreach ($students as $student)
                        <tbody>
                            <tr class="bg-gray-100 dark:bg-gray-900">
                                <td class="px-20 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $no++ }}
                                </td>
                                <td class="px-16 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $student['nis'] }}
                                </td>
                                <td class="px-16 py-4">
                                    {{ $student['name'] }}
                                </td>
                                <td class="px-16 py-4">
                                    {{ $student['rombel']['rombel'] }}
                                </td>
                                <td class="px-16 py-4">
                                    {{ $student['rayon']['rayon'] }}
                                </td>
                                <td class="px-16 py-4 text-left">
                                    <a href="{{ route('admin.student.edit', $student['id']) }}" class="text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>

        <div class="mt-3">
            @if ($students->count())
                {{ $students->links() }}
            @endif
        </div>
    </div>
</div>
@endsection
