<?php include 'part/header.php' ?>
<?php include 'part/navbar.php' ?>
<?php include 'part/sidebar.php' ?>
   
      
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
						<br>
                        <div class="row">
							<div class="col-sm-6">
								<h1>Data Karyawan</h1>
                        	</div>
							<div class="col-sm-6"  align="right">
							<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">
							<i class="fa fa-plus"></i> Tambah Karyawan
							</button> <a href="<?= base_url()?>admin/karyawan/print" class="btn btn-success"><i class="fa fa-print"></i> Cetak Karyawan</a>
							</div>
						</div>
						<br>
						<?= $this->session->flashdata('sukses')?>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Karyawan
                            </div>
                            <div class="card-body " >
                                <table id="datatablesSimple"  >
                                    <thead>
                                        <tr>
											<th>No.</th>
											<th>Nik</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Jabatan</th>
											<th>Tanggal Masuk</th>
                                            <th>Status</th>
											<th>Foto</th>
											<th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
											<th>No.</th>
											<th>Nik</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Jabatan</th>
											<th>Tanggal Masuk</th>
                                            <th>Status</th>
											<th>Foto</th>
											<th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
										<?php $no = 1; foreach($karyawan as $k) {?>
                                        <tr>
                                            <td><?= $no++?></td>
											<td><?= $k->nik?></td>
											<td><?= $k->nama_karyawan?></td>
											<td><?= $k->jenis_kelamin?></td>
											<td><?= $k->jabatan?></td>
											<td><?= $k->tanggal_masuk?></td>
											<td><?= $k->status?></td>
											<td><img width="30px" src="<?= base_url()?>uploads/karyawan/<?= $k->foto?>" alt=""></td>
											<td>
											<button type="button" class="btn btn-success " data-bs-toggle="modal" data-bs-target="#edit<?= $k->id?>">
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
				<div class="modal-dialog modal-xl">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="tambah">Tambah Karyawan</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form action="<?= base_url()?>admin/karyawan/store" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-sm-6">

							<div class="mb-3">
								<label for="nik" class="form-label">Nik</label>
								<input type="text" name="nik" class="form-control" id="nik" placeholder="Masukan NIK" required oninvalid="this.setCustomValidity('Data perlu diisi untuk melanjutkan')">
						</div>
						<div class="mb-3">
								<label for="nik" class="form-label">Nama Pegawai</label>
								<input type="text" name="nama_karyawan" class="form-control" id="nik" placeholder="Masukan NAMA PEGAWAI" required oninvalid="this.setCustomValidity('Data perlu diisi untuk melanjutkan')" >
						</div>
						<div class="mb-3">
								<label for="nik" class="form-label">Username</label>
								<input type="text" name="username" class="form-control" id="nik" placeholder="Masukan USERNAME" required oninvalid="this.setCustomValidity('Data perlu diisi untuk melanjutkan')">
						</div>
						<div class="mb-3">
								<label for="nik" class="form-label">Password</label>
								<input type="password" name="password" class="form-control" id="nik" placeholder="Masukan Password" required oninvalid="this.setCustomValidity('Data perlu diisi untuk melanjutkan')">
						</div>
						<div class="mb-3">
								<label for="nik" class="form-label">Jenis Kelamin</label>
								<select name="jenis_kelamin" id="" class="form-control" required oninvalid="this.setCustomValidity('Data perlu diisi untuk melanjutkan')">
									<option value="Laki-Laki">Laki-Laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
						</div>
							</div>
							<div class="col-sm-6">
								
						<div class="mb-3">
								<label for="nik" class="form-label">Jabatan</label>
								<select name="jabatan" id="" class="form-control" required oninvalid="this.setCustomValidity('Data perlu diisi untuk melanjutkan')">
								<?php foreach($jabatan as $j): ?>
									<option value="<?= $j->nama_jabatan?>"><?= $j->nama_jabatan?></option>
									<?php endforeach ?>
								</select>
						</div>
						<div class="mb-3">
								<label for="nik" class="form-label">Tanggal Masuk</label>
								<input type="date" name="tanggal_masuk" class="form-control" id="nik" required oninvalid="this.setCustomValidity('Data perlu diisi untuk melanjutkan')">
						</div>
						<div class="mb-3">
								<label for="nik" class="form-label">Status</label>
								<select name="status" id="" class="form-control" required oninvalid="this.setCustomValidity('Data perlu diisi untuk melanjutkan')">
									<option value="Admin">Admin</option>
									<option value="Karyawan">Karyawan</option>
								</select>
						</div>
						<div class="mb-3">
								<label for="nik" class="form-label">FOTO</label>
								<input type="file" name="foto" class="form-control" id="nik" required oninvalid="this.setCustomValidity('Data perlu diisi untuk melanjutkan')">
						</div>
							</div>
						</div>
					
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">BATAL</button>
						<button type="submit" class="btn btn-primary">SIMPAN</button>
						</form>
					</div>
					</div>
				</div>
				</div>

			<!-- Modal EDIT -->
			<?php foreach($karyawan as $k) {?>
			<div class="modal fade" id="edit<?= $k->id?>" tabindex="-1" aria-labelledby="tambah" aria-hidden="true">
				<div class="modal-dialog modal-xl">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="tambah">Edit Karyawan</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form action="<?= base_url()?>admin/karyawan/update/<?= $k->id?>" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-sm-6">
								
						<div class="mb-3">
								<label for="nik" class="form-label">Nik</label>
								<input type="text" name="nik" class="form-control" id="nik" value="<?= $k->nik?>">
						</div>
						<div class="mb-3">
								<label for="nik" class="form-label">Nama Karyawan</label>
								<input type="text" name="nama_karyawan" class="form-control" id="nik"  value="<?= $k->nama_karyawan?>">
						</div>
						<div class="mb-3">
								<label for="nik" class="form-label">Username</label>
								<input type="text" name="username" class="form-control" id="nik"  value="<?= $k->username?>">
						</div>
						<div class="mb-3">
								<label for="nik" class="form-label">Password</label>
								<input type="password" disabled name="password" class="form-control" id="nik"  value="<?= $k->password?>">
								<a href="#password<?= $k->id?>"  data-bs-toggle="modal" data-bs-target="#password<?= $k->id?>">Ganti Password</a>
						</div>
						<div class="mb-3">
								<label for="nik" class="form-label">Jenis kelamin</label>
								<select name="jenis_kelamin" id="" class="form-control">
									<option  value="<?= $k->jenis_kelamin?>"><?= $k->jenis_kelamin?> (Sekarang)</option>
									<option value="Laki-Laki">Laki-Laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
						</div>
							</div>
							<div class="col-sm-6">
							<div class="mb-3">
								<label for="nik" class="form-label">Jabatan</label>
								<select name="jabatan" id="" class="form-control">
									<option value="<?= $k->jabatan?>"><?= $k->jabatan ?> (Sekarang)</option>
									<?php foreach($jabatan as $j): ?>
									<option value="<?= $j->nama_jabatan?>"><?= $j->nama_jabatan?></option>
									<?php endforeach ?>
								</select>
						</div>
						<div class="mb-3">
								<label for="nik" class="form-label">Tanggal Masuk</label>
								<input type="date" onfocus="(this.type='date')" value="<?= $k->tanggal_masuk ?>" name="tanggal_masuk" class="form-control" id="nik" >
						</div>
						<div class="mb-3">
								<label for="nik" class="form-label">Status</label>
								<select name="status" id="" class="form-control">
									<option  value="<?= $k->status?>"><?= $k->status?> (Sekrang)</option>
									<option value="Admin">Admin</option>
									<option value="Karyawan">Karyawan</option>
								</select>
						</div>
						<div class="mb-3">
								<label for="nik" class="form-label">Foto</label>
								<input type="file" name="foto" class="form-control" id="nik">
								<input type="hidden"  value="<?= $k->foto?>" name="foto_old">
						</div>
							</div>
						</div>
						
					
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">BATAL</button>
						<button type="submit" class="btn btn-primary">SIMPAN</button>
						</form>
					</div>
					</div>
				</div>
				</div>
				<?php }?>

			<!-- Modal Hapus -->
			<?php foreach($karyawan as $k) {?>
			<div class="modal fade" id="hapus<?= $k->id?>" tabindex="-1" aria-labelledby="tambah" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="tambah">Hapus Karyawan</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
					<form action="<?= base_url()?>admin/karyawan/delete/<?= $k->id?>" method="post" enctype="multipart/form-data">
					<h4>Apakah kamu ingin menghapus karyawan <?= $k->nama_karyawan?></h4>
					
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
						<button type="submit" class="btn btn-danger">Ya</button>
						</form>
					</div>
					</div>
				</div>
				</div>
				<?php }?>

				
			<!-- Modal Password -->
			<?php foreach($karyawan as $k) {?>
			<div class="modal fade" id="password<?= $k->id?>" tabindex="-1" aria-labelledby="tambah" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="tambah">Ganti Password <?= $k->nama_karyawan?></h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
					<form action="<?= base_url()?>admin/karyawan/password/<?= $k->id?>" method="post" enctype="multipart/form-data">
					<div class="mb-3">
								<label for="nik" class="form-label">Password Baru</label>
								<input type="password" name="password" class="form-control" id="nik" placeholder="Masukan Password Baru">
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
				<?php }?>
<?php include 'part/footer.php';
