<?php
$id = "";

if (isset($_GET['id'])) {
	$id = $_GET['id'];
}

if(isset($_POST['delHD'])) {
	$result = $qlgame->deleteHoaDon($id);
} else {
	include_once("pages/admin/hoaDon/_modal_hoaDon_del.php");
}
?>
