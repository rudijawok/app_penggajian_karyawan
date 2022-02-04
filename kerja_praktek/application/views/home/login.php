
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/login/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/login/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/login/css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/login/css/iofrm-theme6.css">
</head>
<body>
    <div class="form-body">
        <div class="website-logo">
            <a href="index.html">
                <div class="logo">
                   
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="<?= base_url()?>assets/login/images/graphic2.svg" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
						
                        <h3>Login</h3>
                        <p>Arummanis Jadul.</p>
						<?= $this->session->flashdata('alert')?>
                        <div class="page-links">
                        </div>
                        <form action="<?= base_url()?>login/auth" method="post">
                            <input class="form-control" type="text"  name="username" placeholder="Username" required>
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Login</button> <
                            </div>
                        </form>
                     
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="<?= base_url()?>assets/login/js/jquery.min.js"></script>
<script src="<?= base_url()?>assets/login/js/popper.min.js"></script>
<script src="<?= base_url()?>assets/login/js/bootstrap.min.js"></script>
<script src="<?= base_url()?>assets/login/js/main.js"></script>
</body>
</html>
