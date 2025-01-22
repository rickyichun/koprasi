<?php include('head.php'); ?>

<body class="materialdesign">
    <div class="wrapper-pro">
        <?php include('header.php'); ?>
        <div class="content-inner-all">
            <!-- Data Start-->
            <?php
            $inv = $_GET['inv'];
            $tampil1 = mysqli_query($conn, "SELECT *, daf_invoice.status as statinv FROM daf_invoice, pelanggan WHERE pelanggan.id=daf_invoice.idpel  AND daf_invoice.noinvoice='$inv'");
            $data1 = mysqli_fetch_array($tampil1);
            $statusin = $data1['statinv'];
            ?>
            <div class="d-flex">
                <div class="sparkline12-graph">
                    <div class="basic-login-form-ad">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="all-form-element-inner">
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <label class="login2 pull-right pull-right-pro">No Invoice</label>
                                            </div>
                                            <div class="col-lg-9">
                                                <input class="form-control" value="<?php echo $inv; ?>"
                                                    readonly="readonly" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <label class="login2 pull-right pull-right-pro">Tanggal</label>
                                            </div>
                                            <div class="col-lg-9">
                                                <input class="form-control"
                                                    value="<?php echo date("d-m-Y", strtotime($data1['tgltrx'])); ?>"
                                                    readonly="readonly" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <label class="login2 pull-right pull-right-pro">Nama Pelanggan</label>
                                            </div>
                                            <div class="col-lg-9">
                                                <input class="form-control" value="<?php echo $data1['namatoko']; ?>"
                                                    readonly="readonly" />
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Data Start-->
            <div class="d-flex">
                <div class="col-lg-12">
                    <div class="sparkline12-hd">
                        <div class="main-sparkline12-hd">
                            <h1>Transaksi Keluar</h1>
                        </div>
                    </div>
                    <br />
                    <div class="col-lg-12" style="text-align:right;">
                        <?php if ($statusin == "onProses" && $role == 'admin') { ?>
                        <a href="inputbrginv.php?kd=<?php echo $inv; ?>"><button
                                class="btn btn-sm btn-primary login-submit-cs" type="submit">Tambah Brg</button></a>
                        <?php } ?>
                        <a style="padding-left: 30px;" target=" _blank" href="printcoba.php?inv=<?php echo $inv; ?>"
                            onclick="javascript: return confirm('Anda yakin Print INVOICE ? Status akan berubah menjadi Deliver!')"><button
                                class="btn btn-sm btn-warning login-submit-cs" type="submit">Print</button></a>

                    </div>
                    <div class="sparkline8-graph">
                        <br />
                        <br />
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <table id="table" data-toggle="table" data-search="true" data-show-columns="true"
                                data-show-refresh="true" data-key-events="true" data-show-toggle="true"
                                data-resizable="true" data-cookie="true" data-cookie-id-table="saveId"
                                data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="no">No</th>
                                        <th data-field="ktp">Nama Barang</th>
                                        <th data-field="tempat">Qty</th>
                                        <?php if ($role == 'admin') { ?>
                                        <th data-field="hrgbl">Harga Beli (k)</th>
                                        <th data-field="hrgjlint">Harga Bucin</th>
                                        <?php  } ?>
                                        <th data-field="tgl">Harga Jual_total</th>
                                        <?php if ($role == 'admin') { ?>
                                        <th data-field="jk1">Jumlah (k)</th>
                                        <?php } ?>
                                        <th data-field="jk3">Jumlah Nota</th>
                                        <?php if ($role == 'admin') { ?>
                                        <th data-field="margin">Margin Bucin</th>
                                        <th data-field="marginsls">Margin Sls</th>
                                        <?php  } ?>
                                        <th data-field="stat">Status</th>
                                        <th data-field="up">Tgl Input</th>
                                        <th data-field="aksi">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $tampil = mysqli_query($conn, "SELECT *, riw_keluar.status as statusin, riw_keluar.margin as marginint, riw_keluar.margin_sls as marginsls FROM barang, pelanggan, riw_keluar WHERE pelanggan.id=riw_keluar.idpel AND barang.id=riw_keluar.idbarang AND riw_keluar.noform='$inv'");
                                    $cekdata = mysqli_num_rows($tampil);
                                    $no = 1;
                                    if ($cekdata > 0) {
                                        while ($data = mysqli_fetch_array($tampil)) {
                                            $qty     = $data['qtyout'];
                                            $jual    = $data['hargabeli'] + $data['margin'] + $data['margin_sls'];
                                            $beli    = $data['hargabeli'];
                                            $jualinti       = $beli + $data['marginint'];
                                            $marginin       = $data['marginint'] * $qty;
                                            $marginsls      = $data['marginsls'] * $qty;
                                            $tot            = $jual * $qty;
                                            $totbeli        = $beli * $qty;
                                            $totjualint     = $jualinti * $qty;
                                            $totmarginin[]  = $marginin;
                                            $totmarginsls[] = $marginsls;
                                            $total[]        = $tot;
                                            $totaljualint[] = $totjualint;
                                            $totalbeli[]    = $totbeli;

                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $data['namabrg']; ?></td>
                                        <td style="text-align: right;"><?php echo $data['qtyout']; ?></td>
                                        <?php if ($role == 'admin') {  ?>
                                        <td><?php echo "Rp." . number_format($beli, 0, ',', '.'); ?></td>
                                        <td><?php echo "Rp." . number_format($jualinti, 0, ',', '.'); ?></td>
                                        <?php } ?>
                                        <td><?php echo "Rp." . number_format($jual, 0, ',', '.'); ?></td>
                                        <?php if ($role == 'admin') {  ?>
                                        <td><?php echo "Rp." . number_format($totbeli, 0, ',', '.'); ?></td>
                                        <?php } ?>
                                        <td><?php echo "Rp." . number_format($tot, 0, ',', '.'); ?></td>
                                        <?php if ($role == 'admin') { ?>
                                        <td><?php echo "Rp." . number_format($marginin, 0, ',', '.') . " (" . $data['marginint'] . ")"; ?>
                                        </td>
                                        <td><?php echo "Rp." . number_format($marginsls, 0, ',', '.') . " (" . $data['marginsls'] . ")"; ?>
                                        </td>
                                        <?php } ?>
                                        <td><?php $status = $data['statusin'];
                                                    echo $status; ?></td>
                                        <td><?php echo $data['tglupdate']; ?></td>
                                        <td><?php if ($status == 'onProses' || $status == 'Deliver') {
                                                        if ($status == 'Deliver' && $role == 'admin') { ?>
                                            <a class="btn btn-sm btn-warning"
                                                href="inputjmlretur.php?idtx=<?php echo $data['id']; ?>"><i
                                                    class="fa fa-edit"></i>
                                                Retur</a>
                                            <?php } else if ($role == 'admin') { ?>
                                            <a class="btn btn-sm btn-primary"
                                                href="editqtyin.php?mode=1&kd=<?php echo $data['id']; ?>"> <i
                                                    class="fa fa-pencil"></i> Qty</a>
                                            <a class="btn btn-sm btn-danger"
                                                href="hapus.php?mode=6&kd=<?php echo $data['id']; ?>"
                                                onclick="javascript: return confirm('Anda yakin hapus data ? Data yang anda hapus tidak dapat kembali lagi SELAMANYA !')"><i
                                                    class="fa fa-trash">
                                                    <!-- <a class="btn btn-sm btn-primary"
                                                href="rubahmargin.php?idtx=<?php echo $data['id']; ?>"><i
                                                    class="fa fa-tag"></i>
                                                Atur Margin</a> -->
                                                    <?php }
                                                    }; ?>
                                        </td>
                                    </tr>
                                    <?php $no++;
                                        } ?>
                                    <tr>
                                        <?php
                                            $totalhrgbeli = array_sum($totalbeli);
                                            $totalan      = array_sum($total);
                                            ?>
                                        <?php if ($role == 'admin') { ?>
                                        <td colspan="6">
                                            <?php } else { ?>
                                        <td colspan="4">
                                            <?php } ?>

                                            <center><b>Total</b></center>
                                        </td>
                                        <?php if ($role == 'admin') { ?>
                                        <td><b><?php echo "Rp." . number_format($totalhrgbeli, 0, ',', '.'); ?></b></td>
                                        <?php } ?>
                                        <td><b><?php echo "Rp." . number_format($totalan, 0, ',', '.'); ?></b></td>
                                        <?php
                                                if ($role == 'admin') {
                                                    $totalmrin  = array_sum($totmarginin);
                                                    $totalmrsls = array_sum($totmarginsls); ?>
                                        <td><b><?php echo "Rp." . number_format($totalmrin, 0, ',', '.'); ?></b></td>
                                        <td><b><?php echo "Rp." . number_format($totalmrsls, 0, ',', '.'); ?></b>
                                        </td>
                                        <?php } ?>
                                        <td colspan="5"></td>
                                    </tr>
                                    <?php $ppn = $data1['ppn'];
                                        if ($ppn == 'yes') {
                                        ?>
                                    <tr>
                                        <td></td>
                                        <td colspan="3">
                                            <center>PPN 11%</center>
                                        </td>
                                        <td><?php
                                                    $pajak = $totalan * 11 / 100;
                                                    echo "Rp." . number_format($pajak, 0, ',', '.');
                                                    ?>
                                        </td>
                                        <td colspan="5"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="3">
                                            <center><b>Total Bersih</b></center>
                                        </td>
                                        <td><b><?php
                                                        $totalbrsh = $totalan + $pajak;
                                                        echo "Rp." . number_format($totalbrsh, 0, ',', '.');
                                                        ?></b>
                                        </td>
                                        <td colspan="5"></td>
                                    </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                        <br />
                        <br />
                        <br />
                        <?php if(($status=='Deliver' || $status=='Tempo' ) && $role=='admin'){ ?>
                        <a href="insert.php?mode=10&dwt=cash&inv=<?php echo $inv; ?>"
                            onclick="javascript: return confirm('Setelah tutup Invoice, anda tidak bisa RETUR maupun Rubah Margin barang pada Invoice! Yakin untuk melanjutkan ?')">
                            <button class="btn btn-sm btn-primary login-submit-cs" type="submit">TUTUP
                                INVOICE CASH</button></a>
                        <a href="insert.php?mode=10&dwt=tf&inv=<?php echo $inv; ?>"
                            onclick="javascript: return confirm('Setelah tutup Invoice, anda tidak bisa RETUR maupun Rubah Margin barang pada Invoice! Yakin untuk melanjutkan ?')">
                            <button class="btn btn-sm btn-primary login-submit-cs" type="submit">TUTUP
                                INVOICE TRANSFER</button></a>
                        <?php }; ?>
                        <?php if ($status == 'Deliver' && $role == 'admin') { ?>
                        <a href="insert.php?mode=13&inv=<?php echo $inv; ?>"
                            onclick="javascript: return confirm('Setelah pilih pembayaran tempo, anda tidak dapat RETUR atau Rubah Margin barang! Yakin untuk melanjutkan ?')"><button
                                class="btn btn-sm btn-warning login-submit-cs" type="submit">Pembayaran
                                Tempo</button></a>
                        <?php }; ?>
                    </div>
                </div>

            </div>
            <!-- Data End-->

            <!-- Data retur-->
            <div class="d-flex">
                <div class="col-lg-12">
                    <div class="sparkline12-hd">
                        <div class="main-sparkline12-hd">
                            <h1>Barang Retur</h1>
                        </div>
                    </div>
                    <?php
                    $inv = $_GET['inv'];
                    ?>

                    <div class="sparkline8-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true"
                                data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true"
                                data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true"
                                data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="no">No</th>
                                        <th data-field="noinvoice">No Nota</th>
                                        <th data-field="tgltrx">Tgl Transaksi</th>
                                        <th data-field="ktp">Nama Barang</th>
                                        <th data-field="tempat">Qty</th>
                                        <th data-field="hrgbeli">Harga Beli</th>
                                        <?php
                                        if ($role == 'admin') {
                                        ?>
                                        <th data-field="hargaavg">Harga Average</th>
                                        <?php
                                        }
                                        ?>
                                        <th data-field="up">Tgl Input</th>
                                        <!-- <th data-field="aksi">Aksi</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $tampil = mysqli_query($conn, "SELECT * from barang, riw_retur WHERE barang.id=riw_retur.idbarang AND riw_retur.noinv='$inv' ORDER BY riw_retur.id desc");
                                    $no = 1;
                                    while ($data = mysqli_fetch_array($tampil)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $data['noform']; ?></td>
                                        <td><?php echo date("d-m-Y", strtotime($data['tgltrx'])); ?></td>
                                        <td><?php echo $data['namabrg']; ?></td>
                                        <td><?php echo $data['qtyin']; ?></td>
                                        <td><?php echo "Rp." . number_format($data['hargabeli'], 0, ',', '.'); ?>
                                        </td>
                                        <?php
                                            if ($role == 'admin') {
                                            ?>
                                        <td><?php echo "Rp." . number_format($data['hargaavg'], 2, ',', '.'); ?></td>
                                        <?php
                                            }
                                            ?>
                                        <td><?php echo $data['tglupdate']; ?></td>

                                    </tr>
                                    <?php $no++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Data End-->

            <?php include('footer.php'); ?>
        </div>

        <?php include('foot.php'); ?>




</body>

</html>