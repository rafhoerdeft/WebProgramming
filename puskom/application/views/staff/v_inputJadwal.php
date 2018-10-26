<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Tabel Staff</h1>

		<div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <center>
                    <h3 class="box-title">Form Klasifikasi</h3>
                </center>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form role="form" action="<?php echo base_url('staff/inputJadwalProses') ?>" method="POST">
                <!-- text input -->
                <div class="form-group">
                  <input type="hidden" readonly="" name="jd_id">
                </div>
                <div class="col col-md-12">
                	<div class="form-group">
                		<div class="form-group">
	                        <label>Jadwal Nama</label>
	                        <input class="form-control" name="jd_nama">
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
		                  <input type="text" class="form-control pull-right" name="jd_tanggal" id="datepicker">
		                </div>
		            </div>
                    <div class="form-group">
                        <label>Jadwal Ruang</label>
                        <input class="form-control" name="jd_ruang">
                    </div>   
                </div>
                <div class="col-md-6">
                	<div class="form-group">
	                  <label>Jadwal Waktu</label>
	                  <div class="input-group">
	                    <input type="text" class="form-control waktu" name="jd_waktu" id="timepicker">
	                    <div class="input-group-addon">
	                      <i class="fa fa-clock-o"></i>
	                    </div>
	                  </div>
	                </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input class="form-control" name="jd_keterangan">
                    </div>   
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                      <label>Penguji 1</label>
                      <select class="form-control" name="penguji_1">
                        <option>-- select Penguji 1 --</option>
                        <?php foreach ($Staff->result() as $data) {?>
                        	<option value="<?php echo $data->stf_id; ?>"><?php echo $data->stf_nama; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                </div>

                <div class="col col-md-6">
                	<div class="form-group">
                		<div class="form-group">
	                      <label>Penguji 2</label>
	                      <select class="form-control" name="penguji_2">
	                        <option>-- select Penguji 2 --</option>
	                        <?php foreach ($Staff->result() as $data) {?>
	                        	<option value="<?php echo $data->stf_id; ?>"><?php echo $data->stf_nama; ?></option>
	                        <?php } ?>
	                      </select>
	                    </div>
                	</div>
                </div>

                <div class="col-md-12">
                    <center>
                      <button type="submit" name="simpan" class="btn btn-primary" value="Simpan"><i class="fa fa-save"></i> Simpan</button>
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