<?php
$p = 2;
$page_title = 'Web game';
include_once('core/init.php');
$qlgame->connectDB();
$qlgame->getConnect()->select_db("QLGAME");
?>
<link rel="stylesheet" href="css/web.css">
<?php
include_once ('includes/header.php');
include_once('pages/home/home.php');
$qlgame->closeDB();
include_once ('includes/footer.php');
?>