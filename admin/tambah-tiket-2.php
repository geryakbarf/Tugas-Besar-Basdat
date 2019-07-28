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

$datajam = getListJam($_SESSION["tanggal"],$_SESSION["jumtiket"],$_SESSION["rute"]);
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
                        <form name="f" method="post" action="tambah-tiket-3.php">
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
                                        ?>
                                        <h3 class="text-dark mb-0" style="font-size: 13px;width: 200px;">Pilih Nomor Kursi Ke
                                            1</h3>
                                        <div class="field" style="margin-top: 20px;"><select class="form-control" name="kursi1"
                                                                                             id="kursi1">
                                            </select>
                                        </div>
                                        <h3 class="text-dark mb-0" style="font-size: 13px;width: 200px;">Pilih Nomor Kursi Ke
                                            2</h3>
                                        <div class="field" style="margin-top: 20px;"><select class="form-control" name="kursi2"
                                                                                             id="kursi2">
                                            </select>
                                        </div>
                                        <?php
                                    } else {
                                        ?>
                                        <h3 class="text-dark mb-0" style="font-size: 13px;width: 200px;">Pilih Nomor Kursi</h3>
                                        <div class="field" style="margin-top: 20px;"><select class="form-control" name="kursi1"
                                                                                             id="kursi1">
                                            </select>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="col">
                                    <div id="tipe"
                                         style="background-image: url(assets/img/mini_bus_8.png);height: 530px;background-size: contain;background-repeat: no-repeat;min-width: 392.797px;max-width: 392.797px;min-height: 550px;max-height: 550px;">
                                        <button class="btn btn-primary" type="button"
                                                style="width: 45px;height: 45px;background-color: rgb(78,223,92);margin-top: 180px;margin-left: 60px;"
                                                name="btn1" id="btn1">
                                            1
                                        </button>
                                        <div class="row" style="margin-top: 30px;margin-right: 170px;margin-left: 50px;">
                                            <div class="col">
                                                <button class="btn btn-primary" type="button"
                                                        style="width: 45px;height: 45px;background-color: rgb(78,223,92);margin-top: 20px;margin-left: 43px;"
                                                        name="btn2" id="btn2">
                                                    2
                                                </button>
                                                <button class="btn btn-primary" type="button"
                                                        style="width: 45px;height: 45px;background-color: rgb(78,223,92);margin-top: 20px;margin-left: 3px;margin-right: 0px;"
                                                        name="btn3" id="btn3">
                                                    3
                                                </button>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: 24px;margin-right: 10px;margin-left: 50px;">
                                            <div class="col">
                                                <button class="btn btn-primary" type="button"
                                                        style="width: 45px;height: 45px;background-color: rgb(78,223,92);margin-top: 20px;margin-left: 0px;"
                                                        name="btn4" id="btn4">
                                                    4
                                                </button>
                                                <button class="btn btn-primary" type="button"
                                                        style="width: 45px;height: 45px;background-color: rgb(78,223,92);margin-top: 20px;margin-left: 45px;margin-right: 0px;"
                                                        name="btn5" id="btn5">
                                                    5
                                                </button>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: 10px;margin-right: 170px;margin-left: 45px;">
                                            <div class="col" style="width: 170px;">
                                                <button class="btn btn-primary" type="button"
                                                        style="width: 45px;height: 45px;background-color: rgb(78,223,92);margin-top: 20px;margin-left: 0px;"
                                                        name="btn6" id="btn6">
                                                    6
                                                </button>
                                                <button class="btn btn-primary" type="button"
                                                        style="width: 45px;height: 45px;background-color: rgb(78,223,92);margin-top: 20px;margin-left: 0px;"
                                                        name="btn7" id="btn7">
                                                    7
                                                </button>
                                                <button
                                                        class="btn btn-primary" type="button"
                                                        style="width: 45px;height: 45px;background-color: rgb(78,223,92);margin-top: 20px;margin-left: 0px;margin-right: 0px;"
                                                        name="btn8" id="btn8">
                                                    8
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <button class="btn btn-primary" type="submit"
                                                    style="float: right;margin-top: 20px;margin-right: 20px;margin-bottom: 35px;">
                                                Lanjut
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
            if (jam == 0) {
                var cb = $("#kursi1");
                cb.empty();
                var cb1 = $("#kursi2");
                cb1.empty();
                for (var i = 1; i <= 8; i++) {
                    $("#btn" + i).css("backgroundColor", "rgb(78,223,92)");
                }
                return false;
            }

            $.ajax({
                url: "request/getKursiTerpakai.php",
                type: "GET",
                data: {jam: jam},
                success: function (result) {
                    var resp = JSON.parse(result);
                    if (resp.status == "OK") {
                        for (var i = 0; i < resp.data.length; i++)
                            $("#btn" + resp.data[i].x).css("backgroundColor", "rgb(223,78,78)");
                    } else if (resp.status == "ERROR") {
                        //Nothing to do here
                    }
                }
            });

            $.ajax({
                url: "request/sessionJam.php",
                type: "GET",
                data: {jam: jam},
                success: function (result) {
                    var resp = JSON.parse(result);
                    var cb = $("#kursi1");
                    cb.empty();
                    cb.append($('<option></option>').val(0).text("Pilih Tempat Duduk Anda"));
                    if (resp.status == "OK") {
                        for (var i = 0; i < resp.data.length; i++)
                            cb.append($('<option></option>').val(resp.data[i].x).text(resp.data[i].x));
                    }
                }
            });
        });
    });
</script>
<script type='text/javascript'>
    $(function () {
        $("#kursi1").change(function () {
            var jam = $("#jam option:selected").val();
            var kursi = $("#kursi1 option:selected").val();

            if (kursi == 0) {
                var cb1 = $("#kursi2");
                cb1.empty();
                return false;
            }

            $.ajax({
                url: "request/sessionKursi.php",
                type: "GET",
                data: {jam: jam, kursi: kursi},
                success: function (result) {
                    var resp = JSON.parse(result);
                    var cb = $("#kursi2");
                    cb.empty();
                    cb.append($('<option></option>').val(0).text("Pilih Tempat Duduk Anda"));
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