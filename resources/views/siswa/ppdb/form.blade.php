@extends('layouts.siswa')

@section('title', 'Formulir Pendaftaran PPDB')

@section('content')
@include('components.alert')
<div class="bg-white p-6 rounded-lg shadow-md max-w-4xl mx-auto">
    <h2 class="text-3xl font-bold mb-6 text-center">Formulir Pendaftaran PPDB</h2>

    <!-- Informasi User -->
    <div class="mb-6">
        <label class="block text-sm font-medium text-gray-600">Nama Pengguna</label>
        <input type="text" value="{{ auth()->user()->name }}" class="form-input w-full bg-gray-100 text-gray-700" readonly>
    </div>

    <form action="{{ route('siswa.ppdb.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Tahun Ajaran -->
            <div>
                <label class="block text-sm font-medium">Tahun Ajaran</label>
                <input type="text" name="tahun_ajaran" class="form-input w-full" required>
                @error('tahun_ajaran') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <!-- Jalur -->
            <div>
                <label for="jalur" class="block font-semibold mb-2">Jalur Pendaftaran</label>
                <select name="jalur" id="jalur" required class="form-select w-full" onchange="handleJalurChange(this.value)">
                    <option value="">-- Pilih Jalur --</option>
                    <option value="zonasi">Zonasi</option>
                    <option value="prestasi">Prestasi</option>
                    <option value="afirmasi">Afirmasi</option>
                    <option value="perpindahan">Perpindahan Orang Tua</option>
                </select>
                @error('jalur') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>
        </div>

        <h3 class="mt-6 text-lg font-semibold">Unggah Dokumen</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2">
            <!-- Dokumen Umum -->
            <div>
                <label class="block text-sm font-medium">Kartu Keluarga</label>
                <input type="file" name="kartu_keluarga" class="form-input w-full" required>
            </div>
            <div>
                <label class="block text-sm font-medium">Akta Kelahiran</label>
                <input type="file" name="akta_kelahiran" class="form-input w-full" required>
            </div>
            <div>
                <label class="block text-sm font-medium">Rapor (Opsional)</label>
                <input type="file" name="rapor" class="form-input w-full">
            </div>
            <div>
                <label class="block text-sm font-medium">Sertifikat (Opsional)</label>
                <input type="file" name="sertifikat" class="form-input w-full">
            </div>

            <!-- Dokumen Khusus Afirmasi -->
            <div id="dokumen-afirmasi" class="hidden col-span-2">
                <h4 class="text-md font-semibold mt-4">Dokumen Khusus Jalur Afirmasi</h4>
                <div class="mt-2">
                    <label class="block text-sm font-medium">Bukti KIP/PKH</label>
                    <input type="file" name="bukti_kip_pkh" class="form-input w-full">
                </div>
                <div class="mt-2">
                    <label class="block text-sm font-medium">Surat Disabilitas (jika ada)</label>
                    <input type="file" name="surat_disabilitas" class="form-input w-full">
                </div>
            </div>

            <!-- Dokumen Khusus Perpindahan -->
            <div id="dokumen-perpindahan" class="hidden col-span-2">
                <h4 class="text-md font-semibold mt-4">Dokumen Khusus Jalur Perpindahan Orang Tua</h4>
                <div class="mt-2">
                    <label class="block text-sm font-medium">Surat Penugasan Orang Tua</label>
                    <input type="file" name="surat_penugasan" class="form-input w-full">
                </div>
                <div class="mt-2">
                    <label class="block text-sm font-medium">Surat Pindah</label>
                    <input type="file" name="surat_pindah" class="form-input w-full">
                </div>
            </div>
        </div>

        <button type="submit" class="mt-6 bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Kirim Pendaftaran</button>
    </form>
</div>

<script>
    function handleJalurChange(value) {
        document.getElementById('dokumen-afirmasi').classList.add('hidden');
        document.getElementById('dokumen-perpindahan').classList.add('hidden');

        if (value === 'afirmasi') {
            document.getElementById('dokumen-afirmasi').classList.remove('hidden');
        } else if (value === 'perpindahan') {
            document.getElementById('dokumen-perpindahan').classList.remove('hidden');
        }
    }
</script>
@endsection
