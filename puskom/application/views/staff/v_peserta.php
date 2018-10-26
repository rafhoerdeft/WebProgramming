<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Tabel Peserta</h1>
    </section>
	<!-- Content Main -->
	<section class='content'>
		<div class='box'>
			<div class="box box-primary">
				<div class="box-header with-border">
					<form action='<?php echo base_url().'staff/viewPeserta';?>' method='post'>
						<div class="col-md-8">
							<div class="form-group">
								<label>Jadwal</label>
								<select class="form-control" name='jadwal'>
									<?php  
										foreach ($jadwal->result() as $key) {
											echo "<option value='$key->jd_id'>$key->jd_tanggal ($key->jd_waktu)</option>";
										}
									?>
								</select>
							</div>
						</div>
						<?php 
							$jadwal = $Peserta->row_array();
							$jd_id = $jadwal['jd_id'];
							$jd_tanggal = $jadwal['jd_tanggal'];
							$jd_waktu = $jadwal['jd_waktu'];
						?>
						<div class="col-md-2">
							<label>&nbsp;</label>
							<button type="submit" class="btn btn-block btn-primary"><i class="fa fa-fw fa-search"></i> Tampil</button>
						</div>
						<div class="col-md-2">
							<label>&nbsp;</label>
							<a href="<?php echo base_url().'staff/cetak_peserta/'.$jd_id; ?>" class="btn btn-block btn-success"><i class="fa fa-fw fa-print"></i> Cetak Jadwal</a>
						</div>
					</form>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<?php 
						echo "<center><h4>Mahasiswa peserta Ujian Puskom pada tanggal $jd_tanggal dan Waktu $jd_waktu</h4></center>";
					 ?>

					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>NPM Mahasiswa</th>
								<th>Nama Mahasiswa</th>
								<th>Jenis Kelas</th>
								<th>Program Studi</th>
							</tr>
						</thead>
						<tbody>
							<!-- Isi Script PHP -->
						<?php $no=1; foreach ($Peserta->result() as $data) { ?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo $data->mhs_nim ?></td>
								<td><?php echo $data->mhs_nama ?></td>
								<td><?php echo $data->jk_nama ?></td>
								<td><?php echo $data->pst_nama ?></td>
							</tr>
						<?php } ?>
						</tbody>
						<tfoot>
							<tr>
								<th>No</th>
								<th>NPM Mahasiswa</th>
								<th>Nama Mahasiswa</th>
								<th>Jenis Kelas</th>
								<th>Program Studi</th>
							</tr>
						</tfoot>
					</table>
				</div>
				<!-- /.box-body -->
			</div>
		<!-- row -->  
		</div>
	<!--section -->
	</section>
<!-- content wrapper -->
</div>