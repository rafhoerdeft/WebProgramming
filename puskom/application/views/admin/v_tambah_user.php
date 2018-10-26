<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <div class='box'>
        <div class="box box-primary">
            <div class="box-header with-border">
                <center>
                    <h3 class="box-title">Tambah User</h3>
                </center>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form role="form" action="<?php echo base_url().'admin/simpanUser';?>" method="POST" id='saveUser' autocomplete='off'>
                <!-- text input -->
                <div class="form-group">
                  <input type="hidden" readonly="" name="jd_id">
                </div>
                <div class="col col-md-6">
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="text" class="form-control" name="nik" required> 
                    </div>
                </div>
                
                <div class="col col-md-6">
                    <div class="form-group">
                        <label>NIDN</label>
                        <input type="text" class="form-control" name="nidn" required>
                    </div>
                </div>
                <div class="col col-md-12">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                </div>

                <div class="col col-md-6">
                    <div class="form-group">
                        <label>Nomor HP</label>
                        <input type="text" class="form-control" maxlength="13" name="hp" onkeypress="return numberOnly(event)" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                      <label>Status</label>
                      <select class="form-control" name="status" required>
                        <option>-- Pilih Status --</option>
                        <?php foreach ($status->result() as $data) {?>
                            <option value="<?php echo $data->sst_id; ?>"><?php echo $data->sst_nama; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                </div>

                <div class="col col-md-6">
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" id="pswd" required>
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
                      <button type="submit" name="simpan" disabled='disabled' class="btn btn-primary" id='save' value="Simpan"><i class="fa fa-save"></i> Simpan</button>
                    </center>
                </div>
            </form>
            </div>
            <!-- /.box-body -->
        </div>
    </div>


    </section>
	<!-- Content Main -->
<!-- content wrapper -->
</div>