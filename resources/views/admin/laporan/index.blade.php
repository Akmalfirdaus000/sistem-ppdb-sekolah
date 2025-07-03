@extends('layouts.admin')

@section('title', 'Laporan PPDB')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Laporan PPDB</h2>
      <div class="mb-6">

    </div>

    <!-- Rekapitulasi Pendaftaran -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="p-4 bg-blue-500 text-white rounded-lg shadow">
            <p class="text-lg font-bold">Total Pendaftar</p>
            <p class="text-2xl">{{ $totalPendaftar }}</p>
        </div>
        <div class="p-4 bg-green-500 text-white rounded-lg shadow">
            <p class="text-lg font-bold">Diterima</p>
            <p class="text-2xl">{{ $totalDiterima }}</p>
        </div>
        <div class="p-4 bg-yellow-500 text-white rounded-lg shadow">
            <p class="text-lg font-bold">Cadangan</p>
            <p class="text-2xl">{{ $totalCadangan }}</p>
        </div>
        <div class="p-4 bg-red-500 text-white rounded-lg shadow">
            <p class="text-lg font-bold">Ditolak</p>
            <p class="text-2xl">{{ $totalDitolak }}</p>
        </div>
    </div>

    <!-- Filter Data -->
    <form method="GET" action="{{ route('admin.laporan.index') }}" class="mb-4 flex gap-4">
        <input type="text" name="search" placeholder="Cari Nama Siswa..." value="{{ request('search') }}"
            class="p-2 border rounded w-full">
        <select name="status" class="p-2 border rounded">
            <option value="">Semua Status</option>
            <option value="accepted" {{ request('status') == 'accepted' ? 'selected' : '' }}>Diterima</option>
            <option value="cadangan" {{ request('status') == 'cadangan' ? 'selected' : '' }}>Cadangan</option>
            <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Ditolak</option>
            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Menunggu</option>
        </select>
        <input type="date" name="tanggal" value="{{ request('tanggal') }}" class="p-2 border rounded">
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Filter</button>
    </form>

    <!-- Tabel Data Siswa -->
    <table class="w-full border-collapse border border-gray-300 mb-6">
        <thead>
            <tr class="bg-gray-800 text-white text-center">
                <th class="border border-gray-300 px-4 py-2">No</th>
                <th class="border border-gray-300 px-4 py-2">Nama Siswa</th>
                <th class="border border-gray-300 px-4 py-2">Tanggal Pendaftaran</th>
                <th class="border border-gray-300 px-4 py-2">Status</th>
                <th class="border border-gray-300 px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pendaftars as $index => $pendaftar)
                @php
                    $badgeColor = match($pendaftar->status) {
                        'accepted' => 'bg-green-500',
                        'cadangan' => 'bg-yellow-500',
                        'rejected' => 'bg-red-500',
                        default => 'bg-gray-500'
                    };

                    $statusText = match($pendaftar->status) {
                        'accepted' => 'Diterima',
                        'cadangan' => 'Cadangan',
                        'rejected' => 'Ditolak',
                        default => 'Menunggu'
                    };
                @endphp
                <tr class="hover:bg-gray-100 text-center">
                    <td class="border border-gray-300 px-4 py-2">{{ $index + 1 }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $pendaftar->user->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $pendaftar->created_at->format('d-m-Y') }}</td>
                    <td class="border border-gray-300 px-4 py-2 font-semibold">
                        <span class="px-2 py-1 rounded text-white {{ $badgeColor }}">
                            {{ $statusText }}
                        </span>
                    </td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="{{ route('admin.ppdb.show', $pendaftar->id) }}"
                            class="px-3 py-1 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                            Lihat
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="bg-red-600 text-white px-4 py-3 rounded-t-md flex justify-between items-center">
            <h2 class="text-xl font-semibold">Preview Laporan PPDB</h2>
            <button onclick="window.print()" class="bg-blue-700 text-white px-4 py-2 rounded-lg hover:bg-blue-800">
                Cetak
            </button>
        </div>

        <div class="bg-gray-100 p-6 mt-4 rounded-md shadow-lg">
            <div class="text-center mb-4">
                <img src="/th.jpeg" alt="Logo" class="mx-auto h-20 pb-2">
                <h3 class="text-xl font-bold">KEMENTERIAN AGAMA REPUBLIK INDONESIA</h3>
                <h4 class="font-semibold">KANTOR KEMENTERIAN AGAMA KAB. WONOGIRI</h4>
                <p class=" font-light py-5">Panitia PPDB MTsN 1 Wonogiri Tahun Pelajaran 2025/2026</p>
                <hr class="my-2 border-gray-400">
            </div>

            <h3 class="text-center text-lg font-bold mb-4">LAPORAN PENERIMAAN PESERTA DIDIK BARU <br> MTS NEGERI 1 <br> TAHUN PELAJARAN 2025/2026</h3>

            <p class="text-center text-sm mb-4">
                Data Siswa Baru Tahun Pelajaran <strong>2025 / 2026</strong> pada madrasah <strong>MTS NEGERI 1</strong>
            </p>

            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-800 text-white text-center">
                        <th class="border border-gray-300 px-4 py-2">No</th>
                        <th class="border border-gray-300 px-4 py-2">NISN</th>
                        <th class="border border-gray-300 px-4 py-2">Nama Pendaftar</th>
                        <th class="border border-gray-300 px-4 py-2">Jalur Pendaftar</th>
                        <th class="border border-gray-300 px-4 py-2">JK</th>
                        <th class="border border-gray-300 px-4 py-2">Asal Sekolah</th>
                        <th class="border border-gray-300 px-4 py-2">Status Penerimaan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pendaftars as $index => $pendaftar)
                        @php
                            $badgeColor = match($pendaftar->status) {
                                'accepted' => 'bg-green-500',
                                'cadangan' => 'bg-yellow-500',
                                'rejected' => 'bg-red-500',
                                default => 'bg-gray-500'
                            };

                            $statusText = match($pendaftar->status) {
                                'accepted' => 'Diterima',
                                'cadangan' => 'Cadangan',
                                'rejected' => 'Ditolak',
                                default => 'Menunggu'
                            };
                        @endphp
                       <tr class="hover:bg-gray-100 text-center">
    <td class="border border-gray-300 px-4 py-2">{{ $index + 1 }}</td>
    <td class="border border-gray-300 px-4 py-2">{{ $pendaftar->siswa->nisn ?? '-' }}</td>
    <td class="border border-gray-300 px-4 py-2">{{ $pendaftar->user->name ?? '-' }}</td>
    <td class="border border-gray-300 px-4 py-2">{{ ucfirst($pendaftar->jalur ?? '-') }}</td>
    <td class="border border-gray-300 px-4 py-2">{{ $pendaftar->siswa->jenis_kelamin ?? '-' }}</td>
    <td class="border border-gray-300 px-4 py-2">{{ $pendaftar->siswa->asal_sekolah ?? '-' }}</td>
    <td class="border border-gray-300 px-4 py-2 font-semibold">
        @php
            switch ($pendaftar->status) {
                case 'accepted':
                    $statusText = 'Diterima';
                    $badgeColor = 'bg-green-500';
                    break;
                case 'cadangan':
                    $statusText = 'Cadangan';
                    $badgeColor = 'bg-yellow-500';
                    break;
                case 'rejected':
                    $statusText = 'Ditolak';
                    $badgeColor = 'bg-red-500';
                    break;
                case 'pending':
                default:
                    $statusText = 'Menunggu';
                    $badgeColor = 'bg-gray-500';
                    break;
            }
        @endphp
        <span class="px-2 py-1 rounded text-white {{ $badgeColor }}">
            {{ $statusText }}
        </span>
    </td>
</tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
