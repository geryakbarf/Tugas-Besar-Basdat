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
        <?php sidebar();?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <?php topBar();?>
            <div class="container-fluid">
                <h3 class="text-dark mb-4">Data Admin<a href="tambah-admin.php"><button class="btn btn-primary" type="button" style="margin-bottom: 10px;float: right;">Tambah Data</button></a> </h3>
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col"></div>
                            <div class="col-md-6">
                                <div class="text-md-right dataTables_filter" id="dataTable_filter"><label><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                            </div>
                        </div>
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table dataTable my-0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Nip</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Kontak</th>
                                        <th>Username</th>
                                        <th>Pilihan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $db = dbConnect();
                                $batas = 10;
                                $halaman = $_GET['halaman'];
                                if (empty($halaman)) {
                                    $posisi = 0;
                                    $halaman = 1;
                                } else {
                                    $posisi = ($halaman - 1) * $batas;
                                }
                                if ($db->connect_errno == 0) {
                                $res = $db->query("SELECT * FROM admin LIMIT $posisi,$batas ");
                                if ($res) {
                                $jmldata    = mysqli_num_rows($res);
                                $jmlhalaman = ceil($jmldata/$batas);
                                $datajadwal = $res->fetch_all(MYSQLI_ASSOC);
                                foreach ($datajadwal as $data) {
                                ?>
                                    <tr>
                                        <td><?php echo $data['nip']; ?></td>
                                    <td><?php echo $data['nama']; ?></td>
                                    <td><?php echo $data['alamat']; ?></td>
                                    <td><?php echo $data['kontak']; ?></td>
                                    <td><?php echo $data['username']; ?></td>
                                    <td><a href="edit-admin.php?id=<?php echo $data['nip']; ?>">Edit</a> </td>
                                </tr>
                                    <?php
                                }
                                }
                                }
                                ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td><strong></strong></td>
                                        <td><strong></strong></td>
                                        <td><strong></strong></td>
                                        <td><strong></strong></td>
                                        <td><strong></strong></td>
                                        <td><strong></strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-6 align-self-center">
                                <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Halaman
                                    <?php echo $halaman?></p>
                            </div>
                            <div class="col-md-6">
                                <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                    <ul class="pagination">
                                        <?php
                                        for($i=1;$i<=$jmlhalaman;$i++)
                                            if ($i != $halaman){
                                                ?>
                                                <li class="page-item"><a class="page-link" href="admin.php?halaman=<?php echo $i?>"><?php echo $i?></a></li>
                                                <?php
                                            }
                                            else{
                                                ?>
                                                <li class="page-item active"><a class="page-link"><?php echo $i?></a></li>
                                                <?php
                                            }
                                        ?>
                                    </ul>
                                </nav>
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