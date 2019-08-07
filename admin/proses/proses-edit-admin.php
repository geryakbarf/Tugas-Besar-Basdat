<?php include_once "../functions.php" ?>
<?php
if(isset($_POST['TblUpdate'])){
    $db=dbConnect();
    if($db->connect_errno==0){
        $nip=$db->escape_string(trim($_POST['nip']));
        $nama=$db->escape_string(trim($_POST['nama']));
        $alamat=$db->escape_string(trim($_POST['alamat']));
        $kontak=$db->escape_string(trim($_POST['kontak']));
            $sql="UPDATE admin SET nama='$nama',alamat='$alamat',kontak='$kontak' WHERE nip='$nip'";
            $res=$db->query($sql);
            if($sql){
                if($db->affected_rows > 0){
                    header("Location: ../admin.php?halaman=1");
                }else
                    header("Location: ../admin.php?halaman=1");
            }else
                echo "Gagal Mengeksekusi Sql";
        }
    }else
        echo "Gagal Untuk Konek Ke Database";



?>
