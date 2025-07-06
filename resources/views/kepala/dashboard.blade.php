@extends('layouts.kepala')

@section('title', 'Dashboard Kepala Sekolah')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4 text-gray-700">Dashboard Ringkasan PPDB</h2>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="p-4 bg-blue-500 text-white rounded-lg shadow text-center">
            <p class="text-lg font-semibold">Total Pendaftar</p>
            <p class="text-3xl">{{ $totalPendaftar }}</p>
        </div>
        <div class="p-4 bg-green-500 text-white rounded-lg shadow text-center">
            <p class="text-lg font-semibold">Diterima</p>
            <p class="text-3xl">{{ $totalDiterima }}</p>
        </div>
        <div class="p-4 bg-yellow-500 text-white rounded-lg shadow text-center">
            <p class="text-lg font-semibold">Cadangan</p>
            <p class="text-3xl">{{ $totalCadangan }}</p>
        </div>
        <div class="p-4 bg-red-500 text-white rounded-lg shadow text-center">
            <p class="text-lg font-semibold">Ditolak</p>
            <p class="text-3xl">{{ $totalDitolak }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @foreach ($rekapJalur as $jalur => $jumlah)
            <div class="p-4 bg-gray-100 rounded-lg shadow text-center">
                <p class="font-semibold capitalize">{{ $jalur }}</p>
                <p class="text-2xl">{{ $jumlah }}</p>
            </div>
        @endforeach
    </div>

    <div class="mt-6">
        <h3 class="text-lg font-semibold mb-2">Grafik Ringkasan (Opsional)</h3>
        <!-- Bisa gunakan chart library seperti Chart.js, jika mau -->
        <div class="bg-gray-50 p-4 rounded shadow text-center text-gray-500">
            Grafik akan ditampilkan di sini (opsional, integrasi Chart.js / lainnya)
        </div>
    </div>
</div>
@endsection
