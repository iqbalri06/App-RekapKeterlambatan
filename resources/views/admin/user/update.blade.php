@extends('layouts.template')

@section('content')
    <div class="p-10 mt-10 sm:ml-64">
        <h1 class="text-2xl mb-1 font-bold">Update Data User</h1>
        <h3 class="mb-2">
            <a href="{{ route('dashboard') }}">Dashboard</a> /
            <a href="{{ route('admin.user.index') }}">Data User</a> /
            <span class="font-semibold">Update Data User</span>
        </h3>

        <form class="max-w-md mx-auto mt-10 bg-white shadow-lg p-8 rounded-lg" method="post" action="{{ route('admin.user.update', $user['id']) }}">
            <h1 class="text-center text-2xl mb-10 font-semibold">Form Update Data User</h1>

            @csrf
            @method('PATCH')

            <div class="mb-5">
                <label for="name" class="text-sm text-gray-600 block mb-2">Name</label>
                <input type="text" name="name" id="name" value="{{ $user['name'] }}" class="block w-full py-2.5 px-4 border rounded-md text-sm text-gray-900 bg-transparent focus:outline-none focus:ring-0 focus:border-blue-600" placeholder="Name" required />
            </div>

            <div class="mb-5">
                <label for="email" class="text-sm text-gray-600 block mb-2">Email address</label>
                <input type="email" name="email" id="email" value="{{ $user['email'] }}" class="block w-full py-2.5 px-4 border rounded-md text-sm text-gray-900 bg-transparent focus:outline-none focus:ring-0 focus:border-blue-600" placeholder="Email address" required />
            </div>

            <div class="mb-5">
                <label for="role" class="text-sm text-gray-600 block mb-2">Role</label>
                <select id="role" name="role" class="block py-2.5 px-4 border rounded-md text-sm text-gray-900 bg-transparent focus:outline-none focus:ring-0 focus:border-blue-600">
                    <option value="admin" {{ $user['role'] == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="ps" {{ $user['role'] == 'ps' ? 'selected' : '' }}>Pembimbing Siswa</option>
                </select>
            </div>

            <div class="mb-5">
                <label for="password" class="text-sm text-gray-600 block mb-2">Password</label>
                <input type="password" name="password" id="password" class="block w-full py-2.5 px-4 border rounded-md text-sm text-gray-900 bg-transparent focus:outline-none focus:ring-0 focus:border-blue-600" placeholder="Password" required />
            </div>

            <button type="submit" class="text-white mt-3 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Submit
            </button>
        </form>
    </div>
@endsection
