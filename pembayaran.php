<?php include_once"functions.php";?>
<?php
    session_start();
    $_SESSION['kursi1']=$_POST['kursi1'];
    $_SESSION['jam']=$_POST['jam'];
    if(isset($_POST['kursi2'])){
        $_SESSION['kursi2']=$_POST['kursi2'];
    }
    $rute=$_SESSION['rute'];
    $tanggal=$_SESSION['tanggal'];
    $jumtiket=$_SESSION['jumtiket'];
    $kodetiket=getName(5);
    $harga=getHagraTiket($rute, $_SESSION['jam'],$tanggal,$jumtiket)+getUnik();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Payment - Dian Holiday</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body>
    <?php barAtas();?>
    <main class="page payment-page">
        <section class="clean-block payment-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Pemesanan Tiket</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p>
                </div>
                <form name="f" method="post" action="proses/proses-tambah-tiket.php">
                    <div class="card-details">
                        <h3 class="title">Isi Data Diri</h3>
                        <div class="form-group"><label for="card-holder">Nama lengkap</label><input class="form-control" type="text" placeholder="Nama Lengkap Anda" name="nama" maxlength="30" required></div>
                        <div class="form-group"><label for="card-holder">Alamat Email</label><input class="form-control" type="text" placeholder="Alamat Email Aktif Anda" name="email" maxlength="30" required></div>
                        <div class="form-group"><label for="card-holder">Nomor rekening</label><input class="form-control" type="text" placeholder="Nomor Rekening Bank Anda" name="norek" maxlength="11" required></div>
                        <div class="form-group"><label for="card-holder">Nomor Kontak</label><input class="form-control" type="text" placeholder="Nomor Kontak Anda" name="nokontak" maxlength="15" required></div>
                        <input type="hidden" name="kode" value="<?php echo $kodetiket;?>">
                        <input type="hidden" name="harga" value="<?php echo $harga;?>">
                    </div>
                    <div class="products">
                        <h3 class="title">Checkout Tiket</h3>
                        <div class="item"><span class="price">Rp. <?php echo $harga;?></span>
                            <p class="item-name">Tiket <?php echo $rute;?></p>
                            <p class="item-description"><?php echo $jumtiket;?> Tiket</p>
                        </div>
                    </div><button class="btn btn-primary btn-block" type="submit">Pesan Tiket</button></form>
            </div>
        </section>
    </main>
    <footer class="page-footer dark">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h5>About us</h5>
                    <ul>
                        <li><a href="#">Company Information</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">Reviews</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Help desk</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Legal</h5>
                    <ul>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Terms of Use</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>© 2018 Copyright geryakbar.xyz</p>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>