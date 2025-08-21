<?php 
include 'koneksi.php';
session_start();

// ambil data kandidat dari database
$query = "SELECT * FROM kandidat";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Voting</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script> 


</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center ">Form Voting</h1>
        
        <form action="prosesvoting.php" method="post">
        <a href="voting.php" class="text-dark">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
            <div class="mb-3">
                <label for="nis" class="form-label">Nomor Induk Siswa (NIS)</label>
                <input type="text" name="nis" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label for="kandidat" class="form-label">Pilih Kandidat</label>
                <select name="kandidat" class="form-select" required>
                    <option value="">-- Pilih Kandidat --</option>
                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                        <option value="<?php echo $row['id']; ?>">
                            <?php echo $row['namacketos'] . ' & ' . $row['namacwaketos']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Vote</button>
            <a href="voting.php?id=<?php echo $d['id']; ?>" class="btn btn-primary">Selesai</a>
        </form>
    </div>
    <?php 
if (isset($_GET['alert'])) {
    if ($_GET['alert'] == 'duplikat') {
        echo '<div class="alert alert-warning">Anda sudah melakukan voting sebelumnya.</div>';
    } elseif ($_GET['alert'] == 'berhasil') {
        echo '<div class="alert alert-success">Voting berhasil.</div>';
    } elseif ($_GET['alert'] == 'gagal') {
        echo '<div class="alert alert-danger">Gagal melakukan voting. Coba lagi nanti.</div>';
    }
}
?>

</body>
</html>
