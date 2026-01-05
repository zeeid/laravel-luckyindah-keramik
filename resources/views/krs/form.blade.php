@extends('layout.app')

@section('content')
<div class="max-w-lg mx-auto bg-white p-8 shadow rounded-lg">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">
        {{ isset($krs) ? 'Edit SKS' : 'Ambil KRS Baru' }}
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

    <form action="{{ isset($krs) ? route('krs.update', ['m_id' => $krs->m_id, 'kode_mk' => $krs->kode_mata_kuliah]) : route('krs.store') }}" method="POST">
        @csrf
        @isset($krs)
            @method('PUT')
        @endisset

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Nama Mahasiswa</label>
            @if(isset($krs))
                <input type="text" value="{{ $krs->mahasiswa->nama_mahasiswa }} ({{ $krs->m_id }})" class="w-full border p-2 rounded bg-gray-200" disabled>
                @else
                <select name="m_id" class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">-- Pilih Mahasiswa --</option>
                    @foreach($mahasiswa as $m)
                        <option value="{{ $m->m_id }}">{{ $m->nama_mahasiswa }} ({{ $m->m_id }})</option>
                    @endforeach
                </select>
            @endif
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Mata Kuliah</label>
            @if(isset($krs))
                <input type="text" value="{{ $krs->mataKuliah->nama_mata_kuliah }} ({{ $krs->kode_mata_kuliah }})" class="w-full border p-2 rounded bg-gray-200" disabled>
            @else
                <select name="kode_mata_kuliah" class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">-- Pilih Mata Kuliah --</option>
                    @foreach($matakuliah as $mk)
                        <option value="{{ $mk->kode_mata_kuliah }}">{{ $mk->nama_mata_kuliah }} - {{ $mk->dosen }}</option>
                    @endforeach
                </select>
            @endif
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">Jumlah SKS</label>
            <input type="number" name="sks" 
                   value="{{ old('sks', $krs->sks ?? '') }}" 
                   class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" 
                   required min="1">
            <p class="text-xs text-gray-500 mt-1">*SKS disesuaikan dengan beban mata kuliah</p>
        </div>

        <div class="flex gap-2 justify-end">
            <a href="{{ route('krs.index') }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded hover:bg-gray-600">Batal</a>
            <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">
                {{ isset($krs) ? 'Update SKS' : 'Simpan KRS' }}
            </button>
        </div>
    </form>
</div>
@endsection