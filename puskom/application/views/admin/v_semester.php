<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Tabel Semester</h1>
    </section>
	<!-- Content Main -->
	<section class='content'>
		<div class='box'>
			<div class="box box-primary">
				<div class="box-header with-border">
		            <div class="col-md-2">
						<a href="<?php echo base_url('admin/sinkronSmt') ?>" type="button" class="btn btn-block btn-primary"><i class="fa fa-refresh"></i> Sinkron</a>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Semester ID</th>
								<th>Semester Nama</th>
								<th>Semester Status</th>
							</tr>
						</thead>
						<tbody>
							<!-- script php -->
							<?php 
							// $no = 1;
							foreach ($Semester->result() as $data) { ?>
							 	<tr>
							 		<td><?php echo $data->smt_id ?></td>
								 	<td><?php echo $data->smt_nama ?></td>
								 	<td><?php echo $data->sss_status ?></td>
							 	</tr>
							<?php } ?>
						</tbody>
						<tfoot>
							<tr>
								<th>Semester ID</th>
								<th>Semester Nama</th>
								<th>Semester Status</th>
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