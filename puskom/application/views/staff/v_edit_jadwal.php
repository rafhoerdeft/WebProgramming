<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		
		<div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="col-md-12">
                    <button class="btn bg-navy flat" onclick="window.history.go(-1); return false;"><i class="fa fa-fw fa-arrow-circle-left"></i> Kembali</button>
                    <center><h4>Form Edit Jadwal</h4></center>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php foreach ($Jadwal->result() as $data) { ?>
            <form role="form" action="<?php echo base_url('staff/editJadwalProses') ?>" method="POST">
                <!-- text input -->
                <div class="form-group">
                  <input type="hidden" readonly="" name="jd_id" value="<?php echo $data->jd_id; ?>">
                </div>
                <div class="col col-md-12">
                	<div class="form-group">
                		<div class="form-group">
	                        <label>Jadwal Nama</label>
	                        <input class="form-control" name="jd_nama" value="<?php echo $data->jd_nama; ?>">
	                    </div>
                	</div>
                </div>
                <div class="col col-md-6">
                	<div class="form-group">
		                <label>Jadwal Tanggal</label>
		                <div class="input-group date">
		                  <div class="input-group-addon">
		                    <i class="fa fa-calendar"></i>
		                  </div>
		                  <input type="text" class="form-control pull-right" name="jd_tanggal" id="datepicker" value="<?php echo $data->jd_tanggal; ?>">
		                </div>
		            </div>
                    <div class="form-group">
                        <label>Jadwal Ruang</label>
                        <input class="form-control" name="jd_ruang" value="<?php echo $data->jd_ruang; ?>">
                    </div>   
                </div>
                <div class="col-md-6">
                	<div class="form-group">
	                  <label>Jadwal Waktu</label>
	                  <div class="input-group">
	                    <input type="text" class="form-control waktu" name="jd_waktu" value="<?php echo $data->jd_waktu; ?>">
	                    <div class="input-group-addon">
	                      <i class="fa fa-clock-o"></i>
	                    </div>
	                  </div>
	                </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <select class="form-control" name="keterangan" required>
                            <option value="">-- Pilih Keterangan --</option>
                            <option value="Reguler" <?php if($data->jd_keterangan=='Reguler'){echo "selected='selected'";}?>>Reguler</option>
                            <option value="Paralel" <?php if($data->jd_keterangan=='Paralel'){echo "selected='selected'";}?>>Paralel</option>
                        </select>
                    </div>   
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                      <label>Penguji 1</label>
                      <select class="form-control" name="penguji_1">
                        <?php 
                            foreach ($Staff->result() as $key) {
                                echo "<option value='$key->stf_id'"; if($key->stf_id==$data->penguji_1){echo "selected";}
                                echo ">$key->stf_nama</option>";
                        }?>
                      </select>
                    </div>
                </div>

                <div class="col col-md-6">
                	<div class="form-group">
                		<div class="form-group">
	                      <label>Penguji 2</label>
	                      <select class="form-control" name="penguji_2">
	                        <?php 
                                foreach ($Staff->result() as $key) {
                                    echo "<option value='$key->stf_id'"; if($key->stf_id==$data->penguji_2){echo "selected";}
                                    echo ">$key->stf_nama</option>";
                            }?>
	                      </select>
	                    </div>
                	</div>
                </div>

                <div class="col-md-12">
                    <center>
                      <button type="submit" name="simpan" class="btn btn-primary" value="Simpan"><i class="fa fa-save"></i> Simpan</button>

                      <!-- <a href="<?php site_url('viewJadwal') ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a> -->
                    </center>
                </div>
            </form>
            <?php } ?>
            </div>
            <!-- /.box-body -->
        </div>
    </div>


    </section>
	<!-- Content Main -->
<!-- content wrapper -->
</div>