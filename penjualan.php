<?php 
    include "componen/basisdata.php" ;
    $qcek = mysqli_query($conn, "SELECT * FROM tmp_invoice");
    $cekinv = mysqli_num_rows($qcek);
    $inv    = mysqli_fetch_array($qcek);
if ($cekinv>0){
    $noform = $inv['noinvoice'];
    echo "<script>alert('Invoice lama belum terbit, silahkan lanjutkan proses barang keluar!'); window.location = 'inputmultiple.php?inv=$noform'</script>";
    }
$noform="Pilih Tanggal Transaksi";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Penjualan - Koprasi KSUA</title>
    <?php include "componen/header.php" ?>
</head>

<body>
    <section id="container">
        <!--header start-->
        <header class="header black-bg">
            <?php include "componen/webtitle.php" ?>
        </header>
        <!--header end-->

        <!--sidebar start-->
        <aside>
            <?php include "componen/menu.php" ?>
        </aside>
        <!--sidebar end-->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <h3><i class="fa fa-angle-right"></i>Input Penjualan</h3>
                <!-- BASIC FORM VALIDATION -->

                <!-- FORM VALIDATION -->
                <div class="row mt">
                    <div class="col-lg-12">
                        <div class="form-panel">
                            <div class=" form">
                                <form class="cmxform form-horizontal style-form" id="commentForm" method="post"
                                    action="componen/insert.php?mode=3">
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">No Invoice</label>
                                        <div class="col-lg-10">
                                            <input name="noform" type="text" id="noform" class="form-control"
                                                value="<?php echo $noform; ?>" readonly="readonly" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Tanggal Transaksi</label>
                                        <div class="col-lg-10">
                                            <input name="tgl" type="date" class="form-control" id="tgl" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Nama Pelanggan</label>
                                        <div class="col-lg-10">
                                            <select id="pelanggan" name="pelanggan" class="form-control" required>
                                                <option></option>
                                                <?php
                                                    $query2 = mysqli_query($conn, "SELECT * FROM anggota");
                                                    while ($data2  = mysqli_fetch_array($query2)) {
                                                 ?>
                                                <option value="<?php echo $data2['id']; ?>">
                                                    <?php echo $data2['nama']; ?></option> <?php }
																	?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Nama Barang</label>
                                        <div class="col-lg-10">
                                            <select id="barang" name="barang" class="form-control" required>
                                                <option></option>
                                                <?php
																	$query1 = mysqli_query($conn, "SelECT * FROM barang");
																	while ($data1  = mysqli_fetch_array($query1)) {
																	?>
                                                <option value="<?php echo $data1['id']; ?>">
                                                    <?php echo $data1['namabrg']; ?></option> <?php }
																	?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Harga & Stok Barang</label>
                                        <div class="col-lg-10">
                                            <label class="login2" id="pesan"></label>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Qty</label>
                                        <div class="col-lg-10">
                                            <input name="qty" type="number" class="form-control" id="qty" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-theme" type="submit">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /form-panel -->
                    </div>
                    <!-- /col-lg-12 -->
                </div>
                <!-- /row -->
            </section>
            <!-- /wrapper -->
        </section>
        <!-- /MAIN CONTENT -->

        <!--main content end-->
        <!--footer start-->
        <footer class="site-footer">
            <div class="text-center">
                <?php include "componen/footer.php"; ?>
            </div>
        </footer>
        <!--footer end-->
    </section>
    <?php include "componen/js.php" ?>
    <script src="lib/common-scripts.js"></script>
    <script>
    $(document).ready(function() {
        $('#barang').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "cekharga.php?mode=1",
                method: "POST",
                data: 'id=' + id,
                success: function(data) {
                    $('#pesan').html(data);
                }

            });
            return false;
        });

        $('#tgl').change(function() {
            date = document.getElementById('tgl').value
            var tgl = new Date(date);
            // console.log(tgl)
            var day = tgl.toLocaleString('default', {
                day: '2-digit'
            });
            var month = tgl.toLocaleString('default', {
                month: '2-digit'
            });
            var year = tgl.toLocaleString('default', {
                year: 'numeric'
            });
            var tahun2d = tgl.toLocaleString('default', {
                year: '2-digit'
            });
            // console.log(tahun2d);
            var date = $(this).val();
            $.ajax({
                url: "buat_noinvoice.php",
                method: "POST",
                data: {
                    tanggal: day,
                    bulan: month,
                    tahun: year,
                    thn: tahun2d
                },
                success: function(result) {
                    // console.log(result)
                    $('#noform').val(result);
                }
            })
            // console.log()
        })

    });
    </script>
    <!--script for this page-->
</body>

</html>