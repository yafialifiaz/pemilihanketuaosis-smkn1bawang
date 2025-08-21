<?php
require 'koneksi.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Pemilihan Ketos dan Waketos</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-fluid position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="m-0"><img src="img/logoosis.PNG" class="img-fluid" alt="Image"></i>Vote Yuk!</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="index.php" class="nav-item nav-link active">Home</a>
                        <a href="#kandidat" class="nav-item nav-link">Kandidat</a>
                        <a href="voting.php" class="nav-item nav-link">Voting</a>
                        <?php if ($_SESSION['pengguna'] == "admin") { ?>
                        <a href="logout.php" class="nav-item nav-link">Logout</a>
                        <?php } ?>
            </nav>
        

            <!-- Carousel Start -->
            <div class="carousel-header">
                <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
                        <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <!-- <img src="img/logoosis.png" class="img-fluid" alt="Image"> -->
                            <div class="carousel-caption">
                                <div class="p-3" style="max-width: 900px;">
                                    <h1 class="display-2 text-capitalize text-white mb-4">Pemilihan Ketua dan Wakil Ketua Osis SMKN 1 Bawang Masa Bakti 2024/2025</h1>
                                    <div class="d-flex align-items-center justify-content-center">
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="row g-5 justify-content-center">
                    <?php
                $data = mysqli_query($conn,"select * from kandidat");
			$no=1;
			while($d = mysqli_fetch_array($data)){
                
				?>
            <div id="kandidat">
        <div class="container-fluid about py-5">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-5">
                        <div class="h-100" style="border: 50px solid; border-color: transparent #13357B transparent #13357B;">
                        <img src="img/<?php echo $d['foto'] ?>" class="img-fluid w-100 h-100" alt="">
                        </div>
                    </div>
                    <div class="col-lg-7" style="background: linear-gradient(rgba(255, 255, 255, .8), rgba(255, 255, 255, .8)), url();">
                        <h5 class="section-about-title pe-3">Kandidat <?php echo $d['nomorurut']; ?></h5>
                        <h1 class="mb-4"><?php echo $d['namacketos']; ?> <span class="text-primary"><?php echo $d['kelasck']; ?></span></h1> <h1 class="mb-4"> <?php echo $d['namacwaketos']; ?><span class="text-primary"> <?php echo $d['kelascw']; ?></span></h1>
                        <span class="text-primary">VISI</span>
                        <p class="mb-4"><?php echo $d['visi']; ?></p>
                        <span class="text-primary">MISI</span>
                        <p class="mb-4"><?php echo $d['misi']; ?></p>
                        <h5><?php echo $d['slogan']; ?></h5>
                        <?php if ($_SESSION['pengguna'] == "admin") { ?>
                            <a href="editkandidat.php?id=<?php echo $d['id']; ?>" class="btn btn-primary">EDIT KANDIDAT</a>
                            <a href="hapuskandidat.php?id=<?php echo $d['id']; ?>" class="btn btn-danger" onclick="return confirm('Yakin akan menghapus data?');">HAPUS KANDIDAT</a>
                        <?php } ?>
                        </div>
                </div>
            </div>
        </div>
        <?php
            }
            ?>
        

                    <div class="custom-btn">
                <div class="col-12">
                    <div class="text-center">
                        <?php if ($_SESSION['pengguna'] == "admin") { ?>
                            <a class="btn btn-primary rounded-pill py-3 px-5 mt-2" href="tambahkandidat.php">TAMBAH KANDIDAT</a>
                        <?php } ?>
                    </div>
                </div>
            </div>


        <!-- About End -->

        
        <!-- Copyright Start -->
        <div class="container-fluid copyright text-body py-4">
    <div class="container">
        <div class="row g-4 align-items-center justify-content-center">
            <div class="col-md-12 text-center">
                <i class="fas fa-copyright me-2"></i>
                <a class="text-white" href="#">Yafi Alifia Zahida</a>, All right reserved.
            </div>
        </div>
    </div>
</div>
        <!-- Copyright End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-primary btn-primary-outline-0 btn-md-square back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
        <!-- JavaScript Libraries -->
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
    .custom-btn {
        margin-bottom: 50px;
        padding: 15px 30px; /* sesuai dengan py-3 px-5 bootstrap */
    }
    .copyright {
    display: flex;
    justify-content: center; /* pusatkan secara horizontal */
    align-items: center; /* pusatkan secara vertikal */
    text-align: center;
    background-color: #343a40; /* warna latar opsional */
}

.copyright .container {
    max-width: 100%; /* pastikan kontainer mengambil penuh lebar */
}

</style>
</html>