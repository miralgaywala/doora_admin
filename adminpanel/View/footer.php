
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2018 <a href="#">Doora</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
 <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  
<!-- ./wrapper -->

<!-- jQuery 3 -->

<script>
 /* $(function () {
    $("#example1").dataTable({
      "order":[[1,'asc']]
    });
    t.on('order.dt search.dt',function(){
      t.column(0,{search:'applied',order:'applied'}).nodes().each(function(cell,i){
        cell.innerHTML = i+1;
      });
    }).draw();
	});*/
  $(document).ready(function() {
    var t = $('#example1').DataTable( {
           "order": [[ 1, 'asc' ]],
    } );
    

$('select[name="category_name"]').on("change", function(event){
    var category = $('select[name="category_name"]').val();
    console.log(category);
    t.fnFilter("^"+ $(this).val() +"$", 2, false, false)

});
      
} );
</script>
<!-- jQuery UI 1.11.4 -->
<script src="./bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="./bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="./bower_components/raphael/raphael.min.js"></script>
<!--<script src="bower_components/morris.js/morris.min.js"></script>-->
<!-- Sparkline -->
<script src="./bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="./plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="./plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="./bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="./bower_components/moment/min/moment.min.js"></script>
<script src="./bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="./bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="./plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="./bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="./bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) 
<script src="dist/js/pages/dashboard.js"></script>-->
<!-- AdminLTE for demo purposes -->
<script src="./dist/js/demo.js"></script>
<script src="https://cdn.jsdelivr.net/gh/arvgta/ajaxify@7.3.2/ajaxify.min.js"></script>

</body>
</html>
