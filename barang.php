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
    <title>Daftar Barang - Koprasi KSUA</title>
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
                <h3><i class="fa fa-angle-right"></i> Daftar Barang</h3>
                <div class="row mt">
                    <div class="col-lg-12">
                        <div class="content-panel">

                            <section id="unseen">
                                <table class="table table-bordered table-striped table-condensed">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Nama Barang</th>
                                            <th>Harga Beli</th>
                                            <th>Harga Jual</th>
                                            <th>Stok</th>
                                            <th>Satuan</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php					
                                                $tampil=mysqli_query($conn, "SELECT * from barang order by id desc");
                                                $no=1;
                                                while($data=mysqli_fetch_array($tampil)){
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $data['kodebrg']; ?></td>
                                            <td><?php echo $data['namabrg']; ?></td>
                                            <td><?php echo $data['hargabeli']; ?></td>
                                            <td><?php echo $data['hargajual']; ?></td>
                                            <td><?php echo $data['qty']; ?></td>
                                            <td><?php echo $data['satuan']; ?></td>
                                        </tr>
                                        <?php $no++;
                                    } ?>

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