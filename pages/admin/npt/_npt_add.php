<?php
if (isset($_POST['addNPT'])) {
	if (!isset($_POST['tenNPT'])) {
		die('');
	}

	$tenNPT = addslashes($_POST['tenNPT']);
	
	$result = $qlgame->themNPT($tenNPT);
} else {
	include_once("pages/admin/npt/_modal_npt_add.php");
}
?>
