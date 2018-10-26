<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Sinkron Mahasiswa</h1>
    </section>
	<!-- Content Main -->
	<section class='content'>
		<div class='box'>
			<div class="box box-primary">
				<div class="box-header with-border">
				<form action='<?php echo base_url().'admin/sinkronMhs';?>' method='post'>
					<div class="col-md-12">
					<input type='text' placeholder='Tahun Masuk' name='tahunmasuk'>&nbsp;
					<select class="form-control" name='prodi'>
						<?php
							foreach	($Prodi->result() as $rowp){
						?>		
						<option value='<?php echo $rowp->pst_id;?>'><?php echo $rowp->pst_nama;?></option>
						<?php } ?>
                    </select>&nbsp;
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
							<th>Prodi</th>
							<th>Kelas</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($Mahasiswa->result() as $row){ ?>
						<tr>
							<td align='center'><?php echo $row->mhs_id;?></td>
							<td><?php echo $row->mhs_nim;?></td>
							<td><?php echo $row->mhs_nama;?></td>
							<td><?php echo $row->mhs_tahunmasuk;?></td>
							<td><?php echo $row->mhs_jeniskelamin;?></td>
							<td><?php echo $row->pst_id;?></td>
							<td><?php echo $row->jk_id;?></td>
						</tr>
					<?php } ?>
					</tbody>
					<tfoot>
						<tr>
							<th>ID</th>
							<th>NIM</th>
							<th>Nama</th>
							<th>Tahun Masuk</th>
							<th>Jenis Kelamin</th>
							<th>Prodi</th>
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