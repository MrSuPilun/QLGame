<?php
$id = "";

if (isset($_GET['id'])) {
	$id = $_GET['id'];
}

if(isset($_POST['delNPT'])) {
	$result = $qlgame->deleteNPT($id);
} else {
	include_once("pages/admin/npt/_modal_npt_del.php");
}
?>
