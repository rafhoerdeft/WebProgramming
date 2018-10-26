<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<section class="content-header">
		<h1>Tabel Nilai</h1>
		<br>
		<div class='box'>
			<div class="box box-primary">
			<form action="<?php echo base_url().'staff/viewNilai';?>" method='post'>
				<div class="box-header with-border">
					<div class="col-md-2">
						<div class="form-group">
					    	<label>Tahun Angkatan</label>
					    	<select class="form-control" name="tahun_masuk" id="tahun_masuk" required>
					    	    <option value="">-- select Tahun --</option>
					            <?php foreach ($tahun->result() as $data) {?>
					            	<option value="<?php echo $data->tahun; ?>"><?php echo $data->tahun; ?></option>
					            <?php } ?>
					      	</select>
					    </div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
					    	<label>Program Studi</label>
					    	<select class="form-control" name="program_studi" id="program_studi" required>
					    	    <option value="">-- select Prodi --</option>
					            <?php foreach ($Programstudi->result() as $data) {?>
					            	<option value="<?php echo $data->pst_id; ?>"><?php echo $data->pst_nama; ?></option>
					            <?php } ?>
					      	</select>
					    </div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
					    	<label>Kelas</label>
					    	<select class="form-control" name="kelas" id="kelas" required>
					    	    <option value="">-- select Kelas --</option>
					            <?php foreach ($Jeniskelas->result() as $data) {?>
					            	<option value="<?php echo $data->jk_id; ?>"><?php echo $data->jk_nama; ?></option>
					            <?php } ?>
					      	</select>
					    </div>
					</div>
					<div class="col-md-2">
						<label>Tampilkan</label>
						<br><input type="submit" name="search" id="search" value="Search" class="btn btn-info" />
						<!-- <button type="submit" class="btn btn-primary"><i class="fa fa-refresh"></i>&nbsp; Sinkron</button> -->
					</div>
				</div>
				<!-- /.box-header -->
			</form>

				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>NPM</th>
								<th>Nama Mahasiswa</th>
								<th>Program Studi</th>
								<th>Nilai</th>
								<th>Action</th>
							</tr>
						</thead>
						<?php if($show=='true'){?>
						<tbody>
							<!-- script php -->
							<?php 
								$no = 1;
								foreach ($peserta->result() as $data) { ?>
								<tr>
									<td><?php echo $no++ ?></td>
									<td><?php echo $data->mhs_nim ?></td>
									<td><?php echo $data->mhs_nama ?></td>
									<td><?php echo $data->pst_nama ?></td>
									<td><?php echo $data->pstr_nilai ?></td>
									<td>Nilai</td>
								</tr>	
							<?php } ?>
						</tbody>
						<?php } ?>
						<tfoot>
							<tr>
								<th>No</th>
								<th>NPM</th>
								<th>Nama Mahasiswa</th>
								<th>Program Studi</th>
								<th>Nilai</th>
								<th>Action</th>
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
<!-- Content Header (Page header) -->