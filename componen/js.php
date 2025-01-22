<!-- js placed at the end of the document so the pages load faster -->
<script src="lib/jquery/jquery.min.js"></script>
<script src="lib/bootstrap/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
<script src="lib/jquery.scrollTo.min.js"></script>
<script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
<script src="lib/jquery.sparkline.js"></script>
<!-- DataTables  & Plugins -->
<script src="lib/datatables/jquery.dataTables.min.js"></script>
<script src="lib/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="lib/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="lib/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="lib/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="lib/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="lib/jszip/jszip.min.js"></script>
<script src="lib//pdfmake/pdfmake.min.js"></script>
<script src="lib/pdfmake/vfs_fonts.js"></script>
<script src="lib/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="lib/datatables-buttons/js/buttons.print.min.js"></script>
<script src="lib//datatables-buttons/js/buttons.colVis.min.js"></script>
<!--common script for all pages-->

<script type="text/javascript">
var rupiah = document.getElementById('rupiah');
rupiah.addEventListener('keyup', function(e) {
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    rupiah.value = formatRupiah(this.value, 'Rp. ');
});

/* Fungsi formatRupiah */
function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}
</script>