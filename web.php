<?php
$p = 2;
$page_title = 'Web game';
include_once('core/init.php');
$qlgame->connectDB();
$qlgame->getConnect()->select_db("QLGAME");
?>
<link rel="stylesheet" href="css/web.css">
<link rel="stylesheet" href="assets/vendor/bootstrap-4.6.2-dist/css/bootstrap.min.css">
<?php
include_once ('includes/header.php');
include_once ('pages/includes/header.php');
include_once('pages/home/home.php');
// include_once('pages/signIn/sign_in.php');
$qlgame->closeDB();
include_once ('includes/footer.php');
?>