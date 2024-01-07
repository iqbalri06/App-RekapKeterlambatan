@extends('layouts.template')

@section('content')
    <div class="p-10 mt-10 sm:ml-64">
    <h1 class="text-2xl mb-1 font-bold">Detail Data Keterlambatan</h1>
    <h3 class="mb-2"><a href="{{ route('dashboard') }}">Dashboard</a> / <a href="{{ route('admin.data-telat.index') }}">Data Keterlambatan</a> / <span class="font-semibold">Detail Data</span></h3>

    @php
        $no = 1;
    @endphp

    @foreach ($lates as $late)
    <div class="bg-white rounded-lg overflow-hidden shadow-lg mb-4">
        <div class="p-6">
            <h1 class="font-semibold">Keterlambatan ke {{ $no }}</h1>
            <h3 class="text-xl mb-2">
                {{ $late->student->name }} |
                {{ $late->student->nis }} |
                {{ $late->student->rombel->rombel }} |
                {{ $late->student->rayon->rayon }} 
            </h3>

            <p class="mb-2"><strong>Tanggal:</strong> {{ $late->date_time_late }}</p>
            <p class="mb-2"><strong>Informasi:</strong> {{ $late->information }}</p>
            
            <div class="mt-4">
                <img src="{{ asset('storage/images/' . $late->bukti) }}" alt="" class="" width="150">
            </div>
            <!-- Add any other details you want to display for each record -->
        </div>
    </div>
    @php
        $no++
    @endphp
@endforeach
</div>
@endsection

