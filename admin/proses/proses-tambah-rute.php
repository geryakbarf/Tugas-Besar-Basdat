<?php include_once "../functions.php" ?>
<?php
if(isset($_POST['TblSimpan'])){
    $db=dbConnect();
    if($db->connect_errno==0){
        $asal=$db->escape_string(trim($_POST['asal']));
        $tujuan=$db->escape_string(trim($_POST['tujuan']));
        $biaya=$db->escape_string(trim($_POST['harga']));
        $rute=$asal." - ".$tujuan;
        //Pengecekan Apakah Rute Sudah Ditambahkan
        $sqlCheck="SELECT * FROM rute WHERE rute='$rute'";
        $hasil=$db->query($sqlCheck);
        if(mysqli_num_rows($hasil)>0){
            echo "Data Rute Telah Ada!";
        }else{
            $sql="INSERT INTO rute VALUES ('$rute','$biaya')";
            $res=$db->query($sql);
            if($sql){
                if($db->affected_rows > 0){
                    header("Location: ../rute.php");
                }else
                    echo "Gagal Menyimpan Data Rute";
            }else
                echo "Gagal Mengeksekusi Sql";
        }
    }else
        echo "Gagal Untuk Konek Ke Database";
}


?>