@extends('layouts.template')

@section('content')
    <div class="p-10 mt-10 sm:ml-64">
        <h1 class="text-2xl mb-1 font-bold">Edit Data Rombel</h1>
        <h3 class="mb-2">
            <a href="{{ route('dashboard') }}">Dashboard</a> /
            <a href="{{ route('admin.rombel.index') }}">Data Rombel</a> /
            <span class="font-semibold">Edit Data Rombel</span>
        </h3>

        <form class="max-w-lg mx-auto mt-10 bg-white shadow-lg p-8 rounded-lg" method="post" action="{{ route('admin.rombel.update', $rombels['id']) }}">
            @csrf
            @method('PATCH')
            <h1 class="text-center text-2xl mb-10 font-semibold">Form Update Rombel</h1>

            <div class="mb-5">
                <label for="rombel" class="text-sm text-gray-600 block mb-2">Rombel</label>
                <input type="text" name="rombel" id="rombel" value="{{ $rombels['rombel'] }}" class="block w-full py-2.5 px-4 border rounded-md text-sm text-gray-900 bg-transparent focus:outline-none focus:ring-0 focus:border-blue-600" placeholder="Rombel" required />
            </div>

            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Submit
            </button>
        </form>
    </div>
@endsection
