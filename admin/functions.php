<?php

define("DEVELOPMENT", TRUE);

function dbConnect()
{
    $db = new mysqli("localhost", "root", "", "db_travel");
    return $db;
}

function sidebar()
{
    ?>
    <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
        <div class="container-fluid d-flex flex-column p-0">
            <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-bus"></i></div>
                <div class="sidebar-brand-text mx-3"><span>Dian holiday</span></div>
            </a>
            <hr class="sidebar-divider my-0">
            <ul class="nav navbar-nav text-light" id="accordionSidebar">
                <li class="nav-item" role="presentation"><a class="nav-link active" href="index.php"><i
                                class="fas fa-tachometer-alt"></i><span>Beranda</span></a></li>
                <li class="nav-item" role="presentation"><a class="nav-link active" href="jadwal.php?halaman=1"><i
                                class="far fa-list-alt"></i><span>Jadwal</span></a></li>
                <li class="nav-item" role="presentation"><a class="nav-link active" href="tiket.php?halaman=1"><i
                                class="fas fa-ticket-alt"></i><span>Tiket</span></a></li>
                <li class="nav-item" role="presentation"><a class="nav-link active" href="armada.php?halaman=1"><i
                                class="fas fa-bus-alt"></i><span>Armada</span></a></li>
                <li class="nav-item" role="presentation"><a class="nav-link active" href="pegawai.php"><i
                                class="fas fa-user-tie"></i><span>Pegawai</span></a></li>
                <li class="nav-item" role="presentation"><a class="nav-link active" href="rute.php"><i
                                class="fas fa-road"></i><span>Rute</span></a></li>
            </ul>
            <div class="text-center d-none d-md-inline">
                <button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button>
            </div>
        </div>
    </nav>
    <?php
}

function getName($n)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }

    return $randomString;
}

function topBar()
{
    ?>
    <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
        <div class="container-fluid">
            <button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i
                        class="fas fa-bars"></i></button>
            <ul class="nav navbar-nav flex-nowrap ml-auto">
                <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link"
                                                                    data-toggle="dropdown" aria-expanded="false"
                                                                    href="#"><i class="fas fa-search"></i></a>
                    <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu"
                         aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto navbar-search w-100">
                            <div class="input-group"><input class="bg-light form-control border-0 small" type="text"
                                                            placeholder="Search for ...">
                                <div class="input-group-append">
                                    <button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
                <div class="d-none d-sm-block topbar-divider"></div>
                <li class="nav-item dropdown no-arrow" role="presentation">
                <li class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown"
                                                          aria-expanded="false" href="#"><span
                                class="d-none d-lg-inline mr-2 text-gray-600 small"><?php echo $_SESSION['nama']; ?></span><img
                                class="border rounded-circle img-profile" src="assets/img/avatars/avatar1.png"></a>
                    <div
                            class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu">
                        <a class="dropdown-item" role="presentation" href="proses/proses-logout.php"><i
                                    class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a>
                    </div>
                </li>
                </li>
            </ul>
        </div>
    </nav>
    <?php
}

function getListRute()
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT * FROM rute ORDER BY rute");
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else
            return FALSE;
    } else
        return FALSE;
}

function getListAdmin($nip)
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT * FROM admin WHERE nip='$nip'");
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else
            return FALSE;
    } else
        return FALSE;
}

function editRute($id)
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT SUBSTRING_INDEX( rute, ' ', 1 ) as 'asal', SUBSTRING_INDEX( rute, ' ', -1 ) as 'tujuan', biaya FROM rute WHERE rute='$id'");
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else
            return FALSE;
    } else
        return FALSE;
}

function getListArmada()
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT * FROM armada ORDER BY plat_nomor");
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else
            return FALSE;
    } else
        return FALSE;
}

function getListSupir()
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT * FROM supir ORDER BY id_supir");
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else
            return FALSE;
    } else
        return FALSE;
}

function getListJam($tanggal, $jumtiket, $rute)
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT jam_berangkat FROM jadwal WHERE sisa_kursi>='$jumtiket' AND tanggal_berangkat='$tanggal' AND rute='$rute'");
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else
            return FALSE;
    } else
        return FALSE;
}

function getKeberangkatan()
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT COUNT(kode_jadwal) as 'jumlah' FROM jadwal WHERE tanggal_berangkat=CURDATE()");
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else
            return FALSE;
    } else
        return FALSE;
}

function getJumlahArmada()
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT COUNT(plat_nomor) as 'jumlah' FROM armada JOIN jadwal ON armada.plat_nomor=jadwal.armada WHERE tanggal_berangkat=CURDATE()");
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else
            return FALSE;
    } else
        return FALSE;
}

