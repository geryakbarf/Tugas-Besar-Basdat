<?php include_once "functions.php" ?>
<?php
session_start();
if (!isset($_SESSION["travelku.xyz"]))
    header("Location: login.php");
$kode=$_GET['id'];
$dataadmin=getListAdmin($kode);
foreach ($dataadmin as $data){
    $nip=$data['nip'];
    $nama=$data['nama'];
    $alamat=$data['alamat'];
    $kontak=$data['kontak'];
    $username=$data['username'];
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
                <?php topBar();?>
            <div class="container-fluid">
                <h3 class="text-dark mb-1">Edit Admin</h3>
                <div class="card" style="margin-top: 20px;">
                    <div class="card-body">
                        <form name="f" method="post" action="proses/proses-edit-admin.php">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">Nip</span></div><input class="form-control" value="<?php echo$nip;?>" type="text" name="nip" required maxlength="5" readonly>
                                <div class="input-group-append"></div>
                            </div>
                            <div class="input-group" style="margin-top: 20px;">
                                <div class="input-group-prepend"><span class="input-group-text">Nama</span></div><input class="form-control" value="<?php echo$nama;?>" type="text" name="nama" required maxlength="30">
                                <div class="input-group-append"></div>
                            </div>
                            <div class="input-group" style="margin-top: 20px;">
                                <div class="input-group-prepend"><span class="input-group-text">Alamat</span></div><input class="form-control" value="<?php echo$alamat;?>"  type="text" name="alamat" required maxlength="30">
                                <div class="input-group-append"></div>
                            </div>
                            <div class="input-group" style="margin-top: 20px;">
                                <div class="input-group-prepend"><span class="input-group-text">Kontak</span></div><input class="form-control" value="<?php echo $kontak;?>"  type="text" name="kontak" required maxlength="15">
                                <div class="input-group-append"></div>
                            </div>
                            <div class="input-group" style="margin-top: 20px;">
                                <div class="input-group-prepend"><span class="input-group-text">Username</span></div><input class="form-control" value="<?php echo $username;?>"  type="text" name="username" required maxlength="20" readonly>
                                <div class="input-group-append"></div>
                            </div>

                           <button class="btn btn-primary" type="submit" name="TblUpdate" style="float: right;margin-top: 20px;">Simpan</button></div></form>
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