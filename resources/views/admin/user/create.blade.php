@extends('layouts.template')

@section('content')
    <div class="p-10 mt-10 sm:ml-64">
        <h1 class="text-2xl mb-1 font-bold">Create Data User</h1>
        <h3 class="mb-2"><a href="{{ route('dashboard') }}">Dashboard</a> / <a href="{{ route('admin.user.index') }}">Data User</a> / <span class="font-semibold">Create User</span></h3>

        <form class="max-w-md mx-auto mt-10 bg-white shadow-lg p-8 rounded-lg">
            <h1 class="text-center text-2xl mb-5 font-semibold">Form Add Data User</h1>
            @csrf

            <div class="mb-5">
                <label for="name" class="text-sm text-gray-600">Name</label>
                <input type="text" name="name" id="name" class="block w-full px-4 py-2.5 border rounded-md
                    focus:outline-none focus:ring focus:border-blue-500" placeholder="John Doe" required />
            </div>

            <div class="mb-5">
                <label for="email" class="text-sm text-gray-600">Email Address</label>
                <input type="email" name="email" id="email" class="block w-full px-4 py-2.5 border rounded-md
                    focus:outline-none focus:ring focus:border-blue-500" placeholder="john@example.com" required />
            </div>

            <div class="mb-5">
                <label for="role" class="text-sm text-gray-600">Role</label>
                <select id="role" name="role" class="block w-full px-4 py-2.5 border rounded-md
                    focus:outline-none focus:ring focus:border-blue-500">
                    <option selected disabled>Choose Role</option>
                    <option value="admin">Admin</option>
                    <option value="ps">Pembimbing Siswa</option>
                </select>
            </div>

            <button type="submit" class="bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300
                text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                Submit
            </button>
        </form>
    </div>
@endsection
