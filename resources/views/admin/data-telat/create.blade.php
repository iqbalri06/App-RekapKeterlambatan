@extends('layouts.template')

@section('content')
<div class="p-10 mt-10 sm:ml-64">
    <h1 class="text-2xl mb-1 font-bold">Add Data Keterlambatan</h1>
    <h3 class="mb-2"><a href="{{ route('dashboard') }}">Dashboard</a> / <a href="{{ route('admin.data-telat.index') }}">Data Keterlambatan</a> / <span class="font-semibold">Tambah Data Keterlambatan</span></h3>
    <form class="max-w-md mx-auto mt-10 bg-white shadow-lg p-8 rounded-lg" method="post" action="{{ route('admin.data-telat.store') }}" enctype="multipart/form-data">
        @csrf
        <h1 class="text-center text-2xl mb-5 font-semibold">Form Input Data Keterlambatan</h1>

        <div class="mb-5">
            <label for="student" class="text-sm text-gray-600">Choose Student</label>
            <select id="student" name="student_id" class="block w-full px-4 py-2.5 border rounded-md
                focus:outline-none focus:ring focus:border-blue-500">
                <option selected disabled>Choose Student</option>
                @foreach ($students as $student)
                    <option value="{{ $student['id'] }}">{{ $student['name'] }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-5">
            <label for="date_time_late" class="text-sm text-gray-600">Tanggal</label>
            <input type="datetime-local" name="date_time_late" id="date_time_late" class="block w-full px-4 py-2.5 border rounded-md
                focus:outline-none focus:ring focus:border-blue-500" required value="{{ $today }}"/>
        </div>

        <div class="mb-5">
            <label for="information" class="text-sm text-gray-600">Keterangan Keterlambatan</label>
            <input type="textarea" name="information" id="information" class="block w-full px-4 py-2.5 border rounded-md
                focus:outline-none focus:ring focus:border-blue-500" placeholder=" " required />
        </div>

        <div class="mb-5">
            <label for="bukti" class="text-sm text-gray-600">Bukti Keterlambatan</label>
            <input type="file" name="bukti" id="bukti" class="block w-full px-4 py-2.5 border rounded-md
                focus:outline-none focus:ring focus:border-blue-500" required />
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300
            text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
            Submit
        </button>
    </form>
</div>
@endsection
