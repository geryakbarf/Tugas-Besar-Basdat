<?php
include_once"../functions.php";

$respon=array();
if(!isset($_GET["asal"])){
    $respon["status"]="ERROR";
    $respon["keterangan"]="Parameter Kota Asal harus ada.";
}
else{
        $db=dbConnect();
        $asal=$db->escape_string($_GET['asal']);
        $sql="SELECT DISTINCT SUBSTRING_INDEX( rute, ' ', -1 ) as 'tujuan' FROM rute WHERE SUBSTRING_INDEX( rute, ' ', 1 )='$asal'";
        $res=$db->query($sql);
        $data=$res->fetch_all(MYSQLI_ASSOC);
        $respon["status"]="OK";
        $respon["data"]=$data;

}
echo json_encode($respon);
?>


