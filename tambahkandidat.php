<?php
require 'koneksi.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kandidat</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h3 class="text-center">Tambah Kandidat</h3>
        <form action="koneksitambahkandidat.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nomorurut" class="form-label">Nomor Urut Kandidat</label>
                <input type="text" name="nomorurut" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="namacketos" class="form-label">Nama Kandidat Ketua OSIS</label>
                <input type="text" name="namacketos" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="kelasck" class="form-label">Kelas Kandidat Ketua OSIS</label>
                <input type="text" name="kelasck" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="namacwaketos" class="form-label">Nama Kandidat Wakil Ketua OSIS</label>
                <input type="text" name="namacwaketos" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="kelascw" class="form-label">Kelas Kandidat Wakil Ketua OSIS</label>
                <input type="text" name="kelascw" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="visi" class="form-label">Visi</label>
                <textarea name="visi" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label for="misi" class="form-label">Misi</label>
                <textarea name="misi" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label for="slogan" class="form-label">Slogan Kandidat</label>
                <input type="text" name="slogan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto Kandidat</label>
                <input type="file" name="foto" class="form-control" accept=".jpg, .jpeg, .png, .gif" accept="image*/">
                <small class="text-muted">Format yang diizinkan: jpg, jpeg, png, gif (Maks: 10 MB)</small>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>  
</body>
</html>
