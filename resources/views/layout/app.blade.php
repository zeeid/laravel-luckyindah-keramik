<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Test Lucky Indah Keramik</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
    
    <nav class="bg-blue-900 text-white p-4 shadow-md">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">SIAKAD Laravel</h1>
            <div class="space-x-4">
                <a href="{{ route('mahasiswa.index') }}" class="hover:text-yellow-400 {{ request()->is('mahasiswa*') ? 'text-yellow-400 font-bold' : '' }}">Mahasiswa</a>
                <a href="{{ route('matakuliah.index') }}" class="hover:text-yellow-400 {{ request()->is('matakuliah*') ? 'text-yellow-400 font-bold' : '' }}">Mata Kuliah</a>
                <a href="{{ route('krs.index') }}" class="hover:text-yellow-400 {{ request()->is('krs*') ? 'text-yellow-400 font-bold' : '' }}">KRS</a>
            </div>
        </div>
    </nav>

    <div class="max-w-6xl mx-auto mt-8 p-6 bg-white shadow rounded-lg min-h-screen">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('success') }}
            </div>
        @endif
        
        @yield('content')
    </div>

</body>
</html>