@extends('layouts.admin')

@section('title', 'Siswa Diterima')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Daftar Siswa yang Diterima</h2>

    <!-- Form Pencarian -->
    <div class="mb-4">
        <form method="GET" action="{{ route('admin.diterima.index') }}" class="flex gap-2 items-center">
            <input type="text" name="search" placeholder="Cari nama siswa..."
                class="border px-4 py-2 rounded-lg w-1/3" value="{{ request('search') }}">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                🔍 Cari
            </button>
        </form>
    </div>

    <!-- Tabel Siswa -->
    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-green-600 text-white text-center">
                <th class="border border-gray-300 px-4 py-2">No</th>
                <th class="border border-gray-300 px-4 py-2">Nama Lengkap</th>
                <th class="border border-gray-300 px-4 py-2">Email</th>
                <th class="border border-gray-300 px-4 py-2">Jalur</th>
                <th class="border border-gray-300 px-4 py-2">Tanggal Pendaftaran</th>
                <th class="border border-gray-300 px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pendaftars as $index => $ppdb)
                <tr class="hover:bg-green-50 text-center">
                    <td class="border border-gray-300 px-4 py-2">{{ $pendaftars->firstItem() + $index }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $ppdb->user->name ?? '-' }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $ppdb->user->email ?? '-' }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ ucfirst($ppdb->jalur) ?? '-' }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $ppdb->created_at->format('d-m-Y') }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="{{ route('admin.ppdb.show', $ppdb->id) }}"
                            class="px-3 py-1 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                            📄 Lihat Detail
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center border border-gray-300 px-4 py-4 text-gray-500">
                        Belum ada siswa yang diterima.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $pendaftars->links() }}
    </div>
</div>
@endsection
