<?php include 'part/header.php' ?>
<?php include 'part/navbar.php' ?>
<?php include 'part/sidebar.php' ?>
   
      
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
						<br>
                        <div class="row">
							<div class="col-sm-6">
								<h1>Data Potongan Gaji</h1>
                        	</div>
							<div class="col-sm-6"  align="right">
							
						</div>
						<br>
						<?= $this->session->flashdata('sukses')?>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Potongan Gaji
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
											<th>No.</th>
											<th>Potongan</th>
                                            <th>Jumlah Potongan</th>
											<th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
										<th>No.</th>
											<th>Potongan</th>
                                            <th>Jumlah Potongan</th>
											<th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
										<?php $no = 1; foreach($potongan as $p) {?>
                                        <tr>
                                            <td><?= $no++?></td>
											<td><?= $p->potongan?></td>
											<td>Rp. <?php $angka=number_format($p->jumlah_potongan); $uang= str_replace('.', '.', $angka); echo $uang?></td>
											<td>
											<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit<?= $p->id?>">
											<i class="fa fa-pen"></i> Edit
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

			

			<!-- Modal EDIT -->
			<?php foreach($potongan as $p) {?>
			<div class="modal fade" id="edit<?= $p->id?>" tabindex="-1" aria-labelledby="tambah" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="tambah">Edit Potongan Gaji</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form action="<?= base_url()?>admin/potongan_gaji/update/<?= $p->id?>" method="post" enctype="multipart/form-data">
		
						<div class="mb-3">
								<label for="nik" class="form-label">Potongan</label>
								<input type="text" disabled name="potongan" class="form-control" id="nik"  value="<?= $p->potongan?>">
						</div>
						<div class="mb-3">
								<label for="nik" class="form-label">Jumlah Potongan</label>
								<input type="text" name="jumlah_potongan" class="form-control" id="nik"   value="<?= $p->jumlah_potongan?>">
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

			
<?php include 'part/footer.php';
