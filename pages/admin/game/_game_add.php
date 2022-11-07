<?php
if (isset($_POST['addGame'])) {
	if (!isset($_POST['tenGame'])) {
		die('');
	}

	$tenGame = addslashes($_POST['tenGame']);
	$maNPT = addslashes($_POST['maNPT']);
	$donGia = addslashes($_POST['donGia']);
	$hinh = addslashes($_POST['hinh']);

	$result = $qlgame->themGame($tenGame, $maNPT, $donGia, $hinh);
} else {
	include_once("pages/admin/game/_modal_game_add.php");
}
?>