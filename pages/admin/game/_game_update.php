<?php
$tenGame = "";
$maNPT = "";
$donGia = "";
$hinh = "";

if (isset($_GET['id'])) {
	$id = $_GET['id'];
} else {
	$id = "";
}

$result = $qlgame->queryDB("SELECT * FROM GAME WHERE MA_GAME like '$id'");
$listNPT = $qlgame->queryDB("SELECT MA_NPT, TEN_NPT FROM NHA_PHAT_TRIEN");

if ($result) {
	$row = mysqli_fetch_array($result);
	$tenGame = $row['TEN_GAME'];
	$maNPT = $row['MA_NPT'];
	$donGia = $row['DON_GIA'];
	$hinh = $row['HINH'];
}

if (isset($_POST['updateGame'])) {
	$tenGame = $_POST['tenGame'];
	$maNPT = $_POST['maNPT'];
	$donGia = $_POST['donGia'];
	$hinh = $_POST['hinh'];

	$update = $qlgame->updateGameAdmin($id, $tenGame, $maNPT, $donGia, $hinh);
} else {
	include_once("pages/admin/game/_modal_game_update.php");
}
