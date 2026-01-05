<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Lucky Indah Keramik</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10 print:bg-white print:p-0"> <div class="max-w-6xl mx-auto bg-white p-8 shadow rounded-lg print:shadow-none print:w-full">
        <h1 class="text-3xl font-bold mb-6 text-center text-blue-800">Sistem Informasi Akademik</h1>

        <div class="flex gap-4 mb-8 print:hidden">
            <button onclick="window.print()" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">🖨️ Print MVC</button>
            <a href="{{ route('export.excel') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Export Excel</a>
            <a href="https://wa.me/6281287765396" target="_blank" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Kirim ke WA</a>
            <a href="/mahasiswa" target="_blank" rel="noopener noreferrer" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Data Master</a>
        </div>
        <h2 class="text-xl font-bold mb-4 border-b-2 border-blue-500 inline-block">Laporan Nilai Mahasiswa Per Jurusan</h2>
        <div class="overflow-x-auto mb-10">
            <table class="w-full border-collapse border border-gray-300 text-sm">
                <thead class="bg-blue-50 print:bg-gray-200"> <tr>
                        <th class="border p-2 border-gray-400">M#</th>
                        <th class="border p-2 border-gray-400">NIM</th>
                        <th class="border p-2 border-gray-400">Kode JK</th>
                        <th class="border p-2 border-gray-400">Nama Mahasiswa</th>
                        <th class="border p-2 border-gray-400">Jurusan</th>
                        <th class="border p-2 border-gray-400">IPK</th>
                        <th class="border p-2 border-gray-400">Jenis Kelamin</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mahasiswa as $mhs)
                    <tr class="text-center">
                        <td class="border p-2 border-gray-400">{{ $mhs->m_id }}</td>
                        <td class="border p-2 border-gray-400">{{ $mhs->nim }}</td>
                        <td class="border p-2 border-gray-400">{{ $mhs->kode_jenis_kelamin }}</td>
                        <td class="border p-2 border-gray-400 text-left">{{ $mhs->nama_mahasiswa }}</td>
                        <td class="border p-2 border-gray-400">{{ $mhs->jurusan }}</td>
                        <td class="border p-2 border-gray-400 font-bold">{{ $mhs->ipk }}</td>
                        <td class="border p-2 border-gray-400">{{ $mhs->jenisKelamin->description }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <h2 class="text-xl font-bold mb-4 border-b-2 border-orange-500 inline-block mt-4 break-before-auto">Data KRS Mahasiswa</h2>
        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-300 text-sm">
                <thead class="bg-orange-50 print:bg-gray-200">
                    <tr>
                        <th class="border p-2 border-gray-400">M#</th>
                        <th class="border p-2 border-gray-400">Nama Mahasiswa</th>
                        <th class="border p-2 border-gray-400">Kode MK</th>
                        <th class="border p-2 border-gray-400">Nama Mata Kuliah</th>
                        <th class="border p-2 border-gray-400">SKS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataKrs as $krs)
                    <tr class="text-center">
                        <td class="border p-2 border-gray-400">{{ $krs->m_id }}</td>
                        <td class="border p-2 border-gray-400 text-left">{{ $krs->mahasiswa->nama_mahasiswa }}</td>
                        <td class="border p-2 border-gray-400">{{ $krs->kode_mata_kuliah }}</td>
                        <td class="border p-2 border-gray-400 text-left">{{ $krs->mataKuliah->nama_mata_kuliah }}</td>
                        <td class="border p-2 border-gray-400">{{ $krs->sks }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>