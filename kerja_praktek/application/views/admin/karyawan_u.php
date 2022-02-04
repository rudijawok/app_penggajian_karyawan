<?php include 'part/header_k.php' ?>
<?php include 'part/navbar.php' ?>

   
	<br><br><br>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
						<br>
                        <div class="row">
							<div class="col-sm-6">
								<h1>Laporan Gaji <?= $this->session->userdata('nama_karyawan')?> </h1>
                        	</div>
							<div class="col-sm-6"  align="right">
							 
							</button>
							</div>
						</div>
						<br>
						<?= $this->session->flashdata('sukses')?>
						
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Laporan Gaji <?= $this->session->userdata('nama_karyawan')?>
                            </div>
                            <div class="card-body text-center">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
											<th>No.</th>
											<th>Nama</th>
                                            <th>Bulan</th>
                                            <th>Tahun</th>
                                            <th>Jabatan</th>
											<th>Gaji </th>
											<th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
									<tr>
											<th>No.</th>
											<th>Nama</th>
                                            <th>Bulan</th>
                                            <th>Tahun</th>
                                            <th>Jabatan</th>
											<th>Gaji</th>
											<th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
										<?php $no = 1; foreach($kehadiran as $k) {?>
                                        <tr>
                                            <td><?= $no++?></td>
											<td><?= $k->nama_karyawan?></td>
											<td><?= $k->bulan?></td>
											<td><?= $k->tahun?></td>
											<td><?= $k->nama_jabatan?></td>
											<td>
											<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#gaji<?= $k->id?>">
											<i class="fa fa-eye"></i> Lihat Gaji
											</button>
											</td>
											
											<td>
											<a href="<?= base_url()?>admin/laporan/cetak/<?= $k->id?>" class="btn btn-primary"> <i class="fa fa-print"></i> Cetak</a>
											</td>
                                        </tr>
										<?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>

				<!-- Modal Hapus -->
			<?php foreach($kehadiran as $k) {?>
			<div class="modal fade" id="gaji<?= $k->id?>" tabindex="-1" aria-labelledby="tambah" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="tambah">Gaji <?= $k->nama_karyawan?></h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<?php
						$ids = $k->id ;
						$kehadiran	= $this->db->where('id',$ids)->get('tb_kehadiran')->row_array();
						$jabatan = $kehadiran['nama_jabatan'] ;
						$gaji = $this->db->where('nama_jabatan',$jabatan)->get('tb_jabatan')->row_array();
						$s =  $this->db->where('id',3)->get('tb_potongan_gaji')->row_array()		;
						$a =  $this->db->where('id',4)->get('tb_potongan_gaji')->row_array()		;
						$sakit = $kehadiran['sakit']*$s['jumlah_potongan'];
						$alpa = $kehadiran['alpa']*$a['jumlah_potongan'];
						$potongan = $sakit+$alpa ;
						?>
						<table class="table">
							<tr>
								<th>Gaji Pokok</th>
								<th>Tunjangan</th>
								<th>Potongan</th>
								<th>Total</th>
							</tr>
							<tr>
								<td>Rp. <?= $gaji['gaji_pokok']?></td>
								<td>Rp. <?= $gaji['tunjangan_jabatan']?></td>
								<td>Rp. <?= $potongan ?></td>
								<td>Rp. <?php $angka = $gaji['gaji_pokok']+$gaji['tunjangan_jabatan']-$potongan ; $angka = number_format($angka);
										 $uang = str_replace(',', '.', $angka);
										echo $uang ?>;</td>
							</tr>
						</table>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
					</div>
					</div>
				</div>
				</div>
				<?php }?>								

			
<?php include 'part/footer.php';
