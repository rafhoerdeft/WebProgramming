<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Main -->
	<section class='content'>
		<div class='box box-default'>
			<div class="box box-primary">
				<div class="box-header with-border">
					<form action='<?php echo base_url().'staff/inputPeserta';?>' method='post'>
					<center>
						<div class="col-md-12"><label>Form Input Peserta PUSKOM</label></div>
						<?php foreach ($jadwal->result() as $value) {?>
							<div class="col-md-3">Tanggal : <?php echo $value->jd_tanggal;?></div> 
							<div class="col-md-3">Pukul : <?php echo $value->jd_waktu;?></div> 
							<div class="col-md-3">Ruang : <?php echo $value->jd_ruang;?></div>						
							<div class="col-md-3">Kelas : <?php echo $value->jd_keterangan;?></div>						
							<input type="hidden" name="jd_id" value="<?php echo $value->jd_id ;}?>">
					</center>
				</div>
				<div class="box-header with-border">
						<div class="form-group">
								
							<!--Tahun Masuk/Angkatan Mahasiswa-->
							<div class="col-md-3">
								<div class="form-group">
									<center><label>Tahun Masuk Mahasiswa</label></center>
									<select class="form-control" name='tahun' required>
										<option value="">Pilih Tahun</option>
										<?php  
											foreach ($tahun->result() as $key) {
												echo "<option value='$key->mhs_tahunmasuk'>$key->mhs_tahunmasuk</option>";
											}
										?>
									</select>
								</div>
							</div>

							<!-- Prodi -->
							<div class="col-md-3">
								<div class="form-group" >
									<center><label>Program Studi</label></center>
									<select class="form-control" name='prodi' required>
										<option value="">Pilih Program Studi</option>
										<?php  
											foreach ($prodi->result() as $key) {
												echo "<option value='$key->pst_id'>$key->pst_nama</option>";
											}
										?>
									</select>
								</div>
							</div>

							<!--Kelas-->
							<div class="col-md-3">								
								<div class="form-group">
									<center><label>Kelas</label></center>
									<select class="form-control" name='kelas' required>
										<option value="">Pilih Kelas</option>
										<?php  
											foreach ($kelas->result() as $key) {
												echo "<option value='$key->jk_id'>$key->jk_nama</option>";
											}
										?>
									</select>
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group" >
									<label style="color: white;">Cari</label>
									<button type="submit" class="btn btn-block btn-primary"><i class="fa fa-fw fa-search"></i> Go Find It !</button>
								</div>
							</div>
						</div>
					</form>
					<!-- ./form pencarian mahasiswa -->
				</div>

				<!-- form input mahasiswa menjadi peserta ke jadwal -->
				<form action='<?php echo base_url().'staff/insertPeserta';?>' method='post' id='inputPeserta'>
					<?php foreach ($jadwal->result() as $key) {
						echo"<input type='hidden' name='jd_id' value='$key->jd_id'>";
					}?>

					<!-- <script> 
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
					</script> -->

				<?php if($show=='true'){?>
					<div class="box-body" >
						<center><label>Data Mahasiswa</label></center>
						<table class="table table-bordered table-striped" id="tabel_input_peserta">
							<thead>
								<tr>
									<th>Proses</th>
									<th>NIM</th>
									<th>Nama</th>							
									<th>Tahun Masuk</th>
									<th>Jenis Kelamin</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$i=-1;
									foreach ($mahasiswa->result() as $row){ 
									$i++;
								?>
								<tr onclick="centang(<?php echo $i; ?>)">
									<td align='center'><input type="checkbox" id="cekbox" name='mhs_id[]' value='<?php echo $row->mhs_id;?>'></td>
									<td><?php echo $row->mhs_nim;?></td>
									<td><?php echo $row->mhs_nama;?></td>
									<td><?php echo $row->mhs_tahunmasuk;?></td>
									<td><?php echo $row->mhs_jeniskelamin;?></td>
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
								</tr>
							</tfoot>
						</table>
					</div>
					<!-- /.box-body -->
				<?php } ?>
					
					<div class='box-body'>
						<div class="col-md-6">	
							<h3><b>Data yang dipilih : <span id='total'></span></b></h3>
						</div>
						<div class="col-md-6">					
							<p align="right">
							<button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-save"></i> Submit</button>
						</div>
					</div>
					<!-- /.box-body -->
				</form>
				<!-- ./form input mahasiswa menjadi peserta ke jadwal -->
			</div>
			<!-- col md -->
		<!-- box -->  
		</div>
	<!--section -->
	</section>
<!-- content wrapper -->
</div>

<script>
	$.ajax({
		$('#table').hide();
	}
	);
	
</script>