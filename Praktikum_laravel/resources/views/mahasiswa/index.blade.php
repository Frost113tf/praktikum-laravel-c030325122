<h1>Daftar Mahasiswa</h1>
<table border="1" cellpadding="8">
<tr><th>NIM</th><th>Nama</th><th>Prodi</th><th>Semester</th></tr>
@foreach ($data as $mhs)
<tr>
<td>{{ $mhs->nim }}</td>
<td>{{ $mhs->nama }}</td>
<td>{{ $mhs->prodi }}</td>
<td>{{ $mhs->semester }}</td>
</tr>
@endforeach
</table>