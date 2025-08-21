<?php 
include 'koneksi.php';

$nomorurut = mysqli_real_escape_string($conn, $_POST['nomorurut']);
$namacketos = mysqli_real_escape_string($conn, $_POST['namacketos']);
$namacwaketos = mysqli_real_escape_string($conn, $_POST['namacwaketos']);
$visi = mysqli_real_escape_string($conn, $_POST['visi']);
$misi = mysqli_real_escape_string($conn, $_POST['misi']);
$slogan = mysqli_real_escape_string($conn, $_POST['slogan']);
$kelasck = mysqli_real_escape_string($conn, $_POST['kelasck']);
$kelascw = mysqli_real_escape_string($conn, $_POST['kelascw']);

// validasi apakah file berhasil diupload
if ($_FILES['foto']['error'] !== UPLOAD_ERR_OK) {
    header("location:index.php?alert=gagal_upload");
    exit();
}

// validasi ekstensi dan ukuran file
$ekstensi = array('png', 'jpg', 'jpeg', 'gif');
$filename = preg_replace('/[^a-zA-Z0-9._-]/', '_', $_FILES['foto']['name']);
$ukuran = $_FILES['foto']['size'];
$ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
$maxSize = 10 * 1024 * 1024; // 10 MB

if (!in_array($ext, $ekstensi)) {
    header("location:index.php?alert=gagal_ekstensi");
    exit();
}

if ($ukuran > $maxSize) {
    header("location:index.php?alert=gagal_ukuran");
    exit();
}

// validasi apakah file benar-benar gambar
$checkImage = getimagesize($_FILES['foto']['tmp_name']);
if ($checkImage === false) {
    header("location:index.php?alert=bukan_gambar");
    exit();
}

// simpan file dengan nama unik
$xx = uniqid() . '_' . $filename;
if (!move_uploaded_file($_FILES['foto']['tmp_name'], 'img/' . $xx)) {
    die("gagal menyimpan file.");
}

// simpan data ke database
$query = "INSERT INTO kandidat (nomorurut, namacketos, namacwaketos, visi, misi, slogan, kelasck, kelascw, foto) 
          VALUES ('$nomorurut', '$namacketos', '$namacwaketos', '$visi', '$misi', '$slogan', '$kelasck', '$kelascw', '$xx')";
if (!mysqli_query($conn, $query)) {
    die("query gagal: " . mysqli_error($conn));
}

header("location:index.php#kandidat?alert=berhasil");
exit();
?>
