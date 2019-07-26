<?php include_once "../functions.php" ?>
<?php
$db=dbConnect();
if($db->connect_errno==0){
    $id=$db->escape_string(trim($_GET['id']));
    $sql="DELETE FROM armada WHERE plat_nomor='$id'";
    $res=$db->query($sql);
    if($sql){
        if($db->affected_rows > 0){
            header("Location: ../armada.php?halaman=1");
        }else
            echo "Gagal Menghapus Data Armada";
    }else
        echo "Gagal Mengeksekusi Sql";
}
?>
