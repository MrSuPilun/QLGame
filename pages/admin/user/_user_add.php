<?php
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
} else {
	include_once("pages/admin/user/_modal_user_add.php");
}
?>
