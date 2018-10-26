<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Sinkron Programstudi</h1>
    </section>
	<!-- Content Main -->
	<section class='content'>
		<?php if($show=='true'){?>
	        <div class="alert alert-success alert-dismissible">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            <h4><i class="icon fa fa-check"></i> Sinkron sukses</h4>
	    		Sinkron Data Program Studi Sukses !
	        </div>
	        <!-- Alert Sync Data Berhasil -->
	    <?php }elseif ($show=='false'){?>
	    	<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Sinkron gagal !</h4>
                Sinkron Data Program Studi gagal. Mohon ulangi lagi !
	        </div>
	        <!-- Alert Sync Data Gagal -->
    	<?php } ?>
		<div class='box'>
			<div class="box box-primary">
				<div class="box-header with-border">
					<div class="col-md-6"><a type="button" href='<?php echo base_url().'staff/sinkronProdi';?>' class="btn btn-primary"><span class="glyphicon glyphicon-retweet"> Sinkron</span></a></div>
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
								<td><?php echo $row->pst_id;?></td>
								<td><?php echo $row->pst_nama;?></td>
								<td><?php echo $row->pst_jenjangpendidikan;?></td>
								<td><?php echo $row->fk_id;?></td>
							</tr>
						<?php } ?>
						</tbody>						
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