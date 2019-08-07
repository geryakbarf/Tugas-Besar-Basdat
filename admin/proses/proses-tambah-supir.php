<?php include_once "../functions.php" ?>
<?php
if(isset($_POST['TblSimpan'])){
    $db=dbConnect();
    if($db->connect_errno==0){
        $id=$db->escape_string(trim($_POST['id']));
        $nama=$db->escape_string(trim($_POST['nama']));
        $alamat=$db->escape_string(trim($_POST['alamat']));
        $kontak=$db->escape_string(trim($_POST['kontak']));

            $sql="INSERT INTO supir VALUES ('$id','$nama','$alamat','$kontak')";
            $res=$db->query($sql);
            if($sql){
                if($db->affected_rows > 0){
                    header("Location: ../supir.php?halaman=1");
                }else
                    echo "Gagal Menyimpan Data Supir";
            }else
                echo "Gagal Mengeksekusi Sql";
        }
    }else
        echo "Gagal Untuk Konek Ke Database";


?>