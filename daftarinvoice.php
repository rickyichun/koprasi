<?php 
    include "componen/basisdata.php";
    include "componen/cek-login.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Daftar Invoice - Koprasi KSUA</title>
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
                <h3><i class="fa fa-angle-right"></i> Daftar Invoice</h3>
                <div class="row mt">
                    <div class="col-lg-12">
                        <div class="content-panel">

                            <section id="unseen">
                                <table class="table table-bordered table-striped table-condensed">
                                    <thead>
                                        <thead>
                                            <tr>
                                                <th data-field="no">No</th>
                                                <th data-field="noform">No Invoice</th>
                                                <th data-field="tgltrx">Tgl Transaksi</th>
                                                <th data-field="pel">Pelanggan</th>
                                                <th data-field="nom">Nominal Total Nota</th>
                                                <th data-field="tgl">Tgl Update</th>
                                                <!-- <th data-field="aksi">Aksi</th> -->
                                            </tr>
                                        </thead>
                                    <tbody>
                                        <?php					
									$tampil=mysqli_query($conn, "SELECT * FROM daf_invoice ORDER BY tgltrx DESC");
									$no=1;
                                    
									while($data=mysqli_fetch_array($tampil)){	
                                        $inv = $data['noinvoice'];
                                        $qtotalan = mysqli_query($conn, "SELECT sum(riw_keluar.qtyout*(riw_keluar.hargabeli+riw_keluar.margin)) as totalanjual, anggota.nama as namapelg FROM riw_keluar, anggota WHERE riw_keluar.noform='$inv' AND anggota.id=riw_keluar.idpel");
                                        $totalan = mysqli_fetch_array($qtotalan);
									 ?>
                                        <tr>

                                            <td><?php echo $no;?></td>
                                            <td><a href=" detailinvoice.php?inv=<?php echo $data['noinvoice']; ?>">
                                                    <?php echo $data['noinvoice']; ?></a>
                                            </td>
                                            <td><?php echo date("d-m-Y",strtotime($data['tgltrx'])); ?></td>
                                            <td><?php echo $totalan['namapelg']; ?></td>
                                            <td><?php echo "Rp.".number_format($totalan['totalanjual'],0,',','.'); ?>
                                            </td>
                                            <td><?php echo $data['tglupdate']; ?></td>
                                        </tr>
                                        <?php } ?>
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