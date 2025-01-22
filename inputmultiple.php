<?php 
    include "componen/basisdata.php" ;
    $noform     = $_GET['inv'];
    $tampil1    = mysqli_query($conn, "SELECT * from tmp_invoice WHERE tmp_invoice.noinvoice='$noform'");
    $data1      = mysqli_fetch_array($tampil1);												 												
    $tgl        = $data1['tgltrx'];
    $pelanggan  = $data1['idpel'];
    $idmkt      = $data1['idmkt'];
    $toko       = 1;
    $marketing  = 1;
    $pajak      = $data1['ppn'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Input Nota - Koprasi KSUA</title>
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
                <h3><i class="fa fa-angle-right"></i>Input Nota Penjualan</h3>
                <!-- BASIC FORM VALIDATION -->

                <!-- FORM VALIDATION -->
                <div class="row mt">
                    <div class="col-lg-12">
                        <div class="form-panel">
                            <div class=" form">
                                <form class="cmxform form-horizontal style-form" id="commentForm" method="post"
                                    action="componen/insert.php?mode=3">
                                    <input name="noform" type="hidden" id="noform" value="<?php echo $noform; ?>" />
                                    <input name="pelanggan" type="hidden" value="<?php echo $pelanggan; ?>" />
                                    <input name="marketing" type="hidden" id="idmkt" value="<?php echo $idmkt; ?>" />
                                    <input name="tgl" type="hidden" id="tgl" value="<?php echo $tgl; ?>" />
                                    <input name="ppn" type="hidden" id="ppn" value="<?php echo $pajak; ?>" />

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
                                                    <?php echo $data1['namabrg']; ?>
                                                </option> <?php } ?>
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
                <h3>Invoice Barang Keluar</h3>
                <div class="row mt">
                    <div class="col-lg-12">
                        <div class="content-panel">

                            <section id="unseen">
                                <table class="table table-bordered table-striped table-condensed">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Harga Jual</th>
                                            <th>Qty</th>
                                            <th>Jumlah</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php					
                                                $tampil = mysqli_query($conn, "SELECT * from tmp_invoice WHERE noinvoice='$noform' order by id desc");
                                                $no=1;
                                                while($data=mysqli_fetch_array($tampil)){
                                                    $idbrg      = $data['idbrg'];
                                                    $tampil2    = mysqli_query($conn, "SELECT * from barang WHERE id='$idbrg'");
                                                    $data2      = mysqli_fetch_array($tampil2);
                                                    $hrgjual    = $data['hargabeli']+$data['margin'];
                                                    $tot        = $hrgjual*$data['qty'];
                                                    $total[]    = $tot;
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $data2['namabrg']; ?></td>
                                            <td><?php echo "Rp.".number_format($hrgjual,0,',','.'); ?></td>
                                            <td><?php echo $data['qty']; ?></td>
                                            <td><?php echo "Rp.".number_format($tot,0,',','.'); ?></td>
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                            <td></td>
                                            <td colspan="3"><b>
                                                    <Center>TOTAL</Center>
                                                </b></td>
                                            <?php
                                                $totalan = array_sum($total);
                                            ?>
                                            <td class="text-left">
                                                <b><?php echo "Rp.".number_format($totalan,0,',','.'); ?></b>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </section>
                        </div>
                        <!-- /content-panel -->
                    </div>
                    <!-- /col-lg-4 -->
                </div>
                <!-- /row -->
                <div class="row mt">
                    <div class="col-lg-12" style="text-align: right" ;>
                        <div class="content-panel">
                            <a href="componen/insert.php?mode=5"><button class="btn btn-danger btn-xs" type="button"
                                    onclick="javascript: return confirm('Anda yakin membatalkan Invoice ?')">Batalkan
                                    <br />
                                    Invoice</button></a>
                            <a href="componen/insert.php?mode=4&inv=<?php echo $noform; ?>"><button
                                    class="btn btn-lg btn-primary login-submit-cs" type="submit">Terbitkan
                                    Invoice</button>
                        </div>
                    </div>
                </div>

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