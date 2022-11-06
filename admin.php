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

			if (isset($_POST['pQuyen'])) {
				$pQuyen = $_POST['pQuyen'];
			}

			$result = $qlgame->dangKyUser($hoTen, $sdt, $email, $diaChi, $tenDN, $matKhau, $xNMK, $pQuyen);
			if ($result == "Success") {
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