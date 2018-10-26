<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">

    <?php if($save=='true'){?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Berhasil</h4>
            Profile anda berhasil diperbaharui
        </div>
        <!-- Alert Update Profile Berhasil -->
    <?php }elseif($save=='false'){?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Gagal</h4>
            Profile anda gagal diperbaharui, mohon ulangi lagi
        </div>
        <!-- Alert update profile gagal -->
    <?php }?>

        
    <div class='box'>        
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="col-md-12">
                    <center><h4>Profile</h4></center>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form role="form" action="<?php echo base_url().'staff/saveProfile';?>" method="POST" id='saveUser'>
                <?php foreach ($profile->result() as $data) {?>
                    <!-- text input -->
                    <div class="form-group">
                      <input type="hidden" readonly name="id" value="<?php echo $data->stf_id;?>">
                    </div>
                    <div class="col col-md-6">
                        <div class="form-group">
                            <label>NIK</label>
                            <input type="text" class="form-control" name="nik" required value="<?php echo $data->stf_nik;?>"> 
                        </div>
                    </div>
                    
                    <div class="col col-md-6">
                        <div class="form-group">
                            <label>NIDN</label>
                            <input type="text" class="form-control" name="nidn" required value="<?php echo $data->stf_nidn;?>">
                        </div>
                    </div>
                    <div class="col col-md-6">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" required value="<?php echo $data->stf_nama;?>">
                        </div>
                    </div>

                    <div class="col col-md-6">
                        <div class="form-group">
                            <label>Nomor HP</label>
                            <input type="text" class="form-control" maxlength="13" name="hp" onkeypress="return numberOnly(event)" required value="<?php echo $data->stf_hp;?>">
                        </div>
                    </div>

                    <div class="col col-md-6">
                        <div class="form-group">
                            <label>Konfirmasi Password</label>
                            <input type="password" class="form-control" name="password" id="pswd" required>
                        </div>
                    </div>

                     <div class="col col-md-6">
                        <div class="form-group" id='divconfirm'>
                            <label>Ulangi Konfirmasi Password</label>
                            <input type="password" class="form-control" id="confirmpswd" required>
                            <span class='help-block' id='message'></span>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <center>
                          <button type="submit" name="update" disabled='disabled' class="btn btn-primary" id='save' value="Simpan"><i class="fa fa-save"></i> Simpan</button>
                        </center>
                    </div>
                <?php } ?>
            </form>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
    <!-- /.box -->

    </section>
	<!-- Content Main -->
<!-- content wrapper -->
</div>