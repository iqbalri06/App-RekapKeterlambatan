@extends('layouts.template')

@section('content')
    <div class="p-10 mt-10 sm:ml-64">
        <h1 class="text-2xl mb-1 font-bold">Edit Data Keterlambatan</h1>
        <h3 class="mb-2">
            <a href="{{ route('dashboard') }}">Dashboard</a> /
            <a href="{{ route('admin.data-telat.index') }}">Data Keterlambatan</a> /
            <span class="font-semibold">Edit Data Keterlambatan</span>
        </h3>

        <form class="max-w-md mx-auto mt-10 bg-white shadow-lg p-8 rounded-lg" method="post" action="{{ route('admin.data-telat.update', $lates['id']) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <h1 class="text-center text-2xl mb-10 font-semibold">Form Edit Data Keterlambatan</h1>

            <div class="mb-5">
                <label for="student_select" class="text-sm text-gray-600 block mb-2">Choose Student</label>
                <select id="student_select" name="name" class="block w-full py-2.5 px-4 border rounded-md text-sm text-gray-500 bg-transparent focus:outline-none focus:ring-0 focus:border-gray-200">
                    @foreach ($students as $student)
                        <option value="{{ $student['name'] }}" {{ $lates['student']['name'] == $student['name'] ? 'selected' : '' }}>
                            {{ $student['name'] }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="relative z-0 w-full mb-5 group mt-5">
                <label for="date_time_late" class="text-sm text-gray-600 block mb-2">Tanggal</label>
                <input type="datetime-local" name="date_time_late" id="date_time_late" class="block w-full py-2.5 px-4 border rounded-md text-sm text-gray-900 bg-transparent focus:outline-none focus:ring-0 focus:border-blue-600" required value="{{ $lates['date_time_late'] }}" />
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <label for="information" class="text-sm text-gray-600 block mb-2">Keterangan Keterlambatan</label>
                <textarea name="information" id="information" rows="3" class="block w-full py-2.5 px-4 border rounded-md text-sm text-gray-900 bg-transparent focus:outline-none focus:ring-0 focus:border-blue-600" required>{{ $lates['information'] }}</textarea>
            </div>

            <div class="relative z-0 w-full mb-5 group mt-6">
                <label for="bukti" class="text-sm text-gray-600 block mb-2">Bukti Keterlambatan</label>
                <input type="file" name="bukti" id="bukti" class="block w-full py-2.5 px-4 border rounded-md text-sm text-gray-900 bg-transparent focus:outline-none focus:ring-0 focus:border-blue-600" required />
            </div>

            <div class="mt-4">
                <img src="{{ asset('storage/images/' . $lates['bukti']) }}" alt="Bukti Keterlambatan" class="rounded-md" width="150">
            </div>

            <button type="submit" class="text-white mt-3 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Submit
            </button>
        </form>
    </div>
@endsection
