@extends('layouts.template')

@section('content')
<div class="p-10 mt-10 sm:ml-64">
    <h1 class="text-2xl mb-1 font-bold">Data Rayon</h1>
    <h3 class="mb-2"><a href="{{ route('dashboard') }}">Dashboard</a> / <a href="{{ route('admin.rayon.index') }}">Data Rayon</a> / <span class="font-semibold">Create Rayon</span></h3>
    
    <form class="max-w-md mx-auto mt-10 bg-white shadow-lg p-8 rounded-lg" method="post" action="{{ route('admin.rayon.store') }}">
        <h1 class="text-center text-2xl mb-10 font-semibold">Form Input Rayon</h1>
        
        @csrf
        
        <div class="mb-5">
            <label for="rayon" class="text-sm text-gray-600">Rayon</label>
            <input type="text" name="rayon" id="rayon" class="block w-full px-4 py-2.5 border rounded-md
                focus:outline-none focus:ring focus:border-blue-500" placeholder=" " required />
        </div>

        <div class="mb-5">
            <label for="user" class="text-sm text-gray-600">Choose Pembimbing Siswa (PS)</label>
            <select id="user" name="user_id" class="block w-full px-4 py-2.5 border rounded-md
                focus:outline-none focus:ring focus:border-blue-500">
                <option selected disabled>Choose PS</option>
                @foreach ($users as $user)
                    <option value="{{ $user['id'] }}">{{ $user['name'] }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300
            text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
            Submit
        </button>
    </form>
</div>
@endsection
