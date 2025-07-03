@extends('layouts.admin')

@section('title', 'Manajemen Pengguna')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold text-gray-800">Daftar Pengguna</h2>
       <a href="{{ route('admin.pengguna.add') }}" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
    + Tambah Pengguna
</a>

    </div>

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-red-500 text-white">
                <th class="border border-gray-300 px-4 py-2">#</th>
                <th class="border border-gray-300 px-4 py-2">Nama</th>
                <th class="border border-gray-300 px-4 py-2">Email</th>
                <th class="border border-gray-300 px-4 py-2">Role</th>
                <th class="border border-gray-300 px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $index => $user)
            <tr class="hover:bg-red-100">
                <td class="border border-gray-300 px-4 py-2">{{ $users->firstItem() + $loop->index }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $user->name }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $user->email }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ ucfirst($user->role) }}</td>
                <td class="border border-gray-300 px-4 py-2 flex gap-2">
                    <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600" onclick="openEditModal({{ $user }})">✏️ Edit</button>
                    <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700" onclick="confirmDelete({{ $user->id }})">🗑️ Hapus</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Tambahkan Pagination -->
    <div class="mt-4">
        {{ $users->links() }}
    </div>
</div>

<!-- Modal Tambah/Edit Pengguna -->
<div id="userModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex justify-center items-center">
    <div class="bg-white p-6 rounded-lg shadow-md w-1/3">
        <h3 id="modalTitle" class="text-xl font-semibold mb-4">Tambah Pengguna</h3>
        <form id="userForm" method="POST">
            @csrf
            <input type="hidden" id="userId" name="id">
            <input type="hidden" name="_method" id="methodInput">

            <div class="mb-3">
                <label class="block font-medium">Nama:</label>
                <input type="text" id="userName" name="name" class="w-full border px-3 py-2 rounded" required>
            </div>
            <div class="mb-3">
                <label class="block font-medium">Email:</label>
                <input type="email" id="userEmail" name="email" class="w-full border px-3 py-2 rounded" required>
            </div>
            <div class="mb-3">
                <label class="block font-medium">Role:</label>
                <select id="userRole" name="role" class="w-full border px-3 py-2 rounded">
                    <option value="admin">Admin</option>
                    <option value="siswa">Siswa</option>
                </select>
            </div>
            <div class="flex justify-end gap-2">
                <button type="button" class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500" onclick="closeModal()">Batal</button>
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openAddModal() {
        document.getElementById('modalTitle').innerText = 'Tambah Pengguna';
        document.getElementById('userForm').setAttribute('action', '{{ route("admin.pengguna.store") }}');
        document.getElementById('methodInput').value = ""; // Hapus method input jika ada
        document.getElementById('userForm').reset();
        document.getElementById('userModal').classList.remove('hidden');
    }

    function openEditModal(user) {
        document.getElementById('modalTitle').innerText = 'Edit Pengguna';
        document.getElementById('userForm').setAttribute('action', '{{ route("admin.pengguna.update", "") }}/' + user.id);
        document.getElementById('methodInput').value = "PUT"; // Set method PUT
        document.getElementById('userId').value = user.id;
        document.getElementById('userName').value = user.name;
        document.getElementById('userEmail').value = user.email;
        document.getElementById('userRole').value = user.role;
        document.getElementById('userModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('userModal').classList.add('hidden');
    }

    function confirmDelete(userId) {
        if (confirm("Apakah Anda yakin ingin menghapus pengguna ini?")) {
            document.getElementById('deleteForm' + userId).submit();
        }
    }
</script>

@foreach ($users as $user)
<form id="deleteForm{{ $user->id }}" action="{{ route('admin.pengguna.destroy', $user->id) }}" method="POST" class="hidden">
    @csrf
    @method('DELETE')
</form>
@endforeach

@endsection
