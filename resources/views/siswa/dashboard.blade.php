@extends('layouts.siswa')

@section('title', 'Dashboard Siswa')
@section('header', 'Dashboard Anda')

@section('content')
{{-- SECTION: Akses Cepat --}}
<div class="bg-white p-6 rounded-lg shadow mb-6">
    <h2 class="text-xl font-semibold mb-4">Akses Cepat</h2>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <a href="{{ route('siswa.ppdb.index') }}" class="block bg-blue-500 text-white text-center py-4 rounded hover:bg-blue-600">📝 Isi Formulir</a>
        <a href="{{ route('siswa.dokumen.index') }}" class="block bg-green-500 text-white text-center py-4 rounded hover:bg-green-600">📁 Upload Dokumen</a>
        <a href="" class="block bg-purple-500 text-white text-center py-4 rounded hover:bg-purple-600">🖨️ Cetak Bukti</a>
    </div>
</div>

{{-- SECTION: Pengumuman --}}
<div class="bg-white p-6 rounded-lg shadow">
    <h2 class="text-xl font-semibold mb-4">Pengumuman</h2>
    <p class="text-gray-700">📢 Hasil seleksi akan diumumkan pada <strong>10 Juli 2025</strong>. Silakan pantau dashboard ini secara berkala.</p>
</div>

@php
    use Carbon\Carbon;

    $pendaftaran = \App\Models\PPDBPendaftaran::where('user_id', auth()->id())->first();
    $dokumen = \App\Models\PPDBDokumen::where('user_id', auth()->id())->first();
@endphp

{{-- SECTION: Status Pendaftaran --}}
<div class="bg-white p-6 rounded-lg shadow mb-6">
    <h2 class="text-xl font-semibold mb-2">Status Pendaftaran Anda</h2>
    @if ($pendaftaran)
        <p class="text-lg">
            Status: 
            <span class="px-3 py-1 rounded text-white text-sm 
                {{ $pendaftaran->status == 'Diterima' ? 'bg-green-600' : 
                   ($pendaftaran->status == 'Cadangan' ? 'bg-yellow-500' : 
                   ($pendaftaran->status == 'Ditolak' ? 'bg-red-600' : 'bg-gray-500')) }}">
                {{ $pendaftaran->status ?? 'Belum Diverifikasi' }}
            </span>
        </p>
        <p class="mt-1 text-gray-600 text-sm">Tanggal Daftar: {{ Carbon::parse($pendaftaran->created_at)->format('d M Y H:i') }}</p>
    @else
        <p class="text-red-600">Anda belum melakukan pendaftaran.</p>
    @endif
</div>

{{-- SECTION: Progress Langkah Pendaftaran --}}
<div class="bg-white p-6 rounded-lg shadow mb-6">
    <h2 class="text-xl font-semibold mb-4">Progress Pendaftaran</h2>
    <ul class="space-y-2 text-gray-700">
        <li>
            <span>✅ Akun Terdaftar</span>
        </li>
        <li>
            <span>{{ $pendaftaran ? '✅' : '❌' }} Formulir Pendaftaran</span>
        </li>
        <li>
            <span>{{ $dokumen ? '✅' : '❌' }} Upload Dokumen</span>
        </li>
        <li>
            <span>{{ $pendaftaran && $pendaftaran->status ? '✅' : '⏳' }} Verifikasi dan Seleksi</span>
        </li>
        <li>
            <span>{{ in_array($pendaftaran->status ?? '', ['Diterima', 'Cadangan']) ? '✅' : '❌' }} Pengumuman</span>
        </li>
    </ul>
</div>

{{-- SECTION: Dokumen Anda --}}
<div class="bg-white p-6 rounded-lg shadow mb-6">
    <h2 class="text-xl font-semibold mb-4">Dokumen Anda</h2>
    @if ($dokumen)
        <ul class="list-disc list-inside text-gray-700">
            <li>Kartu Keluarga: {{ $dokumen->kartu_keluarga ? '✅' : '❌' }}</li>
            <li>Akta Kelahiran: {{ $dokumen->akta_kelahiran ? '✅' : '❌' }}</li>
            <li>Rapor: {{ $dokumen->rapor ? '✅' : '❌' }}</li>
            <li>Sertifikat: {{ $dokumen->sertifikat ? '✅' : '❌' }}</li>
        </ul>
    @else
        <p class="text-red-600">Belum ada dokumen yang diunggah.</p>
    @endif
</div>



@endsection
