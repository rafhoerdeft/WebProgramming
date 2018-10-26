<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Main -->
	<section class='content'>
		<div class='box box-default'>
			<div class="box box-primary">
				<div class="box-header with-border">
					<div class="col-md-2">Form Input Peserta PUSKOM</div>
				</div>


				<div class="box-header with-border">
					<form action='<?php echo base_url().'admin/inputPeserta';?>' method='post'>
							<!--Tahun Masuk/Angkatan-->
						<div class="form-group" style="width: 100%;">
							<div class="form-group" style="width: 27%; float: left; margin-right: 10px">
								<label>Tahun Masuk Mahasiswa</label>
								<select class="form-control" name='tahun'">
									<?php  
										foreach ($tahun->result() as $key) {
											echo "<option value='$key->mhs_tahunmasuk'>$key->mhs_tahunmasuk</option>";
										}
									?>
								</select>
							</div>
							<!-- Prodi -->
							<div class="form-group" style="width: 27%; float: left; margin-right: 10px">
								<label>Program Studi</label>
								<select class="form-control" name='prodi'">
									<?php  
										foreach ($prodi->result() as $key) {
											echo "<option value='$key->pst_id'>$key->pst_nama</option>";
										}
									?>
								</select>
							</div>
							<!--Kelas-->
							<div class="form-group" style="width: 27%; float: left; margin-right: 10px">
								<label>Kelas</label>
								<select class="form-control" name='kelas'">
									<?php  
										foreach ($kelas->result() as $key) {
											echo "<option value='$key->jk_id'>$key->jk_nama</option>";
										}
									?>
								</select>
							</div>
							<div class="form-group" style="width: 115px; float: left; margin-top: 25px;">
								<button type="submit" class="btn btn-block btn-primary"><i class="fa fa-fw fa-search"></i> Tampil</button>
							</div>
						</div>
					</form>
				</div>

				<form action='<?php echo base_url().'admin/insertPeserta';?>' method='post'>
					<div class="box-header with-border">
						<div class="form-group" style="width: 45%; float: left; margin-right: 50px">
							<label>Jadwal ID</label>
							<select class="form-control" name='jadwal'">
								<?php  
									foreach ($jadwal->result() as $key) {
										echo "<option value='$key->jd_id'>$key->jd_nama</option>";
									}
								?>
							</select>
						</div>
						<!-- Date -->
						<div class="form-group" style="width: 45%; float: left;">
							<label>Tanggal:</label>
							<div class="input-group date">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input type="text" class="form-control pull-right" name='tanggal' id="datepicker" required>
							</div>
							<!-- /.input group -->
						</div>
						<!-- /.form group -->
					</div>

					<script> 
						function cek(cekbox){ 
			    			for(i=0; i < cekbox.length; i++){ 
			        			cekbox[i].checked = true; 
			    			} 
						} 
						function uncek(cekbox){ 
						    for(i=0; i < cekbox.length; i++){ 
						        cekbox[i].checked = false; 
						    } 
						} 
						function centang(id){
			                if(cekbox[id].checked == false){
			                    cekbox[id].checked = true; 
			                }else{
			                    cekbox[id].checked = false;
			                }
						}
					</script>

					<div class="box-body" >
						<label>Data Mahasiswa</label>
						<table id="example1" class="table table-bordered table-striped" id="table">
							<thead>
								<tr>
									<th>Proses</th>
									<th>NIM</th>
									<th>Nama</th>							
									<th>Tahun Masuk</th>
									<th>Jenis Kelamin</th>
									<th>Prodi</th>
									<th>Kelas</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$i=-1;
									foreach ($Mahasiswa->result() as $row){ 
									$i++;
								?>
								<tr onclick="centang(<?php echo $i; ?>)">
									<td align='center'><input type="checkbox" id="cekbox" class="minimal" name='mhs_id[]' value='<?php echo $row->mhs_id;?>'></td>
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
									<th>Proses</th>
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
				<div class='box-body'>
					<center>
					<div class="col-md-2">
						<button type="button" onclick="cek(cekbox)" class="btn btn-block btn-primary">Select All</button> 
					</div>
					<div class="col-md-2">
						<button type="button" onclick="uncek(cekbox)" class="btn btn-block btn-primary">Clear All</button>
					</div>
					<div class="col-md-3">						
						<button type="submit" class="btn btn-block btn-primary"><i class="fa fa-fw fa-save"></i> Submit</button>
					</div>

					</center>
				</div>
			</form>
			</div>
			<!-- col md -->
		<!-- box -->  
		</div>
	<!--section -->
	</section>
<!-- content wrapper -->
</div>
