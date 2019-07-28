<?php
define("DEVELOPMENT", TRUE);

function dbConnect(){
    $db = new mysqli("localhost", "root", "", "db_travel");
    return $db;
}

function getAsal(){
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT DISTINCT SUBSTRING_INDEX( rute, ' ', 1 ) as 'asal' FROM rute");
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else
            return FALSE;
    } else
        return FALSE;
}

function getListJam($tanggal,$jumtiket,$rute){
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT jam_berangkat FROM jadwal WHERE sisa_kursi>='$jumtiket' AND tanggal_berangkat='$tanggal' AND rute='$rute'");
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else
            return FALSE;
    } else
        return FALSE;
}

function sendEmailPembayaran($email,$rute,$jumlahtiket,$tanggal,$jam,$harga,$batas){
    require 'PHPMailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;

// Konfigurasi SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'dianholidaytravel@gmail.com';
    $mail->Password = '089613635834';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('dianholidaytravel@gmail.com', 'Dian Holiday');
    $mail->addReplyTo('dianholidaytravel@gmail.com', 'Dian Holiday');

// Menambahkan penerima
    $mail->addAddress($email);

// Menambahkan beberapa penerima
//$mail->addAddress('penerima2@contoh.com');
//$mail->addAddress('penerima3@contoh.com');

// Subjek email
    $mail->Subject = 'Pembayaran Tiket Travel';

// Mengatur format email ke HTML
    $mail->isHTML(true);

// Konten/isi email
    $mailContent = "<h1>Pelanggan Yang Terhormat...</h1>
    <p>Harap Lakukan Pembayarn Untuk Tiket :</p>
    <p>Rute Travel : ".$rute."</p>
    <p>Tanggal Berangkat : ".$tanggal." Pukul ".$jam."</p>
    <p>Jumlah Tiket : ".$jumlahtiket." Tiket</p>
    <p>Total Bayar : ".$harga."</p>
    <p>Silahkan bayar sebelum tanggal ".$batas."<br><br> Pembayaran Dapat Dilakukan Melalui :<br>
    - Rekening BNI (057470881) Atas Nama Akbar De Bruyne<br><br>
    - Rekening BCA ()10117049) Atas Nama Akbar Fauzi";
    $mail->Body = $mailContent;


// Kirim email
    if(!$mail->send()){
        echo 'Pesan tidak dapat dikirim.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        return FALSE;
    }else{
        echo 'Pesan telah terkirim';
        RETURN TRUE;
    }
}

function getName($n)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }

    return date("m-d")."-".$randomString;
}
function getUnik()
{
    $randomString = rand(0,999);



    return $randomString;
}

function getHagraTiket($rute,$jam,$tanggal,$jumtiket){
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT biaya*'$jumtiket' as harga FROM rute JOIN jadwal ON rute.rute=jadwal.rute WHERE jadwal.tanggal_berangkat='$tanggal' AND jadwal.jam_berangkat='$jam' AND jadwal.rute='$rute' ");
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            foreach ($data as $new){
                $harga=$new['harga'];
            }
            return $harga;
        } else
            return FALSE;
    } else
        return FALSE;
}



?>