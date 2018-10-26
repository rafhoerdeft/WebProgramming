<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Tabel Staff</h1>
    </section>
	<!-- Content Main -->
	<section class='content'>
		<div class='box'>
			<div class="box box-primary">
				<div class="box-header with-border">
					<div class="col-md-2">
						<a href="<?php echo base_url().'admin/tambahUser'; ?>" class="btn btn-primary"><i class="fa fa-user-plus"></i> Tambah Staff</a>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Staff Nama</th>
								<th>Staff NIK (Username)</th>
								<th>Staff NIDN</th>
								<th>Staff HP</th>
								<th>Status ID</th>
								<th>Password</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<!-- script php -->
							<?php 
							$no = 1;
							foreach ($Staff->result() as $data) { ?>
							 	<tr>
							 		<td><?php echo $no++ ?></td>
								 	<td><?php echo $data->stf_nama ?></td>
								 	<td><?php echo $data->stf_nik ?></td>
								 	<td><?php echo $data->stf_nidn ?></td>
								 	<td><?php echo $data->stf_hp ?></td>
								 	<td><?php echo $data->sst_nama ?></td>
								 	<td><?php echo $data->stf_password ?></td>
								 	<td>
								 		<a href="<?php echo base_url().'admin/editUser/'.$data->stf_id;?>" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
								 		<a href="<?php echo base_url().'admin/deleteUser/'.$data->stf_id;?>" class="btn btn-danger" onClick="return confirm('Apakah anda yakin akan menghapus data ini ?')"><i class="fa fa-trash"></i> Delete</a>
								 	</td>
							 	</tr>
							<?php } ?>
						</tbody>
						<tfoot>
							<tr>
								<th>No</th>
								<th>Staff Nama</th>
								<th>Staff NIK</th>
								<th>Staff NIDN</th>
								<th>Staff HP</th>
								<th>Status ID</th>
								<th>Password</th>
								<th>Action</th>
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