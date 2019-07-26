<?php
include_once"../functions.php";


if(!isset($_GET["rute"])){
    $respon["status"]="ERROR";
    $respon["keterangan"]="Parameter Rute harus ada.";
}
else{
    $db=dbConnect();
    $rute=$db->escape_string($_GET['rute']);
    $sql="SELECT tanggal_berangkat,(SELECT tanggal_berangkat FROM jadwal WHERE rute='$rute' AND sisa_kursi>0 AND status='Belum Selesai' ORDER BY  tanggal_berangkat ASC LIMIT 1) as min FROM jadwal WHERE rute='$rute' AND sisa_kursi>0 AND status='Belum Selesai' ORDER BY  tanggal_berangkat DESC LIMIT 1";
    $res=$db->query($sql);
    if(mysqli_num_rows($res)>0){
    $data=$res->fetch_all(MYSQLI_ASSOC);
    $respon["status"]="OK";
    foreach ($data as $new){
    $respon["data"]=$new['tanggal_berangkat'];
    $respon["min"]=$new['min'];
    }
    }else{
        $respon["status"]="ERROR";
        $respon["keterangan"]="Jadwal Travel Belum Tersedia!.";
    }

}
echo json_encode($respon);
?>


