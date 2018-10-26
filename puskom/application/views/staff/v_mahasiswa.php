<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Sinkron Data Mahasiswa</h1>
    </section>
	<!-- Content Main -->
	<section class='content'>
		<?php if($show=='true'){?>
	        <div class="alert alert-success alert-dismissible">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            <h4><i class="icon fa fa-check"></i> Sinkron sukses</h4>
	    		Sinkron Data Mahasiswa Sukses !
	        </div>
	        <!-- Alert Sync Data Berhasil -->
	    <?php }elseif ($show=='false'){?>
	    	<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Sinkron gagal !</h4>
                Sinkron Data Mahasiswa gagal. Mohon ulangi lagi !
	        </div>
	        <!-- Alert Sync Data Gagal -->
    	<?php } ?>
		<div class='box'>
			<div class="box box-primary">
				<div class="box-header with-border">
				<form action='<?php echo base_url().'staff/sinkronMhs';?>' method='post'>
					<div class="col-md-4">
						<input type='text' placeholder='Tahun Masuk' name='tahunmasuk' onkeypress="return numberOnly(event)">
					</div>
					<div class="col-md-4">
						<select class="form-control" name='prodi'>
							<?php
								foreach	($Prodi->result() as $rowp){
							?>		
							<option value='<?php echo $rowp->pst_id;?>'><?php echo $rowp->pst_nama;?></option>
							<?php } ?>
	                    </select>
	                </div>
	                <div class="col-md-4">
						<button type="submit" class="btn btn-block btn-primary"><span class="glyphicon glyphicon-retweet"> Sinkron</span></button>
					</div>
				</form>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<label>Data Mahasiswa</label>
					<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>NIM</th>
							<th>Nama</th>							
							<th>Tahun Masuk</th>
							<th>Jenis Kelamin</th>
							<th>Kelas</th>
						</tr>
					</thead>
					<tbody>
					<?php if($show=='true'){
					 foreach ($this->session->userdata('hasilSinkron') as $row){ ?>
						<tr>
							<td align='center'><?php echo $row->mhs_id;?></td>
							<td><?php echo $row->mhs_nim;?></td>
							<td><?php echo $row->mhs_nama;?></td>
							<td><?php echo $row->mhs_thmasuk;?></td>
							<td><?php echo $row->mhs_jeniskelamin;?></td>
							<td><?php echo $row->mhs_jeniskelas_fk;?></td>
						</tr>
					<?php } }?>
					</tbody>
					<tfoot>
						<tr>
							<th>ID</th>
							<th>NIM</th>
							<th>Nama</th>
							<th>Tahun Masuk</th>
							<th>Jenis Kelamin</th>
							<th>Kelas</th>
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