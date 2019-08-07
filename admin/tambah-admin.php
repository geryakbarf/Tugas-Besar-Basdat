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
                <h3 class="text-dark mb-1">Tambah Admin</h3>
                <div class="card" style="margin-top: 20px;">
                    <div class="card-body">
                        <form name="f" method="post" action="proses/proses-tambah-admin.php" onsubmit="return validasidata()">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">Nip</span></div><input class="form-control" type="text" name="nip" required maxlength="5">
                            <div class="input-group-append"></div>
                        </div>
                        <div class="input-group" style="margin-top: 20px;">
                            <div class="input-group-prepend"><span class="input-group-text">Nama</span></div><input class="form-control" type="text" name="nama" required maxlength="30">
                            <div class="input-group-append"></div>
                        </div>
                        <div class="input-group" style="margin-top: 20px;">
                            <div class="input-group-prepend"><span class="input-group-text">Alamat</span></div><input class="form-control" type="text" name="alamat" required maxlength="30">
                            <div class="input-group-append"></div>
                        </div>
                        <div class="input-group" style="margin-top: 20px;">
                            <div class="input-group-prepend"><span class="input-group-text">Kontak</span></div><input class="form-control" type="text" name="kontak" required maxlength="15">
                            <div class="input-group-append"></div>
                        </div>
                        <div class="input-group" style="margin-top: 20px;">
                            <div class="input-group-prepend"><span class="input-group-text">Username</span></div><input class="form-control" type="text" name="username" maxlength="20">
                            <div class="input-group-append"></div>
                        </div>
                        <div class="input-group" style="margin-top: 20px;">
                            <div class="input-group-prepend"><span class="input-group-text">Password</span></div><input class="form-control" type="password" name="password" maxlength="30">
                            <div class="input-group-append"></div>
                        </div>
                        <div class="input-group" style="margin-top: 20px;">
                            <div class="input-group-prepend"><span class="input-group-text">Konfirmasi Password</span></div><input class="form-control" name="konfirmasi" type="password" maxlength="30">
                            <div class="input-group-append"></div>
                        </div><button class="btn btn-primary" type="submit" name="TblSimpan" style="float: right;margin-top: 20px;">Simpan</button></div></form>
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
<script language="JavaScript">
    function validasidata() {
        var password=document.f.password.value;
        var konfirmasi=document.f.konfirmasi.value;

        if(password!==konfirmasi){
            alert("Password dan Konfirmasi Password Harus Sama ! :D");
            return false;
        }

        return true;
    }
</script>
</body>

</html>