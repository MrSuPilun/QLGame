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
		include_once("pages/admin/game/_game.php");
		break;
	case 'USER':
		$tagName = "User";
		include_once("pages/admin/user/_user.php");
		break;
	case 'NHA_PHAT_TRIEN':
		$tagName = "Developer";
		include_once("pages/admin/npt/_npt.php");
		break;
	case 'HOA_DON':
		$tagName = "Receipt";
		include_once("pages/admin/hoaDon/_hoaDon.php");
		break;
	case 'CTHD':
		$tagName = "Receipt Detail";
		include_once("pages/admin/cthd/_cthd.php");
		break;
	default:
		$tagName = "NOT FOUND";
		break;
}

include_once("pages/includes/admin_footer.php");
$qlgame->closeDB();
?>