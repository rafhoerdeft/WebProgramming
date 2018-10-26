<!-- Jquery Core Js -->
    <script src="<?php echo base_url().'assets/plugins/'; ?>jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url().'assets/plugins/'; ?>bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url().'assets/plugins/'; ?>bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url().'assets/plugins/'; ?>jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Sweet Alert Plugin Js -->
    <script src="<?php echo base_url();?>assets/plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Bootstrap Colorpicker Js -->
    <script src="<?php echo base_url().'assets/plugins/'; ?>bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>

    <!-- Dropzone Plugin Js -->
    <script src="<?php echo base_url().'assets/plugins/'; ?>dropzone/dropzone.js"></script>

    <!-- Input Mask Plugin Js -->
    <script src="<?php echo base_url().'assets/plugins/'; ?>jquery-inputmask/jquery.inputmask.bundle.js"></script>

    <!-- Multi Select Plugin Js -->
    <script src="<?php echo base_url().'assets/plugins/'; ?>multi-select/js/jquery.multi-select.js"></script>

    <!-- Jquery Spinner Plugin Js -->
    <script src="<?php echo base_url().'assets/plugins/'; ?>jquery-spinner/js/jquery.spinner.js"></script>

    <!-- Bootstrap Tags Input Plugin Js -->
    <script src="<?php echo base_url().'assets/plugins/'; ?>bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

    <!-- noUISlider Plugin Js -->
    <script src="<?php echo base_url().'assets/plugins/'; ?>nouislider/nouislider.js"></script>

    <!-- Bootstrap Notify Plugin Js -->
    <script src="<?php echo base_url().'assets/plugins/'; ?>bootstrap-notify/bootstrap-notify.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url().'assets/plugins/'; ?>node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="<?php echo base_url().'assets/plugins/'; ?>jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?php echo base_url().'assets/plugins/'; ?>jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url().'assets/plugins/'; ?>jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url().'assets/plugins/'; ?>jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="<?php echo base_url().'assets/plugins/'; ?>jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="<?php echo base_url().'assets/plugins/'; ?>jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="<?php echo base_url().'assets/plugins/'; ?>jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="<?php echo base_url().'assets/plugins/'; ?>jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="<?php echo base_url().'assets/plugins/'; ?>jquery-datatable/extensions/export/buttons.print.min.js"></script>


    <!-- Custom Js -->
    <script src="<?php echo base_url();?>assets/js/admin.js"></script>
    <script src="<?php echo base_url();?>assets/js/pages/tables/jquery-datatable.js"></script>
    <script src="<?php echo base_url();?>assets/js/pages/ui/modals.js"></script>
    <!-- <script src="<?php //echo base_url();?>assets/js/pages/forms/form-validation.js"></script> -->

    <!-- Demo Js -->
    <script src="<?php echo base_url().'assets/js/'; ?>demo.js"></script>

    <!-- date-range-picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <script src="<?php echo base_url().'assets/' ?>plugins/daterangepicker/daterangepicker.js"></script>

    <!-- Fungsi Dialog -->
    <script type="text/javascript">
        //These codes takes from http://t4t5.github.io/sweetalert/
        function showBasicMessage() {
            swal("Here's a message!");
        }

        function showWithTitleMessage() {
            swal("Here's a message!", "It's pretty, isn't it?");
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

    <script type="text/javascript">
        $(function () {
            activateNotificationAndTasksScroll();
        });

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

        function inputAktif(id){
            if ($('#ceked'+id+' input:checked').length==1) {
                $('#kd_permintaan'+id).removeAttr("disabled");
                $('#kd_barang'+id).removeAttr("disabled");
            }else{
                $('#kd_permintaan'+id).attr('disabled','');
                $('#kd_barang'+id).attr('disabled','');
            }
        }
    </script>

    <!-- JavaScript & Ajax Halaman Permintaan -->
    <script type="text/javascript">

        $("#jumlah_barang").on('click',function(){
            $('#jmlbrg').attr('class','form-line focused');
            $('#error_jmlbrg').html('');
        });

        $("#kode_barang").on('change',function(){
            $('#error_nmbrg').html('');
            var satuan_barang = $('#kode_barang option:selected').attr('satuan');
            $('#satuan_barang').val(satuan_barang);
        });

        $('#Simpan').hide();

        // Add row with Ajax
        $("#add").click(function(){
            var no = $('#tbl-barang tbody tr').length + 1;
            var kode_barang = $('#kode_barang').val();
            var nama_barang = $('#kode_barang option:selected').attr('nama');
            var satuan_barang = $('#kode_barang option:selected').attr('satuan');
            var jumlah_barang = $('#jumlah_barang').val();

            if (jumlah_barang == "" || nama_barang=="" || jumlah_barang==0) {
                if (jumlah_barang=="" || jumlah_barang == 0) {
                    $('#jmlbrg').attr('class','form-line focused error');
                    $('#error_jmlbrg').html('This field is required.');
                }
                if (nama_barang=="") {
                    $('#error_nmbrg').html('Pilih barang.');
                }
            } else {
                var table = $("#tbl-barang tbody");
                var code = 0;
                table.find('tr').each(function (i) {
                    var $tds = $(this).find('td'),
                        kode = $tds.eq(1).text();

                        if (kode_barang==kode) {
                            code=+1;
                        }
                });
                if (code>0) {
                    $('#error_nmbrg').html('Barang sudah ditambahkan.');
                }else{
                    $('#Simpan').show();
                    $("#tbl-barang tbody").append(
                        '<tr id="'+no+'">'+
                            '<td id="no">'+no+'</td>'+
                            '<td id="kode_barang" name="kode_barang">'
                                +kode_barang+
                            '</td>'+
                            '<td id="nama_barang">'
                                +nama_barang+
                            '</td>'+
                            '<td id="satuan_barang" with="150" name="satuan_barang">'
                                +satuan_barang+
                            '</td>'+
                            '<td id="jumlah_barang" with="150" name="jumlah_barang">'
                                +jumlah_barang+
                            '</td>'+
                            '<td id="remove"><button type="button" name="add" id="remove" class="btn btn-danger"><i class="material-icons">remove</i></button></td>'+
                        '</tr>'
                    );
                    $('#jumlah_barang').val('');
                    // showBarang();
                }
            }
        });
        // End Add row with Ajax
        
        // Remove row with Ajax
        $(document).on('click', '#remove', function(e){
            e.preventDefault();
            $(this).parent().parent().remove();

            var nos = $('#tbl-barang tbody tr').length;
            if (nos==0) {
                $('#Simpan').hide();
            }

            // var Nomor = 1;
            // $('#tbl-barang tbody tr').each(function(){
            //     $(this).find('td:nth-child(1)').html(Nomor);
            //     Nomor++;
            // });
        });
        // End Remove row with Ajax

        // Show dataBarang
        showBarang();
        function showBarang(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo site_url('User/dataBarang')?>',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    html += '<option value="" nama="" selected>-- Pilih Barang --</option>';
                    for(i=0; i<data.length; i++){
                        html += '<option value="'+data[i].brgmtang_kode+'" nama="'+data[i].brgmtang_name+'" satuan="'+data[i].satuan+'"><div style="float:left">'+data[i].brgmtang_name+'</div></option>';
                    }
                    $('#kode_barang').html(html);
                }
            });
        }
        // End Show dataBarang

        // Simpan dataBarang
        $('#Simpan').on('click',function(){
            var table = $("#tbl-barang tbody");
            var code = [];
            var name = [];
            var qty = [];
            table.find('tr').each(function (i) {
                var $tds = $(this).find('td'),
                    kode = $tds.eq(1).text(),
                    nama = $tds.eq(2).text(),
                    jml = $tds.eq(4).text();
                code.push(kode);
                name.push(nama);
                qty.push(jml);
                // alert('Row ' + (i + 1) + ':\nId: ' + code[i]
                //       + '\nProduct: ' + name[i]
                //       + '\nQuantity: ' + qty[i]);
            });
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('User/simpanPermintaan')?>",
                dataType : "html",
                data : {code:code , qty:qty},
                success: function(data){
                    // alert(data);
                    // $('#tbl-barang tbody tr').remove();
                    if(data=='Success'){
                        // alert(data);
                        showSuccessMessage("Tersimpan");
                        $('#tbl-barang tbody tr').remove();
                        $('#Simpan').hide();
                    }else{
                        alert(data);
                        $('#Simpan').hide();
                    }
                }
            });
            return false;
        });
        // End Simpan dataBarang
    </script>
    <!-- End JavaScript & Ajax Halaman Permintaan -->

    <!-- Format Date Range Picker -->
    <script type="text/javascript">
        $(function() {
            $('#reservation-lpgbrg').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear'
                }
            });

            // $('#reservation-lpgbrg').on('apply.daterangepicker', function(ev, picker) {
            //     $(this).val(picker.startDate.format('YYYY-MM-DD') + ' / ' + picker.endDate.format('YYYY-MM-DD'));
            // });

            $('#reservation-lpgbrg').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });
        });
    </script>
    <!-- End Format Date Range Picker -->

    <!-- JavaScript & Ajax Halaman Laporan -->
    <script type="text/javascript">
        showLaporan();
        function showLaporan(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo site_url('User/showLaporan')?>',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var row = '';
                    var i;
                    var no=0;
                    for(i=0; i<data.length; i++){
                        no++;
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

                        row += '<tr>'+
                                  '<td align="center">'+no+'</td>'+
                                  '<td><div style="float:left;">'+data[i].kode+'</div><div id="label-status'+i+'" style="float:right;">'+stats1+'</br>'+stats2+'</div></td>'+
                                  '<td>'+data[i].tgl+'</td>'+
                                  '<td>'+data[i].waktu+'</td>'+
                                  '<td style="text-align:right;">'+
                                        '<center>'+
                                            '<button type="button" class="btn btn-info item_detail" onClick="showLaporanPmt('+data[i].id_pmt+')" data="'+data[i].kode_permintaan+'"><i class="material-icons">visibility</i> Detail</button>'+
                                        '</center>'+
                                    '</td>'+
                                '</tr>';
                    }
                    $('#show-laporan').html(row); 
                }
            });
        }

        // Show Laporan Barang Unit
        $('#reservation-lpgbrg').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD') + ' / ' + picker.endDate.format('YYYY-MM-DD'));
            var id = $(this).val();
            // alert(id);
            $.ajax({
                type : "GET",
                url   : '<?php echo site_url('User/getLaporan')?>',
                async : false,
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    var html = '';
                    var row = '';
                    var i;
                    var no=0;
                    for(i=0; i<data.length; i++){
                        no++;
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

                        row += '<tr>'+
                                  '<td align="center">'+no+'</td>'+
                                  '<td><div style="float:left;">'+data[i].kode+'</div><div id="label-status'+i+'" style="float:right;">'+stats1+'</br>'+stats2+'</div></td>'+
                                  '<td>'+data[i].tgl+'</td>'+
                                  '<td>'+data[i].waktu+'</td>'+
                                  '<td style="text-align:right;">'+
                                        '<center>'+
                                            '<button type="button" class="btn btn-info item_detail" onClick="showLaporanPmt('+data[i].id_pmt+')" data="'+data[i].kode_permintaan+'"><i class="material-icons">visibility</i> Detail</button>'+
                                        '</center>'+
                                    '</td>'+
                                '</tr>';
                    }
                    $('#show-laporan').html(row); 
                    // var row = '';
                    // var i;
                    // var no=0;
                    // for(i=0; i<data.length; i++){
                    //     no++;
                    //     row += '<tr>'+
                    //               '<td align="center">'+no+'</td>'+
                    //               '<td>'+data[i].kode_permintaan+'</td>'+
                    //               '<td>'+data[i].tgl_permintaan+'</td>'+
                    //               '<td>'+data[i].time_tgl_permintaan+'</td>'+
                    //               '<td style="text-align:right;">'+
                    //                     '<center>'+
                    //                         '<button type="button" onClick="showLaporanPmt('+data[i].id_permintaan+');" class="btn btn-info item_detail" data="'+data[i].kode_permintaan+'"><i class="material-icons">search</i>View </button>'+
                    //                     '</center>'+
                    //                 '</td>'+
                    //             '</tr>';
                    // }
                    // $('#tbl-laporan').DataTable().destroy();
                    // // $('#print').show();
                    // $('#show-laporan').html(row); 
                    // $('#tbl-laporan').DataTable().draw();
                }
            });
            return false;
        });
        // End Show Laporan Barang Unit

        // Show Detail Laporan Barang Unit
        function showLaporanPmt(id){
            // var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('User/getBarang')?>",
                async : false,
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    var html = '';
                    var i;
                    var j;
                    $('#Modal_Detail').modal('show');
                    for(i=0; i<data.length; i++){
                        j = i + 1;
                        html += '<tr>'+
                                    '<td>'+j+'</td>'+
                                    '<td>'+data[i].brgmtang_kode+'</td>'+
                                    '<td>'+data[i].brgmtang_name+'</td>'+
                                    '<td>'+data[i].satuan+'</td>'+
                                    '<td>'+data[i].jumlah_barang+'</td>'+
                                    '<td>'+data[i].jml_brgsetuju+'</td>'+
                                '</tr>';
                    }
                    $('#show-detail').html(html);
                }
            });
            return false;
        }
        // End Show Detail Laporan Barang Unit
    </script>
    <!-- End JavaScript & Ajax Halaman Laporan -->

    <!-- Notifikasi -->
    <script type="text/javascript">
        setInterval(function(){ countNotif();}, 5000);
        // setInterval(function(){ notif();}, 5000);
        // setInterval(function(){ activateNotificationAndTasksScroll();}, 5000);
        // setInterval('notif()', 5000);
        notif();
        countNotif();

        function clearCount(){
                $.ajax({
                    type : "ajax",
                    url  : "<?php echo base_url('User/clearCount')?>",
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

        function countNotif(){
            $.ajax({
                type : 'ajax',
                url  : '<?php echo base_url(); ?>/User/countNotif',
                async : false,
                dataType : 'JSON',
                success: function(data){
                    var html = data[0].jml_notif;
                    if (html==0) {
                       $('#notif-pmt .label-count').html(''); 
                    }else{
                        $('#notif-pmt .label-count').html(html);
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

        function notif(){
            // $('#notif ul.menu li').remove();
            $.ajax({
                type : 'ajax',
                url  : '<?php echo base_url(); ?>/User/notification',
                async : false,
                dataType : 'JSON',
                // data : {id:id},
                success: function(data){
                    var html = '';
                    for(var i=0; i<data.length; i++){
                        var status1 = '';
                        var status2 = '';
                        var jml1 = '';
                        var jml2 = '';

                        status1 = data[i].status[0];
                        jml1 = data[i].jml[0];

                        if (data[i].status[1]!=null) {
                            status2 = data[i].status[1];
                            jml2 = data[i].jml[1];
                        }

                        if (status1!='Diajukan') {
                            if(data[i].status_notif==2){
                                html += '<li>'+
                                            '<a href="javascript:void(0);" id="detail-notif" onClick="showLaporanPmt('+data[i].id_pmt+'); changeStatusNotif('+data[i].id_pmt+');">'+
                                                '<div style="width: 7px; height:50px; background: skyblue; float: left; margin-right: 10px;">'+
                                                    // '<i class="material-icons">notifications_active</i>'+
                                                '</div>'+
                                                '<div class="menu-info">'+
                                                    '<h4> Kode: '+data[i].kode_pmt+'</h4>'+
                                                    '<p style="color: #b5b5b5;">'+
                                                    ''+jml1+' '+status1+' '+jml2+' '+status2+
                                                        // 'Kode: '+data[i].kode_permintaan+'<br>'+
                                                        '<br><i class="material-icons" style="color: #b5b5b5;">access_time</i> '+data[i].tgl_notif+' ('+data[i].time_notif+')'+
                                                    '</p>'+
                                                '</div>'+
                                            '</a>'+
                                        '</li>';
                            }else{
                                html += '<li style="background: #f2f2f2;">'+
                                            '<a href="javascript:void(0);" id="detail-notif" onClick="showLaporanPmt('+data[i].id_pmt+'); changeStatusNotif('+data[i].id_pmt+');">'+
                                                '<div style="width: 7px; height:50px; background: orange; float: left; margin-right: 10px;">'+
                                                    // '<i class="material-icons">notifications_active</i>'+
                                                '</div>'+
                                                '<div class="menu-info">'+
                                                    '<h4> Kode: '+data[i].kode_pmt+'</h4>'+
                                                    '<p style="color: #b5b5b5;">'+
                                                    ''+jml1+' '+status1+' '+jml2+' '+status2+
                                                        // 'Kode: '+data[i].kode_pmt+'<br>'+
                                                        '<br><i class="material-icons" style="color: #b5b5b5;">access_time</i> '+data[i].tgl_notif+' ('+data[i].time_notif+')'+
                                                    '</p>'+
                                                '</div>'+
                                            '</a>'+
                                        '</li>';
                            }
                        } 
                    }
                    // $('#notif-permintaan').html('<ul class="dropdown-menu" id="notif"></ul>');
                    // $('#notif').html('<li class="body"></li>');
                    $('#notif-pmt .dropdown-menu .body').html('<ul class="menu"></ul>');
                    $('#notif-pmt .menu').html(html);            
                }
            });
            return false;
        }

        function changeStatusNotif(id){
            $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('User/changeStatusNotif')?>",
                    async : false,
                    dataType : "html",
                    data : {id:id},
                    success: function(data){
                        // notif();
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
                url  : "<?php echo base_url('User/getDetailPermintaan')?>",
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
                        if (data[x].status=='Dikirim') {
                            sts++;
                        }
                    }
                    for(i=0; i<data.length; i++){
                        j++;
                        if (sts>0) {
                            $('#detail-permintaan #btn-simpan-pmt').hide();
                            if (data[i].jml_setuju==0) {
                                html += '<tr>'+
                                            '<td>'+j+'</td>'+
                                            '<td>'+data[i].kode+'</td>'+
                                            '<td>'+data[i].nama+'</td>'+
                                            '<td id="jml-pmt'+j+'" align="center">'+data[i].jml+'</td>'+
                                            '<td id="ceked'+j+'" align="center"><div class="switch"><i class="material-icons">clear</i></div></td>'+
                                            '<td width="100px" id="inputJml"><input id="jml'+j+'" type="text" class="form-control" maxlength="4" value="'+data[i].jml_setuju+'" disabled></td>'+
                                        '</tr>';
                            }else{
                                html += '<tr>'+
                                            '<td>'+j+'</td>'+
                                            '<td>'+data[i].kode+'</td>'+
                                            '<td>'+data[i].nama+'</td>'+
                                            '<td id="jml-pmt'+j+'" align="center">'+data[i].jml+'</td>'+
                                            '<td id="ceked'+j+'" align="center"><div class="switch"><i class="material-icons">done</i></div></td>'+
                                            '<td width="100px" id="inputJml"><input id="jml'+j+'" type="text" class="form-control" maxlength="4" value="'+data[i].jml_setuju+'" disabled></td>'+
                                        '</tr>';
                            }
                        }else{
                            $('#detail-permintaan #btn-simpan-pmt').show();
                            if (data[i].jml_setuju==0) {
                                html += '<tr>'+
                                        '<td>'+j+'</td>'+
                                        '<td>'+data[i].kode+'</td>'+
                                        '<td>'+data[i].nama+'</td>'+
                                        '<td id="jml-pmt'+j+'" align="center">'+data[i].jml+'</td>'+
                                        '<td id="ceked'+j+'" align="center"><div class="switch"><label><input type="checkbox" id="cek'+j+'" value="'+data[i].kode+'" onClick="inputAktif('+j+');"><span class="lever switch-col-red"></span></label></div></td>'+
                                        '<td width="100px" id="inputJml"><input type="hidden" id="id_pmt'+j+'" value="'+data[i].id_pmt+'"><input id="jml'+j+'" type="text" onKeyPress="return inputAngka(event);" onKeyUp="inputJmlPermintaan('+j+');" class="form-control" maxlength="4" disabled></td>'+
                                    '</tr>';
                            }else{
                                html += '<tr>'+
                                        '<td>'+j+'</td>'+
                                        '<td>'+data[i].kode+'</td>'+
                                        '<td>'+data[i].nama+'</td>'+
                                        '<td id="jml-pmt'+j+'" align="center">'+data[i].jml+'</td>'+
                                        '<td id="ceked'+j+'" align="center"><div class="switch"><label><input type="checkbox" id="cek'+j+'" value="'+data[i].kode+'" onClick="inputAktif('+j+');" checked><span class="lever switch-col-red"></span></label></div></td>'+
                                        '<td width="100px" id="inputJml"><input type="hidden" id="id_pmt'+j+'" value="'+data[i].id_pmt+'"><input id="jml'+j+'" type="text" onKeyPress="return inputAngka(event);" onKeyUp="inputJmlPermintaan('+j+');" class="form-control" maxlength="4" value="'+data[i].jml_setuju+'"></td>'+
                                    '</tr>';
                            }
                        }
                        
                    }
                    $('#header-detail').html('<div style="float: left;">Nama Unit : <label id="unit">'+data[0].ukerja+'</label></div><div style="float: right;">Kode Permintaan : <label id="kode">'+data[0].kode_pmt+'</label></div>');
                    $('#show-detail').html(html);
                }
            });
            return false;
        }
    </script>

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
                    url  : "<?php echo base_url('User/changePassword')?>",
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
                    url  : "<?php echo base_url('User/validPassword')?>",
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
                        if (pass==''){
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

    <script type="text/javascript">
        function inputAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))

            return false;
            return true;
        }
    </script>

    <!-- Status Log Aktif -->
    <script type="text/javascript">
        setInterval(function(){ status_log_aktif();}, 1000*60*5);

        function status_log_aktif(){
            $.ajax({
                type : "ajax",
                url  : "<?php echo base_url('User/updateStatusLog')?>",
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