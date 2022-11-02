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
function notifyView($notify = "", $formName = "")
{
  echo "<div class='notify'> " .
    "<form method='POST'>" .
    "<div class='small' style='color:white;'>$notify <button name='$formName' style='color:white;font-weight:bold;background-color: transparent;'>Return</button></div>" .
    "</form></div>";
}

if (isset($_POST['dangNhap'])) {
  $tenDN = addslashes($_POST['tenDN']);
  $matKhau = addslashes($_POST['matKhau']);

  $result = $qlgame->dangNhapUser($tenDN, $matKhau);

  if (!is_string($result)) {
    $_SESSION['TEN_DN'] = $tenDN;
    $_SESSION['EMAIL'] = $result['EMAIL'];
    $_SESSION['PHAN_QUYEN'] = $result['PHAN_QUYEN'];
  } else {
    notifyView($result, "login");
    exit;
  }
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

  $result = $qlgame->dangKyUser($hoTen, $sdt, $email, $diaChi, $tenDN, $matKhau, $xNMK, $pQuyen);
  if ($result == "Success") {
    $_SESSION['TEN_DN'] = $tenDN;
    include_once('pages/home/home.php');
  } else {
    notifyView($result, "register");
    exit;
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
