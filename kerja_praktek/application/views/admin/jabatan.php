<?php include 'part/header.php' ?>
<?php include 'part/navbar.php' ?>
<?php include 'part/sidebar.php' ?>
   
      
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
						<br>
                        <div class="row">
							<div class="col-sm-6">
								<h1>Data jabatan</h1>
                        	</div>
							<div class="col-sm-6"  align="right">
							<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">
							<i class="fa fa-plus"></i> Tambah jabatan
							</button>
							</div>
						</div>
						<br>
						<?= $this->session->flashdata('sukses')?>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data jabatan
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
											<th>No.</th>
											<th>Nama Jabatan</th>
                                            <th>Gaji Pokok</th>
                                            <th>Tunjangan</th>
											<th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
											<th>No.</th>
											<th>Nama Jabatan</th>
                                            <th>Gaji Pokok</th>
                                            <th>Tunjangan</th>
											<th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
										<?php $no = 1; foreach($jabatan as $j) {?>
                                        <tr>
                                            <td><?= $no++?></td>
											<td><?= $j->nama_jabatan?></td>
											<td>Rp.<?php $angka=number_format($j->gaji_pokok); $uang = str_replace(',', '.', $angka); echo $uang?></td>
											<td>Rp.<?php $angka=number_format($j->tunjangan_jabatan); $uang = str_replace(',', '.', $angka); echo $uang?></td>
											<td>
											<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit<?= $j->id?>">
											<i class="fa fa-pen"></i> Edit
											</button> | <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?= $j->id?>">
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
						<h5 class="modal-title" id="tambah">Tambah jabatan</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form action="<?= base_url()?>admin/jabatan/store" method="post" enctype="multipart/form-data">
						<div class="mb-3">
								<label for="nik" class="form-label">Nama jabatan</label>
								<input type="text" name="nama_jabatan" class="form-control" id="nik"  placeholder="Masukan Nama Jabatan">
						</div>
						<div class="mb-3">
								<label for="nik" class="form-label">Gaji Pokok</label>
								<input type="text" name="gaji_pokok" class="form-control" id="nik"   placeholder="Masukan Gaji Pokok">
						</div>
						<div class="mb-3">
								<label for="nik" class="form-label">Tunjangan</label>
								<input type="text" name="tunjangan" class="form-control" id="nik"   placeholder="Masukan Tunjangan">
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
			<?php foreach($jabatan as $j) {?>
			<div class="modal fade" id="edit<?= $j->id?>" tabindex="-1" aria-labelledby="tambah" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="tambah">Edit jabatan</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form action="<?= base_url()?>admin/jabatan/update/<?= $j->id?>" method="post" enctype="multipart/form-data">
		
						<div class="mb-3">
								<label for="nik" class="form-label">Nama jabatan</label>
								<input type="text" name="nama_jabatan" class="form-control" id="nik"  value="<?= $j->nama_jabatan?>">
						</div>
						<div class="mb-3">
								<label for="nik" class="form-label">Gaji Pokok</label>
								<input type="text" name="gaji_pokok" class="form-control" id="nik"  value="<?= $j->gaji_pokok?>"">
						</div>
						<div class="mb-3">
								<label for="nik" class="form-label">Tunjangan</label>
								<input type="text" name="tunjangan" class="form-control" id="nik"  value="<?= $j->tunjangan_jabatan?>"">
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
			<?php foreach($jabatan as $j) {?>
			<div class="modal fade" id="hapus<?= $j->id?>" tabindex="-1" aria-labelledby="tambah" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="tambah">Hapus jabatan</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
					<form action="<?= base_url()?>admin/jabatan/delete/<?= $j->id?>" method="post" enctype="multipart/form-data">
					Apakah kamu ingin menghapus Jabatan 
					<br>
					<h4> <?= $j->nama_jabatan?></h4>
					
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
