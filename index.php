<?php include_once"functions.php"?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Dian Holiday</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body>
    <?php barAtas(); ?>
    <main class="page landing-page">
        <section class="clean-block clean-hero" style="background-image:url(&quot;assets/img/armada/bg.jpeg&quot;);color:rgba(9, 162, 255, 0.85);">
            <div class="text">
                <h2>Travel Nyaman Bersama Dian Holiday</h2>
                <p>Ingin Travel ke luar Bandung dengan cepat dan nyaman ? Segera pesan tiket Travel di Dian Holiday sekarang juga !</p><a href="travel.php"><button class="btn btn-outline-light btn-lg" type="button">Pesan Tiket Sekarang</button></a></div>
        </section>
        <section class="clean-block clean-info dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Armada Bersih dan Nyaman</h2>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-6"><img class="img-thumbnail" src="assets/img/armada/1.jpg"></div>
                    <div class="col-md-6">
                        <h3>Semua Armada Dian Holiday Bersih dan Nyaman!</h3>
                        <div class="getting-started-info">
                            <p>Kami selalu menjaga kebersihan armadi kami, demi kenyamanan dan kepuasan para pelanggan kami !<br><br></p>
                        </div><a href="travel.php"> <button class="btn btn-outline-primary btn-lg" type="button">Pesan Tiket Sekarang</button></a></div>
                </div>
            </div>
        </section>
        <section class="clean-block features">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Keunggulan Dian Holiday</h2>
                    <p>Kenapa Anda Harus Memilih Dian Holiday ?</p>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-5 feature-box"><i class="fas fa-shipping-fast icon"></i>
                        <h4>Perjalanan Cepat dan Nyaman</h4>
                        <p>Dengan supir yang berpengalaman, perjalanan menjadi cepat dan nyaman.</p>
                    </div>
                    <div class="col-md-5 feature-box"><i class="fas fa-bus icon"></i>
                        <h4>Fasilitas Lengkap</h4>
                        <p>Fasilitas di Armada kami lengkap ! Bahkan kami memiliki free wifi disetiap armada!</p>
                    </div>
                    <div class="col-md-5 feature-box"><i class="icon-screen-smartphone icon"></i>
                        <h4>Pemesanan Tiket Mudah</h4>
                        <p>Pelanggan dapat memesan pemesanan tiket secara Online dan Offline!</p>
                    </div>
                    <div class="col-md-5 feature-box"><i class="far fa-calendar-check icon"></i>
                        <h4>Pasti Tepat Waktu</h4>
                        <p>Kami selalu mengedepankan ketepatan waktu.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="clean-block slider dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Galeri Armada</h2>
                </div>
                <div class="carousel slide" data-ride="carousel" id="carousel-1">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active"><img class="w-100 d-block" src="assets/img/armada/3.jpg" alt="Slide Image"></div>
                        <div class="carousel-item"><img class="w-100 d-block" src="assets/img/armada/2.jpg" alt="Slide Image"></div>
                        <div class="carousel-item"><img class="w-100 d-block" src="assets/img/armada/1.jpg" alt="Slide Image"></div>
                    </div>
                    <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button"
                            data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-1" data-slide-to="1"></li>
                        <li data-target="#carousel-1" data-slide-to="2"></li>
                    </ol>
                </div>
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
            <p>© 2019 Copyright Dian Holiday</p>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>