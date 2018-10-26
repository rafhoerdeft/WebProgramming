<?php  ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Login Permintaan ATK</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url();?>assets/images/icon-logo-UMM.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="<?php echo base_url();?>assets/css/font-googleapis.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/css/font-googleapis-icon.css" rel="stylesheet" type="text/css">

    <!-- Sweet Alert Css -->
    <link href="<?php echo base_url();?>assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url().'assets/'; ?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url().'assets/'; ?>plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url().'assets/'; ?>plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="<?php echo base_url();?>assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url().'assets/'; ?>css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <center>
                <img src="<?php echo base_url().''; ?>assets/images/logo3.png" style="width:150px; height:150px;">
            </center>
            <a href="javascript:void(0);"><font size="5"><b>SISTEM PENGAJUAN ATK</b></font></a>
            <a href="javascript:void(0);"><font size="3">UNIVERSITAS MUHAMMADIYAH MAGELANG</font></a>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="<?php echo base_url().'Login/cek_login' ?>">
                    <div class="msg">Jika Lupa Password Hubungi Admin</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line" id="user">
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username" required autofocus>
                        </div>
                        <label id="error_username" class="error" for="username" style="display: block;"></label>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line" id="pass">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                        </div>
                        <label id="error_password" class="error" for="password" style="display: block;"></label>
                    </div>
                    <center>
	                	<button class="btn btn-block bg-pink waves-effect" type="submit" id="btn_login">SIGN IN</button>
                    </center>
                </form>
            </div>
        </div>
    </div>

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

    <!-- Custom Js -->
    <script src="<?php echo base_url().'assets/'; ?>js/admin.js"></script>
    <script src="<?php echo base_url().'assets/'; ?>js/pages/examples/sign-in.js"></script>

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
                text: "Gagal "+input+"!",
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
                    type : "GET",
                    url  : "<?php echo base_url('Admin/deleteUnit')?>",
                    dataType : "html",
                    data : {id:id},
                    success: function(data){
                        // alert(data);

                        $('#tbl-unit').DataTable().destroy();
                        showUnit();
                        $('#tbl-unit').DataTable().draw();
                        // kode_otomatis();
                        // $('#editModal #pilihBrg').attr('selected','');
                        // $('#editModal').modal('hide');

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
        $('#btn_login').on('click',function(){
            var username=$('#username').val();
            var password=$('#password').val();
            // $('#coba').html(sabar);
            if (username=='' || password=='') {
                if (username=='') {
                    $('#user').attr('class','form-line focused error');
                    $('#error_username').html('Field harus diisi.');
                }
                if (password=='') {
                    $('#pass').attr('class','form-line focused error');
                    $('#error_password').html('Field harus diisi.');
                }
            }else{
                $('.page-loader-wrapper2').show();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('login/cek_login')?>",
                    // beforeSend: $('.page-loader-wrapper').show(),
                    dataType : "html",
                    data : {username:username , password:password},
                    success: function(data){
                        // alert(data);
                        if(data=='Admin'){
                            window.location = '<?php echo base_url().'Admin'; ?>';
                        }else if(data=='Operator'){
                            window.location = '<?php echo base_url().'Operator'; ?>';
                        }else if(data=='User'){   
                            window.location = '<?php echo base_url().'User'; ?>';
                        }else if (data=='Digunakan') {
                            showFailedMessage('Akun sedang digunakan di perangkat lain');
                        }else {
                            showFailedMessage('Username atau Password Salah!');
                        }
                    }
                });
                return false;
            }
        });
    </script>
</body>

</html>