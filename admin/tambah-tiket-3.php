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
        <?php sidebar();?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
               <?php topBar(); ?>
            <div class="container-fluid">
                <h3 class="text-dark mb-1">Tambah Tiket (3)</h3>
            </div>
            <div class="card" style="margin-top: 20px;margin-right: 20px;margin-left: 20px;">
                <div class="card-body">
                    <form>
                        <div class="card-details">
                            <h3 class="title">Isi Data Diri</h3>
                            <div class="form-group"><label for="card-holder">Nama lengkap</label><input class="form-control" type="text" placeholder="Nama Lengkap Anda"></div>
                            <div class="form-group"><label for="card-holder">Alamat Email</label><input class="form-control" type="text" placeholder="Alamat Email Aktif Anda"></div>
                            <div class="form-group"><label for="card-holder">Nomor rekening</label><input class="form-control" type="text" placeholder="Nomor Rekening Bank Anda"></div>
                            <div class="form-group"><label for="card-holder">Nomor Kontak</label><input class="form-control" type="text" placeholder="Nomor Kontak Anda"></div>
                        </div>
                        <div class="products">
                            <h3 class="title">Checkout Tiket</h3>
                            <div class="item"><span class="price">Rp. 115.000</span>
                                <p class="item-name">Tiket Bandung - Jakarta</p>
                                <p class="item-description">1 Tiket</p>
                            </div>
                        </div><button class="btn btn-primary btn-block" type="submit">Tambah Tiket</button></form>
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