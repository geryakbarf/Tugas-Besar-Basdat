<?php include_once "../functions.php" ?>
<?php
$db=dbConnect();
if($db->connect_errno==0){
    $rute=$db->escape_string(trim($_GET['id']));
    $sql="DELETE FROM rute WHERE rute='$rute'";
    $res=$db->query($sql);
    if($sql){
        if($db->affected_rows > 0){
            header("Location: ../rute.php");
        }else
            echo "Gagal Menghapus Data Rute";
    }else
        echo "Gagal Mengeksekusi Sql";
}
?>
