@extends('layout.app')

@section('content')
    <div class="max-w-lg mx-auto bg-white p-8 shadow rounded-lg">
        
        <h2 class="text-2xl font-bold mb-6 text-gray-800">
            {{ isset($matakuliah) ? 'Edit' : 'Tambah' }} Mata Kuliah
        </h2>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                <strong class="font-bold">Terjadi Kesalahan!</strong>
                <ul class="mt-1 list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ isset($matakuliah) ? route('matakuliah.update', $matakuliah->kode_mata_kuliah) : route('matakuliah.store') }}" method="POST">
            @csrf
            
            @isset($matakuliah)
                @method('PUT')
            @endisset
            
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Kode Mata Kuliah</label>
                <input type="text" 
                       name="kode_mata_kuliah" 
                       value="{{ old('kode_mata_kuliah', $matakuliah->kode_mata_kuliah ?? '') }}" 
                       class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 {{ isset($matakuliah) ? 'bg-gray-200 cursor-not-allowed' : '' }}"
                       {{ isset($matakuliah) ? 'readonly' : 'required' }}
                       placeholder="Contoh: W1, W2">
                @isset($matakuliah)
                    <p class="text-xs text-gray-500 mt-1">*Kode MK tidak dapat diubah</p>
                @endisset
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Nama Mata Kuliah</label>
                <input type="text" 
                       name="nama_mata_kuliah" 
                       value="{{ old('nama_mata_kuliah', $matakuliah->nama_mata_kuliah ?? '') }}" 
                       class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" 
                       required
                       placeholder="Contoh: Sistem Basis Data">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Dosen Pengampu</label>
                <input type="text" 
                       name="dosen" 
                       value="{{ old('dosen', $matakuliah->dosen ?? '') }}" 
                       class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" 
                       required
                       placeholder="Contoh: Bpk. Trihono">
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-bold mb-2">Jurusan</label>
                <select name="jurusan" class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="TI" {{ (old('jurusan', $matakuliah->jurusan ?? '') == 'TI') ? 'selected' : '' }}>Teknik Informatika (TI)</option>
                    <option value="AK" {{ (old('jurusan', $matakuliah->jurusan ?? '') == 'AK') ? 'selected' : '' }}>Akuntansi (AK)</option>
                </select>
            </div>

            <div class="flex gap-2 justify-end">
                <a href="{{ route('matakuliah.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded transition duration-200">
                    Batal
                </a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-200">
                    {{ isset($matakuliah) ? 'Update Data' : 'Simpan Data' }}
                </button>
            </div>
        </form>
    </div>
@endsection