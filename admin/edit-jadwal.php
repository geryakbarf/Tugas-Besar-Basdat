<?php include_once "functions.php" ?>
<?php
session_start();
if (!isset($_SESSION["travelku.xyz"]))
    header("Location: login.php");
$kodejadwal = $_GET['id'];
$datajadwal = getListJadwal($kodejadwal);
foreach ($datajadwal as $data) {
    $tanggal = $data['tanggal_berangkat'];
    $jam = $data['jam_berangkat'];
    $rute = $data['rute'];
    $idsupir = $data['id_supir'];
    $armada = $data['armada'];
    $status = $data['status'];
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Edit Jadwal</title>
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
                <h3 class="text-dark mb-1">Perbarui Jadwal</h3>
                <div class="card" style="margin-top: 20px;">
                    <div class="card-body">
                        <form name="f" method="post" action="proses/proses-ubah-jadwal.php">
                        <div class="input-group" style="margin-top: 20px">
                            <div class="input-group-prepend"><span class="input-group-text">Kode Jadwal</span></div>
                            <input class="form-control" type="text" value="<?php echo $kodejadwal; ?>" readonly>
                            <div class="input-group-append"></div>
                        </div>
                        <div class="row">
                            <div class="col" style="margin-top: 20px;">
                                <h1 style="font-size: 16px;">Tanggal Berangkat</h1><input type="date" readonly
                                                                                          value="<?php echo $tanggal; ?>">
                            </div>
                            <div class="col" style="margin-top: 20px;">
                                <h1 style="font-size: 16px;">Jam Berangkat</h1><input type="time" readonly
                                                                                      value="<?php echo $jam; ?>"></div>
                        </div>
                        <div class="input-group" style="margin-top: 20px">
                            <div class="input-group-prepend"><span class="input-group-text">Rute</span></div>
                            <input class="form-control" type="text" readonly value="<?php echo $rute; ?>">
                            <div class="input-group-append"></div>
                        </div>

                            <div class="field" style="margin-bottom: 0px;margin-top: 20px;"><select
                                        class="form-control" name="supir">
                                    <optgroup label="Pilih Supir">
                                        <?php
                                            $datasupir =getListSupir();
                                            foreach ($datasupir as $data){
                                                if($data['id_supir']==$idsupir){
                                                    ?>
                                                    <option selected='selected' value="<?php echo $data['id_supir'];?>"><?php echo $data['nama'];?></option>
                                        <?php
                                                }else{
                                                    ?>
                                                    <option value="<?php echo $data['id_supir'];?>"><?php echo $data['nama'];?></option>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </optgroup>
                                </select>
                                <label
                                        class="mb-0" for="float-input">Supir</label>
                            </div>

                        <div class="input-group" style="margin-top: 20px">
                            <div class="input-group-prepend"><span class="input-group-text">Armada</span></div>
                            <input class="form-control" type="text" readonly value="<?php echo $armada; ?>">
                            <div class="input-group-append"></div>
                        </div>

                            <div class="field" style="margin-bottom: 0px;margin-top: 20px;"><select
                                        class="form-control" name="status">
                                    <optgroup label="This is a group">
                                        <?php
                                            if($status=='Selesai'){
                                                ?>
                                                <option value="Belum Selesai">Belum Selesai</option>
                                                <option selected='selected' value="Selesai">Selesai</option>
                                                <?php
                                            }else{
                                                ?>
                                                <option selected='selected' value="Belum Selesai">Belum Selesai</option>
                                                <option value="Selesai">Selesai</option>
                                                <?php
                                            }

                                        ?>
                                    </optgroup>
                                </select>
                                <label
                                        class="mb-0" for="float-input">Status</label>
                            </div>
                        <input type="hidden" name="kode" value="<?php echo $kodejadwal;?>">
                        <button class="btn btn-primary" type="submit" name="TblUpdate" style="float: right;margin-top: 20px;">Perbarui
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