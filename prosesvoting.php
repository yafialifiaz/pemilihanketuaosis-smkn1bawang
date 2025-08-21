<?php 
include 'koneksi.php';

// ambil data dari form
$nis = $_POST['nis'];
$kandidat_id = $_POST['kandidat'];

// cek jika NIS sudah ada di database (untuk menghindari vote ganda)
$query_check = "SELECT * FROM voting WHERE nis = '$nis'";
$result_check = mysqli_query($conn, $query_check);

if (mysqli_num_rows($result_check) > 0) {
    header("location:formvoting.php?alert=duplikat");
    exit();
}

// simpan vote ke database
$query = "INSERT INTO voting (nis, kandidat_id) VALUES ('$nis', '$kandidat_id')";
if (mysqli_query($conn, $query)) {
    header("location:formvoting.php?alert=berhasil");
} else {
    header("location:formvoting.php?alert=gagal");
}
?>
