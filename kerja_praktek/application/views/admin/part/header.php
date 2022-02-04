<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>AJ Dashboard</title>
        <link href="<?= base_url()?>assets/css/style.css" rel="stylesheet" />
        <link href="<?= base_url()?>assets/css/styles.css" rel="stylesheet" />
        <script src="<?= base_url()?>assets/js/all.min.js" crossorigin="anonymous"></script>
    </head>
	<?php 
    $status = $this->session->userdata('status');
	$ss = $this->session->userdata('ss');
    if ($status == 'login') {
		if ($ss == 'Admin'){
			
		} else{
			redirect(base_url('karyawan'));
		}
    } else {
		$this->session->set_flashdata('alert','<div class="alert alert-danger">Silahkan login terlebih dahulu untuk masuk ke halaman admin !</div>');
        redirect (base_url('login'));
	}

    ?>
