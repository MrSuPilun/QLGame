<?php
$tenNPT = "";

if (isset($_GET['id'])) {
	$id = $_GET['id'];
} else {
	$id = "";
}

$result = $qlgame->queryDB("SELECT * FROM NHA_PHAT_TRIEN WHERE MA_NPT like '$id'");

if($result) {
	$row = mysqli_fetch_array($result);
	$tenNPT = $row['TEN_NPT'];
}

if(isset($_POST['updateNPTAdmin'])) {
	$tenNPT = $_POST['tenNPT'];

	$update = $qlgame->updateNPTAdmin($id, $tenNPT);

	if($update == "Success") {
		include_once('pages/admin/npt/_npt_show.php');
	} else {
		notifyView($update, "updateNPT", "Update Developer");
		exit;
	}

} else {
	include_once("pages/admin/npt/_modal_npt_update.php");
}
?>
