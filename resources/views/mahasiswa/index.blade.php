@extends('layout.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold">Data Mahasiswa</h2>
    <a href="{{ route('mahasiswa.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">+ Tambah</a>
</div>

<table class="w-full border-collapse border border-gray-300">
    <thead class="bg-gray-200">
        <tr>
            <th class="border p-2">M#</th>
            <th class="border p-2">Nama</th>
            <th class="border p-2">Jurusan</th>
            <th class="border p-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($mahasiswa as $m)
        <tr class="text-center">
            <td class="border p-2">{{ $m->m_id }}</td>
            <td class="border p-2">{{ $m->nama_mahasiswa }}</td>
            <td class="border p-2">{{ $m->jurusan }}</td>
            <td class="border p-2">
                <a href="{{ route('mahasiswa.edit', $m->m_id) }}" class="text-blue-600 font-bold">Edit</a> |
                <form action="{{ route('mahasiswa.destroy', $m->m_id) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="text-red-600 font-bold" onclick="return confirm('Hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection