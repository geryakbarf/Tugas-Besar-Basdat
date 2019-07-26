<?php include_once "functions.php" ?>
<?php
session_start();
if (!isset($_SESSION["travelku.xyz"]))
    header("Location: login.php");
?>
<?php
$id = getName(5);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Tambah Jadwal</title>
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
                <h3 class="text-dark mb-1">Tambah Jadwal</h3>
                <div class="card" style="margin-top: 20px;">
                    <div class="card-body">
                        <form name="f" method="post" action="proses/proses-tambah-jadwal.php">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">Kode Jadwal</span></div>
                            <input class="form-control" value="<?php echo $id; ?>" name="kode" type="text" readonly>
                            <div class="input-group-append"></div>
                        </div>
                        <div class="row">
                            <div class="col" style="margin-top: 20px;">
                                <h1 style="font-size: 16px;">Tanggal Berangkat</h1><input type="date" name="tanggal"
                                                                                          required></div>
                            <div class="col" style="margin-top: 20px;">
                                <h1 style="font-size: 16px;">Jam Berangkat</h1><input type="time" name="jam" required>
                            </div>
                        </div>

                            <div class="field" style="margin-bottom: 0px;margin-top: 20px;"><select
                                        class="form-control" name="rute">
                                    <optgroup label="Pilih Rute Travel">
                                        <?php
                                            $rute=getListRute();
                                            foreach ($rute as $data){
                                                ?>
                                                <option value="<?php echo $data['rute']; ?>"><?php echo $data['rute']; ?></option>
                                        <?php
                                            }
                                        ?>
                                    </optgroup>
                                </select>
                                <label
                                        class="mb-0" for="float-input">Rute</label>
                            </div>

                            <div class="field" style="margin-bottom: 0px;margin-top: 20px;"><select
                                        class="form-control" name="supir">
                                    <optgroup label="Pilih Supir">
                                        <?php
                                        $supir=getListSupir();
                                        foreach ($supir as $data){
                                            ?>
                                            <option value="<?php echo $data['id_supir']; ?>"><?php echo $data['nama']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </optgroup>
                                </select>
                                <label
                                        class="mb-0" for="float-input">Supir</label>
                            </div>

                            <div class="field" style="margin-bottom: 0px;margin-top: 20px;"><select
                                        class="form-control" name="armada">
                                    <optgroup label="Pilih Armada">
                                        <?php
                                        $armada=getListArmada();
                                        foreach ($armada as $data){
                                            ?>
                                            <option value="<?php echo $data['plat_nomor']; ?>"><?php echo $data['plat_nomor']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </optgroup>
                                </select>
                                <label
                                        class="mb-0" for="float-input">Armada</label>
                            </div>

                        <button class="btn btn-primary" type="submit" name="TblSimpan" style="float: right;margin-top: 20px;">Simpan
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