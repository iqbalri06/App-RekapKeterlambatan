@extends('layouts.template')

@section('content')
    <div class="p-10 mt-10 sm:ml-64">
        <h1 class="text-2xl mb-1 font-bold">Edit Data Siswa</h1>
        <h3 class="mb-2">
            <a href="{{ route('dashboard') }}">Dashboard</a> /
            <a href="{{ route('admin.student.index') }}">Data Siswa</a> /
            <span class="font-semibold">Edit Data Siswa</span>
        </h3>

        <form class="max-w-md mx-auto mt-10 bg-white shadow-lg p-8 rounded-lg" method="post" action="{{ route('admin.student.update', $students['id']) }}">
            @csrf
            @method('PATCH')
            <h1 class="text-center text-2xl mb-10 font-semibold">Form Edit Data Siswa</h1>

            <div class="mb-5">
                <label for="nis" class="text-sm text-gray-600 block mb-2">NIS</label>
                <input type="text" name="nis" id="nis" value="{{ $students['nis'] }}" class="block w-full py-2.5 px-4 border rounded-md text-sm text-gray-900 bg-transparent focus:outline-none focus:ring-0 focus:border-blue-600" placeholder="NIS" required />
            </div>

            <div class="mb-5">
                <label for="name" class="text-sm text-gray-600 block mb-2">Nama</label>
                <input type="text" name="name" id="name" value="{{ $students['name'] }}" class="block w-full py-2.5 px-4 border rounded-md text-sm text-gray-900 bg-transparent focus:outline-none focus:ring-0 focus:border-blue-600" placeholder="Nama" required />
            </div>

            <div class="mb-5">
                <label for="rombel_id" class="text-sm text-gray-600 block mb-2">Rombel</label>
                <select id="rombel_id" name="rombel_id" class="block py-2.5 px-4 border rounded-md text-sm text-gray-900 bg-transparent focus:outline-none focus:ring-0 focus:border-blue-600">
                    @foreach ($rombels as $rombel)
                        <option value="{{ $rombel['id'] }}" {{ $rombel['id'] == $students['rombel_id'] ? 'selected' : '' }}>{{ $rombel['rombel'] }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-5">
                <label for="rayon_id" class="text-sm text-gray-600 block mb-2">Rayon</label>
                <select id="rayon_id" name="rayon_id" class="block py-2.5 px-4 border rounded-md text-sm text-gray-900 bg-transparent focus:outline-none focus:ring-0 focus:border-blue-600">
                    @foreach ($rayons as $rayon)
                        <option value="{{ $rayon['id'] }}" {{ $rayon['id'] == $students['rayon_id'] ? 'selected' : '' }}>{{ $rayon['rayon'] }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="text-white mt-3 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Submit
            </button>
        </form>
    </div>
@endsection
