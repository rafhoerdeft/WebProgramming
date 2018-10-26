<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Tabel Programstudi</h1>
    </section>
	<!-- Content Main -->
	<section class='content'>
		<div class='box'>
			<div class="box box-primary">
				<div class="box-header with-border">
					<div class="col-md-6"><a type="button" href='<?php echo base_url().'admin/sinkronProdi';?>' class="btn btn-block btn-primary"><span class="glyphicon glyphicon-retweet"> Sinkron</span></a></div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Programstudi ID</th>
								<th>Programstudi Nama</th>
								<th>Programstudi Jenjang</th>
								<th>Fakultas ID</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($Prodi->result() as $row){;?>
							<tr>
								<td><?php echo $row->pst_id;?>
								<td><?php echo $row->pst_nama;?>
								<td><?php echo $row->pst_jenjangpendidikan;?>
								<td><?php echo $row->fk_id;?>
							</tr>
						</tbody>
						<?php } ?>
						<tfoot>
							<tr>
								<th>Programstudi ID</th>
								<th>Programstudi Nama</th>
								<th>Programstudi Jenjang</th>
								<th>Fakultas ID</th>
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