<?php include_once "functions.php" ?>
<?php
session_start();
if (!isset($_SESSION["travelku.xyz"]))
    header("Location: login.php");

if (isset($_SESSION["tanggal"])) {
    $_SESSION["tanggal"] = "";
    $_SESSION["rute"] = "";
    $_SESSION["jumtiket"] = "";
}
$_SESSION["tanggal"] = $_POST["tanggal"];
$_SESSION["rute"] = $_POST["asal"] . " - " . $_POST["tujuan"];
$_SESSION["jumtiket"] = $_POST["jumtiket"];

$datajam = getListJam($_SESSION["tanggal"], $_SESSION["jumtiket"], $_SESSION["rute"]);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Blank Page - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body id="page-top">
<div id="wrapper">
    <?php sidebar(); ?>
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <?php topBar(); ?>
            <div class="container-fluid">
                <h3 class="text-dark mb-1">Pilih Jam Keberangkatan</h3>
                <div class="card clean-testimonial-item border-0 rounded-0"
                     style="margin-left: 50px;margin-right: 50px;margin-top: 20px;">
                    <div class="card-body">
                        <div class="row" style="margin-top: 20px;">
                            <div class="col">
                                <div class="field"><select class="form-control" name="jam" id="jam">
                                        <option value="0">Pilih Jam Keberangkatan</option>
                                        <?php $datajam = getListJam($_SESSION['tanggal'], $_SESSION['jumtiket'], $_SESSION['rute']);
                                        foreach ($datajam as $data) {
                                            ?>
                                            <option value="<?php echo $data['jam_berangkat']; ?>"><?php echo $data['jam_berangkat']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <label
                                            class="mb-0" for="float-input">Pilih Jam Keberangkatan</label>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="armada" style="margin-top: 20px;height: 530px;">
                            <div class="col">
                                <?php
                                if ($_SESSION['jumtiket'] > 1) {
                                    for ($i = 1; $i <= $_SESSION['jumtiket']; $i++) {
                                        ?>
                                        <div class="field"><select class="form-control" name="kursi<?php echo $i; ?>"
                                                                   id="kursi<?php echo $i; ?>">

                                                <label class="mb-0" for="float-input">Pilih Nomor Kursi
                                                    Ke <?php echo $i; ?></label></select>
                                        </div>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <div class="field"><select class="form-control" name="kursi1"
                                                               id="kursi1">

                                            <label
                                                    class="mb-0" for="float-input">Pilih Nomor Kursi</label></select>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="col">
                                <div id="tipe"
                                     style="background-image: url(assets/img/mini_bus_8.png);height: 530px;background-size: contain;background-repeat: no-repeat;min-width: 392.797px;max-width: 392.797px;min-height: 550px;max-height: 550px;">
                                    <button class="btn btn-primary" type="button"
                                            style="width: 45px;height: 45px;background-color: rgb(223,78,78);margin-top: 180px;margin-left: 60px;">
                                        1
                                    </button>
                                    <div class="row" style="margin-top: 30px;margin-right: 170px;margin-left: 50px;">
                                        <div class="col">
                                            <button class="btn btn-primary" type="button"
                                                    style="width: 45px;height: 45px;background-color: rgb(223,78,78);margin-top: 20px;margin-left: 43px;">
                                                2
                                            </button>
                                            <button class="btn btn-primary" type="button"
                                                    style="width: 45px;height: 45px;background-color: rgb(78,223,92);margin-top: 20px;margin-left: 7px;margin-right: 0px;">
                                                3
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 24px;margin-right: 10px;margin-left: 50px;">
                                        <div class="col">
                                            <button class="btn btn-primary" type="button"
                                                    style="width: 45px;height: 45px;background-color: rgb(78,223,92);margin-top: 20px;margin-left: 0px;">
                                                4
                                            </button>
                                            <button class="btn btn-primary" type="button"
                                                    style="width: 45px;height: 45px;background-color: rgb(78,223,92);margin-top: 20px;margin-left: 50px;margin-right: 0px;">
                                                5
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 10px;margin-right: 170px;margin-left: 50px;">
                                        <div class="col" style="width: 170px;">
                                            <button class="btn btn-primary" type="button"
                                                    style="width: 45px;height: 45px;background-color: rgb(78,223,92);margin-top: 20px;margin-left: 0px;">
                                                6
                                            </button>
                                            <button class="btn btn-primary" type="button"
                                                    style="width: 45px;height: 45px;background-color: rgb(223,78,78);margin-top: 20px;margin-left: 1px;">
                                                7
                                            </button>
                                            <button
                                                    class="btn btn-primary" type="button"
                                                    style="width: 45px;height: 45px;background-color: rgb(223,78,78);margin-top: 20px;margin-left: 0px;margin-right: 0px;">
                                                8
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <button class="btn btn-primary" type="button"
                                                style="float: right;margin-top: 20px;margin-right: 20px;margin-bottom: 35px;">
                                            Lanjut
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
<script src="assets/js/script.min.js"></script>
<script type='text/javascript'>
    $(function () {
        $("#jam").change(function () {
            var jam = $("#jam option:selected").val();
            $.ajax({
                url: "request/sessionJam.php",
                type: "GET",
                data: {jam: jam},
                success: function (result) {
                    var resp = JSON.parse(result);
                    //alert(result);
                    var cb = $("#kursi1");
                    cb.empty();
                    cb.append($('<option></option>').val(0).text("Pilih Nomor Kursi Anda"));
                    if (resp.status == "OK") {
                        for (var i = 0; i < resp.data.length; i++)
                            cb.append($('<option></option>').val(resp.data[i].x).text(resp.data[i].x));
                    }
                }
            });
        });
    });
</script>
</body>

</html>