<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mata Kuliah</title>
</head>
<body>
    <h1>Tambah Mata Kuliah Baru</h1>
    <form action="{{ route('matakuliah.store') }}" method="POST">
        @csrf
        <div>
            <label>Kode Mata Kuliah:</label><br>
            <input type="text" name="kode_mk" required>
        </div>
        <br>
        <div>
            <label>Nama Mata Kuliah:</label><br>
            <input type="text" name="nama_mk" required>
        </div>
        <br>
        <div>
            <label>SKS:</label><br>
            <input type="number" name="sks" min="1" max="6" required>
        </div>
        <br>
        <div>
            <label>Semester:</label><br>
            <input type="number" name="semester" min="1" max="8" required>
        </div>
        <br>
        <div>
            <label>Dosen Pengampu:</label><br>
            <select name="dosen_id" required>
                <option value="">-- Pilih Dosen --</option>
                @foreach ($dosens as $dosen)
                    <option value="{{ $dosen->id }}">{{ $dosen->name }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <button type="submit">Simpan Mata Kuliah</button>
        <a href="{{ route('matakuliah.index') }}">Batal</a>
    </form>
</body>
</html>