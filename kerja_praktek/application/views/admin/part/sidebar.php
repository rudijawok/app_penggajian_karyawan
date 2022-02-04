<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <br><br>
                            <a class="nav-link" href="<?= base_url()?>admin/dashboard">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Menu Utama</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Karyawan
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?= base_url()?>admin/karyawan">Data Karyawan</a>
                                    <a class="nav-link" href="<?= base_url()?>admin/jabatan">Data Jabatan</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Kehadiran
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    
                                    <a class="nav-link" href="<?= base_url()?>admin/kehadiran">Data Kehadiran</a>
                                    
                                </nav>
                            </div>

							<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages1" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                Laporan
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages1" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link" href="<?= base_url()?>admin/laporan">Laporan Gaji</a>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">SISTEM</div>
							<a class="nav-link" href="<?= base_url()?>admin/potongan_gaji">
                                <div class="sb-nav-link-icon"><i class="fa fa-book"></i></div>
                                Potongan Gaji
                            </a>
                            <a class="nav-link" href="<?= base_url()?>admin/hak_akses">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Hak Akses
                            </a>
							
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Masuk Sebagai:</div>
                       <?=  $status = $this->session->userdata('nama_karyawan'); ?>
                    </div>
                </nav>
            </div>
