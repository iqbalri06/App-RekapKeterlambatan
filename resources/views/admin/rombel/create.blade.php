@extends('layouts.template')

@section('content')
    <div class="p-10 mt-10 sm:ml-64">
        <h1 class="text-2xl mb-1 font-bold">Create Data Rombel</h1>
        <h3 class="mb-2"><a href="{{ route('dashboard') }}">Dashboard</a> / <a href="{{ route('admin.rombel.index') }}">Data Rombel</a> / <span class="font-semibold">Create Rombel</span></h3>
        
        <form class="max-w-lg mx-auto mt-10 bg-white shadow-lg p-8 rounded-lg" method="post" action="{{ route('admin.rombel.store') }}">
            @csrf
            <h1 class="text-center text-2xl mb-5 font-semibold">Form Input Rombel</h1>
            
            <div class="mb-5">
                <label for="rombel" class="text-sm text-gray-600">Rombel</label>
                <input type="text" name="rombel" id="rombel" class="block w-full px-4 py-2.5 border rounded-md
                    focus:outline-none focus:ring focus:border-blue-500" placeholder=" " required />
            </div>

            <button type="submit" class="bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300
                text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                Submit
            </button>
        </form>
    </div>
@endsection
