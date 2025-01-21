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
    <title>Daftar Peserta - Koprasi KSUA</title>
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
                <h3><i class="fa fa-angle-right"></i> Daftar Anggota</h3>
                <div class="row mt">
                    <div class="col-lg-12">
                        <div class="content-panel">

                            <section id="unseen">
                                <table class="table table-bordered table-striped table-condensed">
                                    <thead>
                                        <tr>
                                            <th>NoAnggota</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Bin/Binti</th>
                                            <th>TempatLahir</th>
                                            <th>TglLahir</th>
                                            <th class="numeric">NIK</th>
                                            <th>Alamat</th>
                                            <th>Kongsi 1</th>
                                            <th>Kongsi 2</th>
                                            <th>Kongsi 3</th>
                                            <th>NoTelp</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php					
                                                $tampil=mysqli_query($conn, "SELECT * from anggota order by id desc");
                                                $no=1;
                                                while($data=mysqli_fetch_array($tampil)){
                                        ?>
                                        <tr>
                                            <td><?php echo $data['noagt']; ?></td>
                                            <td><?php echo $data['nama']; ?></td>
                                            <td><?php echo $data['jk']; ?></td>
                                            <td><?php echo $data['binbinti']; ?></td>
                                            <td><?php echo $data['tempatlhr']; ?></td>
                                            <td><?php echo $data['tgllhr']; ?></td>
                                            <td><?php echo $data['nik']; ?></td>
                                            <td><?php echo $data['alamat']; ?></td>
                                            <td><?php echo $data['kongsi1']; ?></td>
                                            <td><?php echo $data['kongsi2']; ?></td>
                                            <td><?php echo $data['kongsi3']; ?></td>
                                            <td><?php echo $data['notelp']; ?></td>
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