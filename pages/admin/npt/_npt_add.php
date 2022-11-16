<?php

function notifyView($notify = "", $formName = "")
{
  echo "<form method='POST'>".
	"<div class='modal show exampleModal'>".
		"<div class='modal-dialog'>".
			"<div class='modal-content'>".
				"<div class='modal-header'>".
					"<h5 class='modal-title' id='exampleModalLabel'><b>Create Developer</b></h5>".
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

if (isset($_POST['addNPT'])) {
	if (!isset($_POST['tenNPT'])) {
		die('');
	}

	$tenNPT = addslashes($_POST['tenNPT']);
	
	$result = $qlgame->themNPT($tenNPT);

	if($result == "Success") {
		include_once('pages/admin/npt/_npt_show.php');
	} else {
		notifyView($result, "createNPT");
		exit;
	}

} else {
	include_once("pages/admin/npt/_modal_npt_add.php");
}
?>
