@extends('layouts.admin')

@section('title', 'Dashboard Admin')
@section('header', 'Dashboard Admin')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-blue-600 text-white p-6 rounded-lg shadow-md">
        <h3 class="text-lg font-bold">Total Pendaftar</h3>
        <p class="text-3xl mt-2">{{ \App\Models\PPDBPendaftaran::count() }}</p>
    </div>
    <div class="bg-green-600 text-white p-6 rounded-lg shadow-md">
        <h3 class="text-lg font-bold">Diterima</h3>
        <p class="text-3xl mt-2">{{ \App\Models\PPDBPendaftaran::where('status', 'accepted')->count() }}</p>
    </div>
    <div class="bg-yellow-500 text-white p-6 rounded-lg shadow-md">
        <h3 class="text-lg font-bold">Cadangan</h3>
        <p class="text-3xl mt-2">{{ \App\Models\PPDBPendaftaran::where('status', 'cadangan')->count() }}</p>
    </div>
    <div class="bg-red-600 text-white p-6 rounded-lg shadow-md">
        <h3 class="text-lg font-bold">Ditolak</h3>
        <p class="text-3xl mt-2">{{ \App\Models\PPDBPendaftaran::where('status', 'rejected')->count() }}</p>
    </div>
</div>

{{-- Aktivitas Terakhir --}}
<div class="bg-white p-6 rounded-lg shadow-md mb-8">
    <h2 class="text-xl font-bold mb-4">Aktivitas Terakhir</h2>
    <ul class="divide-y divide-gray-200 text-gray-700">
        @foreach(\App\Models\PPDBPendaftaran::latest()->take(5)->get() as $item)
            <li class="py-2">
                <strong>{{ $item->user->name ?? '-' }}</strong> mendaftar pada
                <span class="text-sm text-gray-500">{{ $item->created_at->format('d M Y H:i') }}</span>
                <span class="ml-2 px-2 py-1 rounded text-white text-xs
                    @switch($item->status)
                        @case('accepted') bg-green-600 @break
                        @case('cadangan') bg-yellow-500 @break
                        @case('rejected') bg-red-600 @break
                        @default bg-gray-400
                    @endswitch">
                    {{ ucfirst($item->status ?? 'Pending') }}
                </span>
            </li>
        @endforeach
    </ul>
</div>

{{-- Statistik Jalur Pendaftaran --}}
@php
    $jalurList = \App\Models\PPDBPendaftaran::select('jalur', \DB::raw('count(*) as total'))
        ->groupBy('jalur')
        ->get();
@endphp

<div class="bg-white p-6 rounded-lg shadow-md mb-8">
    <h2 class="text-xl font-bold mb-4">Statistik Jalur Pendaftaran</h2>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        @forelse ($jalurList as $jalur)
            <div class="bg-gray-100 p-4 rounded-lg shadow">
                <h4 class="text-md font-semibold capitalize">{{ $jalur->jalur }}</h4>
                <p class="text-2xl">{{ $jalur->total }}</p>
            </div>
        @empty
            <p class="text-sm text-gray-500 col-span-3">Belum ada data jalur pendaftaran.</p>
        @endforelse
    </div>
</div>

{{-- Informasi Sistem --}}
@php
    use Carbon\Carbon;
    $minDate = \App\Models\PPDBPendaftaran::min('created_at');
    $lastUser = \App\Models\PPDBPendaftaran::latest()->first();
@endphp

<div class="bg-white p-6 rounded-lg shadow-md mb-8">
    <h2 class="text-xl font-bold mb-4">Informasi Sistem</h2>
    <ul class="list-disc list-inside text-gray-700">
        <li>Sistem pendaftaran dibuka sejak
            <strong>{{ $minDate ? Carbon::parse($minDate)->format('d M Y') : '-' }}</strong>
        </li>
        <li>Terakhir pendaftar:
            <strong>{{ $lastUser?->user->name ?? '-' }}</strong>
        </li>
        <li>Total akun pengguna:
            <strong>{{ \App\Models\User::count() }}</strong>
        </li>
    </ul>
</div>

{{-- Akses Cepat --}}
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-xl font-bold mb-4">Akses Cepat</h2>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <a href="{{ route('admin.ppdb.index') }}" class="block bg-blue-500 text-white text-center py-4 rounded hover:bg-blue-600">📄 Data Pendaftar</a>
        <a href="{{ route('admin.dokumen.index') }}" class="block bg-green-500 text-white text-center py-4 rounded hover:bg-green-600">📁 Cek Dokumen</a>
        <a href="{{ route('admin.laporan.index') }}" class="block bg-yellow-500 text-white text-center py-4 rounded hover:bg-yellow-600">📊 Laporan</a>
    </div>
</div>
@endsection
