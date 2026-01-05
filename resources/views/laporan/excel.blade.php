<table border="1">
    <thead>
        <tr>
            <th>M#</th>
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
            <th>Jurusan</th>
            <th>IPK</th>
        </tr>
    </thead>
    <tbody>
        @foreach($mahasiswa as $mhs)
        <tr>
            <td>{{ $mhs->m_id }}</td>
            <td>{{ $mhs->nim }}</td>
            <td>{{ $mhs->nama_mahasiswa }}</td>
            <td>{{ $mhs->jurusan }}</td>
            <td>{{ $mhs->ipk }}</td>
        </tr>
        @endforeach
    </tbody>
</table>