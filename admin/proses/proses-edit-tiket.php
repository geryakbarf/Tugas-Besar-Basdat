<?php
include_once "../functions.php";
$notike = $_POST['notiket'];
$jumtiket = $_POST['jumtiket'];
$kodejadwal = $_POST['kodejadwal'];
$status = $_POST['status'];
$kursi1 = "";
$kursi2 = "";
$kursiku = "";
if (isset($_POST['TblUpdate'])) {
    $db = dbConnect();
    if ($db->connect_errno==0) {
        $sql = "UPDATE tiket SET status='$status' WHERE no_tiket='$notike'";
        $db->query($sql);
        if ($db->affected_rows > 0) {
            $sql2 = "SELECT no_kursi FROM detail_jadwal WHERE no_tiket='$notike' ORDER BY no_kursi ASC";
            $res = $db->query($sql2);
            if ($res) {
                $data = $res->fetch_all(MYSQLI_ASSOC);
                if (mysqli_num_rows($res) > 0) {
                    $res->free();
                    foreach ($data as $key) ;
                    {
                        $kursi1=$key['no_kursi'];
                    }
                    $sql3="SELECT no_kursi FROM detail_jadwal WHERE no_tiket='$notike' ORDER BY no_kursi DESC";
                    $resi=$db->query($sql3);
                    $newdata=$resi->fetch_all(MYSQLI_ASSOC);
                    $resi->free();
                    foreach ($newdata as $baru){
                        $kursi2=$baru['no_kursi'];
                    }
                } else {
                    echo "Error 0";
                }
                if ($kursi2 != $kursi1) {
                    $kursiku = $kursi1 . " dan " . $kursi2;
                } else {
                    $kursiku = $kursi1;
                }
                $sqlku = "SELECT DISTINCT tiket.email_pemesan, jadwal.rute, jadwal.tanggal_berangkat, jadwal.jam_berangkat,jadwal.armada FROM tiket JOIN detail_jadwal ON tiket.no_tiket=detail_jadwal.no_tiket JOIN jadwal ON detail_jadwal.kode_jadwal=jadwal.kode_jadwal WHERE tiket.no_tiket='$notike'";
                $resku = $db->query($sqlku);
                if (mysqli_num_rows($resku) > 0) {
                    $dataku = $resku->fetch_all(MYSQLI_ASSOC);
                    $resku->free();
                    foreach ($dataku as $new) {
                        $email = $new['email_pemesan'];
                        $rute = $new['rute'];
                        $tanggal = $new['tanggal_berangkat'];
                        $jam = $new['jam_berangkat'];
                        $armada = $new['armada'];
                    }
                    $send = sendEmailPembayaran($notike, $email, $rute, $jumtiket, $tanggal, $jam, $kursiku, $armada);
                    if ($send) {
                        header("Location: ../tiket.php?halaman=1");
                    } else
                        echo "Error 1";
                } else
                    echo "Error 2";
            } else
                echo "Error 3";
        } else
            header("Location: ../tiket.php?halaman=1");
    } else
        echo "Error 5";
}


