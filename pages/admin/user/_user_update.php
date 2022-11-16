<?php

function notifyView($notify = "", $formName = "")
{
  echo "<form method='POST'>".
	"<div class='modal show exampleModal'>".
		"<div class='modal-dialog'>".
			"<div class='modal-content'>".
				"<div class='modal-header'>".
					"<h5 class='modal-title' id='exampleModalLabel'><b>Update User</b></h5>".
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

$tenUser = "";
$sdt = "";
$email = "";
$diaChi = "";

if (isset($_GET['id'])) {
	$id = $_GET['id'];
} else {
	$id = "";
}

$result = $qlgame->queryDB("SELECT * FROM USER WHERE MA_USER like '$id'");

if($result) {
	$row = mysqli_fetch_array($result);
	$tenUser = $row['TEN_USER'];
	$sdt = $row['SDT'];
	$email = $row['EMAIL'];
	$diaChi = $row['DIA_CHI'];
}

if(isset($_POST['updateUserAdmin'])) {
	$tenUser = $_POST['hoTen'];
	$sdt = $_POST['sdt'];
	$email = $_POST['email'];
	$diaChi = $_POST['diaChi'];

	$update = $qlgame->updateUserAdmin($id, $tenUser, $sdt, $email, $diaChi);

	if($update == "Success") {
		include_once('pages/admin/user/_user_show.php');
	} else {
		notifyView($update, "updateUser");
		exit;
	}

} else {
	include_once("pages/admin/user/_modal_user_update.php");
}
?>
