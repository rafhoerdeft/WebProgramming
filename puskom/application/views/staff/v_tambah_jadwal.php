<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <div class='box'>
        <div class="box box-primary">
            <div class="box-header with-border">
                <center>
                    <h3 class="box-title">Tambah Jadwal</h3>
                </center>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form action='<?php echo base_url().'staff/insertJadwal';?>' method='POST'>

                    <!-- text input -->
                    <div class="col col-md-12">
                    	<div class="form-group">
                    		<div class="form-group">
    	                        <label>Nama Jadwal</label>
    	                        <input type="text" class="form-control" name="jd_nama" required>
    	                    </div>
                    	</div>
                    </div>
                    
                    <div class="col col-md-6">

                        <div class="form-group">
                            <label>Ruang</label>
                            <input type="text" class="form-control" name="jd_ruang" required>
                        </div>   

                        <!-- Date -->
                        <div class="form-group">
                            <label>Tanggal</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="datepicker" name="jd_tanggal" required>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->

                        <!-- Penguji -->                        
                        <div class="form-group">
                          <label>Penguji 1</label>
                          <select class="form-control" name="penguji_1" required>
                            <option>-- select Penguji 1 --</option>
                            <?php foreach ($Staff->result() as $data) {?>
                                <option value="<?php echo $data->stf_id; ?>"><?php echo $data->stf_nama; ?></option>
                            <?php } ?>
                          </select>
                        </div>

                    </div>
                    <!-- /.col-md-6 -->

                    <div class="col-md-6">

                        <!-- time Picker -->
                        <div class="bootstrap-timepicker">
                           <div class="form-group">
                                <label>Waktu</label>
                                <div class="input-group">
                                    <input type="text" class="form-control waktu" name="jd_waktu" required>
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                        </div>

                        <!-- Keterangan Kelas -->
                        <div class="form-group">
                            <label>Keterangan</label>
                            <select class="form-control" name="keterangan" required>
                                <option value="">-- Pilih Keterangan --</option>
                                <option value="Reguler">Reguler</option>
                                <option value="Paralel">Paralel</option>
                            </select>
                        </div>   

                        <!-- Penguji -->
                        <div class="form-group">
                          <label>Penguji 2</label>
                          <select class="form-control" name="penguji_2" required>
                            <option>-- select Penguji 2 --</option>
                            <?php foreach ($Staff->result() as $data) {?>
                                <option value="<?php echo $data->stf_id; ?>"><?php echo $data->stf_nama; ?></option>
                            <?php } ?>
                          </select>
                        </div>

                    </div>
                    <!-- /.col-md-6 -->

                    <div class="col-md-12">
                        <center>
                          <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                        </center>
                    </div>

                </form>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box box-primary -->
    </div>

    </section>
	<!-- Content Main -->
<!-- content wrapper -->
</div>