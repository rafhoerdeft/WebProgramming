<div class="content-wrapper">
	<section class="content-header">
		<h1>Tabel Peserta</h1><br>
		<div class='box'>
			<div class="box-header with-border">
				<div class="col-md-4">
					<div class="form-group">
					<p align="left">
						<a class="btn bg-navy flat" href="<?php echo base_url().'staff/viewJadwal';?>"><i class="fa fa-fw fa-arrow-circle-left"></i> Kembali</a>
					</p>
					</div>
				</div>
				<div class="col-md-4">
					<center>
					<form action="<?php echo base_url().'staff/inputPeserta/'; ?>" method='post'>
						<input type="hidden" name="jd_id" value="<?php echo $this->uri->segment(3);?>">
						<button type='submit' class="btn btn-primary"><i class="fa fa-fw fa-user-plus"></i> Tambah Peserta</button>
					</form>
					</center>
				</div>
				<div class="col-md-4">
					<p align="right"><a href="<?php echo base_url().'staff/cetak_peserta/'.$this->uri->segment(3); ?>" class="btn btn-success"><i class="fa fa-fw fa-print"></i> Cetak Jadwal</a></p>
				</div>
			</div>
			<form action="<?php echo base_url().'staff/insertNilai';?>" method="post">
				<div class="box box-primary">				
					<div class="box-body">
						<table id="tableNilai" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>NIM</th>
									<th>Nama</th>
									<th>Program Studi</th>
									<th>Nilai</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody id='show_dataJadwal'>
								<?php 
									foreach ($peserta->result() as $data) { ?>
									<tr>
										<input type="hidden" name="pstr_id[]" value="<?php echo $data->pstr_id ?>">
										<td><?php echo $data->mhs_nim ?></td>
										<td><?php echo $data->mhs_nama ?></td>
										<td><?php echo $data->pst_nama ?></td>
										<td><input type="text" onkeypress="return numberOnly(event)" value="<?php echo $data->pstr_nilai;?>" 
											name="nilai[]" placeholder="Masukkan Nilai"></td>
											<?php $id = $data->pstr_id;?>
										<td>
											<button class="btn btn-danger" name='delete' type="submit" title="Delete Peserta" formaction="<?php echo base_url('staff/deletePesertafromjadwal/'.$data->pstr_id);?>" onClick="return confirm('Apakah anda yakin akan menghapus data ini ?')"><i class="fa fa-trash"></i></button>
											<button class="btn btn-success" title="Cetak Sertifikat" formaction="<?php echo base_url('staff/cetak_sertifikat/'.$data->pstr_id);?>"><i class="fa fa-print"></i></button></a>
										</td>
									</tr>	
								<?php } ?>
							</tbody>
							<tfoot>
								<tr>
									<th>NIM</th>
									<th>Nama</th>
									<th>Program Studi</th>
									<th>Nilai</th>
									<th>Action</th>
								</tr>
							</tfoot>
						</table>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box-primary -->

				<div class="box-body">
					<div class="form-group">
						<button class="btn btn-primary btn-block" name='save' type="submit"><i class="fa fa-save"> Simpan Nilai</i></button>
						<a href="<?php echo base_url().'staff/cetak_sertifikat_all/'.$this->uri->segment(3);?>" class="btn btn-success btn-block" name='cetak' type="submit"><i class="fa fa-print"></i> Cetak Sertifikat Semua Peserta</a>
					</div>
				</div>
				<!-- /.box-body -->
			</form>
		</div>
		<!-- box -->
    </section>
	<!-- Content Main -->
<!-- content wrapper -->
</div>
<!-- Content Header (Page header)