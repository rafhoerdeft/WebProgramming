<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <div class='box'>
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="col-md-12">
                    <button class="btn bg-navy flat" onclick="window.history.go(-1); return false;"><i class="fa fa-fw fa-arrow-circle-left"></i> Kembali</button>
                    <center><h4>Edit Profile Staff</h4></center>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form role="form" action="<?php echo base_url().'admin/updateUser';?>" method="POST" id='saveUser' autocomplete='off'>
                <?php foreach ($user->result() as $data) {?>
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
                    <div class="col col-md-12">
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

                    <div class="col-md-6">
                        <div class="form-group">
                          <label>Status</label>
                          <select class="form-control" name="status" required>
                            <option>-- Pilih Status --</option>
                            <?php foreach ($status->result() as $row) {?>
                                <option value="<?php echo $row->sst_id;?>" <?php if($data->sst_id == $row->sst_id){echo "selected='selected'";} ?>><?php echo $row->sst_nama; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                    </div>

                    <div class="col col-md-6">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" id="pswd" required value="<?php echo $data->stf_password;?>">
                        </div>
                    </div>

                     <div class="col col-md-6">
                        <div class="form-group" id='divconfirm'>
                            <label>Confirm Password</label>
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


    </section>
	<!-- Content Main -->
<!-- content wrapper -->
</div>