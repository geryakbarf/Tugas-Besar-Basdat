<?php include_once "functions.php"; ?>
<?php
session_start();
if (!isset($_SESSION["travelku.xyz"]))
    header("Location: login.php");
$kodetike = $_GET['tiket'];
$jumkursi = $_GET['jum'];
$data = getDataTiket($kodetike);
foreach ($data as $new) {
    $norek = $new['no_rekening'];
    $totbiaya = $new['total_biaya'];
    $kodejadwal = $new['kode_jadwal'];
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Blank Page - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
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
                <h3 class="text-dark mb-1">Edit Tiket</h3>
                <div class="card" style="margin-top: 20px;">
                    <div class="card-body">
                        <form name="f" method="post" action="proses/proses-edit-tiket.php">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">Nomor Tiket</span></div>
                            <input class="form-control" name="notiket" type="text" value="<?php echo $kodetike; ?>"
                                   readonly>
                            <div class="input-group-append"></div>
                        </div>
                        <div class="input-group" style="margin-top: 20px;">
                            <div class="input-group-prepend"><span class="input-group-text">Nomor Rekening</span></div>
                            <input class="form-control" type="text" value="<?php echo $norek; ?>" readonly>
                            <div class="input-group-append"></div>
                        </div>
                        <div class="input-group" style="margin-top: 20px;">
                            <div class="input-group-prepend"><span class="input-group-text">Total Bayar</span></div>
                            <input class="form-control" type="text" value="<?php echo $totbiaya; ?>" readonly>
                            <div class="input-group-append"></div>
                        </div>

                            <div class="field" style="margin-bottom: 0px;margin-top: 20px;"><select
                                        class="form-control" name="status">
                                    <optgroup label="Pilih Status Tiket">
                                        <option value="Belum Dibayar" selected="">Belum Dibayar</option>
                                        <option value="Dibayar">Dibayar</option>
                                    </optgroup>
                                </select>
                                <label
                                        class="mb-0" for="float-input">Status</label>
                            </div>
                        <input type="hidden" name="kodejadwal" value="<?php echo $kodejadwal;?>">
                        <input type="hidden" name="jumtiket" value="<?php echo $jumkursi;?>">
                        <button class="btn btn-primary" type="submit" style="float: right;margin-top: 20px;" name="TblUpdate">Perbarui
                        </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <footer class="bg-white sticky-footer">
            <div class="container my-auto">
                <div class="text-center my-auto copyright"><span>Copyright © Brand 2019</span></div>
            </div>
        </footer>
    </div>
    <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
<script src="assets/js/script.min.js"></script>
</body>

</html>