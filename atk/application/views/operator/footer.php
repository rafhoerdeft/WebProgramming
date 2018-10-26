<!-- Jquery Core Js -->
    <script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url();?>assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url();?>assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Bootstrap Notify Plugin Js -->
    <script src="<?php echo base_url();?>assets/plugins/bootstrap-notify/bootstrap-notify.js"></script>

    <!-- Jquery Validation Plugin Css -->
    <script src="<?php echo base_url();?>assets/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- JQuery Steps Plugin Js -->
    <script src="<?php echo base_url();?>assets/plugins/jquery-steps/jquery.steps.js"></script>

    <!-- Sweet Alert Plugin Js -->
    <script src="<?php echo base_url();?>assets/plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url();?>assets/plugins/node-waves/waves.js"></script>

     <!-- Autosize Plugin Js -->
    <script src="<?php echo base_url();?>assets/plugins/autosize/autosize.js"></script>

    <!-- Moment Plugin Js -->
    <script src="<?php echo base_url();?>assets/plugins/momentjs/moment.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="<?php echo base_url();?>assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="<?php echo base_url();?>assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url();?>assets/js/admin.js"></script>
    <script src="<?php echo base_url();?>assets/js/pages/tables/jquery-datatable.js"></script>
    <script src="<?php echo base_url();?>assets/js/pages/ui/modals.js"></script>
    <!-- <script src="<?php //echo base_url();?>assets/js/pages/forms/form-validation.js"></script> -->
    <!-- <script src="<?php //echo base_url();?>assets/js/pages/ui/dialogs.js"></script> -->
    <script src="<?php echo base_url();?>assets/js/pages/forms/basic-form-elements.js"></script>
    <script src="<?php echo base_url();?>assets/js/pages/ui/tooltips-popovers.js"></script>

    <!-- date-range-picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/daterangepicker/daterangepicker.js"></script>

    <!-- Chart Plugins Js -->
    <script src="<?php echo base_url();?>assets/plugins/chartjs/Chart.bundle.js"></script>

    <!-- Demo Js -->
    <script src="<?php echo base_url().'assets/js/'; ?>demo.js"></script>

    <script type="text/javascript">
        // Loader Action
        $('.page-loader-wrapper2').hide();
    </script>

    <script type="text/javascript">
        $(function () {
            skinChanger();
            activateNotificationAndTasksScroll();
        });

        //Skin changer
        function skinChanger() {
            $('.right-sidebar .demo-choose-skin li').on('click', function () {
                var $body = $('body');
                var $this = $(this);

                var existTheme = $('.right-sidebar .demo-choose-skin li.active').data('theme');
                $('.right-sidebar .demo-choose-skin li').removeClass('active');
                $body.removeClass('theme-' + existTheme);
                $this.addClass('active');

                $body.addClass('theme-' + $this.data('theme'));
            });
        }

        //Skin tab content set height and show scroll
        function setSkinListHeightAndScroll(isFirstTime) {
            var height = $(window).height() - ($('.navbar').innerHeight() + $('.right-sidebar .nav-tabs').outerHeight());
            var $el = $('.demo-choose-skin');

            if (!isFirstTime){
              $el.slimScroll({ destroy: true }).height('auto');
              $el.parent().find('.slimScrollBar, .slimScrollRail').remove();
            }

            $el.slimscroll({
                height: height + 'px',
                color: 'rgba(0,0,0,0.5)',
                size: '6px',
                alwaysVisible: false,
                borderRadius: '0',
                railBorderRadius: '0'
            });
        }

        //Setting tab content set height and show scroll
        function setSettingListHeightAndScroll(isFirstTime) {
            var height = $(window).height() - ($('.navbar').innerHeight() + $('.right-sidebar .nav-tabs').outerHeight());
            var $el = $('.right-sidebar .demo-settings');

            if (!isFirstTime){
              $el.slimScroll({ destroy: true }).height('auto');
              $el.parent().find('.slimScrollBar, .slimScrollRail').remove();
            }

            $el.slimscroll({
                height: height + 'px',
                color: 'rgba(0,0,0,0.5)',
                size: '6px',
                alwaysVisible: false,
                borderRadius: '0',
                railBorderRadius: '0'
            });
        }

        //Activate notification and task dropdown on top right menu
        function activateNotificationAndTasksScroll() {
            $('.navbar-right .dropdown-menu .body .menu').slimscroll({
                height: '254px',
                color: 'rgba(0,0,0,0.5)',
                size: '4px',
                alwaysVisible: false,
                borderRadius: '0',
                railBorderRadius: '0'
            });
        }
    </script>

    <!-- Fungsi Dialog -->
    <script type="text/javascript">
        //These codes takes from http://t4t5.github.io/sweetalert/
        function showBasicMessage() {
            swal("Here's a message!");
        }

        function showWithTitleMessage() {
            swal("Here's a message!", "It's pretty, isn't it?");
        }

        function validasiMessage(){
            swal({
                title: "Dilarang!",
                text: "Data tidak boleh lebih dari jumlah permintaan!",
                type: "error",
                timer: 1000,
                showConfirmButton: false
            });
        }

        function showSuccessMessage(input) {
            swal({
                title: input+"!",
                text: "Data Berhasil "+input+"!",
                type: "success",
                timer: 1000,
                showConfirmButton: false
            });
        }

        function showFailedMessage(input) {
            swal({
                title: "Gagal!",
                text: "Data Gagal "+input+"!",
                type: "error",
                timer: 1000,
                showConfirmButton: false
            });
        }

        function showConfirmMessage(id) {
            swal({
                title: "Anda yakin data akan dihapus?",
                text: "Data tidak akan dapat di kembalikan lagi!!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ya, Hapus!",
                closeOnConfirm: false
            }, function () {
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('Operator/deleteBarang')?>",
                    dataType : "html",
                    data : {id:id},
                    success: function(data){
                        $('#tbl-barang').DataTable().destroy();
                        tampil_data_barang();
                        $('#tbl-barang').DataTable().draw();
                        kode_otomatis();
                        // $('#editModal #pilihBrg').attr('selected','');
                        $('#editModal').modal('hide');

                        if(data=='Success'){
                            showSuccessMessage('Dihapus');
                        }else{
                            showFailedMessage('Dihapus');
                        } 
                    }
                });
                return false;
                // swal("Hapus!", "Data telah berhasil dihapus.", "success");
            });
        }

        function showCancelMessage() {
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function (isConfirm) {
                if (isConfirm) {
                    swal("Deleted!", "Your imaginary file has been deleted.", "success");
                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            });
        }
    </script>

    <!-- BARANG & PERMINTAAN -->
    <script type="text/javascript">
        // $('.page-loader-wrapper2').hide();

        var tampil = '<?php echo $tampil; ?>';
        if (tampil=='barang') {
            tampil_data_barang();
            kode_otomatis();
        }
        if(tampil=='permintaan'){
            tampil_data_permintaan();
        }   
        
        // Tampil Data Permintaan
        function tampil_data_permintaan(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url(); ?>/operator/getDataPermintaan',
                async : false,
                dataType : 'json',
                success : function(data){
                    var thead = '';
                    var row = '';
                    var i;
                    var no=0;
                    for(i=0; i<data.length; i++){
                        no++;
                        // for(j=0; j<data[i].status.length; j++){
                            // var jo = data[i].status[1];
                            var stats1 = '';
                            var stats2= '';
                            var non_aktif = '';
                            if (data[i].status[0]=='Diajukan') {
                                stats1 = '<span class="label label-warning">'+data[i].status[0]+' '+data[i].jml_status[0]+'</span>';
                            }else if(data[i].status[0]=='Diproses'){
                                stats1 = '<span class="label bg-light-green">'+data[i].status[0]+' '+data[i].jml_status[0]+'</span>';
                            }else if(data[i].status[0]=='Ditolak'){
                                stats1 = '<span class="label label-danger">'+data[i].status[0]+' '+data[i].jml_status[0]+'</span>';
                            }else if(data[i].status[0]=='Dikirim'){
                                stats1 = '<span class="label label-info">'+data[i].status[0]+' '+data[i].jml_status[0]+'</span>';
                            }else{
                                stats1 = '<span class="label bg-pink">'+data[i].status[0]+' '+data[i].jml_status[0]+'</span>';
                            }

                            if (data[i].status[1]!= null) {
                                if (data[i].status[1]=='Diajukan') {
                                    stats2 = '<span class="label label-warning">'+data[i].status[1]+' '+data[i].jml_status[1]+'</span>';
                                }else if(data[i].status[1]=='Diproses'){
                                    stats2 = '<span class="label bg-light-green">'+data[i].status[1]+' '+data[i].jml_status[1]+'</span>';
                                }else if(data[i].status[1]=='Ditolak'){
                                    stats2 = '<span class="label label-danger">'+data[i].status[1]+' '+data[i].jml_status[1]+'</span>';
                                }else if(data[i].status[1]=='Dikirim'){
                                    stats2 = '<span class="label label-info">'+data[i].status[1]+' '+data[i].jml_status[1]+'</span>';
                                }else{
                                    stats2 = '<span class="label bg-pink">'+data[i].status[1]+' '+data[i].jml_status[1]+'</span>';
                                }
                            }

                            if (data[i].status[0]=='Diajukan' || data[i].status[1]=='Diajukan') {
                                non_aktif = 'disabled';
                            }else if (data[i].status[0]=='Diproses' || data[i].status[1]=='Diproses') {
                                non_aktif = '';
                            }else if (data[i].status[0]=='Ditolak' || data[i].status[1]=='Ditolak') {
                                non_aktif = 'disabled';
                            }else if (data[i].status[0]=='Dikirim' || data[i].status[1]=='Dikirim') {
                                non_aktif = 'disabled';
                            }else {
                                non_aktif = 'disabled';
                            }
                            
                        row += '<tr>'+
                                  '<td align="center">'+no+'</td>'+
                                  '<td><div style="float:left;">'+data[i].kode+'</div><div id="label-status'+i+'" style="float:right;">'+stats1+'</br>'+stats2+'</div></td>'+
                                  '<td>'+data[i].unit+'</td>'+
                                  '<td>'+data[i].tgl+'</td>'+
                                  '<td>'+data[i].waktu+'</td>'+
                                  '<td class="clearfix js-sweetalert"><center><button type="button" class="btn btn-sm btn-info waves-effect item_edit" onClick="detailNotif('+data[i].id_pmt+')" title="View Detail"><i class="material-icons">visibility</i></button> <button type="button" class="btn btn-sm bg-pink waves-effect item_edit" onClick="kirim_barang('+data[i].id_pmt+')" title="Kirim Barang" '+non_aktif+'><i class="material-icons">send</i></button></center></td>'+
                                '</tr>';
                    }
                    thead += '<tr>'+
                                '<th width="30">No.</th>'+
                                '<th width="150">Kode Permintaan</th>'+
                                '<th>Nama Unit</th>'+
                                '<th width="75">Tanggal</th>'+
                                '<th width="75">Waktu</th>'+
                                '<th width="80">Aksi</th>'+            
                              '</tr>';
                    // $('#table-brg').html('<div class="table-responsive"><table id="tbl-barang" class="table table-bordered table-striped table-hover js-basic-example dataTable"><thead></thead><tbody></tbody></table></div>');
                    $('#tbl-permintaan thead').html(thead);
                    $('#tbl-permintaan tbody').html(row); 
                }
            });
        }
        
        // Tampil Data Barang
        function tampil_data_barang(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url(); ?>/operator/getDataBarang',
                async : false,
                dataType : 'json',
                success : function(data){
                    var thead = '';
                    var row = '';
                    var i;
                    var no=0;
                    for(i=0; i<data.length; i++){
                        no++;
                        row += '<tr>'+
                                  '<td align="center">'+no+'</td>'+
                                  '<td>'+data[i].kode_barang+'</td>'+
                                  '<td>'+data[i].nama_barang+'</td>'+
                                  '<td>'+data[i].satuan_barang+'</td>'+
                                  '<td class="clearfix js-sweetalert"><center><button type="button" class="btn btn-sm btn-primary waves-effect item_edit" onClick="getUpdateDataBrg('+data[i].id_barang+')" title="Edit Barang"><i class="material-icons">edit</i></button> <button onClick="showConfirmMessage('+data[i].id_barang+')" class="btn btn-sm btn-danger waves-effect" title="Hapus Barang"><i class="material-icons">delete</i></button></center></td>'+
                                '</tr>';
                    }
                    thead += '<tr>'+
                                '<th>No.</th>'+
                                '<th>Kode Barang</th>'+
                                '<th>Nama Barang</th>'+
                                '<th>Satuan</th>'+
                                '<th width="80">Aksi</th>'+            
                              '</tr>';
                    // $('#table-brg').html('<div class="table-responsive"><table id="tbl-barang" class="table table-bordered table-striped table-hover js-basic-example dataTable"><thead></thead><tbody></tbody></table></div>');
                    $('#tbl-barang thead').html(thead);
                    $('#tbl-barang tbody').html(row); 
                }
            });
        }

        function kode_otomatis(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url(); ?>/operator/kodeBarangOtomatis',
                async : false,
                dataType : 'html',
                success : function(data){
                    $('#addModal [name="kode_barang"]').val(data);
                }
            });
        }

        $("#kobar").on('click',function(){
            $('#kdBar').attr('class','form-line focused');
            $('#error_kdBar').html('');
        });

        $("#nabar").on('click',function(){
            $('#nmBar').attr('class','form-line focused');
            $('#error_nmBar').html('');
        });

        $("#sabar").on('change',function(){
            $('#error_stBar').html('');
        });

        // TAMBAH DATA
        $('#addModal #btn_simpan').on('click',function(){
            // $('#addModal #pilihBrg').removeAttr('selected');
            var kobar=$('#addModal #kobar').val();
            var nabar=$('#addModal #nabar').val();
            var sabar=$('#addModal #sabar').val();
            // $('#coba').html(sabar);
            if (kobar=='' || nabar=='' || sabar=='') {
                if (kobar=='') {
                    $('#addModal #kdBar').attr('class','form-line focused error');
                    $('#addModal #error_kdBar').html('Field harus diisi.');
                }
                if (nabar=='') {
                    $('#addModal #nmBar').attr('class','form-line focused error');
                    $('#addModal #error_nmBar').html('Field harus diisi.');
                }
                if (sabar=='') {
                    $('#addModal #error_stBar').html('Pilih satuan barang.');
                }
            }else{
                $('.page-loader-wrapper2').show();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('Operator/addBarang')?>",
                    // beforeSend: $('.page-loader-wrapper').show(),
                    dataType : "html",
                    data : {kobar:kobar , nabar:nabar, sabar:sabar},
                    success: function(data){
                        $('.page-loader-wrapper2').hide();
                        $('#tbl-barang').DataTable().destroy();
                        tampil_data_barang();
                        $('#tbl-barang').DataTable().draw();
                        $('#addModal [name="nama_barang"]').val("");
                        // $('#addModal #pilihBrg').attr('selected','');
                        $('#addModal').modal('hide');
                        kode_otomatis();
                        

                        if(data=='Success'){
                            showSuccessMessage('Tersimpan');
                        }else if(data=='Gagal'){
                            showFailedMessage('Tersimpan');
                        }else{
                            swal("Gagal!", "Data Sudah Tersedia!", "error");
                        }   
                    }
                });
                return false;
            }
        });
    </script>

    <!-- UPDATE -->
    <script type="text/javascript">
        // UPDATE DATA
        $('#editModal #btn_simpan').on('click',function(){
            $('.page-loader-wrapper2').show();
            var kobar=$('#editModal #kobar').val();
            var nabar=$('#editModal #nabar').val();
            var sabar=$('#editModal #sabar').val();
            // $('#coba').html(sabar);
            if (kobar=='' || nabar=='' || sabar=='') {
                if (kobar=='') {
                    $('#editModal #kdBar').attr('class','form-line focused error');
                    $('#editModal #error_kdBar').html('Field harus diisi.');
                }
                if (nabar=='') {
                    $('#editModal #nmBar').attr('class','form-line focused error');
                    $('#editModal #error_nmBar').html('Field harus diisi.');
                }
                if (sabar=='') {
                    $('#editModal #error_stBar').html('Field harus diisi.');
                }
            }else{
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('Operator/updateBarang')?>",
                    dataType : "html",
                    data : {kobar:kobar , nabar:nabar, sabar:sabar},
                    success: function(data){
                        $('.page-loader-wrapper2').hide();
                        $('#tbl-barang').DataTable().destroy();
                        tampil_data_barang();
                        $('#tbl-barang').DataTable().draw();
                        // $('#editModal #pilihBrg').attr('selected','');
                        $('#editModal').modal('hide');

                        if(data=='Success'){
                            showSuccessMessage('Tersimpan');
                        }else if(data=='Gagal'){
                            showFailedMessage('Tersimpan');
                        }else{
                            swal("Gagal!", "Data Sudah Tersedia!", "error");
                        }   
                    }
                });
                return false;
            }
        });

        // ambil();
        // function ambil(){
        //     var coba = $('#addModal #sabar option:selected').attr('nama');
        //     var id = $('#addModal #sabar').val();
        //     $('#ambil').html(coba+" "+id);
        // }

        // GET UPDATE
        function getUpdateDataBrg(id){
            // var id=$(this).attr('data');
            $.ajax({
                type : 'GET',
                url  : '<?php echo base_url(); ?>/operator/getUpdateDataBrg',
                async : false,
                dataType : 'JSON',
                data : {id:id},
                success: function(data){
                        $('#editModal [name="kode_barang"]').val(data[0].kode_barang);
                        $('#editModal #kdBar').attr('class','form-line focused');
                        $('#editModal [name="nama_barang"]').val(data[0].nama_barang);
                        $('#editModal #nmBar').attr('class','form-line focused');
                        // $('#editModal #pilih'+data[0].sat_id).attr('selected','');
                        satBrgSelected(data[0].sat_id);
                        $('#editModal').modal('show');                        
                }
            });
            return false;
        }

        // SATUAN BARANG
        // satBrg();
        function satBrg(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url(); ?>/operator/getSatuanBrg',
                async : false,
                dataType : 'json',
                success : function(data){
                    var opt = '';
                    opt += '<option selected value="">-- Pilih Satuan Barang --</option>';
                    for (var i = 0; i<data.length; i++) {
                        opt += '<option value="'+data[i].sat_id+'">'+data[i].sat_nama+'</option>';
                    }
                    // $('#addModal #stBar').html('<select class="form-control show-tick" data-live-search="true" name="satuan_barang" id="sabar"></select>');
                    $('#addModal #sabar').html(opt);
                }
            });
        }

        
        // SATUAN BARANG SELECTED
        function satBrgSelected(cekPilih){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url(); ?>/operator/getSatuanBrg',
                async : false,
                dataType : 'json',
                success : function(data){
                    var opt = '';
                    opt += '<option id="pilihBrg" value="">-- Pilih Satuan Barang --</option>';
                    for (var i = 0; i<data.length; i++) {
                        if (cekPilih==data[i].sat_id) {
                            opt += '<option selected value="'+data[i].sat_id+'">'+data[i].sat_nama+'</option>';
                        }else{
                            opt += '<option value="'+data[i].sat_id+'">'+data[i].sat_nama+'</option>';
                        }
                    }
                    $('#editModal #stBar').html('<select class="form-control show-tick" data-live-search="true" name="satuan_barang" id="sabar"></select>');
                    $('#editModal #sabar').html(opt);
                }
            });
        }
    </script>

 <!-- SATUAN BARANG -->
    <script type="text/javascript">
        var tampil = '<?php echo $tampil; ?>';
        if (tampil=='satuan') {
            tampil_data_satuan();
        } 

        function showConfirmMessageSatuan(id) {
            swal({
                title: "Anda yakin data akan dihapus?",
                text: "Data tidak akan dapat di kembalikan lagi!!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ya, Hapus!",
                closeOnConfirm: false
            }, function () {
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('Operator/deleteSatuan')?>",
                    dataType : "html",
                    data : {id:id},
                    success: function(data){
                        $('#tbl-satuan').DataTable().destroy();
                        tampil_data_satuan();
                        $('#tbl-satuan').DataTable().draw();
                        // $('#editModal #pilihBrg').attr('selected','');
                        $('#editModalSatuan').modal('hide');

                        if(data=='Success'){
                            showSuccessMessage('Dihapus');
                        }else{
                            showFailedMessage('Dihapus');
                        } 
                    }
                });
                return false;
                // swal("Hapus!", "Data telah berhasil dihapus.", "success");
            });
        }

        function tampil_data_satuan(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url(); ?>/operator/getDataSatuan',
                async : false,
                dataType : 'json',
                success : function(data){
                    var thead = '';
                    var row = '';
                    var i;
                    var no=0;
                    for(i=0; i<data.length; i++){
                        no++;
                        row += '<tr>'+
                                  '<td align="center">'+no+'</td>'+
                                  '<td>'+data[i].nama+'</td>'+
                                  '<td class="clearfix js-sweetalert"><center><button type="button" class="btn btn-sm btn-primary waves-effect item_edit" onClick="getUpdateDataSat('+data[i].id_satuan+')" title="Edit Barang"><i class="material-icons">edit</i></button> <button onClick="showConfirmMessageSatuan('+data[i].id_satuan+')" class="btn btn-sm btn-danger waves-effect" title="Hapus Barang"><i class="material-icons">delete</i></button></center></td>'+
                                '</tr>';
                    }
                    thead += '<tr>'+
                                '<th width="30">No.</th>'+
                                '<th>Satuan Barang</th>'+
                                '<th width="80">Aksi</th>'+            
                              '</tr>';
                    // $('#table-brg').html('<div class="table-responsive"><table id="tbl-barang" class="table table-bordered table-striped table-hover js-basic-example dataTable"><thead></thead><tbody></tbody></table></div>');
                    $('#tbl-satuan thead').html(thead);
                    $('#tbl-satuan tbody').html(row); 
                }
            });
        }

        // TAMBAH DATA
        $('#addModalSatuan #btn_simpan').on('click',function(){
            // $('#addModal #pilihBrg').removeAttr('selected');
            var nasat=$('#addModalSatuan #nasat').val();
            
            // $('#coba').html(sabar);
            if (nasat=='') {
                $('#addModalSatuan #nmSat').attr('class','form-line focused error');
                $('#addModalSatuan #error_nmSat').html('Field harus diisi.');
            }else{
                $('.page-loader-wrapper2').show();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('Operator/addSatuan')?>",
                    dataType : "html",
                    data : {nasat:nasat},
                    success: function(data){
                        $('.page-loader-wrapper2').hide();
                        $('#tbl-satuan').DataTable().destroy();
                        tampil_data_satuan();
                        $('#tbl-satuan').DataTable().draw();
                        $('#addModalSatuan [name="nama_satuan"]').val("");
                        // $('#addModal #pilihBrg').attr('selected','');
                        $('#addModalSatuan').modal('hide');
                    
                        if(data=='Success'){
                            showSuccessMessage('Tersimpan');
                        }else if(data=='Gagal'){
                            showFailedMessage('Tersimpan');
                        }else{
                            swal("Gagal!", "Data Sudah Tersedia!", "error");
                        }   
                    }
                });
                return false;
            }
        });

        // UPDATE DATA
        $('#editModalSatuan #btn_simpan').on('click',function(){
            $('.page-loader-wrapper2').show();
            var nasat=$('#editModalSatuan #nasat').val();
            var idSat=$('#editModalSatuan #nasat').attr('data');
            // $('#coba').html(sabar);
            if (nasat=='') {
                $('#editModalSatuan #nmSat').attr('class','form-line focused error');
                $('#editModalSatuan #error_nmSat').html('Field harus diisi.');
            }else{
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('Operator/updateSatuan')?>",
                    dataType : "html",
                    data : {nasat:nasat, idSat:idSat},
                    success: function(data){
                        $('.page-loader-wrapper2').hide();
                        $('#tbl-satuan').DataTable().destroy();
                        tampil_data_satuan();
                        $('#tbl-satuan').DataTable().draw();
                        $('#editModalSatuan').modal('hide');

                        if(data=='Success'){
                            showSuccessMessage('Tersimpan');
                        }else if(data=='Gagal'){
                            showFailedMessage('Tersimpan');
                        }else{
                            swal("Gagal!", "Data Sudah Tersedia!", "error");
                        }   
                    }
                });
                return false;
            }
        });

        // ambil();
        // function ambil(){
        //     var coba = $('#addModal #sabar option:selected').attr('nama');
        //     var id = $('#addModal #sabar').val();
        //     $('#ambil').html(coba+" "+id);
        // }

        // GET UPDATE
        function getUpdateDataSat(id){
            // var id=$(this).attr('data');
            $.ajax({
                type : 'GET',
                url  : '<?php echo base_url(); ?>/operator/getUpdateDataSat',
                async : false,
                dataType : 'JSON',
                data : {id:id},
                success: function(data){
                        $('#editModalSatuan [name="nama_satuan"]').val(data[0].satuan);
                        $('#editModalSatuan #nasat').attr('data',id);
                        $('#editModalSatuan #nmSat').attr('class','form-line focused');
                        // $('#editModal #pilih'+data[0].sat_id).attr('selected','');
                        $('#editModalSatuan').modal('show');                        
                }
            });
            return false;
        }
    </script>

    <!-- NOTIFIKASI -->
    <script type="text/javascript">
        function kirim_barang(id){
            $('.page-loader-wrapper2').show();
            $.ajax({
                type : 'GET',
                url  : '<?php echo base_url(); ?>/operator/kirimBarang',
                async : false,
                dataType : 'html',
                data : {id:id},
                success: function(data){
                    $('.page-loader-wrapper2').hide();
                    // alert(data);
                    if(data=='Success'){
                        $('#tbl-permintaan').DataTable().destroy();
                        tampil_data_permintaan();
                        $('#tbl-permintaan').DataTable().draw();
                        showSuccessMessage('Tersimpan');
                    }else{
                        showFailedMessage('Tersimpan');
                    }                
                }
            });
            return false;
        }
        // setInterval('countNotif()', 5000);
        setInterval(function(){ countNotif();}, 5000);
        // setInterval(function(){ notif();}, 5000);
        // setInterval(function(){ activateNotificationAndTasksScroll();}, 5000);
        // setInterval('notif()', 5000);
        notif();
        countNotif();

        // ULANG JML NOTIF
        function clearCount(){
                $.ajax({
                    type : "ajax",
                    url  : "<?php echo base_url('Operator/clearCount')?>",
                    dataType : "html",
                    // data : {kobar:kobar , nabar:nabar, sabar:sabar},
                    success: function(data){
                        if (data=='Success') {
                            countNotif();
                        }
                    }
                });
                return false;
        }

        // JUMLAH NOTIF BARU MASUK
        function countNotif(){
            $.ajax({
                type : 'ajax',
                url  : '<?php echo base_url(); ?>/operator/countNotif',
                async : false,
                dataType : 'JSON',
                success: function(data){
                    var html = data[0].jml_notif;
                    if (html==0) {
                       $('.label-count').html(''); 
                    }else{
                        $('.label-count').html(html);
                    }    
                    // notif();    
                    // activateNotificationAndTasksScroll();
                }
            });
            return false;
        }

        // showStyle();
        // function showStyle(){
        //     $('#styles').attr('href','<?php //echo base_url();?>assets/css/style.css');
        // }

        // function includeNotif(){
        //     $('#navbar-collapse').html(
        //         '<ul class="nav navbar-nav navbar-right">'+
        //             '<li class="dropdown" id="notif-permintaan" onclick="clearCount();">'+
        //                 '<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">'+
        //                     '<i class="material-icons">notifications</i>'+
        //                     '<span class="label-count"></span>'+
        //                 '</a>'+
        //                 '<ul class="dropdown-menu" id="notif">'+
        //                     '<li class="header">NOTIFICATIONS</li>'+
        //                     '<li class="body"></li>'+
        //                 '</ul>'+
        //             '</li>'+
        //             '<li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>'+
        //         '</ul>'
        //     );
        // }

        // NOTIFIKASI
        function notif(){
            $('#notif ul.menu li').remove();
            $.ajax({
                type : 'ajax',
                url  : '<?php echo base_url(); ?>/operator/notification',
                async : false,
                dataType : 'JSON',
                // data : {id:id},
                success: function(data){
                    var html = '';
                    if (data.length==0) {
                        html += '<li><a href="javascript:void(0);" align="center"><div class="menu-info">Belum ada notifikasi masuk</div></a></li>';
                    }else{
                        for(var i=0; i<data.length; i++){
                            if(data[i].status_notif==2){
                                html += '<li>'+
                                            '<a href="javascript:void(0);" id="detail-notif" onClick="detailNotif('+data[i].id_pmt+');">'+
                                                '<div style="width: 7px; height:50px; background: skyblue; float: left; margin-right: 10px;">'+
                                                    // '<i class="material-icons">notifications_active</i>'+
                                                '</div>'+
                                                '<div class="menu-info">'+
                                                    '<h4>'+data[i].ukerja_name+'</h4>'+
                                                    '<p style="color: #b5b5b5;">'+
                                                        'Kode: '+data[i].kode_permintaan+'<br>'+
                                                        '<i class="material-icons" style="color: #b5b5b5;">access_time</i> '+data[i].tgl+' ('+data[i].jam+')'+
                                                    '</p>'+
                                                '</div>'+
                                            '</a>'+
                                        '</li>';
                            }else{
                                html += '<li style="background: #f2f2f2;">'+
                                            '<a href="javascript:void(0);" id="detail-notif" onClick="detailNotif('+data[i].id_pmt+');">'+
                                                '<div style="width: 7px; height:50px; background: orange; float: left; margin-right: 10px;">'+
                                                    // '<i class="material-icons">notifications_active</i>'+
                                                '</div>'+
                                                '<div class="menu-info">'+
                                                    '<h4>'+data[i].ukerja_name+'</h4>'+
                                                    '<p style="color: #b5b5b5;">'+
                                                        'Kode: '+data[i].kode_permintaan+'<br>'+
                                                        '<i class="material-icons" style="color: #b5b5b5;">access_time</i> '+data[i].tgl+' ('+data[i].jam+')'+
                                                    '</p>'+
                                                '</div>'+
                                            '</a>'+
                                        '</li>';
                            }
                        }
                    }
                    // $('#notif-permintaan').html('<ul class="dropdown-menu" id="notif"></ul>');
                    // $('#notif').html('<li class="body"></li>');
                    $('#notif-permintaan .dropdown-menu .body').html('<ul class="menu"></ul>');
                    $('#notif .menu').html(html);            
                }
            });
            return false;
        }

        function changeStatusNotif(id){
            $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('Operator/changeStatusNotif')?>",
                    async : false,
                    dataType : "html",
                    data : {id:id},
                    success: function(data){
                        notif();
                    }
                });
                return false;
        }

        // SHOW DETAIL PERMINTAAN
        function detailNotif(id){
            // var id=$(this).attr('data');
            // var id_pmt = String(id);
            // if (id_pmt.length<12){
            //     kode = '0'+id;
            // }else{
            //     kode = id;
            // }
            var kode = id;
            
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('Operator/getDetailPermintaan')?>",
                async : false,
                dataType : "JSON",
                data : {id:kode},
                success: function(data){
                    var html = '';
                    var i;
                    var j=0;
                    var sts = 0;
                    $('#detail-permintaan').modal('show');
                    for (var x = 0; x<data.length; x++) {
                        if (data[x].status=='Dikirim'||data[x].status=='Diterima') {
                            sts++;
                        }
                    }
                    for(i=0; i<data.length; i++){
                        j++;
                        if (sts>0) {
                            $('#detail-permintaan #btn-simpan-pmt').hide();
                            // if (data[i].jml_setuju==0) {
                                stats = '';
                                if (data[i].status=='Diajukan') {
                                    stats = '<span class="label label-warning">'+data[i].status+'</span>';
                                }else if(data[i].status=='Diproses'){
                                    stats = '<span class="label bg-light-green">'+data[i].status+'</span>';
                                }else if(data[i].status=='Ditolak'){
                                    stats = '<span class="label label-danger">'+data[i].status+'</span>';
                                }else if(data[i].status=='Dikirim'){
                                    stats = '<span class="label label-info">'+data[i].status+'</span>';
                                }else{
                                    stats = '<span class="label bg-pink">'+data[i].status+'</span>';
                                }
                                html += '<tr>'+
                                            '<td>'+j+'</td>'+
                                            '<td>'+data[i].kode+'</td>'+
                                            '<td>'+data[i].nama+'</td>'+
                                            '<td>'+data[i].satuan+'</td>'+
                                            '<td id="jml-pmt'+j+'" align="center">'+data[i].jml+'</td>'+
                                            // '<td id="ceked'+j+'" align="center"><div class="switch"><i class="material-icons">clear</i></div></td>'+
                                            '<td width="100px" id="inputJml"><input id="jml'+j+'" type="text" class="form-control" maxlength="4" value="'+data[i].jml_setuju+'" disabled></td>'+
                                            '<td>'+stats+'</td>'
                                        '</tr>';
                            // }else{
                            //     html += '<tr>'+
                            //                 '<td>'+j+'</td>'+
                            //                 '<td>'+data[i].kode+'</td>'+
                            //                 '<td>'+data[i].nama+'</td>'+
                            //                 '<td id="jml-pmt'+j+'" align="center">'+data[i].jml+'</td>'+
                            //                 // '<td id="ceked'+j+'" align="center"><div class="switch"><i class="material-icons">done</i></div></td>'+
                            //                 '<td width="100px" id="inputJml"><input id="jml'+j+'" type="text" class="form-control" maxlength="4" value="'+data[i].jml_setuju+'" disabled></td>'+
                            //             '</tr>';
                            // }
                        }else{
                            $('#detail-permintaan #btn-simpan-pmt').show();
                            if (data[i].jml_setuju==0) {
                                html += '<tr>'+
                                        '<td>'+j+'</td>'+
                                        '<td>'+data[i].kode+'</td>'+
                                        '<td>'+data[i].nama+'</td>'+
                                        '<td>'+data[i].satuan+'</td>'+
                                        '<td id="jml-pmt'+j+'" align="center">'+data[i].jml+'</td>'+
                                        '<td id="ceked'+j+'" align="center"><div class="switch"><label><input type="checkbox" id="cek'+j+'" value="'+data[i].kode+'" onClick="inputAktif('+j+');"><span class="lever switch-col-red"></span></label></div></td>'+
                                        '<td width="100px" id="inputJml"><input type="hidden" id="id_pmt'+j+'" value="'+data[i].id_pmt+'"><input id="jml'+j+'" type="text" onKeyPress="return inputAngka(event);" onKeyUp="inputJmlPermintaan('+j+');" class="form-control" maxlength="4" disabled></td>'+
                                    '</tr>';
                            }else{
                                html += '<tr>'+
                                        '<td>'+j+'</td>'+
                                        '<td>'+data[i].kode+'</td>'+
                                        '<td>'+data[i].nama+'</td>'+
                                        '<td>'+data[i].satuan+'</td>'+
                                        '<td id="jml-pmt'+j+'" align="center">'+data[i].jml+'</td>'+
                                        '<td id="ceked'+j+'" align="center"><div class="switch"><label><input type="checkbox" id="cek'+j+'" value="'+data[i].kode+'" onClick="inputAktif('+j+');" checked><span class="lever switch-col-red"></span></label></div></td>'+
                                        '<td width="100px" id="inputJml"><input type="hidden" id="id_pmt'+j+'" value="'+data[i].id_pmt+'"><input id="jml'+j+'" type="text" onKeyPress="return inputAngka(event);" onKeyUp="inputJmlPermintaan('+j+');" class="form-control" maxlength="4" value="'+data[i].jml_setuju+'"></td>'+
                                    '</tr>';
                            }
                        } 
                    }
                    if(sts>0){
                        $('#tbl-detail thead').html(
                            '<tr>'+
                                '<th>No</th>'+
                                '<th>Kode Barang</th>'+
                                '<th>Nama Barang</th>'+
                                '<th>Satuan Barang</th>'+
                                '<th><center>Jumlah</center></th>'+
                                '<th>Disetujui</th>'+
                                '<th>Status</th>'+
                            '</tr>'
                        );
                    }else{
                        $('#tbl-detail thead').html(
                            '<tr>'+
                                '<th>No</th>'+
                                '<th>Kode Barang</th>'+
                                '<th>Nama Barang</th>'+
                                '<th>Satuan Barang</th>'+
                                '<th><center>Jumlah</center></th>'+
                                '<th><center>Setuju (Ya/Tidak)</center></th>'+
                                '<th>Jumlah</th>'+
                            '</tr>'
                        );
                    }
                    $('#header-detail').html('<div style="float: left;">Nama Unit : <label id="unit">'+data[0].ukerja+'</label></div><div style="float: right;">Kode Permintaan : <label id="kode">'+data[0].kode_pmt+'</label></div>');
                    $('#show-detail').html(html);
                }
            });
            return false;
        }

        // KONFIRMASI PERMINTAAN
        $('#detail-permintaan #btn-simpan-pmt').on('click', function(){
            var table = $("#tbl-detail tbody");
            var kode_permintaan = $('#detail-permintaan #kode').html();
            // var id_pmt = [];
            // var jml_pmt = [];
            // var kode_pmt = [];
            var kode_brg = [];
            var qty = [];
            table.find('tr').each(function (i) {
                // i++;
                var $tds = $(this).find('td'),
                    kode = $tds.eq(1).text(),
                    jmt = $tds.eq(3).text();

                if ($('#ceked'+(i+1)+' input:checked').length==1) {
                    cek = $('#jml'+(i+1)).val();
                    if (cek=='') {
                        jml = 0;
                    }else{
                        jml = $('#jml'+(i+1)).val();
                    }
                }else{
                    jml = 0;
                }
                kode_brg.push(kode);
                qty.push(jml);
            });
            // for (var i = 0; i < qty.length; i++) {
            //     alert('Row ' + (i + 1) + ':\nKode Permintaan: ' + kode_permintaan
            //           + '\nProduct: ' + kode_brg[i]
            //           + '\nQuantity: ' + qty[i]);
            // }
            $('.page-loader-wrapper2').show();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('Operator/konfirmasiPermintaan')?>",
                dataType : "html",
                data : {kode_pmt:kode_permintaan, kode_brg:kode_brg, qty:qty},
                success: function(data){
                    $('.page-loader-wrapper2').hide();
                    $('#detail-permintaan').modal('hide');
                    // alert(data);
                    // notif();
                    if(data=='Success'){
                        $('#tbl-permintaan').DataTable().destroy();
                        tampil_data_permintaan();
                        $('#tbl-permintaan').DataTable().draw();
                        showSuccessMessage('Tersimpan');
                    }else{
                        showFailedMessage('Tersimpan');
                    }
                }
            });
            return false;
        });

        // INPUT MAKS NILAI 
        function inputJmlPermintaan(id){
            var input=parseInt($('#jml'+id).val());
            var jml=parseInt($('#jml-pmt'+id).text());
            if (input>jml) {
                // alert ('Nilai tidak boleh lebih besar dari jumlah permintaan');
                validasiMessage();
                $('#jml'+id).val(jml);
            }
        }

        // INPUT ANGKA
        function inputAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))

            return false;
            return true;
        }

        function inputAktif(id){
            if ($('#ceked'+id+' input:checked').length==1) {
                $('#jml'+id).removeAttr("disabled");
            }else{
                $('#jml'+id).attr('disabled','');
            }
        }
    </script>

      <!-- Format Date Range Picker -->
    <script type="text/javascript">
        $(function() {

            $('#reservation-brg, #reservation-unit').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear'
              }
            });

            $('#reservation-brg').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('YYYY-MM-DD') + ' / ' + picker.endDate.format('YYYY-MM-DD'));
            });

            $('#reservation-unit').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('YYYY-MM-DD') + ' / ' + picker.endDate.format('YYYY-MM-DD'));
            });

            $('#reservation-brg').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });

            $('#reservation-unit').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });

        });
    </script>
    <!-- End Format Date Range Picker -->

    <!-- Fungsi Laporan Barang -->
    <script type="text/javascript">
        var tampil = '<?php echo $tampil; ?>';
        if (tampil=='lap_unit') {
            showLaporanUnit();
        }
        if(tampil=='lap_brg'){
            showLaporanBarang();
        }   

        function showLaporanBarang(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo site_url('Operator/showLaporanBarang')?>',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var row = '';
                    var i;
                    var no=0;
                    for(i=0; i<data.length; i++){
                        no++;
                        row += '<tr>'+
                                  '<td align="center">'+no+'</td>'+
                                  '<td>'+data[i].kode_barang+'</td>'+
                                  '<td>'+data[i].brgmtang_name+'</td>'+
                                  '<td>'+data[i].satuan+'</td>'+
                                  '<td>'+data[i].jumlah_barang+'</td>'+
                                  '<td style="text-align:right;">'+
                                        '<center>'+
                                            '<button type="button" title="Chart" class="btn btn-info item_detail" data="'+data[i].kode_barang+'"><i class="material-icons">assessment</i></button>'+
                                            '<button type="button" title="View Tabel" class="btn btn-danger item_list" data="'+data[i].kode_barang+'" nama="'+data[i].brgmtang_name+'"><i class="material-icons">view_quilt</i></button>'+
                                        '</center>'+
                                    '</td>'+
                                '</tr>';
                    }
                    $('#show-laporanBarang').html(row); 
                }
            });
        }
        // End Show dataBarang

        $('#tbl-laporanBarang').on('click','.item_list',function(){
            var id=$(this).attr('data');
            var nama = $(this).attr('nama');
            // alert(id);
            $('#Modal_ListUnit').modal('show');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('Operator/showGrafikBar')?>",
                async : false,
                dataType : "JSON",
                data : {id:id},
                success : function(data){
                    var html = '';
                    var row = '';
                    var i;
                    var no=0;
                    for(i=0; i<data.length; i++){
                        no++;
                        row += '<tr>'+
                                  '<td align="center">'+no+'</td>'+
                                  '<td>'+data[i].ukerja_name+'</td>'+
                                  '<td>'+data[i].jumlah_barang+'</td>'+
                                '</tr>';
                    }
                    $('#show_namaBarang').html(nama);
                    $('#show-list').html(row); 
                }
            });
            return false;
        });

        // Show Laporan Barang
        $('#reservation-brg').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD') + ' / ' + picker.endDate.format('YYYY-MM-DD'));
            var id = $(this).val();
            // alert(id);
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('Operator/getLaporanBarang')?>",
                async : false,
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    var row = '';
                    var i;
                    var no=0;
                    for(i=0; i<data.length; i++){
                        no++;
                        row += '<tr>'+
                                  '<td align="center">'+no+'</td>'+
                                  '<td>'+data[i].kode_barang+'</td>'+
                                  '<td>'+data[i].brgmtang_name+'</td>'+
                                  '<td>'+data[i].jumlah_barang+'</td>'+
                                  '<td>'+data[i].satuan+'</td>'+
                                  '<td style="text-align:right;">'+
                                        '<center>'+
                                            '<button type="button" title"View Grafik" class="btn btn-info item_detail" data="'+data[i].kode_barang+'"><i class="material-icons">assessment</i></button>'+
                                            '<button type="button" title="View Tabel" class="btn btn-danger item_list" data="'+data[i].kode_barang+'"><i class="material-icons">view_quilt</i></button>'+
                                        '</center>'+
                                  '</td>'+
                                '</tr>';
                    }
                    $('#tbl-laporanBarang').DataTable().destroy();
                    $('#print').show();
                    $('#show-laporanBarang').html(row); 
                    $('#tbl-laporanBarang').DataTable().draw();
                }
            });
            return false;
        });
        // End Show Laporan Barang Unit

        // GET UPDATE
        $('#tbl-laporanBarang').on('click','.item_detail',function(){
            var id=$(this).attr('data');
            //alert(id);
            var count = [];
            var list = [];
            var color = [
                '#3F51B5', '#009688', '#FFEB3B', '#795548', '#F44336', '#2196F3', '#4CAF50', '#FFC107', '#9E9E9E', '#E91E63', '#9C27B0', '#03A9F4', '#8BC34A', '#FF9800', '#607D8B', '#673AB7', '#00BCD4', '#CDDC39', '#FF5722', '#000000',
                '#3F51B5', '#009688', '#FFEB3B', '#795548', '#F44336', '#2196F3', '#4CAF50', '#FFC107', '#9E9E9E', '#E91E63', '#9C27B0', '#03A9F4', '#8BC34A', '#FF9800', '#607D8B', '#673AB7', '#00BCD4', '#CDDC39', '#FF5722', '#000000',
                '#3F51B5', '#009688', '#FFEB3B', '#795548', '#F44336', '#2196F3', '#4CAF50', '#FFC107', '#9E9E9E', '#E91E63', '#9C27B0', '#03A9F4', '#8BC34A', '#FF9800', '#607D8B', '#673AB7', '#00BCD4', '#CDDC39', '#FF5722', '#000000',
                '#3F51B5', '#009688', '#FFEB3B', '#795548', '#F44336', '#2196F3', '#4CAF50', '#FFC107', '#9E9E9E', '#E91E63', '#9C27B0', '#03A9F4', '#8BC34A', '#FF9800', '#607D8B', '#673AB7', '#00BCD4', '#CDDC39', '#FF5722', '#000000',
                '#3F51B5', '#009688', '#FFEB3B', '#795548', '#F44336', '#2196F3', '#4CAF50', '#FFC107', '#9E9E9E', '#E91E63', '#9C27B0', '#03A9F4', '#8BC34A', '#FF9800', '#607D8B', '#673AB7', '#00BCD4', '#CDDC39', '#FF5722', '#000000'
            ];

            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('Operator/showGrafikBar')?>",
                async : false,
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    var row = '<canvas id="bar_chart" height="150"></canvas>';
                    var i;
                    for(i=0; i<data.length; i++){
                        list.push(data[i].ukerja_name);
                        count.push(data[i].jumlah_barang);
                    }

                    var config = null;
                    $("#Chartbody").html(row);
                    new Chart(document.getElementById("bar_chart").getContext("2d"),
                        config = {
                            type: 'bar',
                            data: {
                                labels: list,
                                datasets: [{
                                    label: "Data Barang ",
                                    data: count,
                                    backgroundColor: color
                                }]
                            },
                            options: {
                                responsive: true,
                                legend: false
                            }
                        }
                    );
                    $('#Modal_GrafikBarang').modal('show'); 
                }
            });
            return false;
        });

        showLaporanUnit();
        function showLaporanUnit(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo site_url('Operator/showLaporanUnit')?>',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var row = '';
                    var i;
                    var no=0;
                    for(i=0; i<data.length; i++){
                        no++;
                        row += '<tr>'+
                                  '<td align="center">'+no+'</td>'+
                                  '<td>'+data[i].kode_permintaan+'</td>'+
                                  '<td>'+data[i].ukerja_name+'</td>'+
                                  '<td>'+data[i].tgl_permintaan+'</td>'+
                                  '<td style="text-align:right;">'+
                                        '<center>'+
                                            '<button type="button" class="btn btn-info item_detail" title="View" data="'+data[i].kode_permintaan+'"><i class="material-icons">visibility</i></button>'+
                                        '</center>'+
                                    '</td>'+
                                '</tr>';
                    }
                    $('#show-laporanUnit').html(row); 
                }
            });
        }

        showUnit();
        function showUnit(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo site_url('Operator/showUnit')?>',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    html += '<option value="" id="chooseUnit" selected>-- Pilih Unit --</option>';
                    for(i=0; i<data.length; i++){
                        html += '<option value="'+data[i].ukerja_kode+'" nama="'+data[i].ukerja_kode+'">'+data[i].ukerja_name+'</option>';
                    }
                    $('#nama_unit').html(html);
                }
            });
        }

        $('#unit').hide();
        $('#nama_unit').attr('disabled');


        function PilihUnit(){
            var selectUnit = document.getElementById('pilih_unit').value;
            if (selectUnit == 'All') {
                $('#unit').hide();
                $('#nama_unit').attr('disabled', '');
                $('#chooseUnit').attr('selected', '');
                showLaporanUnit();
            } else {
                $('#unit').show();
                $('#nama_unit').removeAttr('disabled');
                // document.getElementById('nama_unit').removeAttribute("disabled");
            }
        }

        $('#nama_unit').change(function() {
            var id = $(this).val();
            var tgl = $('#reservation-unit').val();
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('Operator/getLaporanUnitname')?>",
                async : false,
                dataType : "JSON",
                data : {id:id, tgl:tgl},
                success: function(data){
                    var row = '';
                    var i;
                    var no=0;
                    for(i=0; i<data.length; i++){
                        no++;
                        row += '<tr>'+
                                  '<td align="center">'+no+'</td>'+
                                  '<td>'+data[i].kode_permintaan+'</td>'+
                                  '<td>'+data[i].ukerja_name+'</td>'+
                                  '<td>'+data[i].tgl_permintaan+'</td>'+
                                  '<td style="text-align:right;">'+
                                        '<center>'+
                                            '<button type="button" class="btn btn-info item_detail" title="View" data="'+data[i].kode_permintaan+'"><i class="material-icons">visibility</i></button>'+
                                        '</center>'+
                                    '</td>'+
                                '</tr>';
                    }
                    $('#tbl-laporanUnit').DataTable().destroy();
                    $('#print').show();
                    $('#show-laporanUnit').html(row); 
                    $('#tbl-laporanUnit').DataTable().draw();
                }
            });
            return false;
        });

        // Show Laporan Barang Unit
        $('#reservation-unit').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD') + ' / ' + picker.endDate.format('YYYY-MM-DD'));
            var id = $(this).val();
            // alert(id);
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('Operator/getLaporanUnit')?>",
                async : false,
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    var row = '';
                    var i;
                    var no=0;
                    for(i=0; i<data.length; i++){
                        no++;
                        row += '<tr>'+
                                  '<td align="center">'+no+'</td>'+
                                  '<td>'+data[i].kode_permintaan+'</td>'+
                                  '<td>'+data[i].ukerja_name+'</td>'+
                                  '<td>'+data[i].tgl_permintaan+'</td>'+
                                  '<td style="text-align:right;">'+
                                        '<center>'+
                                            '<button type="button" class="btn btn-info item_detail" title="View" data="'+data[i].kode_permintaan+'"><i class="material-icons">visibility</i></button>'+
                                        '</center>'+
                                    '</td>'+
                                '</tr>';
                    }
                    $('#tbl-laporanUnit').DataTable().destroy();
                    // $('#print').show();
                    $('#show-laporanUnit').html(row); 
                    $('#tbl-laporanUnit').DataTable().draw();
                }
            });
            return false;
        });
        // End Show Laporan Barang Unit

        //GET UPDATE
        $('#tbl-laporanUnit').on('click','.item_detail',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('Operator/getDetailLaporanUnit')?>",
                async : false,
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    var html = '';
                    var i;
                    var j;
                    for(i=0; i<data.length; i++){
                        j = i + 1;
                        html += '<tr>'+
                                    '<td>'+j+'</td>'+
                                    '<td>'+data[i].brgmtang_kode+'</td>'+
                                    '<td>'+data[i].brgmtang_name+'</td>'+
                                    '<td>'+data[i].stabrg_name+'</td>'+
                                    '<td>'+data[i].jumlah_barang+'</td>'+
                                    '<td>'+data[i].jml_brgsetuju+'</td>'+
                                '</tr>';
                    }
                    $('#Modal_DetailLaporanUnit').modal('show');
                    $('#Modal_DetailLaporanUnit #show-detail').html(html);
                }
            });
            return false;
        });

    </script>
    <!-- End Fungsi Laporan Barang -->

    <script type="text/javascript">

        $("#old_pass").on('click',function(){
            $('#oldPass').attr('class','form-line focused');
            $('#error_oldPass').html('');
        });
        $("#new_pass").on('click',function(){
            $('#newPass').attr('class','form-line focused');
            $('#error_newPass').html('');
        });
        $("#new_pass2").on('click',function(){
            $('#newPass2').attr('class','form-line focused');
            $('#error_newPass2').html('');
        });

        // UBAH PASSWORD
        $('#Modal_Ubah_Pwd #btn_simpan').on('click',function(){
            var id = <?php echo $this->session->userdata('id_user'); ?>;
            var oldPass=$('#Modal_Ubah_Pwd #old_pass').val();
            var newPass=$('#Modal_Ubah_Pwd #new_pass').val();
            var newPass2=$('#Modal_Ubah_Pwd #new_pass2').val();
            // $('#coba').html(sabar);
            if (oldPass=='' || newPass=='' || newPass2=='') {
                if (oldPass=='') {
                    $('#oldPass').attr('class','form-line focused error');
                    $('#error_oldPass').html('Field harus diisi.');
                }
                if (newPass=='') {
                    $('#newPass').attr('class','form-line focused error');
                    $('#error_newPass').html('Field harus diisi.');
                }
                if (newPass2=='') {
                    $('#newPass2').attr('class','form-line focused error');
                    $('#error_newPass2').html('Field harus diisi.');
                }
            }else{
                $('.page-loader-wrapper2').show();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('Operator/changePassword')?>",
                    dataType : "html",
                    data : {id:id, oldPass:oldPass, newPass:newPass},
                    success: function(data){
                        // alert(data);
                        $('.page-loader-wrapper2').hide();  
                        $('#Modal_Ubah_Pwd').modal('hide');   
                        $("#cp")[0].reset();
                        $('#oldPass').attr('class','form-line');
                        $('#newPass').attr('class','form-line');
                        $('#newPass2').attr('class','form-line');
                        $('#error_oldPass').attr('style','color:red');
                        $('#error_oldPass').html('');
                        $('#error_newPass').attr('style','color:red');
                        $('#error_newPass').html('');
                        $('#error_newPass2').attr('style','color:red');
                        $('#error_newPass2').html('');

                        if(data=='Success'){
                            showSuccessMessage('Tersimpan');
                        }else{
                            showFailedMessage('Tersimpan');
                        }  
                    }
                });
                return false;
            }
        });

        // VALIDASI PASSWORD LAMA
        function validPass(){
            var id = <?php echo $this->session->userdata('id_user'); ?>;
            var pass = $('#old_pass').val();
            $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('Operator/validPassword')?>",
                    dataType : "html",
                    data : {id:id, pass:pass},
                    success: function(data){              
                        if(data=='Valid'){
                            $('#oldPass').attr('class','form-line focused success');
                            $('#error_oldPass').attr('style','color:green');
                            $('#error_oldPass').html('Password valid.');
                            $('#Modal_Ubah_Pwd #btn_simpan').removeAttr('disabled');
                            if ($('#newPass2').attr('class')=='form-line focused error') {
                                $('#Modal_Ubah_Pwd #btn_simpan').attr('disabled','');
                            }
                        }else{
                            $('#oldPass').attr('class','form-line focused error');
                            $('#error_oldPass').attr('style','color:red');
                            $('#error_oldPass').html('Password tidak valid.');
                            $('#Modal_Ubah_Pwd #btn_simpan').attr('disabled','');
                        }  
                        if (pass=='') {
                            $('#oldPass').attr('class','form-line focused');
                            $('#error_oldPass').html('');
                            $('#Modal_Ubah_Pwd #btn_simpan').removeAttr('disabled');

                        }
                    }
                });
                return false;
        }

        // ULANGI PASS
        function ulangPass(){
            var pass1 = $('#new_pass').val();
            var pass2 = $('#new_pass2').val();

            if(pass1==pass2){
                $('#newPass2').attr('class','form-line focused success');
                $('#error_newPass2').attr('style','color:green');
                $('#error_newPass2').html('Password cocok.');
                $('#Modal_Ubah_Pwd #btn_simpan').removeAttr('disabled');
                if ($('#oldPass').attr('class')=='form-line focused error') {
                    $('#Modal_Ubah_Pwd #btn_simpan').attr('disabled','');
                }
            }else{
                $('#newPass2').attr('class','form-line focused error');
                $('#error_newPass2').attr('style','color:red');
                $('#error_newPass2').html('Password tidak cocok.');
                $('#Modal_Ubah_Pwd #btn_simpan').attr('disabled','');
            }  
            if (pass2=='') {
                $('#newPass2').attr('class','form-line focused');
                $('#error_newPass2').html('');
                $('#Modal_Ubah_Pwd #btn_simpan').removeAttr('disabled');
            }
        }
    </script>

<!-- Status Log Aktif -->
    <script type="text/javascript">
        setInterval(function(){ status_log_aktif();}, 1000*60*5);

        function status_log_aktif(){
            $.ajax({
                type : "ajax",
                url  : "<?php echo base_url('Operator/updateStatusLog')?>",
                dataType : "html",
                // data : {id_user:id_user, token_user:token_user},
                success: function(data){
                    // if (data=='Success') {
                        // alert(data);
                    // }
                }
            });
            return false;
        }
    </script>

</body>

</html>