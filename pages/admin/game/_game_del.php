<?php
$id = "";

if (isset($_GET['id'])) {
	$id = $_GET['id'];
}

if(isset($_POST['delGame'])) {
	$result = $qlgame->deleteGame($id);
} else {
	include_once("pages/admin/game/_modal_game_del.php");
}
?>
