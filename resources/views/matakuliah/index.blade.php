@extends('layout.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Data Mata Kuliah</h2>
        <a href="{{ route('matakuliah.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-200">
            + Tambah Mata Kuliah
        </a>
    </div>

    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="w-full border-collapse border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border-b p-3 text-left font-semibold text-gray-600">Kode MK</th>
                    <th class="border-b p-3 text-left font-semibold text-gray-600">Nama Mata Kuliah</th>
                    <th class="border-b p-3 text-left font-semibold text-gray-600">Dosen</th>
                    <th class="border-b p-3 text-center font-semibold text-gray-600">Jurusan</th>
                    <th class="border-b p-3 text-center font-semibold text-gray-600">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($matakuliah as $mk)
                <tr class="hover:bg-gray-50 transition duration-150">
                    <td class="border-b p-3 font-medium text-gray-800">{{ $mk->kode_mata_kuliah }}</td>
                    <td class="border-b p-3">{{ $mk->nama_mata_kuliah }}</td>
                    <td class="border-b p-3">{{ $mk->dosen }}</td>
                    <td class="border-b p-3 text-center">
                        <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $mk->jurusan == 'TI' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                            {{ $mk->jurusan }}
                        </span>
                    </td>
                    <td class="border-b p-3 text-center">
                        <div class="flex justify-center items-center gap-3">
                            <a href="{{ route('matakuliah.edit', $mk->kode_mata_kuliah) }}" class="text-yellow-600 hover:text-yellow-800 font-bold transition">
                                Edit
                            </a>
                            
                            <span class="text-gray-300">|</span>

                            <form action="{{ route('matakuliah.destroy', $mk->kode_mata_kuliah) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus Mata Kuliah {{ $mk->nama_mata_kuliah }}?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 font-bold transition">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="p-6 text-center text-gray-500 bg-gray-50">
                        Belum ada data mata kuliah. Silakan tambah data baru.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection