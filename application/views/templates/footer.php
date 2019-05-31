 <!-- footer content -->
        <footer>
          <div class="pull-right">
           TIMCode - Bootstrap Admin Template by <a href="<?= base_url() ?>">Chairul Anam</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div> 

    <!-- jQuery -->
    <script src="<?= base_url('assets/') ?>vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url('assets/') ?>js/jquery.mask.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url('assets/') ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?= base_url('assets/') ?>vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?= base_url('assets/') ?>vendors/nprogress/nprogress.js"></script>


    <!-- Datatables -->
    <script src="<?= base_url('assets/') ?>vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?= base_url('assets/') ?>vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Chart.js -->
    <script src="<?= base_url('assets/') ?>vendors/Chart.js/dist/Chart.min.js"></script>

        
    <!-- Custom Theme Scripts -->
    <script src="<?= base_url('assets/') ?>build/js/custom.min.js"></script>

    
     

<script type="text/javascript">
    
    $(document).ready(function(){


    // Format mata uang.
    $( '.rupiah' ).mask('0.000.000.000', {reverse: true});

    // Format nomor HP.
    $( '.no_hp' ).mask('0000−0000−0000');

    // Format tahun pelajaran.
    $( '.tapel' ).mask('0000/0000');
})


   function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('jam').innerHTML =
  h + ":" + m + ":" + s;
  var t = setTimeout(startTime, 500);
}
function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}
</script>




  </body>
</html>