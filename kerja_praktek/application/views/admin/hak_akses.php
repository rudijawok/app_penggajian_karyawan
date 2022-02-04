<?php include 'part/header.php' ?>
<?php include 'part/navbar.php' ?>
<?php include 'part/sidebar.php' ?>
   
      
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
						<br>
                        <div class="row">
							<div class="col-sm-6">
								<h1>Data Hak Akses</h1>
                        	</div>
							<div class="col-sm-6"  align="right">
						
							</div>
						</div>
						<br>
						<?= $this->session->flashdata('sukses')?>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Hak Akses
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
											<th>No.</th>
											<th>Keterangan</th>
                                            <th>Hak Akses</th>
										
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
										<th>No.</th>
											<th>Keterangan</th>
                                            <th>Hak Akses</th>
										
                                        </tr>
                                    </tfoot>
                                    <tbody>
										<?php $no = 1; foreach($hakakses as $h) {?>
                                        <tr>
                                            <td><?= $no++?></td>
											<td><?= $h->keterangan?></td>
											<td><?= $h->hak_akses?></td>
											
                                        </tr>
										<?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>

				
			
<?php include 'part/footer.php';
