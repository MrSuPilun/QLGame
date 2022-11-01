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
		include_once("pages/admin/_user.php");
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