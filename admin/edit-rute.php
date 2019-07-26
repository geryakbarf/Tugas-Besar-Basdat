<?php include_once "functions.php" ?>
<?php
session_start();
if (!isset($_SESSION["travelku.xyz"]))
    header("Location: login.php");
?>
<?php
    $id=trim($_GET['id']);
    $datarute=editRute($id);
    foreach ($datarute as $data){
        $asal=$data['asal'];
        $tujuan=$data['tujuan'];
        $biaya=$data['biaya'];
    }
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
                <h3 class="text-dark mb-1">Edit Rute</h3>
                <div class="card" style="margin-top: 20px;">
                    <div class="card-body">
                        <form name="f" method="post" onsubmit="return validdasiData()" action="proses/proses-edit-rute.php">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">Kota Asal</span></div><input class="form-control" value="<?php echo $asal;?>" type="text" readonly>
                            <div class="input-group-append"></div>
                        </div>
                        <div class="input-group" style="margin-top: 20px;">
                            <div class="input-group-prepend"><span class="input-group-text">Kota Tujuan</span></div><input class="form-control" value="<?php echo $tujuan;?>" type="text" readonly>
                            <div class="input-group-append"></div>
                        </div>
                        <div class="input-group" style="margin-top: 20px;">
                            <div class="input-group-prepend"><span class="input-group-text">Biaya</span></div><input class="form-control" name="harga" value="<?php echo $biaya;?>" maxlength="6" type="text" required>
                            <div class="input-group-append"></div>
                            <input type="hidden" name="rute" value="<?php echo $id;?>">
                        </div><button class="btn btn-primary" name="TblUpdate" type="submit" style="float: right;margin-top: 20px;">Perbarui</button></div></form>
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
    <SCRIPT>
        function validdasiData() {
            var angka= document.f.harga.value;
            if(isNaN(angka) || angka < 1){
                alert("Masukan Biaya Rute Yang Valid!");
                return false;
            }
            return true;
        }
    </SCRIPT>
</body>

</html>