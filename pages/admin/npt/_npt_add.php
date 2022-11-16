<?php
if (isset($_POST['addNPT'])) {
	if (!isset($_POST['tenNPT'])) {
		die('');
	}

	$tenNPT = addslashes($_POST['tenNPT']);
	
	$result = $qlgame->themNPT($tenNPT);

	if($result == "Success") {
		include_once('pages/admin/npt/_npt_show.php');
	} else {
		notifyView($result, "createNPT", "Create Developer");
		exit;
	}

} else {
	include_once("pages/admin/npt/_modal_npt_add.php");
}
?>
