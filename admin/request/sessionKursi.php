<?php
include_once"../functions.php";
session_start();
$respon=array();
if(!isset($_GET["jam"])){
    $respon["status"]="ERROR";
    $respon["keterangan"]="Parameter Jam harus ada.";
}
else{
    $db=dbConnect();
    $tanggal=$db->escape_string($_SESSION['tanggal']);
    $jam=$db->escape_string($_GET['jam']);
    $kursi=$db->escape_string($_GET['kursi']);
    $rute=$db->escape_string($_SESSION['rute']);
    $sql="SELECT * FROM (select 1 x union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8) A WHERE (NOT EXISTS (SELECT detail_jadwal.no_kursi FROM detail_jadwal JOIN jadwal ON detail_jadwal.kode_jadwal=jadwal.kode_jadwal WHERE tanggal_berangkat='$tanggal' AND jam_berangkat='$jam' AND rute='$rute')
            or x<>(SELECT detail_jadwal.no_kursi FROM detail_jadwal JOIN jadwal ON detail_jadwal.kode_jadwal=jadwal.kode_jadwal WHERE tanggal_berangkat='$tanggal' AND jam_berangkat='$jam' AND rute='$rute')) AND x<>'$kursi'";
    $res=$db->query($sql);
    if(mysqli_num_rows($res)>0){
        $data=$res->fetch_all(MYSQLI_ASSOC);
        $respon["status"]="OK";
        $respon["data"]=$data;
    }else {
        $respon["status"] = "ERROR";
    }
}
echo json_encode($respon);
?>