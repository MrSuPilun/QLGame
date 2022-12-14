<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title><?php echo $page_title; ?></title>
	<script src="assets/vendor/bootstrap-4.6.2-dist/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-3.0.0.min.js"></script>
	<script src="assets/vendor/bootstrap-4.6.2-dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="includes/style.css" type="text/css" />
	<link rel="stylesheet" href="assets/vendor/fontawesome-free-6.2.0-web/css/all.min.css">
	<link rel="stylesheet" href="assets/vendor/bootstrap-4.6.2-dist/css/bootstrap.min.css" type="text/css" media="screen" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>

<body>
	<?php
	function activeClasses($p = 0, $i)
	{
		if (!is_numeric($p))
			$p = 0;
		return $i === $p ? "active" : "";
	}
	?>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<!-- <div class="container"> -->
		<a class="navbar-brand" href="#">Nhóm 7</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item <?php echo activeClasses($p, 0) ?>">
					<a class="nav-link" href="index.php">Trang chủ</a>
				</li>
				<li class="nav-item <?php echo activeClasses($p, 4) ?>">
					<a class="nav-link" href="tutorial.php">Hướng dẫn</a>
				</li>
				<li class="nav-item <?php echo activeClasses($p, 1) ?>">
					<a class="nav-link" href="homework.php">Bài tập</a>
				</li>
				<li class="nav-item <?php echo activeClasses($p, 3) ?>">
					<a class="nav-link" href="setup_db.php">Setup</a>
				</li>
				<li class="nav-item <?php echo activeClasses($p, 2) ?>">
					<a class="nav-link" href="web.php">Web</a>
				</li>
			</ul>
		</div>
		<!-- </div> -->
	</nav>
	<div id="content">
		<!-- Start of the page-specific content. -->
		<!-- Script 9.1 - header.html -->
