<?php 
    include "componen/basisdata.php";
    include "componen/cek-login.php";
    $inv = $_GET['inv'];
    $tampil1 = mysqli_query($conn, "SELECT * FROM daf_invoice, anggota WHERE anggota.id=daf_invoice.idpel  AND daf_invoice.noinvoice='$inv'");
    $data1 = mysqli_fetch_array($tampil1);
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Detail Invoice - Koprasi KSUA</title>
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
                <h3><i class="fa fa-angle-right"></i> Detail Invoice</h3>
                <div class="row mt">
                    <div class="col-lg12">
                        <a style="padding-left: 30px;" target=" _blank" href="printinv.php?inv=<?php echo $inv; ?>"
                            onclick="javascript: return confirm('Anda yakin Print INVOICE ?')"><button
                                class="btn btn-sm btn-warning login-submit-cs" type="submit">Print</button></a>
                        <br />
                    </div>
                </div>
                <div class="row mt">
                    <div class="col-lg-12">
                        <div class="content-panel">
                            <section id="unseen">
                                <table class="table table-bordered table-striped table-condensed">
                                    <thead>
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
                                                $tampil = mysqli_query($conn, "SELECT * from riw_keluar WHERE noform='$inv' order by id desc");
                                                $no=1;
                                                while($data=mysqli_fetch_array($tampil)){
                                                    $idbrg      = $data['idbarang'];
                                                    $tampil2    = mysqli_query($conn, "SELECT * from barang WHERE id='$idbrg'");
                                                    $data2      = mysqli_fetch_array($tampil2);
                                                    $hrgjual    = $data['hargabeli']+$data['margin'];
                                                    $tot        = $hrgjual*$data['qtyout'];
                                                    $total[]    = $tot;
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $data2['namabrg']; ?></td>
                                            <td><?php echo "Rp.".number_format($hrgjual,0,',','.'); ?></td>
                                            <td><?php echo $data['qtyout']; ?></td>
                                            <td><?php echo "Rp.".number_format($tot,0,',','.'); ?></td>
                                        </tr>
                                        <?php 
                                                $no++; } ?>
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

            </section>
            <!-- /wrapper -->
        </section>
        <!-- /MAIN CONTENT -->
        <!--main content end-->
        <!--footer start-->
        <footer class="site-footer">
            <div class="text-center">
                <?php include "componen/footer.php" ?>
            </div>
        </footer>
        <!--footer end-->
    </section>
    <?php include "componen/js.php" ?>
    <script src="lib/common-scripts.js"></script>
    <!--script for this page-->
</body>

</html>