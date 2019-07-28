<?php
include_once"../functions.php";
session_start();
//Deklarasi
$rute=$_SESSION['rute'];
$tanggal=$_SESSION['tanggal'];
$harga=$_POST['harga'];
$kode=$_POST['kode'];
$nama=$_POST['nama'];
$email=$_POST['email'];
$nokontak=$_POST['nokontak'];
$kursi1=$_SESSION['kursi1'];
$jam=$_SESSION['jam'];
$jumtiket=$_SESSION['jumtiket'];
$kursiku=$kursi1;
if(isset($_SESSION['kursi2'])){
    $kursi2=$_SESSION['kursi2'];
    $kursiku=$kursi1." dan ".$kursi2;
}
//GET Kode Jadwal Dahulu
$db=dbConnect();
if($db->connect_errno==0){
    $sql="SELECT kode_jadwal,armada FROM jadwal WHERE jam_berangkat='$jam' AND tanggal_berangkat='$tanggal' AND rute='$rute'";
    $res=$db->query($sql);
    if($res){
        $data = $res->fetch_all(MYSQLI_ASSOC);
        $res->free();
        foreach ($data as $new){
            $kodejadwal=$new['kode_jadwal'];
            $armada=$new['armada'];
        }
        $sql1="INSERT INTO tiket VALUES ('$kode','$jumtiket','$harga',DATE_ADD(now(), INTERVAL 3 HOUR),'$nama','$email','-','$nokontak','Dibayar')";
        $res1=$db->query($sql1);
        if($db->affected_rows>0){
            $sql2="INSERT INTO detail_jadwal VALUES ('$kode','$kodejadwal','$kursi1')";
            $resfinal=$db->query($sql2);
            $sqlku="UPDATE jadwal SET sisa_kursi=sisa_kursi-'$jumtiket' WHERE kode_jadwal='$kodejadwal'";
            $resku=$db->query($sqlku);
            if(isset($_SESSION['kursi2'])){
                $sql3="INSERT INTO detail_jadwal VALUES ('$kode','$kodejadwal','$kursi2')";
                $db->query($sql3);
            }
            if($resfinal){
                if($db->affected_rows>0){
                    //Proses Mengirim Email
                    $kirim=sendEmailPembayaran($kode,$email,$rute,$jumtiket,$tanggal,$jam,$kursiku,$armada);
                    if($kirim){
                        $_SESSION['rute']="";
                        $_SESSION['tanggal']="";
                        $_SESSION['kursi2']="";
                        $_SESSION['kursi1']="";
                        $_SESSION['jam']="";
                        $_SESSION['jumtiket']="";
                        header("Location: ../tiket.php");
                    }else
                        echo "Terjadi Kesalahan";
                }else
                    echo "Terjadi Kesalahan Saat Insert Data Tiket1";
            }else
                echo "Terjadi Kesalahan Saat Insert Data Tiket2";
        }else
            echo "Terjadi Kesalahan Saat Insert Data Tiket3";
    }else
        echo "Terjadi Kesalahan Saat Mengambil Data Jadwal";

}else
    echo "Tidak bisa konek ke database";