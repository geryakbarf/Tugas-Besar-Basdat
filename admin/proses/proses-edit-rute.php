<?php include_once "../functions.php" ?>
<?php
if(isset($_POST['TblUpdate'])){
    $db=dbConnect();
    if($db->connect_errno==0){
        $rute=$db->escape_string(trim($_POST['rute']));
        $biaya=$db->escape_string(trim($_POST['harga']));
            $sql="UPDATE rute SET biaya='$biaya' WHERE rute='$rute'";
            $res=$db->query($sql);
            if($sql){
                if($db->affected_rows > 0){
                    header("Location: ../rute.php?halaman=1");
                }else
                    header("Location: ../rute.php?halaman=1");
            }else
                echo "Gagal Mengeksekusi Sql";
        }
    }else
        echo "Gagal Untuk Konek Ke Database";



?>
