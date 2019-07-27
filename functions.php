<?php
define("DEVELOPMENT", TRUE);

function dbConnect(){
    $db = new mysqli("localhost", "root", "", "db_travel");
    return $db;
}

function getAsal(){
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

function getListJam($tanggal,$jumtiket,$rute){
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

?>