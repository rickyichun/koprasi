<?php
include "componen/basisdata.php";
include "componen/cek-login.php";

$username = $_SESSION['username'];
$query_user_login = mysqli_query($conn, "SELECT * from tb_user where username='$username'");
$user_login = mysqli_fetch_array($query_user_login);
ini_set('date.timezone', 'Asia/Jakarta');
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Print Invoice </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i,800" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- adminpro icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/adminpro-custon-icon.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- data-table CSS
		============================================ -->
    <link rel="stylesheet" href="css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="css/data-table/bootstrap-editable.css">

<body>
    <?php 
    $inv = $_GET['inv'];
    
    $tampil1=mysqli_query($conn, "SELECT *, daf_invoice.status as statinv FROM daf_invoice, anggota WHERE anggota.id=daf_invoice.idpel AND daf_invoice.noinvoice='$inv'");
    $data1=mysqli_fetch_array($tampil1);
    $stat = $data1['statinv'];
    if($stat=='onProses') {
        $qdafinv = mysqli_query($conn, "UPDATE daf_invoice SET status='Deliver' WHERE noinvoice='$inv'");
		$qriwklr = mysqli_query($conn, "UPDATE riw_keluar SET status='Deliver' WHERE noform='$inv'");
    }
    
    ?>
    <p style="text-align:right"> Jakarta , <?php echo date("d-m-Y",strtotime($data1['tgltrx']));?> </p>
    <table width="100%" style="margin-bottom:30px !important; font-size:small">
        <tr style="display:flex; align-items:flex-end;">
            <td width="35%">
                <b>INVOICE</b>
                <br />No Inv : <?php echo $inv; ?>
            </td>
            <td width="35%">

            </td>
            <td>
                Kepada Yth:<br />
                <?php echo $data1['nama'];?> <br />
                <?php echo $data1['alamat'];?> <br />
            </td>
        </tr>
    </table>

    <table id="tabel" width="100%" style="font-size:small;">
        <thead>
            <tr>
                <th>No</th>
                <th>
                    Nama Barang
                </th>
                <th>Qty</th>
                <th>Satuan</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th style="min-width: 120px;">Keterangan
                </th>
            </tr>
        </thead>
        <tr>
            <?php $tampil=mysqli_query($conn, "SELECT * FROM barang, riw_keluar, anggota WHERE anggota.id=riw_keluar.idpel AND barang.id=riw_keluar.idbarang AND riw_keluar.noform='$inv'");
									$no=1;
									while($data=mysqli_fetch_array($tampil)){
                                    $jual = $data['hargabeli']+$data['margin']+$data['margin_sls'];
                                    $qty  = $data['qtyout'];
                                    $tot  = $jual*$qty; 	
                                    $total[] = $tot; ?>
            <td><?php echo $no;?></td>
            <td><?php echo $data['namabrg']; ?></td>
            <td>
                <?php echo $data['qtyout']; ?>
            </td>
            <td><?php echo $data['satuan']; ?></td>
            <td><?php echo "Rp.".number_format($jual,0,',','.'); ?></td>
            <td><?php echo "Rp.".number_format($tot,0,',','.'); ?></td>
            <td></td>

        </tr>
        <?php $no++;} ?>
        <tr style="border-top:1px solid;">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Total</td>
            <td><b>
                    <?php
                $totalan = array_sum($total);
                echo "Rp.".number_format($totalan,0,',','.');
                ?>
                </b>
            </td>
        </tr>
        <?php $ppn=$data1['ppn'];
            if($ppn=='yes'){
            ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                PPN 11%
            </td>
            <td><?php
                  $pajak = $totalan*11/100;
                  echo "Rp.".number_format($pajak,0,',','.');
                  ?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <b>Total Bersih</b>
            </td>
            <td><b><?php
                $totalbrsh = $totalan + $pajak;
                echo "Rp.".number_format($totalbrsh,0,',','.');
                ?></b>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>

    <p style="font-family: LCD Solid;font-size:x-small">Barang yang sudah dibeli tidak dapat
        dikembalikan</p>
    <br />
    <br />
    <table width="100%" class="mb-3">
        <tr style="display:flex; align-items:flex-start;">
            <td width="25%">Gudang</td>
            <td width="25%">Pengirim</td>
            <td width="25%">Penerima</td>
        </tr>
    </table>


    <!-- Data table area End-->
    <!-- Footer Start-->

    <script>
    window.print();
    </script>
    <style>
    table th {
        /* Multicolored border */
        border-top: 1px solid;
        border-bottom: 1px solid;
    }

    table td,
    table th {
        padding-top: 3px;
        padding-bottom: 3px;
    }
    </style>
</body>

</html>