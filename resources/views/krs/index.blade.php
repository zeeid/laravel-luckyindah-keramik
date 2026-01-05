@extends('layout.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold">Data KRS Mahasiswa</h2>
    <a href="{{ route('krs.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">+ Ambil KRS</a>
</div>

<table class="w-full border-collapse border border-gray-300">
    <thead class="bg-orange-100">
        <tr>
            <th class="border p-2">Mahasiswa</th>
            <th class="border p-2">Mata Kuliah</th>
            <th class="border p-2">SKS</th>
            <th class="border p-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($krs as $item)
        <tr class="text-center">
            <td class="border p-2 text-left">{{ $item->mahasiswa->nama_mahasiswa }} ({{ $item->m_id }})</td>
            <td class="border p-2 text-left">{{ $item->mataKuliah->nama_mata_kuliah }}</td>
            <td class="border p-2">{{ $item->sks }}</td>
            <td class="border p-2">
                <a href="{{ route('krs.edit', ['m_id' => $item->m_id, 'kode_mk' => $item->kode_mata_kuliah]) }}" class="text-blue-600 font-bold">Edit SKS</a> |
                
                <form action="{{ route('krs.destroy', ['m_id' => $item->m_id, 'kode_mk' => $item->kode_mata_kuliah]) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="text-red-600 font-bold" onclick="return confirm('Hapus KRS ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection