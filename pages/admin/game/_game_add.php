<?php

function notifyView($notify = "", $formName = "")
{
  echo "<form method='POST'>".
	"<div class='modal show exampleModal'>".
		"<div class='modal-dialog'>".
			"<div class='modal-content'>".
				"<div class='modal-header'>".
					"<h5 class='modal-title' id='exampleModalLabel'><b>Create Game</b></h5>".
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

if (isset($_POST['addGame'])) {
	if (!isset($_POST['tenGame'])) {
		die('');
	}

	$tenGame = addslashes($_POST['tenGame']);
	$maNPT = addslashes($_POST['maNPT']);
	$donGia = addslashes($_POST['donGia']);
	$hinh = addslashes($_POST['hinh']);

	$result = $qlgame->themGame($tenGame, $maNPT, $donGia, $hinh);

	if($result == "Success") {
		include_once('pages/admin/game/_game_show.php');
	} else {
		notifyView($result, "createGame");
		exit;
	}

} else {
	include_once("pages/admin/game/_modal_game_add.php");
}
?>