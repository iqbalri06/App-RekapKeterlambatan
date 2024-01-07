@extends('layouts.template')

@section('content')
    <div class="p-10 mt-10 sm:ml-64">
        <div class="bg-white dark:bg-gray-800 rounded-lg p-6 mb-8">
            <h1 class="text-3xl mb-2 font-bold">Detail Data Keterlambatan </h1>
            <h3 class="mb-4"><a href="{{ route('dashboard') }}" class="text-blue-500">Dashboard</a> / <a href="{{ route('indexSiswa') }}" class="text-blue-500">Data Keterlambatan</a> / <span class="font-semibold">Detail Data</span></h3>
        </div>

        @php
            $no = 1;
        @endphp

        @foreach ($lates as $late)
        <div class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg mb-8">
            <div class="p-6">
                <h1 class="font-semibold text-xl mb-4">Keterlambatan ke {{ $no }}</h1>
                <h3 class="text-2xl mb-2 text-blue-500">
                    {{ $late->student->name }} |
                    {{ $late->student->nis }} |
                    {{ $late->student->rombel->rombel }} |
                    {{ $late->student->rayon->rayon }}
                </h3>

                <p class="mb-2"><strong class="text-gray-700 dark:text-gray-400">Tanggal:</strong> {{ $late->date_time_late }}</p>
                <p class="mb-2"><strong class="text-gray-700 dark:text-gray-400">Informasi:</strong> {{ $late->information }}</p>
                
                <div class="mt-4">
                    <img src="{{ asset('storage/images/' . $late->bukti) }}" alt="Bukti Keterlambatan" class="rounded-lg" width="150">
                </div>
                <!-- Add any other details you want to display for each record -->
            </div>
        </div>
        @php
            $no++;
        @endphp
        @endforeach
    </div>
@endsection
