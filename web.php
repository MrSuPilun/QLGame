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

session_start();

include_once('includes/header.php');


if (isset($_POST['dangNhap'])) {
  $tenDN = addslashes($_POST['tenDN']);
  $matKhau = addslashes($_POST['matKhau']);

  if (!$tenDN || !$matKhau) {
    echo "<div class='notify'>Please enter full sign in name and password. <a href='javascript: history.go(-1)'>Return</a></div>";
    exit;
  }

  $query = $qlgame->queryDB("SELECT TEN_DN, MAT_KHAU FROM user WHERE TEN_DN='$tenDN'");
  if (mysqli_num_rows($query) == 0) {
    echo "<div class='notify'>Sign in name not exist. Please check again. <a href='javascript: history.go(-1)'>Return</a></div>";
    exit;
  }

  $row = mysqli_fetch_array($query);
  if ($matKhau != $row['MAT_KHAU']) {
    echo "<div class='notify'>Password incorrect. Please re-enter. <a href='javascript: history.go(-1)'>Return</a></div>";
    exit;
  }

  $_SESSION['TEN_DN'] = $tenDN;
}


if (isset($_POST['login'])) {
  include_once('pages/signIn/sign_in.php');
} else if (isset($_POST['logout'])) {
  include_once('pages/signIn/log_out.php');
} else {
  include_once('pages/home/home.php');
}
// include_once('pages/signIn/sign_in.php');
$qlgame->closeDB();
include_once('includes/footer.php');
?>