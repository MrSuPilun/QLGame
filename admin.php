<?php
session_start();
$arrTable = array("USER" => "Người Dùng", "GAME" => "Game", "NHA_PHAT_TRIEN" => "Nhà Phát Triển", "HOA_DON" => "Hóa Đơn", "CTHD" => "Chi Tiết Hóa Đơn");

$tag = "DASHBOARD";

function activeClasses($p = "DASHBOARD", $i)
{
	return $i == $p ? "active" : "";
}

foreach ($arrTable as $key => $value) {
	if (isset($_GET[$key])) {
		$tag = $key;
	}
}
include_once("pages/includes/admin_header.php");

switch ($tag) {
	case 'DASHBOARD':
		echo "DASHBOARD";
		break;
	case 'GAME':
		echo "GAME";
		break;
	case 'USER':
		echo "USER";
		break;
	case 'NHA_PHAT_TRIEN':
		echo "NHÀ PHÁT TRIỂN";
		break;
	case 'HOA_DON':
		echo "HÓA ĐƠN";
		break;
	case 'CTHD':
		echo "CHI TIẾT HÓA ĐƠN";
		break;
	default:
		echo "NOT FOUND";
		break;
}

include_once("pages/includes/admin_footer.php");
