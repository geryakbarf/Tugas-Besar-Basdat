<?php

include_once "../functions.php";

if(isset($_POST['TblSimpan'])){
    $db=dbConnect();
    if($db->connect_errno==0){
        $kode=$db->escape_string(trim($_POST['kode']));
        $tanggal=$db->escape_string(trim($_POST['tanggal']));
        $jam=$db->escape_string(trim($_POST['jam']));
        $rute=$db->escape_string(trim($_POST['rute']));
        $supir=$db->escape_string(trim($_POST['supir']));
        $armada=$db->escape_string(trim($_POST['armada']));
        $status='Belum Selesai';
        //Pengecekan Apakah Rute Sudah Ditambahkan
            $sql="INSERT INTO jadwal VALUES ('$kode','$tanggal','$jam','$rute','$supir','$armada',8,'$status','10149')";
            $res=$db->query($sql);
            if($sql){
                if($db->affected_rows > 0){
                    header("Location: ../jadwal.php?halaman=1");
                }else
                    echo "Gagal Menyimpan Data Jadwal";
            }else
                echo "Gagal Mengeksekusi Sql";
        }
}

?>