function getListTiketBelumBayar()
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT DISTINCT COUNT(tiket.no_tiket) as 'jumlah' FROM tiket JOIN detail_jadwal ON tiket.no_tiket=detail_jadwal.no_tiket JOIN jadwal ON jadwal.kode_jadwal=detail_jadwal.kode_jadwal WHERE tanggal_berangkat=CURDATE() AND tiket.status='Belum Dibayar'");
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else
            return FALSE;
    } else
        return FALSE;
}

function getListTiketUdahBayar()
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT DISTINCT COUNT(tiket.no_tiket) as 'jumlah' FROM tiket JOIN detail_jadwal ON tiket.no_tiket=detail_jadwal.no_tiket JOIN jadwal ON jadwal.kode_jadwal=detail_jadwal.kode_jadwal WHERE tanggal_berangkat=CURDATE() AND tiket.status='Dibayar'");
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else
            return FALSE;
    } else
        return FALSE;
}

function showError($message)
{
    ?>
    <div style="background-color:#FAEBD7;padding:10px;border:1px solid red;margin:15px 0px">
        <?php echo $message; ?>
    </div>
    <?php
}

function getAsal()
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT DISTINCT SUBSTRING_INDEX( rute, ' ', 1 ) as 'asal' FROM rute");
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else
            return FALSE;
    } else
        return FALSE;
}

function sendEmailPembayaran($kodetiket, $email, $rute, $jumlahtiket, $tanggal, $jam, $kursi, $armada)
{
    require 'PHPMailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;

// Konfigurasi SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'dianholidaytravel@gmail.com';
    $mail->Password = '089613635834';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('dianholidaytravel@gmail.com', 'Dian Holiday');
    $mail->addReplyTo('dianholidaytravel@gmail.com', 'Dian Holiday');

// Menambahkan penerima
    $mail->addAddress($email);

// Menambahkan beberapa penerima
//$mail->addAddress('penerima2@contoh.com');
//$mail->addAddress('penerima3@contoh.com');

// Subjek email
    $mail->Subject = 'E-Ticket Travel Dian Holiday';

// Mengatur format email ke HTML
    $mail->isHTML(true);

// Konten/isi email
    $mailContent = "<h1>Pelanggan Yang Terhormat...</h1>
    <p>Pembayaran berhasil dilakukan, anda mendapatkan e-ticket untuk pemberangkatan : </p>
    <p>Tanggal Berangkat : " . $tanggal . " Pukul " . $jam . "</p>
    <p>Rute Travel : " . $rute . "</p>
    <p>Kode Tiket : " . $kodetiket . "</p>
    <p>Jumlah Tiket : " . $jumlahtiket . " Tiket</p>
    <p>No Kursi : " . $kursi . "</p>
    <p>Armada Travel : " . $armada . "</p>
    <p>Simpan baik - baik e-ticket ini sebagai bukti pembayaran. Dimohon untuk datang tepat waktu :)<br><br>";
    $mail->Body = $mailContent;


// Kirim email
    if (!$mail->send()) {
        echo 'Pesan tidak dapat dikirim.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        return FALSE;
    } else {
        echo 'Pesan telah terkirim';
        RETURN TRUE;
    }
}

function getUnik()
{
    $randomString = rand(0, 999);


    return $randomString;
}

function getHagraTiket($rute, $jam, $tanggal, $jumtiket)
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT biaya*'$jumtiket' as harga FROM rute JOIN jadwal ON rute.rute=jadwal.rute WHERE jadwal.tanggal_berangkat='$tanggal' AND jadwal.jam_berangkat='$jam' AND jadwal.rute='$rute' ");
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            foreach ($data as $new) {
                $harga = $new['harga'];
            }
            return $harga;
        } else
            return FALSE;
    } else
        return FALSE;
}

function getDataTiket($notiket)
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("select DISTINCT tiket.no_rekening, tiket.total_biaya, jadwal.kode_jadwal FROM tiket JOIN detail_jadwal ON tiket.no_tiket=detail_jadwal.no_tiket JOIN jadwal ON jadwal.kode_jadwal=detail_jadwal.kode_jadwal WHERE tiket.no_tiket='$notiket'");
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else
            return FALSE;
    } else
        return FALSE;
}

function getListJadwal($kodejadwal){
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT jadwal.kode_jadwal, jadwal.tanggal_berangkat, jadwal.jam_berangkat, jadwal.rute, jadwal.armada, supir.id_supir, jadwal.sisa_kursi, jadwal.status 
                                                                FROM jadwal JOIN supir ON jadwal.supir=supir.id_supir WHERE jadwal.kode_jadwal='$kodejadwal'");
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else
            return FALSE;
    } else
        return FALSE;
}

?>