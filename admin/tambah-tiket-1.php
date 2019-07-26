<?php include_once "functions.php" ?>
<?php
session_start();
if (!isset($_SESSION["travelku.xyz"]))
    header("Location: login.php");
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
    <link rel="stylesheet" href="assets/js/jquery-ui.min.css">
</head>

<body id="page-top">
<div id="wrapper">
    <?php sidebar(); ?>
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <?php topBar(); ?>
            <div class="container-fluid">
                <h3 class="text-dark mb-1">Tambah Tiket</h3>
                <div class="card clean-testimonial-item border-0 rounded-0"
                     style="margin-left: 50px;margin-right: 50px;margin-top: 20px;">
                    <div class="card-body">
                        <form name="f" method="post" action="tambah-tiket-2.php">
                        <div class="row">
                            <div class="col">
                                <h3 class="text-dark mb-0" style="font-size: 13px;width: 200px;">Kota Asal</h3>
                                    <div  style="margin-top: 10px;" class="field"><select class="form-control" name="asal" id="asal" required>
                                            <option>Pilih Kota Asal</option>
                                            <?php
                                            $getAsal = getAsal();
                                            foreach ($getAsal as $data) {
                                                ?>
                                                <option value="<?php echo $data['asal'] ?>"><?php echo $data['asal'] ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select></div>
                            </div>
                            <div class="col">
                                <h3 class="text-dark mb-0" style="font-size: 13px;width: 200px;">Kota Tujuan</h3>
                                    <div style="margin-top: 10px;" class="field"><select class="form-control" name="tujuan" id="tujuan" required>
                                        </select></div>
                            </div>
                            <div class="col">
                                <h3 class="text-dark mb-0" style="font-size: 13px;width: 200px;">Tanggal Berangkat</h3>
                                <div class="input-group" style="margin-left: 0px;width: 231px;margin-top: 10px;">
                                    <div class="input-group-prepend"><span class="input-group-text icon-container"><i
                                                    class="far fa-calendar-times"></i></span></div>
                                    <input style="margin-left: 0px;width: 170px;" type="text" name="tanggal"
                                           id="datepicker" readonly required></div>
                            </div>
                            <div class="col">
                                <h3 class="text-dark mb-0" style="font-size: 13px;width: 200px;">Jumlah Tiket</h3>

                                    <div style="margin-top: 10px;" class="field"><select class="form-control" name="jumtiket" required>
                                            <option value="0">Pilih Jumlah Tiket</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                            </optgroup>
                                        </select></div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit"
                                style="float: left;margin-top: 20px;margin-right: 30px;">Lanjut
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <footer class="bg-white sticky-footer">
            <div class="container my-auto">
                <div class="text-center my-auto copyright"><span>Copyright © Dian Holiday 2019</span></div>
            </div>
        </footer>
    </div>
    <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
<script src="assets/js/script.min.js"></script>
<script src="assets/js/jquery-ui.min.js"></script>
<script type='text/javascript'>
    $(function () {
        $("#asal").change(function () {
            $.ajax({
                url: "request/getTujuan.php",
                type: "GET",
                data: {asal: $("#asal option:selected").val()},
                success: function (result) {
                    var resp = JSON.parse(result);
                    //alert(result);
                    var cb = $("#tujuan");
                    $('#datepicker').datepicker("destroy")
                    $('#datepicker').val("");
                    cb.empty();
                    cb.append($('<option></option>').val(0).text("Pilih Kota Tujuan"));
                    if (resp.status == "OK") {
                        for (var i = 0; i < resp.data.length; i++)
                            cb.append($('<option></option>').val(resp.data[i].tujuan).text(resp.data[i].tujuan));
                    }
                }
            });
        });
    });
</script>
<script type='text/javascript'>
    $(document).ready(function () {
        $("#tujuan").change(function () {
            if($("#tujuan option:selected").val()==0){
                alert("Silahkan Pilih Kota Tujuan!");
                return false;
            }
            var rute=$("#asal option:selected").val()+" - "+$("#tujuan option:selected").val();
            $.ajax({
                url: "request/getMaxDate.php",
                type: "GET",
                data: {rute: rute},
                success: function (result) {
                    var resp = JSON.parse(result);
                    $('#datepicker').datepicker("destroy");
                    $('#datepicker').val("");
                    if (resp.status == "OK") {
                        var max=resp.data;
                        var min=resp.min;
                        $('#datepicker').datepicker({
                            dateFormat: "yy-mm-dd",
                            minDate: new Date(min),
                            maxDate: new Date(max)
                        });
                    }else{
                        alert("Jadwal Travel Belum Ada Untuk Rute "+rute);
                    }
                }
            });
        });
    });
</script>

<script type='text/javascript'>
    $(document).ready(function () {
        $("#datepicker").change(function () {
            var tanggal=$("#datepicker").val();
            $.ajax({
                url: "request/validasiTanggal.php",
                type: "GET",
                data: {tanggal: tanggal},
                success: function (result) {
                    var resp = JSON.parse(result);
                    if (resp.status == "ERROR") {
                        alert("Jadwal Travel Untuk Tanggal "+tanggal+" Belum Tersedia, Atau Kusi Penuh!");
                        $('#datepicker').val("");
                    }
                }
            });
        });
    });
</script>
</body>

</html>