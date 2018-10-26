<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Sinkron Fakultas</h1>
    </section>
	<!-- Content Main -->
	<section class='content'>
		<div class='box'>
			<div class="box box-primary">
				<div class="box-header with-border">
				<form action='<?php echo base_url().'admin/sinkronFak';?>' method='post'>
					<div class="col-md-6"><a type="button" href='<?php echo base_url().'admin/sinkronFak';?>' class="btn btn-block btn-primary"><span class="glyphicon glyphicon-retweet"> Sinkron</span></a></div>
				</form>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Fakultas ID</th>
								<th>Fakultas Kode</th>
								<th>Fakultas Nama</th>
								<th>Fakultas Singkatan</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($Fakultas->result() as $row){;?>
							<tr>
								<td><?php echo $row->fk_id;?>
								<td><?php echo $row->fk_kode;?>
								<td><?php echo $row->fk_nama;?>
								<td><?php echo $row->fk_singkatan;?>
							</tr>
						</tbody>
						<?php } ?>
						<tfoot>
							<tr>
								<th>Fakultas ID</th>
								<th>Fakultas Kode</th>
								<th>Fakultas Nama</th>
								<th>Fakultas Singkatan</th>
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