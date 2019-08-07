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
    <title>Table - Brand</title>
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
                <h3 class="text-dark mb-4">Data Rute<a href="tambah-rute.php"><button class="btn btn-primary" type="button" style="margin-bottom: 10px;float: right;">Tambah Data</button></a></h3>
                <div class="card shadow">
                    <div class="card-body">

                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table dataTable my-0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Rute</th>
                                        <th>Biaya</th>
                                        <th>Pilihan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $datarute=getListRute();
                                    foreach ($datarute as $data){
                                        ?>
                                        <tr>
                                            <td><?php echo $data["rute"];?></td>
                                            <td><?php echo $data["biaya"];?></td>
                                            <td><a href="edit-rute.php?id=<?php echo $data["rute"];?>">Edit</a> | <a href="proses/proses-hapus-rute.php?id=<?php echo $data["rute"];?>">Hapus</a></td>
                                        </tr>
                                <?php
                                    }
                                ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td><strong></strong></td>
                                        <td><strong></strong></td>
                                        <td><strong></strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <footer class="bg-white sticky-footer">
            <div class="container my-auto">
                <div class="text-center my-auto copyright"><span>Copyright © Dian Holiday 2019</span></div>
            </div>
        </footer>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>