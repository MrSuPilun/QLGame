<?php
$tenGame = "";
$tenDev = "";
$donGia = "";
$hinh = "";

if (isset($_GET['id'])) {
	$id = $_GET['id'];
} else {
	$id = "";
}

$result = $qlgame->queryDB("SELECT * FROM GAME WHERE MA_GAME like '$id'");
$dev = mysqli_fetch_array($qlgame->queryDB("SELECT NHA_PHAT_TRIEN.TEN_NPT 
                                            FROM GAME JOIN NHA_PHAT_TRIEN ON GAME.MA_NPT = NHA_PHAT_TRIEN.MA_NPT 
                                            WHERE GAME.MA_GAME like '$id'"));

if($result) {
	$row = mysqli_fetch_array($result);
	$tenGame = $row['TEN_GAME'];
	$tenDev = $dev['TEN_NPT'];
	$donGia = $row['DON_GIA'];
	$hinh = $row['HINH'];
}

if(isset($_POST['updateGame'])) {
	$tenGame = $_POST['tenGame'];
	$maNPT = $_POST['maNPT'];
	$donGia = $_POST['donGia'];
	$hinh = $_POST['hinh'];

	$update = $qlgame->updateGameAdmin($id, $tenGame, $maNPT, $donGia, $hinh);

} else {
	include_once("pages/admin/game/_modal_game_update.php");
}
?>
