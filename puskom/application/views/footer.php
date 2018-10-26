<!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      Universitas Muhammadiyah Magelang
    </div>
    <strong>PUSKOM &copy; <script type="text/javascript">document.write(new Date().getFullYear());</script></strong> Pusat Komunikasi.
  </footer>

  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery AJAX -->
<script src="<?php echo base_url().'assets/AJAX/jquery.js';?>"></script>

<!-- jQuery 3 -->
<script src="<?php echo base_url().'assets/bower_components/jquery/dist/jquery.min.js';?>"></script>
<script src="<?php echo base_url().'assets/bower_components/jquery/dist/jquery.maskedinput.js';?>"></script>

<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url().'assets/bower_components/jquery-ui/jquery-ui.min.js'?>"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>$.widget.bridge('uibutton', $.ui.button);</script>

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url().'assets/bower_components/bootstrap/dist/js/bootstrap.min.js';?>"></script>

<!-- Morris.js charts -->
<script src="<?php echo base_url().'assets/bower_components/raphael/raphael.min.js';?>"></script>
<script src="<?php echo base_url().'assets/bower_components/morris.js/morris.min.js';?>"></script>

<!-- Sparkline -->
<script src="<?php echo base_url().'assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js';?>"></script>

<!-- DataTables -->
<script src="<?php echo base_url().'assets/bower_components/datatables.net/js/jquery.dataTables.min.js';?>"></script>
<script src="<?php echo base_url().'assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js';?>"></script>

<!-- jvectormap -->
<script src="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js';?>"></script>
<script src="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js';?>"></script>

<!-- fnGetHiddenNodes -->
<script src="<?php echo base_url().'assets/plugins/fnGetHiddenNodes.js';?>"></script>

<!-- jQuery Knob Chart -->
<script src="<?php echo base_url().'assets/bower_components/jquery-knob/dist/jquery.knob.min.js';?>"></script>

<!-- daterangepicker -->
<script src="<?php echo base_url().'assets/bower_components/moment/min/moment.min.js';?>"></script>
<script src="<?php echo base_url().'assets/bower_components/bootstrap-daterangepicker/daterangepicker.js';?>"></script>

<!-- datepicker -->
<script src="<?php echo base_url().'assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js';?>"></script>

<!-- bootstrap time picker -->
<script src="<?php echo base_url().'assets/plugins/timepicker/bootstrap-timepicker.min.js'?>"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url().'assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js';?>"></script>

<!-- Slimscroll -->
<script src="<?php echo base_url().'assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js';?>"></script>

<!-- FastClick -->
<script src="<?php echo base_url().'assets/bower_components/fastclick/lib/fastclick.js';?>"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets/dist/js/adminlte.min.js';?>"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url().'assets/dist/js/pages/dashboard.js';?>"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url().'assets/dist/js/demo.js';?>"></script>

<script>
	$(document).ready(function(){

		$('#example1, #example2').DataTable();

    // menampilkan semua data di dataTable
    $('#tableNilai, #tabel_input_peserta').DataTable({
        paging:false    
    });    

		//Date picker
		$('#datepicker').datepicker({
			format:'yyyy-mm-dd',
			autoclose: true
		});

    //Timepicker
    $('.timeinput').timepicker({
      use24hours: true,
      timeFormat: 'HH:mm'
    })

    // input jam
    jQuery(function($){
      $(".waktu").mask("99:99");
    });

    // input hanya angka
    function numberOnly(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
      return true;
    }

    // show modal data jadwal hari ini    
    $(document).on('click','.today',function(e){
        e.preventDefault();
        $("#Modal_Today").modal('show');
    });

    // show modal data jadwal bulan ini    
    $(document).on('click','.thismonth',function(e){
        e.preventDefault();
        $("#Modal_ThisMonth").modal('show');
    });

    // confirm password
    $('#saveUser').keyup(function() {
      if ($('#pswd').val() == $('#confirmpswd').val()) {
        $('#divconfirm').removeClass('has-error').addClass('has-success');
        $('#message').html('Password Cocok');        
      } else {
        $('#divconfirm').removeClass('has-success').addClass('has-error');
        $('#message').html('Password Tidak Cocok');        
      }
    });


    // merubah kondisi button submit
    $('#saveUser').on('keyup',function(){
      if($('#divconfirm').hasClass('has-success')){
        $('#save').prop('disabled',false);
      }else{
        $('#save').prop('disabled',true); 
      }
    });

    $('#saveUser').on('keyup',function(){
      if ($('#pswd').val()=='' && $('#confirmpswd').val()=='') {
        $('#divconfirm').removeClass('has-success has-error');
        $('#message').html('');        
      }
    });
    // /.merubah kondisi button sumbit


    // menghitung total checkbox di tabel input peserta
    $("#inputPeserta input[type='checkbox']").click(function(){
      var total=0;
      //lOOP THROUGH CHECKED
      $("#inputPeserta input[type='checkbox']:checked").each(function(){
           //Update total
            total ++;
      });
      $("#total").text(total);
    });

	});	

  function numberOnly(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
      return true;
  }

</script>
</body>
</html>