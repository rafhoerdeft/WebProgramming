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
					<div class="col-md-2"><button type="button" class="btn btn-block btn-primary"><span class="glyphicon glyphicon-retweet"> Sinkron</span></button></div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Staff ID</th>
								<th>Staff Nama</th>
								<th>Staff NIK</th>
								<th>Staff NIDN</th>
								<th>Staff HP</th>
								<th>Status ID</th>
							</tr>
						</thead>
						<tbody>
							<!-- script php -->
							<?php 
							// $no = 1;
							foreach ($Staff->result() as $data) { ?>
							 	<tr>
							 		<td><?php echo $data->stf_id ?></td>
								 	<td><?php echo $data->stf_nama ?></td>
								 	<td><?php echo $data->stf_nik ?></td>
								 	<td><?php echo $data->stf_nidn ?></td>
								 	<td><?php echo $data->stf_hp ?></td>
								 	<td><?php echo $data->sst_nama ?></td>
							 	</tr>
							<?php } ?>
						</tbody>
						<tfoot>
							<tr>
								<th>Staff ID</th>
								<th>Staff Nama</th>
								<th>Staff NIK</th>
								<th>Staff NIDN</th>
								<th>Staff HP</th>
								<th>Status ID</th>
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