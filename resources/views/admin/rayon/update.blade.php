@extends('layouts.template')

@section('content')
    <div class="p-10 mt-10 sm:ml-64">
        <h1 class="text-2xl mb-1 font-bold">Update Data Rayon</h1>
        <h3 class="mb-2">
            <a href="{{ route('dashboard') }}">Dashboard</a> /
            <a href="{{ route('admin.rayon.index') }}">Data Rayon</a> /
            <span class="font-semibold">Update Data Rayon</span>
        </h3>

        <form class="max-w-md mx-auto mt-12 bg-white shadow-lg p-8 rounded-lg" method="post" action="{{ route('admin.rayon.update', $rayons['id']) }}">
            @csrf
            @method('PATCH')
            <h1 class="text-center text-2xl mb-10 font-semibold">Form Update Rayon</h1>

            <div class="mb-5">
                <label for="rayon" class="text-sm text-gray-600 block mb-2">Rayon</label>
                <input type="text" name="rayon" id="rayon" value="{{ $rayons['rayon'] }}" class="block w-full py-2.5 px-4 border rounded-md text-sm text-gray-900 bg-transparent focus:outline-none focus:ring-0 focus:border-blue-600" placeholder="Rayon" required />
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <label for="user_select" class="text-sm text-gray-600 block mb-2">Choose PS</label>
                <select id="user_select" name="user_id" class="block w-full py-2.5 px-4 border rounded-md text-sm text-gray-500 bg-transparent focus:outline-none focus:ring-0 focus:border-gray-200">
                    @foreach ($users as $user)
                        <option value="{{ $user['id'] }}" {{ $rayons['user_id'] == $user['id'] ? 'selected' : '' }}>
                            {{ $user['name'] }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="text-white mt-5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Submit
            </button>
        </form>
    </div>
@endsection
