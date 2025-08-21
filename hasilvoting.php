<?php 
session_start();
include 'koneksi.php';

// ambil data kandidat dan jumlah suara yang diterima
$query = "
    SELECT kandidat.id, kandidat.namacketos, kandidat.namacwaketos, COUNT(voting.kandidat_id) AS suara
    FROM kandidat
    LEFT JOIN voting ON kandidat.id = voting.kandidat_id
    GROUP BY kandidat.id
";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Voting</title>
    <link rel="stylesheet" href="stylevoting.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="css/style.css" rel="stylesheet">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script> 


</head>
<body>
    <div class="container mt-5">
        <h3 class="text-center">Hasil Voting</h3>
        <a href="voting.php" class="text-dark">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nomor </th>
                    <th>Nama Kandidat</th>
                    <th>Suara</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['namacketos'] . ' & ' . $row['namacwaketos']; ?></td>
                        <td><?php echo $row['suara']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/lightbox/js/lightbox.min.js"></script>
        

        <!-- Template Javascript -->
        <script src="js/main.js"></script>

</body>
<style>
    /* umum */
body {
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}

/* kontainer utama */
.container {
    margin-top: 50px;
    padding: 20px;
    background: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* judul */
h3.text-center {
    font-weight: bold;
    color: #343a40;
    margin-bottom: 20px;
}

/* tabel */
.table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    background-color: #ffffff;
    text-align: left;
}

.table th, .table td {
    padding: 12px 15px;
    border: 1px solid #dee2e6;
}

.table th {
    background-color: #007bff;
    color: #ffffff;
    font-weight: bold;
}

.table tr:nth-child(even) {
    background-color: #f8f9fa;
}

/* teks untuk jumlah suara */
.table td {
    font-size: 16px;
    color: #495057;
}

/* nomor urut */
.table td:first-child {
    text-align: center;
}

/* hover efek pada baris */
.table tr:hover {
    background-color: #f1f3f5;
    transition: background-color 0.2s ease-in-out;
}

/* footer */
footer {
    margin-top: 20px;
    text-align: center;
    font-size: 14px;
    color: #6c757d;
}

</style>
</html>
