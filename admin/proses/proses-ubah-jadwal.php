<?php include_once "../functions.php" ?>
<?php
if(isset($_POST['TblUpdate'])){
    $db=dbConnect();
    if($db->connect_errno==0){
        $kode=$db->escape_string(trim($_POST['kode']));
        $supir=$db->escape_string(trim($_POST['supir']));
        $status=$db->escape_string(trim($_POST['status']));
            $sql="UPDATE jadwal SET supir='$supir', status='$status' WHERE kode_jadwal='$kode'";
            $res=$db->query($sql);
            if($sql){
                if($db->affected_rows > 0){
                    header("Location: ../jadwal.php?halaman=1");
                }else
                    header("Location: ../jadwal.php?halaman=1");
            }else
                echo "Gagal Mengeksekusi Sql";
        }
    }else
        echo "Gagal Untuk Konek Ke Database";



?>
