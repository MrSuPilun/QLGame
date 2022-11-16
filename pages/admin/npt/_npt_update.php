<?php

function notifyView($notify = "", $formName = "")
{
  echo "<form method='POST'>".
	"<div class='modal show exampleModal'>".
		"<div class='modal-dialog'>".
			"<div class='modal-content'>".
				"<div class='modal-header'>".
					"<h5 class='modal-title' id='exampleModalLabel'><b>Update Developer</b></h5>".
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
		notifyView($update, "updateNPT");
		exit;
	}

} else {
	include_once("pages/admin/npt/_modal_npt_update.php");
}
?>
