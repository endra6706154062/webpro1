<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>INTERPID</title>
		<link type="text/css" href="<?php echo base_url('files/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
		<link type="text/css" href="<?php echo base_url('files/bootstrap/css/bootstrap-responsive.min.css') ?>" rel="stylesheet">
		<link type="text/css" href="<?php echo base_url('files/css/theme.css') ?>" rel="stylesheet">
		<link type="text/css" href="<?php echo base_url('files/images/icons/css/font-awesome.css') ?>" rel="stylesheet">
	</head>
	<body>

		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
						<i class="icon-reorder shaded"></i>
					</a>
					<a class="brand" href="index.html"> I N T E R P I D </a>
				<div style="position:absolute;right:10px;top:8px;">
				<label>Selamat Datang, <?= $this->session->userdata('username') ?></label>
				<a style="position:absolute;right:0%;" href="<?= site_url('home/logout') ?>">Logout</a>
				</div>
			  </div>
			</div><!-- /navbar-inner -->
		</div><!-- /navbar -->



		<div class="wrapper">
			<div class="container">
				<div class="row">
					<div class="span3">
						<div class="sidebar">

							<ul class="widget widget-menu unstyled">
								<li class="active">
									<a href="<?php echo base_url('index.php/siswa') ?>">
										<i class="menu-icon icon-pencil"></i>
										Tambah Data Siswa
									</a>
								</li>
								<li>
									<a href="<?php echo base_url('index.php/siswa/activity') ?>">
										<i class="menu-icon icon-user"></i>
										Upload File
									</a>
								</li>
								<li>
									<a href="<?php echo base_url('index.php/siswa/view_mhs') ?>">
										<i class="menu-icon icon-table"></i>
										Kelola Data Siswa 
									</a>
								</li>
							</ul><!--/.widget-nav-->
						</div><!--/.sidebar-->
					</div><!--/.span3-->


					<div class="span9">
						<div class="content">
							<div class="module">
								<div class="module-head">
									<h3>Data Siswa</h3>
								</div>
								<div class="module-body table">
									<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
										<thead>
											<tr>
												<th><center>No</center></th>
												<th><center>NISN</center></th>
												<th><center>Nama</center></th>
												<th><center>Tempat Lahir</center></th>
												<th><center>Tanggal Lahir</center></th>
												<th><center>Agama</center></th>
												<th></th>
											</tr>
										</thead>
										<tbody>
												<?php 
													$no = $this->uri->segment('3') + 1;
													foreach($user as $u){ 
												?>
												<tr>
												  <td><?php echo $no++; ?></td>
												  <td><?php echo $u->nisn ?></td>
												  <td><?php echo $u->nama ?></td>
												  <td><?php echo $u->tl ?></td>
												  <td><?php echo $u->tgl ?></td>
												  <td><?php echo $u->agama ?></td>
												  <td><center> <a href="<?php echo base_url('index.php/siswa/edit_siswa/'.$u->nisn)?>"><b style="color:#4169E1">Edit</b></a> | 
													<a href="<?php echo base_url('index.php/siswa/delete_siswa/'.$u->nisn)?> "><b style="color:#4169E1">Hapus</b></a></center></td>
												</tr>
												<?php } ?>
										</tbody>
										<tfoot>
												
										</tfoot>
									</table>
									<?php 
										echo $this->pagination->create_links();
									?>
								</div>
							</div><!--/.module-->
						</div><!--/.content-->
					</div><!--/.span9-->
				</div>
			</div><!--/.container-->
		</div><!--/.wrapper-->

		<div class="footer">
			<div class="container"> 
			</div>
		</div>
	</body>
</html>