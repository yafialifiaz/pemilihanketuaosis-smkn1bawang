<?php
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

        <!-- Topbar Start -->
        <!-- Topbar End -->

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
                        <a href="index.php" class="nav-item nav-link">Home</a>
                        <a href="index.php#kandidat" class="nav-item nav-link">Kandidat</a>
                        <a href="voting.php" class="nav-item nav-link active">Voting</a>
                        <?php if ($_SESSION['pengguna'] == "admin") { ?>
                            <a href="logout.php" class="nav-item nav-link">Logout</a>
                        <?php } ?>

                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Navbar & Hero End -->

        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h3 class="text-white display-3 mb-4">Voting Kandidat</h1>
                <ol class="breadcrumb justify-content-center mb-0">
                </ol>    
            </div>
        </div>
        <!-- Header End -->
         <div class="custom-btn">
                    <div class="col-12">
                        <div class="text-center">
                            <a href="formvoting.php" class="btn btn-primary rounded-pill py-3 px-5 mt-2">VOTING DISINI</a>
                            <?php if ($_SESSION['pengguna'] == "admin") { ?>
                                <a href="hasilvoting.php" class="btn btn-primary rounded-pill py-3 px-5 mt-2">HASIL VOTING</a>
                            <?php } ?>              
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Services End -->


s        
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
        margin: 50px;
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