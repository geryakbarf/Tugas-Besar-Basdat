<?php include_once "../functions.php" ?>
<?php
if(isset($_POST['TblSimpan'])){
    $db=dbConnect();
    if($db->connect_errno==0){
        $nama=$db->escape_string(trim($_POST['nama']));
        $nip=$db->escape_string(trim($_POST['nip']));
        $alamat=$db->escape_string(trim($_POST['alamat']));
        $kontak=$db->escape_string(trim($_POST['kontak']));
        $username=$db->escape_string(trim($_POST['username']));
        $password=$db->escape_string(trim($_POST['password']));

            $sql="INSERT INTO admin VALUES ('$nip','$nama','$alamat','$kontak','$username',PASSWORD('$password'))";
            $res=$db->query($sql);
            if($sql){
                if($db->affected_rows > 0){
                    header("Location: ../admin.php?halaman=1");
                }else
                    echo "Gagal Menyimpan Data Admin";
            }else
                echo "Gagal Mengeksekusi Sql";
        }
    }else
        echo "Gagal Untuk Konek Ke Database";


?>