<html>
<head>
<link type="text/css" href="<?php echo base_url('files/css/login.css') ?>" rel="stylesheet">
</head>
<body>
<div class="wrapper">
<div class="login-page">
	<div class="module-head">
			<h3>LOGIN</h3>
	</div>
  <div class="form">
    <?php if(isset($_SESSION)) {
	echo $this->session->flashdata('flash_data');
	} ?>
	<form action="<?= site_url('login') ?>" method="post">
	<input type="text" name="username" placeholder="NISN"/>
	<input type="password" name="password" placeholder="Password"/><br>
	<button type="submit">Masuk</button>
		</form>	
  </div>
</div>
</body>
</html>