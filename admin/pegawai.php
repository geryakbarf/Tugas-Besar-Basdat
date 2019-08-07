<?php include_once "functions.php" ?>
<?php
session_start();
if (!isset($_SESSION["travelku.xyz"]))
    header("Location: login.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Blank Page - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
       <?php sidebar(); ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <?php topBar(); ?>
            <div class="container-fluid">
                <h3 class="text-dark mb-1">Data Pegawai</h3>
            </div>
            <div class="card" style="margin-top: 20px;margin-right: 20px;margin-left: 20px;">
                <div class="card-body">
                    <div class="row">
                        <div class="col" style="margin-top: 20px;">
                            <div class="card shadow border-left-info py-2">
                                <a href="admin.php?halaman=1">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-info font-weight-bold text-xs mb-1"><span>Data admin</span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-user-cog fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col" style="margin-top: 20px;">
                            <div class="card shadow border-left-info py-2">
                                <a href="supir.php?halaman=1">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-info font-weight-bold text-xs mb-1"><span>Data supir</span></div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="text-dark font-weight-bold h5 mb-0 mr-3"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-user-astronaut fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="bg-white sticky-footer">
            <div class="container my-auto">
                <div class="text-center my-auto copyright"><span>Copyright © Brand 2019</span></div>
            </div>
        </footer>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>