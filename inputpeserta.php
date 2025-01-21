<?php include "componen/basisdata.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Input Peserta - Koprasi KSUA</title>
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
                <h3><i class="fa fa-angle-right"></i>Input Peserta Baru</h3>
                <!-- BASIC FORM VALIDATION -->

                <!-- FORM VALIDATION -->
                <div class="row mt">
                    <div class="col-lg-12">
                        <div class="form-panel">
                            <div class=" form">
                                <form class="cmxform form-horizontal style-form" id="commentForm" method="post"
                                    action="componen/insert.php?mode=2">
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Nama Peserta</label>
                                        <div class="col-lg-10">
                                            <input name="nama" type="text" class="form-control" id="nama"
                                                placeholder="Nama Peserta" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Jenis Kelamin</label>
                                        <div class="col-lg-10">
                                            <select id="jk" name="jk" class="form-control" required>
                                                <option></option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Bin/binti</label>
                                        <div class="col-lg-10">
                                            <input name="binbinti" type="text" class="form-control" id="binbinti"
                                                placeholder="Bin/Binti" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Tempat lahir</label>
                                        <div class="col-lg-10">
                                            <input name="tmptlhr" type="text" class="form-control" id="tmptlhr"
                                                placeholder="Tempat Lahir" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Tgl Lahir</label>
                                        <div class="col-lg-10">
                                            <input name="tgllhr" type="date" class="form-control" id="tgllhr"
                                                placeholder="Tgl Lahir" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">NIK</label>
                                        <div class="col-lg-10">
                                            <input name="nik" type="text" class="form-control" id="nik"
                                                placeholder="NIK" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Alamat</label>
                                        <div class="col-lg-10">
                                            <input name="alamat" type="text" class="form-control" id="alamat"
                                                placeholder="Alamat" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Kongsi 1</label>
                                        <div class="col-lg-10">
                                            <input name="kongsi1" type="text" class="form-control" id="kongsi1"
                                                placeholder="Kongsi 1" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Kongsi 2</label>
                                        <div class="col-lg-10">
                                            <input name="kongsi2" type="text" class="form-control" id="kongsi2"
                                                placeholder="Kongsi 2" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Kongsi 3</label>
                                        <div class="col-lg-10">
                                            <input name="kongsi3" type="text" class="form-control" id="kongsi3"
                                                placeholder="Kongsi 3" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Notelp</label>
                                        <div class="col-lg-10">
                                            <input name="notlp" type="text" class="form-control" id="notlp"
                                                placeholder="No Telp" />
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