<?php
$p = 2;
$page_title = 'Web game';
include_once('core/init.php');
$qlgame->connectDB();
$qlgame->getConnect()->select_db("QLGAME");
?>
<link rel="stylesheet" href="css/web.css">
<?php

session_start();

include_once('includes/header.php');
function notifyView($notify = "")
{
  echo "<div class='notify'> " .
    "<form method='POST'>" .
    "<div class='small' style='color:white;'>$notify <button name='register' style='color:white;font-weight:bold;background-color: transparent;'>Return</button></div>" .
    "</form></div>";
}

if (isset($_POST['dangNhap'])) {
  $tenDN = addslashes($_POST['tenDN']);
  $matKhau = addslashes($_POST['matKhau']);

  if (!$tenDN || !$matKhau) {
    notifyView("Please enter full sign in name and password.");
    exit;
  }

  $query = $qlgame->queryDB("SELECT TEN_DN, MAT_KHAU, PHAN_QUYEN FROM user WHERE TEN_DN='$tenDN'");
  if (mysqli_num_rows($query) == 0) {
    notifyView("Sign in name not exist. Please check again.");
    exit;
  }

  $row = mysqli_fetch_array($query);
  if ($matKhau != $row['MAT_KHAU']) {
    notifyView("Password incorrect. Please re-enter.");
    exit;
  }

  $_SESSION['TEN_DN'] = $tenDN;
  $_SESSION['PHAN_QUYEN'] = $row['PHAN_QUYEN'];
}

if (isset($_POST['dangKy'])) {
  if (!isset($_POST['hoTen'])) {
    die('');
  }

  $tenDN = addslashes($_POST['tenDN']);
  $matKhau = addslashes($_POST['matKhau']);
  $xNMK = addslashes($_POST['xNMK']);
  $hoTen = addslashes($_POST['hoTen']);
  $email = addslashes($_POST['email']);
  $sdt = addslashes($_POST['sdt']);
  $diaChi = addslashes($_POST['diaChi']);
  $pQuyen = 0;

  if (!$tenDN || !$matKhau || !$hoTen || !$sdt || !$sdt || !$diaChi) {
    notifyView("Please enter full information.");
    exit;
  }

  if (mysqli_num_rows($qlgame->queryDB("SELECT TEN_DN FROM USER WHERE TEN_DN='$tenDN'")) > 0) {
    notifyView("Sign In name already exist. Please enter another Sign In name.");
    exit;
  }

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    notifyView("Email incorrect. Please enter another Email.");
    exit;
  }

  if (!preg_match("/^\\+?[0-9][0-9]{7,12}$/", $sdt)) {
    notifyView("Phone number incorrect. Please enter another phone number.");
    exit;
  }

  if (mysqli_num_rows($qlgame->queryDB("SELECT EMAIL FROM USER WHERE EMAIL='$email'")) > 0) {
    notifyView("Email already exist. Please enter another Email. ");
    exit;
  }

  if ($matKhau != $xNMK) {
    notifyView("Re-type password incorrect.");
    exit;
  }

  $maUS = $qlgame->LayMaUser();
  @$addUser = $qlgame->insertUser($maUS, $hoTen, $sdt, $email, $diaChi, $tenDN, $matKhau, $pQuyen);

  if ($addUser) {
    $_SESSION['TEN_DN'] = $tenDN;
    include_once('pages/home/home.php');
  } else {
    notifyView("Don't have an account?");
  }
}


if (isset($_POST['login'])) {
  include_once('pages/signIn/sign_in.php');
} else if (isset($_POST['register'])) {
  include_once('pages/signIn/register.php');
} else if (isset($_POST['logout'])) {
  if (isset($_SESSION['TEN_DN'])) {
    unset($_SESSION['TEN_DN']);
    unset($_SESSION['PHAN_QUYEN']);
  }
  include_once('pages/home/home.php');
} else if (isset($_POST['admin'])) {
  echo "<link rel='stylesheet' href='css/admin.css'>";
  echo "<iframe src='./admin.php'></iframe>";
} else {
  include_once('pages/home/home.php');
}
// include_once('pages/signIn/sign_in.php');
$qlgame->closeDB();
include_once('includes/footer.php');
?>