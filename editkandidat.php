<?php
require 'koneksi.php';

if (!isset($_GET['id'])) {
    echo "ID tidak ditentukan!";
    exit;
}

$id = intval($_GET['id']);
$stmt = $conn->prepare("SELECT * FROM kandidat WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$d = $result->fetch_assoc();

if (!$d) {
    echo "Data tidak ditemukan!";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomorurut = $_POST['nomorurut'];
    $namacketos = $_POST['namacketos'];
    $namacwaketos = $_POST['namacwaketos'];
    $visi = $_POST['visi'];
    $misi = $_POST['misi'];
    $slogan = $_POST['slogan'];
    $kelasck = $_POST['kelasck'];
    $kelascw = $_POST['kelascw'];

    $foto = $d['foto']; // Default foto lama
    if (!empty($_FILES['foto']['name'])) {
        $target_dir = "img/";
        $foto = basename($_FILES['foto']['name']);
        $target_file = $target_dir . $foto;
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (!in_array($file_type, $allowed_types)) {
            echo "Format file tidak didukung.";
            exit;
        }
        if ($_FILES['foto']['size'] > 2000000) { // Maksimal 2MB
            echo "Ukuran file terlalu besar.";
            exit;
        }
        if (!move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
            echo "Gagal mengupload file.";
            exit;
        }
    }

    $stmt = $conn->prepare("UPDATE kandidat SET nomorurut=?, namacketos=?, namacwaketos=?, visi=?, misi=?, slogan=?, kelasck=?, kelascw=?, foto=? WHERE id=?");
    $stmt->bind_param("sssssssssi", $nomorurut, $namacketos, $namacwaketos, $visi, $misi, $slogan, $kelasck, $kelascw, $foto, $id);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kandidat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script> 

</head>

<body>
    <div class="container">
        <h3 class="my-4 text-center">Edit Kandidat</h3>
        <form action="" method="post" enctype="multipart/form-data">
        <a href="index.php#kandidat" class="text-dark">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
            <div class="mb-3">
                <label for="nomorurut" class="form-label">Nomor Urut Kandidat</label>
                <input type="text" class="form-control" id="nomorurut" name="nomorurut" value="<?= htmlspecialchars($d['nomorurut']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="namacketos" class="form-label">Nama Ketua OSIS</label>
                <input type="text" class="form-control" id="namacketos" name="namacketos" value="<?= htmlspecialchars($d['namacketos']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="kelasck" class="form-label">Kelas Ketua OSIS</label>
                <input type="text" class="form-control" id="kelasck" name="kelasck" value="<?= htmlspecialchars($d['kelasck']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="namacwaketos" class="form-label">Nama Wakil Ketua OSIS</label>
                <input type="text" class="form-control" id="namacwaketos" name="namacwaketos" value="<?= htmlspecialchars($d['namacwaketos']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="kelascw" class="form-label">Kelas Wakil Ketua OSIS</label>
                <input type="text" class="form-control" id="kelascw" name="kelascw" value="<?= htmlspecialchars($d['kelascw']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="visi" class="form-label">Visi</label>
                <textarea class="form-control" id="visi" name="visi" rows="3" required><?= htmlspecialchars($d['visi']); ?></textarea>
            </div>
            <div class="mb-3">
                <label for="misi" class="form-label">Misi</label>
                <textarea class="form-control" id="misi" name="misi" rows="3" required><?= htmlspecialchars($d['misi']); ?></textarea>
            </div>
            <div class="mb-3">
                <label for="slogan" class="form-label">Slogan</label>
                <input type="text" class="form-control" id="slogan" name="slogan" value="<?= htmlspecialchars($d['slogan']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                <p class="text-muted">Ekstensi yang diperbolehkan: .png, .jpg, .jpeg, .gif (Maks. 2MB)</p>
                <img src="img/<?= htmlspecialchars($d['foto']); ?>" alt="Foto Lama" class="img-thumbnail" width="200">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>

</html>
