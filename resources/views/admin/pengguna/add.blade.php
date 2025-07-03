@extends('layouts.admin')

@section('title', 'Tambah Pengguna')

@section('content')
    @include('components.alert')

    <div class="container mx-auto px-4">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-2xl mx-auto">
            <h1 class="text-3xl font-bold text-center text-red-600 mb-4">Tambah Pengguna</h1>
            <p class="text-center text-gray-600 mb-6">Silakan isi data untuk menambahkan pengguna baru</p>

            <form action="{{ route('admin.pengguna.store') }}" method="POST">
                @csrf

                <!-- Nama Lengkap -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-semibold text-gray-700">Nama Lengkap</label>
                    <input id="name" name="name" type="text" value="{{ old('name') }}" required
                        placeholder="Masukkan nama lengkap"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-600 transition duration-300">
                    @error('name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-semibold text-gray-700">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required
                        placeholder="Masukkan email"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-600 transition duration-300">
                    @error('email')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Role -->
                <div class="mb-4">
                    <label for="role" class="block text-sm font-semibold text-gray-700">Role Pengguna</label>
                    <select id="role" name="role" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-600 transition duration-300">
                        <option value="admin">Admin</option>
                        <option value="siswa">Siswa</option>
                    </select>
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-semibold text-gray-700">Kata Sandi</label>
                    <input id="password" name="password" type="password" required
                        placeholder="Masukkan kata sandi"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-600 transition duration-300">
                    @error('password')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Konfirmasi Password -->
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-semibold text-gray-700">Konfirmasi Kata Sandi</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required
                        placeholder="Ulangi kata sandi"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-600 transition duration-300">
                </div>

                <!-- Tombol Submit -->
                <button type="submit"
                    class="w-full py-3 bg-red-600 text-white font-bold rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-600 transition duration-300">
                    Tambah Pengguna
                </button>
            </form>
        </div>
    </div>
@endsection
