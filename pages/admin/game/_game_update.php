<?php

function notifyView($notify = "", $formName = "")
{
  echo "<form method='POST'>".
	"<div class='modal show exampleModal'>".
		"<div class='modal-dialog'>".
			"<div class='modal-content'>".
				"<div class='modal-header'>".
					"<h5 class='modal-title' id='exampleModalLabel'><b>Update Game</b></h5>".
				"</div>".
				"<div class='modal-body'>".
					"<p>$notify</p>".
				"</div>".
				"<div class='modal-footer'>".
					"<button type='submit' name='$formName' class='btn btn-primary'>Return</button>".
				"</div>".
			"</div>".
		"</div>".
	"</div>".
"</form>";
}

$tenGame = "";
$maNPT = "";
$donGia = "";
$hinh = "";

if (isset($_GET['id'])) {
	$id = $_GET['id'];
} else {
	$id = "";
}

$result = $qlgame->queryDB("SELECT * FROM GAME WHERE MA_GAME like '$id'");
$listNPT = $qlgame->queryDB("SELECT MA_NPT, TEN_NPT FROM NHA_PHAT_TRIEN");

if ($result) {
	$row = mysqli_fetch_array($result);
	$tenGame = $row['TEN_GAME'];
	$maNPT = $row['MA_NPT'];
	$donGia = $row['DON_GIA'];
	$hinh = $row['HINH'];
}

if (isset($_POST['updateGameAdmin'])) {
	$tenGame = $_POST['tenGame'];
	$maNPT = $_POST['maNPT'];
	$donGia = $_POST['donGia'];
	$hinh = $_POST['hinh'];

	$update = $qlgame->updateGameAdmin($id, $tenGame, $maNPT, $donGia, $hinh);

	if($update == "Success") {
		include_once('pages/admin/game/_game_show.php');
	} else {
		notifyView($update, "updateGame");
		exit;
	}

} else {
	include_once("pages/admin/game/_modal_game_update.php");
}
