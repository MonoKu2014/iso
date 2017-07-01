<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Iso Quality <?= date('Y'); ?></title>
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/login.css">
</head>
<body>

<div class="container">
    <div class="card card-container">
        
        <img id="profile-img" class="profile-img-card" src="<?= base_url(); ?>assets/images/avatar.png" />
        
        <p>
        	<?= $this->session->flashdata('message');?>
        </p>
        
        <form class="form-signin" method="post" action="<?= base_url(); ?>login/access">
            <span id="reauth-email" class="reauth-email"></span>
            <input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Acceder</button>
        </form>
        
        <a href="#" class="forgot-password">
            Olvidó su contraseña?
        </a>

    </div>
</div>

</body>
</html>