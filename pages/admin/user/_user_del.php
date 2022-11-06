<?php
$id = "";

if (isset($_GET['id'])) {
	$id = $_GET['id'];
}

if(isset($_POST['delUser'])) {
	$result = $qlgame->deleteUser($id);
} else {
	include_once("pages/admin/user/_modal_user_del.php");
}
?>
