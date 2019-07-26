<?php include_once "../functions.php" ?>
<?php
if(isset($_POST['TblSimpan'])){
    $db=dbConnect();
    if($db->connect_errno==0){
        $plat=$db->escape_string(trim($_POST['plat']));
        $tipe=$db->escape_string(trim($_POST['tipe']));
        $kursi=$db->escape_string(trim($_POST['kursi']));
        //Pengecekan Apakah Rute Sudah Ditambahkan
        $sqlCheck="SELECT * FROM armada WHERE plat_nomor='$plat'";
        $hasil=$db->query($sqlCheck);
        if(mysqli_num_rows($hasil)>0){
            echo "Data Armada Telah Ada!";
        }else{
            $sql="INSERT INTO armada VALUES ('$plat','$tipe','$kursi')";
            $res=$db->query($sql);
            if($sql){
                if($db->affected_rows > 0){
                    header("Location: ../armada.php?halaman=1");
                }else
                    echo "Gagal Menyimpan Data Armada";
            }else
                echo "Gagal Mengeksekusi Sql";
        }
    }else
        echo "Gagal Untuk Konek Ke Database";
}


?>