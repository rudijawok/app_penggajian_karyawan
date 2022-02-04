<?php include 'part/header.php' ?>
<?php include 'part/navbar.php' ?>
<?php include 'part/sidebar.php' ?>
   
      
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
						<br>
                        <div class="row">
							<div class="col-sm-6">
								<h1>Data Kehadiran Karyawan</h1>
                        	</div>
							<div class="col-sm-6"  align="right">
							<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">
							<i class="fa fa-plus"></i> Tambah Kehadiran
							</button>
							</div>
						</div>
						<br>
						<?= $this->session->flashdata('sukses')?>
						
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Semua Kehadiran Karyawan
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
											<th>No.</th>
											<th>Bulan</th>
											<th>Tahun</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>Hadir</th>
											<th>Sakit</th>
											<th>Alpa</th>
											<th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
											<th>No.</th>
											<th>Bulan</th>
											<th>Tahun</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>Hadir</th>
											<th>Sakit</th>
											<th>Alpa</th>
											<th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
										<?php $no = 1; foreach($kehadiran as $k) {?>
                                        <tr>
                                            <td><?= $no++?></td>
											<td><?= $k->bulan?></td>
											<td><?= $k->tahun?></td>
											<td><?= $k->nama_karyawan?></td>
											<td><?= $k->nama_jabatan?></td>
											<td><?= $k->hadir?></td>
											<td><?= $k->sakit?></td>
											<td><?= $k->alpa?></td>
											<td>
											<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit<?= $k->id?>">
											<i class="fa fa-pen"></i> Edit
											</button> | <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?= $k->id?>">
											<i class="fa fa-trash"></i> Hapus
											</button>
											</td>
                                        </tr>
										<?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>

			<!-- Modal -->
				<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambah" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="tambah">Tambah Kehadiran Karyawan</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="card-body">
                                <table class="table table responsive text-center" border="1">
                                    <thead>
                                        <tr>
											<th>No.</th>
                                            <th>Nama</th>
											<th>Aksi</th>
                                        </tr>
                                    </thead>
                                  
                                    <tbody>
										<?php $no = 1; foreach($karyawan as $k) {?>
                                        <tr>
                                            <td><?= $no++?></td>
											<td><?= $k->nama_karyawan?></td>
											<td>
											<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kehadiran<?= $k->id?>">
											<i class="fa fa-plus"></i> Tambah
											</button>
											</td>
                                        </tr>
										<?php } ?>
                                    </tbody>
                                </table>				
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">BATAL</button>
						
					</div>
					</div>
				</div>
				</div>

				<!-- Modal Tambah -->
			<?php foreach($karyawan as $k) {?>
			<div class="modal fade" id="kehadiran<?= $k->id?>" tabindex="-1" aria-labelledby="tambah" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="tambah">Kehadiran <?= $k->nama_karyawan?></h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form action="<?= base_url()?>admin/kehadiran/store/" method="post" enctype="multipart/form-data">
						<div class="mb-3">
								<label for="nik" class="form-label">Bulan</label>
								
								<select class="form-control" name="bulan" id="">
									<option value="Januari">Januari</option>
									<option value="Februari">Februari</option>
									<option value="Maret">Maret</option>
									<option value="April">April</option>
									<option value="Mei">Mei</option>
									<option value="Juni">Juni</option>
									<option value="Juli">Juli</option>
									<option value="Agustus">Agustus</option>
									<option value="September">September</option>
									<option value="Oktober">Oktober</option>
									<option value="November">November</option>
									<option value="Desember">Desember</option>
								</select>
						</div>
						<div class="mb-3">
								<label for="nik" class="form-label">Tahun</label>
								<select class="form-control" name="tahun" id="">
							<?php $years = range(2019, strftime("%Y", time())); ?>
								<?php foreach($years as $year) : ?>
								<option value="<?php echo $year; ?>"><?php echo $year; ?></option>
							<?php endforeach; ?>
								</select>
						</div>
						<div class="mb-3">
								<label for="nik" class="form-label">Hadir</label>
								<input type="number" name="hadir" class="form-control" >
						</div>
						<div class="mb-3">
								<label for="nik" class="form-label">Sakit</label>
								<input type="number" name="sakit" class="form-control">
						</div>
						<div class="mb-3">
								<label for="nik" class="form-label">Alpa</label>
								<input type="number" name="alpa" class="form-control" >
								<input type="hidden" name="nama_karyawan" value="<?= $k->nama_karyawan?>">
								<input type="hidden" name="jenis_kelamin" value="<?= $k->jenis_kelamin?>">
								<input type="hidden" name="nama_jabatan" value="<?= $k->jabatan?>">
								<input type="hidden" name="nik" value="<?= $k->nik?>">
								<input type="hidden" name="id_karyawan" value="<?= $k->id?>">
						</div>
						
					
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
						</form>
					</div>
					</div>
				</div>
				</div>
				<?php } ?>

						<!-- Modal Edit -->
			<?php foreach($kehadiran as $k) {?>
			<div class="modal fade" id="edit<?= $k->id?>" tabindex="-1" aria-labelledby="tambah" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="tambah">Kehadiran <?= $k->nama_karyawan?></h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form action="<?= base_url()?>admin/kehadiran/update/<?= $k->id?>" method="post" enctype="multipart/form-data">
						<div class="mb-3">
								<label for="nik" class="form-label">Bulan</label>
								
								<select class="form-control" name="bulan" id="">
									<option value="<?= $k->bulan?>" selected><?= $k->bulan?></option>
									<option value="Januari">Januari</option>
									<option value="Februari">Februari</option>
									<option value="Maret">Maret</option>
									<option value="April">April</option>
									<option value="Mei">Mei</option>
									<option value="Juni">Juni</option>
									<option value="Juli">Juli</option>
									<option value="Agustus">Agustus</option>
									<option value="September">September</option>
									<option value="Oktober">Oktober</option>
									<option value="November">November</option>
									<option value="Desember">Desember</option>
								</select>
						</div>
						<div class="mb-3">
								<label for="nik" class="form-label">Tahun</label>
								<select class="form-control" name="tahun" id="">
								<option value="<?= $k->tahun?>" selected><?= $k->tahun?> (Sekarang)</option>
							<?php $years = range(2019, strftime("%Y", time())); ?>
								<?php foreach($years as $year) : ?>
								
								<option value="<?php echo $year; ?>"><?php echo $year; ?></option>
							<?php endforeach; ?>
								</select>
						</div>
						<div class="mb-3">
								<label for="nik" class="form-label">Hadir</label>
								<input type="number" name="hadir" class="form-control" value="<?= $k->hadir?>" >
						</div>
						<div class="mb-3">
								<label for="nik" class="form-label">Sakit</label>
								<input type="number" name="sakit" class="form-control" value="<?= $k->sakit?>">
						</div>
						<div class="mb-3">
								<label for="nik" class="form-label">Alpa</label>
								<input type="number" name="alpa" class="form-control" value="<?= $k->alpa?>">
						</div>
						
					
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-primary">Perbarui</button>
						</form>
					</div>
					</div>
				</div>
				</div>
				<?php } ?>					

			<!-- Modal Hapus -->
			<?php foreach($kehadiran as $k) {?>
			<div class="modal fade" id="hapus<?= $k->id?>" tabindex="-1" aria-labelledby="tambah" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="tambah">Hapus Kehadiran Karyawan</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
					<form action="<?= base_url()?>admin/kehadiran/delete/<?= $k->id?>" method="post" enctype="multipart/form-data">
					<h4>Apakah kamu ingin menghapus kehadiran karyawan <?= $k->nama_karyawan?></h4>
					
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
						<button type="submit" class="btn btn-primary">Ya</button>
						</form>
					</div>
					</div>
				</div>
				</div>
				<?php }?>

			
<?php include 'part/footer.php';
