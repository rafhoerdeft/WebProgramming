<div class="content-wrapper">
	<section class="content-header">
		<h1>Tabel Jadwal</h1><br>
		<div class='box'>
			<div class="box box-primary">
				<div class="box-header with-border">
					<form method='post' action='<?php echo base_url().'staff/viewJadwal';?>'>
						<div class="col-md-2">
							<div class="form-group">
						    	<label>Tahun Ujian</label>
						    	<select class="form-control" name="tahun" id="tahun" required>
						    	    <option>-- Pilih Tahun --</option>
						           <!-- php tampil data tahun distinct -->
						           <?php 
						           	foreach ($tahun->result() as $year ){?>
						           		<option value='<?php echo $year->tahun ;?>'><?php echo $year->tahun ;?></option>
						           	<?php }
						           ?>
						      	</select>
						    </div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
						    	<label>Bulan</label>
						    	<select class="form-control" name="bulan" id="bulan" required>
						    	    <option value=''>-- Pilih Bulan --</option>
						    	    <option value='01'>Januari</option>
						    	    <option value='02'>Februari</option>
						    	    <option value='03'>Maret</option>
						    	    <option value='04'>April</option>
						    	    <option value='05'>Mei</option>
						    	    <option value='06'>Juni</option>
						    	    <option value='07'>Juli</option>
						    	    <option value='08'>Agustus</option>
						    	    <option value='09'>September</option>
						    	    <option value='10'>Oktober</option>
						    	    <option value='11'>November</option>
						    	    <option value='12'>Desember</option>
						      	</select>
						    </div>
						</div>
						
						<div class="col-md-2">
							<label>Tampilkan</label>
							<br><input type="submit" name="search" id="search" value="Go Find It !" class="btn btn-info" />
						</div>
					</form>
					<div class="col-md-6">
						<p style="float: right;">
							<label></label><br>
							<a href='<?php echo base_url().'staff/viewJadwal';?>' class="btn btn-info" id='tampil'/>Tampilkan Semua</a>
						</p>
					</div>
				</div>
				<!-- /.box-header -->
				
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Jadwal Nama</th>
								<th>Jadwal Tanggal</th>
								<th>Jadwal Waktu</th>
								<th>Jadwal Ruang</th>
								<th>Jadwal Keterangan</th>
								<th>Penguji 1</th>
								<th>Penguji 2</th>
								<th>Peserta</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								foreach ($Jadwal->result() as $data) { ?>
								<tr>
									<td><?php echo $data->jd_nama ?></td>
									<td><?php echo $data->jd_tanggal ?></td>
									<td><?php echo $data->jd_waktu ?></td>
									<td><?php echo $data->jd_ruang ?></td>
									<td><?php echo $data->jd_keterangan ?></td>
									<td><?php echo $data->penguji_1 ?></td>
									<td><?php echo $data->penguji_2 ?></td>
									<td align="center"><?php echo $data->total ?>/20</td>
									<td>
										<?php $cek=md5(sha1($data->jd_id)).sha1($data->jd_id); ?>
										<?php echo anchor('staff/selectPeserta/'.$data->jd_id,'<button class="btn btn-success" title="Lihat Daftar Peserta"><i class="fa fa-user"></i></button>');?>
										<?php echo anchor('staff/editJadwal/'.$data->jd_id,'<button class="btn btn-info" title="Edit Jadwal" ><i class="fa fa-edit"></i></button>'); ?>
										<?php echo anchor('staff/deleteJadwal/'.$cek,'<button class="btn btn-danger" title="Hapus Jadwal" onclick="return confirm(\'Apakah anda yakin akan menghapus data ini ?\')"><i class="fa fa-trash"></i></button>'); ?>
									</td>
								</tr>	
							<?php } ?>
						</tbody>
						<tfoot>
							<tr>
								<th>Jadwal Nama</th>
								<th>Jadwal Tanggal</th>
								<th>Jadwal Waktu</th>
								<th>Jadwal Ruang</th>
								<th>Jadwal Keterangan</th>
								<th>Penguji 1</th>
								<th>Penguji 2</th>
								<th>Peserta</th>
							</tr>
						</tfoot>
					</table>
				</div>
				<!-- /.box-body -->
			</div>
		<!-- row -->  
		</div>
    </section>
	<!-- Content Main -->
<!-- content wrapper -->
</div>
<!-- Content Header (Page header)