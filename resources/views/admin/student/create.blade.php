@extends('layouts.template')

@section('content')
    <div class="p-10 mt-10 sm:ml-64">
        <h1 class="text-2xl mb-1 font-bold">Create Data Siswa</h1>
        <h3 class="mb-2"><a href="{{ route('dashboard') }}">Dashboard</a> / <a href="{{ route('admin.student.index') }}">Data Siswa</a> / <span class="font-semibold">Create Data Siswa</span></h3>
        
        <form class="max-w-md mx-auto mt-10 bg-white shadow-lg p-8 rounded-lg" method="post" action="{{ route('admin.student.store') }}">
            @csrf
            <h1 class="text-center text-2xl mb-10 font-semibold">Form Input Data Siswa</h1>
            
            <div class="mb-5">
                <label for="nis" class="text-sm text-gray-600">NIS</label>
                <input type="text" name="nis" id="nis" class="block w-full px-4 py-2.5 border rounded-md
                    focus:outline-none focus:ring focus:border-blue-500" placeholder=" " required />
            </div>

            <div class="mb-5">
                <label for="name" class="text-sm text-gray-600">Nama</label>
                <input type="text" name="name" id="name" class="block w-full px-4 py-2.5 border rounded-md
                    focus:outline-none focus:ring focus:border-blue-500" placeholder=" " required />
            </div>

            <label for="rombel_select" class="text-sm text-gray-600 block mb-2">Choose Rombel</label>
            <select id="rombel_select" name="rombel_id"
                class="block w-full py-2.5 px-4 border rounded-md text-sm text-gray-500 bg-transparent
                focus:outline-none focus:ring-0 focus:border-gray-200">
                @foreach ($rombels as $rombel)
                    <option value="{{ $rombel['id'] }}">{{ $rombel['rombel'] }}</option>
                @endforeach
            </select>

            <label for="rayon_select" class="text-sm text-gray-600 block mt-3 mb-2">Choose Rayon</label>
            <select id="rayon_select" name="rayon_id"
                class="block w-full py-2.5 px-4 border rounded-md text-sm text-gray-500 bg-transparent
                focus:outline-none focus:ring-0 focus:border-gray-200">
                @foreach ($rayons as $rayon)
                    <option value="{{ $rayon['id'] }}">{{ $rayon['rayon'] }}</option>
                @endforeach
            </select>

            <button type="submit" class="bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none
                focus:ring-blue-300 text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5
                text-center mt-5">
                Submit
            </button>
        </form>
    </div>
@endsection
