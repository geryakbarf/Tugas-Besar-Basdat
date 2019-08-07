<?php include_once "../functions.php" ?>
<?php
$db=dbConnect();
if($db->connect_errno==0){
    $notiket=$db->escape_string(trim($_GET['tiket']));
    $jumtiket=$db->escape_string(trim($_GET['jum']));
    $sql="DELETE FROM tiket WHERE no_tiket='$notiket'";
    $kodejadwal="";
    $res=$db->query($sql);
    if($sql){
        if($db->affected_rows > 0){
            $data = getDataTiket($notiket);
            foreach ($data as $new) {
                $kodejadwal = $new['kode_jadwal'];
            }
            $sqlku="UPDATE jadwal SET sisa_kursi=sisa_kursi+'$jumtiket' WHERE kode_jadwal='$kodejadwal'";
            $db->query($sqlku);
            if($db->affected_rows>0){
            header("Location: ../rute.php");
            }
        }else
            echo "Gagal Menghapus Data Tiket";
    }else
        echo "Gagal Mengeksekusi Sql";
}
?>
