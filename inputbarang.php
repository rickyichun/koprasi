<?php include "componen/basisdata.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Input Barang - Koprasi KSUA</title>
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
                <h3><i class="fa fa-angle-right"></i>Input Barang Baru</h3>
                <!-- BASIC FORM VALIDATION -->

                <!-- FORM VALIDATION -->
                <div class="row mt">
                    <div class="col-lg-12">
                        <div class="form-panel">
                            <div class=" form">
                                <form class="cmxform form-horizontal style-form" id="commentForm" method="post"
                                    action="componen/insert.php?mode=1">
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Kode Barang</label>
                                        <div class="col-lg-10">
                                            <input name="kode" type="text" class="form-control" id="kode"
                                                placeholder="Kode Barang" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Nama Barang</label>
                                        <div class="col-lg-10">
                                            <input name="nama" type="text" class="form-control" id="nama"
                                                placeholder="Nama Barang" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Margin per Barang</label>
                                        <div class="col-lg-10">
                                            <input name="margin" type="text" class="form-control" id="margin"
                                                placeholder="Margin" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Harga Beli (Saldo
                                            Awal)</label>
                                        <div class="col-lg-10">
                                            <input name="hargabeli" type="text" class="form-control" id="rupiah"
                                                placeholder="Harga Beli" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Stok Awal</label>
                                        <div class="col-lg-10">
                                            <input name="qty" type="text" class="form-control" id="qty"
                                                placeholder="Stock" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Satuan</label>
                                        <div class="col-lg-10">
                                            <input name="satuan" type="text" class="form-control" id="satuan"
                                                placeholder="Satuan" required />
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