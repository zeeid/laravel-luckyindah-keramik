@extends('layout.app')

@section('content')
<div class="max-w-lg mx-auto bg-white p-8 shadow rounded-lg">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">
        {{ isset($mahasiswa) ? 'Edit' : 'Tambah' }} Data Mahasiswa
    </h2>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ isset($mahasiswa) ? route('mahasiswa.update', $mahasiswa->m_id) : route('mahasiswa.store') }}" method="POST">
        @csrf
        @isset($mahasiswa)
            @method('PUT')
        @endisset

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Kode Mahasiswa (M#)</label>
            <input type="text" name="m_id" 
                   value="{{ old('m_id', $mahasiswa->m_id ?? '') }}" 
                   class="w-full border p-2 rounded {{ isset($mahasiswa) ? 'bg-gray-200 cursor-not-allowed' : '' }}"
                   {{ isset($mahasiswa) ? 'readonly' : 'required' }}
                   placeholder="M1, M2...">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">NIM</label>
            <input type="text" name="nim" 
                   value="{{ old('nim', $mahasiswa->nim ?? '') }}" 
                   class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Nama Mahasiswa</label>
            <input type="text" name="nama_mahasiswa" 
                   value="{{ old('nama_mahasiswa', $mahasiswa->nama_mahasiswa ?? '') }}" 
                   class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Jenis Kelamin</label>
            <select name="kode_jenis_kelamin" class="w-full border p-2 rounded">
                <option value="">-- Pilih Jenis Kelamin --</option>
                @foreach($jenisKelamin as $jk)
                    <option value="{{ $jk->kode_jns_klamin }}" 
                        {{ (old('kode_jenis_kelamin', $mahasiswa->kode_jenis_kelamin ?? '') == $jk->kode_jns_klamin) ? 'selected' : '' }}>
                        {{ $jk->description }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Jurusan</label>
            <select name="jurusan" class="w-full border p-2 rounded">
                <option value="TI" {{ (old('jurusan', $mahasiswa->jurusan ?? '') == 'TI') ? 'selected' : '' }}>Teknik Informatika (TI)</option>
                <option value="AK" {{ (old('jurusan', $mahasiswa->jurusan ?? '') == 'AK') ? 'selected' : '' }}>Akuntansi (AK)</option>
            </select>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">IPK</label>
            <input type="number" step="0.01" max="4.00" name="ipk" 
                   value="{{ old('ipk', $mahasiswa->ipk ?? '') }}" 
                   class="w-full border p-2 rounded" required>
        </div>

        <div class="flex gap-2 justify-end">
            <a href="{{ route('mahasiswa.index') }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded hover:bg-gray-600">Batal</a>
            <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Simpan</button>
        </div>
    </form>
</div>
@endsection