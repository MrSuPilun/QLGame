<?php
session_start();
include_once("core/init.php");
$qlgame->connectDB();
$qlgame->getConnect()->select_db("QLGAME");
$arrTable = array("USER" => "Người Dùng", "GAME" => "Game", "NHA_PHAT_TRIEN" => "Nhà Phát Triển", "HOA_DON" => "Hóa Đơn", "CTHD" => "Chi Tiết Hóa Đơn");
$tag = "DASHBOARD";
if(isset($_SESSION['tag'])) {
	$tag = $_SESSION['tag'];
}
$tagName = "";

function activeClasses($p = "DASHBOARD", $i)
{
	return $i == $p ? "active" : "";
}

function notifyView($notify = "")
{
  echo "<div class='notify'> " .
    "<form method='POST'>" .
    "<div class='small' style='color:black;'>$notify <button name='register' style='color:black;font-weight:bold;background-color: transparent;'>Return</button></div>" .
    "</form></div>";
}

foreach ($arrTable as $key => $value) {
	if (isset($_GET[$key])) {
		$tag = $key;
		$_SESSION['tag'] = $tag;
	}
}

switch ($tag) {
	case 'DASHBOARD':
		$tagName = "Dashboard";
		break;
	case 'GAME':
		$tagName = "Game";
		break;
	case 'USER':
		$tagName = "User";
		break;
	case 'NHA_PHAT_TRIEN':
		$tagName = "Developer";
		break;
	case 'HOA_DON':
		$tagName = "Receipt";
		break;
	case 'CTHD':
		$tagName = "Receipt Detail";
		break;
	default:
		$tagName = "NOT FOUND";
		break;
}

include_once("pages/includes/admin_header.php");

switch ($tag) {
	case 'DASHBOARD':
		$tagName = "Dashboard";
		break;
	case 'GAME':
		$tagName = "Game";
		break;
	case 'USER':
		$tagName = "User";
		if (isset($_POST['addUser'])) {
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
			$pQuyen = addslashes($_POST['pQuyen']);
		  
			if (!$tenDN || !$matKhau || !$hoTen || !$sdt || !$sdt || !$diaChi || !$pQuyen) {
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
		
			if (!preg_match("/^\\+?[0-2]{1}$/", $pQuyen)) {
				notifyView("Auth incorrect. Please enter another auth.");
				exit;
			}
		  
			$maUS = $qlgame->LayMaUser();
			@$addUser = $qlgame->insertUser($maUS, $hoTen, $sdt, $email, $diaChi, $tenDN, $matKhau, $pQuyen);
		  
			if ($addUser) {
			  include_once('pages/admin/_user.php');
			} else {
			  notifyView("Don't have an account?");
			}
		}
		if(isset($_POST['update'])) {
			include_once('pages/admin/_user_update.php');
		}
		else if(isset($_POST['add'])) {
			include_once('pages/admin/_user_add.php');
		}
		else {
			include_once("pages/admin/_user.php");
		}
		break;
	case 'NHA_PHAT_TRIEN':
		$tagName = "Developer";
		break;
	case 'HOA_DON':
		$tagName = "Receipt";
		break;
	case 'CTHD':
		$tagName = "Receipt Detail";
		break;
	default:
		$tagName = "NOT FOUND";
		break;
}

include_once("pages/includes/admin_footer.php");
$qlgame->closeDB();
?>