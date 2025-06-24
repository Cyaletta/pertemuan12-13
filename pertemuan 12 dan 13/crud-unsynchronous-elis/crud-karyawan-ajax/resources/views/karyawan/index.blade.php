<!DOCTYPE html>
<html>
<head>
    <title>CRUD Karyawan AJAX</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        table, th, td { border: 1px solid black; border-collapse: collapse; padding: 6px; }
        input, select, button { margin: 3px; padding: 5px; }
    </style>
</head>
<body>

<h2>Data Karyawan</h2>

<form id="form-karyawan">
    <input type="hidden" id="karyawan_id">
    <input type="text" id="nama" placeholder="Nama" required>
    <input type="text" id="posisi" placeholder="Posisi" required>
    <input type="number" id="gaji" placeholder="Gaji" required>
    <select id="status">
        <option value="aktif">Aktif</option>
        <option value="tidak aktif">Tidak Aktif</option>
    </select>
    <input type="text" id="alamat" placeholder="Alamat">
    <button type="submit">Simpan</button>
    <button type="reset" onclick="resetForm()">Reset</button>
</form>

<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>Posisi</th>
            <th>Gaji</th>
            <th>Status</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody id="tabel-body">
        @foreach($karyawans as $k)
        <tr id="row-{{ $k->id }}">
            <td>{{ $k->nama }}</td>
            <td>{{ $k->posisi }}</td>
            <td>{{ $k->gaji }}</td>
            <td>{{ $k->status }}</td>
            <td>{{ $k->alamat }}</td>
            <td>
                <button onclick="editKaryawan({{ $k->id }})">Edit</button>
                <button onclick="hapusKaryawan({{ $k->id }})">Hapus</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

document.getElementById('form-karyawan').addEventListener('submit', function(e) {
    e.preventDefault();

    const id = document.getElementById('karyawan_id').value;
    const url = id ? `/karyawan/${id}` : '/karyawan';
    const method = id ? 'PUT' : 'POST';

    const data = {
        nama: document.getElementById('nama').value,
        posisi: document.getElementById('posisi').value,
        gaji: document.getElementById('gaji').value,
        status: document.getElementById('status').value,
        alamat: document.getElementById('alamat').value
    };

    fetch(url, {
        method: method,
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token
        },
        body: JSON.stringify(data)
    }).then(() => location.reload());
});

function editKaryawan(id) {
    fetch(`/karyawan/${id}`)
        .then(res => res.json())
        .then(data => {
            document.getElementById('karyawan_id').value = data.id;
            document.getElementById('nama').value = data.nama;
            document.getElementById('posisi').value = data.posisi;
            document.getElementById('gaji').value = data.gaji;
            document.getElementById('status').value = data.status;
            document.getElementById('alamat').value = data.alamat;
        });
}

function hapusKaryawan(id) {
    if (confirm('Yakin hapus data ini?')) {
        fetch(`/karyawan/${id}`, {
            method: 'DELETE',
            headers: { 'X-CSRF-TOKEN': token }
        }).then(() => document.getElementById(`row-${id}`).remove());
    }
}

function resetForm() {
    document.getElementById('form-karyawan').reset();
    document.getElementById('karyawan_id').value = '';
}
</script>

</body>
</html>
