<?php
include_once"../functions.php";


if(!isset($_GET["tanggal"])){
    $respon["status"]="ERROR";
    $respon["keterangan"]="Parameter Tanggal harus ada.";
}
else{
    $db=dbConnect();
    $tanggal=$db->escape_string($_GET['tanggal']);
    $sql="SELECT tanggal_berangkat FROM jadwal WHERE tanggal_berangkat='$tanggal' AND status='Belum Selesai' AND sisa_kursi>0";
    $res=$db->query($sql);
    if(mysqli_num_rows($res)>0){
        $respon["status"]="OK";

    }else{
        $respon["status"]="ERROR";
    }

}
echo json_encode($respon);
?>


