<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Lucky Indah Keramik</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">

    <div class="max-w-6xl mx-auto bg-white p-8 shadow rounded-lg">
        <h1 class="text-3xl font-bold mb-6 text-center text-blue-800">Sistem Informasi Akademik</h1>

        <div class="flex gap-4 mb-8">
            <button onclick="window.print()" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">🖨️ Print MVC</button>
            <a href="{{ route('export.excel') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">📊 Export Excel</a>
            <a href="https://wa.me/6281287765396" target="_blank" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">📱 Kirim ke WA</a>
        </div>

        <h2 class="text-xl font-bold mb-4 border-b-2 border-blue-500 inline-block">Laporan Nilai Mahasiswa Per Jurusan</h2>
        <div class="overflow-x-auto mb-10">
            <table class="w-full border-collapse border border-gray-300">
                <thead class="bg-blue-50">
                    <tr>
                        <th class="border p-2">M#</th>
                        <th class="border p-2">NIM</th>
                        <th class="border p-2">Kode JK</th>
                        <th class="border p-2">Nama Mahasiswa</th>
                        <th class="border p-2">Jurusan</th>
                        <th class="border p-2">IPK</th>
                        <th class="border p-2">Jenis Kelamin (Desc)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mahasiswa as $mhs)
                    <tr class="text-center hover:bg-gray-50">
                        <td class="border p-2">{{ $mhs->m_id }}</td>
                        <td class="border p-2">{{ $mhs->nim }}</td>
                        <td class="border p-2">{{ $mhs->kode_jenis_kelamin }}</td>
                        <td class="border p-2 text-left">{{ $mhs->nama_mahasiswa }}</td>
                        <td class="border p-2">{{ $mhs->jurusan }}</td>
                        <td class="border p-2 font-bold">{{ $mhs->ipk }}</td>
                        <td class="border p-2 text-gray-600">{{ $mhs->jenisKelamin->description }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <h2 class="text-xl font-bold mb-4 border-b-2 border-orange-500 inline-block">Data KRS Mahasiswa</h2>
        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-300">
                <thead class="bg-orange-50">
                    <tr>
                        <th class="border p-2">M#</th>
                        <th class="border p-2">Nama Mahasiswa</th>
                        <th class="border p-2">Kode MK</th>
                        <th class="border p-2">Nama Mata Kuliah</th>
                        <th class="border p-2">SKS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataKrs as $krs)
                    <tr class="text-center hover:bg-gray-50">
                        <td class="border p-2">{{ $krs->m_id }}</td>
                        <td class="border p-2 text-left">{{ $krs->mahasiswa->nama_mahasiswa }}</td>
                        <td class="border p-2">{{ $krs->kode_mata_kuliah }}</td>
                        <td class="border p-2 text-left">{{ $krs->mataKuliah->nama_mata_kuliah }}</td>
                        <td class="border p-2">{{ $krs->sks }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>