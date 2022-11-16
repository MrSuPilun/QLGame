<?php

function notifyView($notify = "", $formName = "")
{
  echo "<form method='POST'>".
	"<div class='modal show exampleModal'>".
		"<div class='modal-dialog'>".
			"<div class='modal-content'>".
				"<div class='modal-header'>".
					"<h5 class='modal-title' id='exampleModalLabel'><b>Create User</b></h5>".
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

if (isset($_POST['addUser'])) {
	if (!isset($_POST['hoTen'])) {
		die('');
	}

	$tenDN = addslashes($_POST['tenDN']);
	$matKhau = addslashes($_POST['matKhau']);
	$xNMK = addslashes($_POST['xNMK']);
	$hoTen = addslashes($_POST['hoTen']);
	$email = addslashes($_POST['email']);
	$sdt = addslashes($_POST['sdt']);
	$diaChi = addslashes($_POST['diaChi']);

	if (isset($_POST['pQuyen'])) {
		$pQuyen = $_POST['pQuyen'];
	}

	$result = $qlgame->dangKyUser($hoTen, $sdt, $email, $diaChi, $tenDN, $matKhau, $xNMK, $pQuyen);

	if($result == "Success") {
		include_once('pages/admin/user/_user_show.php');
	} else {
		notifyView($result, "createUser");
		exit;
	}

} else {
	include_once("pages/admin/user/_modal_user_add.php");
}
?>
