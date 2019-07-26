<?php include_once("../functions.php");?>
<?php
session_start();
$db=dbConnect();
if($db->connect_errno==0){
    if(isset($_POST["TblLogin"])){
        $username=$db->escape_string($_POST["username"]);
        $password=$db->escape_string($_POST["password"]);
        $sql="SELECT nip,nama FROM admin
			  WHERE username='$username' and password=Password('$password')";
        $res=$db->query($sql);
        if($res){
            if($res->num_rows==1){
                $data=$res->fetch_assoc();
                $_SESSION["nama"]=$data["nama"];
                $_SESSION["nip"]=$data["nip"];
                $_SESSION["travelku.xyz"]=$data["nip"];
                header("Location: ../index.php");
            }
            else
                header("Location: ../login.php?error=1");
        }
    }
    else
        header("Location: ../login.php?error=2");
}
else
    header("Location: ../login.php?error=3");
?>