@extends('layouts.template')

@section('content')
    @if (Auth::check())
        @if (Auth::user()->role == 'admin')
            <div class="p-10 mt-10 sm:ml-64">
                <div class="container mx-auto p-4">
                    <h1 class="text-2xl mb-4 font-bold">Dashboard</h1>
                    <h3 class="mb-4 text-lg font-medium">Dashboard /</h3>
                    <div class="card bg-gray-200 p-6 rounded-lg shadow-xl mb-8">
                        <div class="flex flex-wrap -mx-4">

                            <div class="w-full sm:w-1/2 lg:w-1/3 xl:w-1/3 p-4">
                                <div class="card bg-blue-500 text-white p-6 rounded-lg shadow-xl hover:bg-blue-600 flex items-center">
                                    <div class="rounded-full bg-gray-300 w-16 h-16 flex items-center justify-center mr-4">
                                        <i class="fa-solid fa-users fa-3xl text-black"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-2 text-xl font-bold">Peserta Didik</h5>
                                        <p class="font-normal text-lg">{{ DB::table('students')->count() }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="w-full sm:w-1/2 lg:w-1/3 xl:w-1/3 p-4">
                                <div class="card bg-green-500 text-white p-6 rounded-lg shadow-xl hover:bg-green-600 flex items-center">
                                    <div class="rounded-full bg-gray-300 w-16 h-16 flex items-center justify-center mr-4">
                                        <i class="fa-solid fa-user-gear fa-3xl text-black"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-2 text-xl font-bold">Administrator</h5>
                                        <p class="font-normal text-lg">{{ DB::table('users')->where('role', 'admin')->count() }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="w-full sm:w-1/2 lg:w-1/3 xl:w-1/3 p-4">
                                <div class="card bg-yellow-500 text-white p-6 rounded-lg shadow-xl hover:bg-yellow-600 flex items-center">
                                    <div class="rounded-full bg-gray-300 w-16 h-16 flex items-center justify-center mr-4">
                                        <i class="fa-solid fa-user-tie fa-3xl text-black"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-2 text-xl font-bold">Pembimbing Siswa</h5>
                                        <p class="font-normal text-lg">{{ DB::table('users')->where('role', 'ps')->count() }}</p>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="flex flex-wrap -mx-4 mt-8">

                            <div class="w-full sm:w-1/2 p-4">
                                <div class="card bg-purple-500 text-white p-6 rounded-lg shadow-xl hover:bg-purple-600 flex items-center">
                                    <div class="rounded-full bg-gray-300 w-16 h-16 flex items-center justify-center mr-4">
                                        <i class="fa-solid fa-bookmark fa-3xl text-black"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-2 text-xl font-bold">Rombel</h5>
                                        <p class="font-normal text-lg">{{ DB::table('rombels')->count() }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="w-full sm:w-1/2 p-4">
                                <div class="card bg-red-500 text-white p-6 rounded-lg shadow-xl hover:bg-red-600 flex items-center">
                                    <div class="rounded-full bg-gray-300 w-16 h-16 flex items-center justify-center mr-4">
                                        <i class="fa-solid fa-bookmark fa-3xl text-black"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-2 text-xl font-bold">Rayon</h5>
                                        <p class="font-normal text-lg">{{ DB::table('rayons')->count() }}</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
        @endif
        @if (Auth::user()->role == 'ps')
        <div class="p-10 mt-10 sm:ml-64">
            <h1 class="text-2xl mb-1 font-bold">Dashboard {{ Auth::user()->name }}</h1>
            <h3 class="mb-2 font-semibold">Dashboard /</h3>
    
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-4">
                <div class="card bg-gray-200 p-6 rounded-lg shadow-xl hover:bg-gray-300">
                    <div class="inner-card bg-blue-500 text-white p-6 rounded-lg shadow-xl hover:bg-blue-600 flex items-center">
                        <div class="rounded-full bg-gray-300 w-16 h-16 flex items-center justify-center mr-4">
                            <i class="fa-solid fa-users fa-2x text-black"></i>
                        </div>
                        <div class="text-container">
                            <h5 class="mb-2 text-xl font-bold">Peserta Didik {{ Auth::user()->name }}</h5>
                            <p class="font-normal text-lg">{{ $murids->count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="card bg-gray-200 p-6 rounded-lg shadow-xl hover:bg-gray-300">
                    <div class="inner-card bg-green-500 text-white p-6 rounded-lg shadow-xl hover:bg-green-600 flex items-center">
                        <div class="rounded-full bg-gray-300 w-16 h-16 flex items-center justify-center mr-4">
                            <i class="fa-solid fa-calendar-days fa-2x text-black"></i>
                        </div>
                        <div class="text-container">
                            <h5 class="mb-2 text-xl font-bold">Keterlambatan Hari Ini</h5>
                            <p class="font-normal text-lg">{{ $jmlTelatHarian }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    
    
    @endif
@endsection
