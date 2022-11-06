<?php
if (isset($_GET['idUpdate'])) {
	$id = $_GET['idUpdate'];
} else {
	$id = "";
}
$tenUser = "";
$sdt = "";
$email = "";
$diaChi = "";
$result = $qlgame->queryDB("SELECT * FROM USER WHERE MA_USER like '$id'");
$update = "";

if($result) {
	$row = mysqli_fetch_array($result);
	$tenUser = $row['TEN_USER'];
	$sdt = $row['SDT'];
	$email = $row['EMAIL'];
	$diaChi = $row['DIA_CHI'];
}

if(isset($_POST['updateUser'])) {
	$tenUser = $_POST['hoTen'];
	$sdt = $_POST['sdt'];
	$email = $_POST['email'];
	$diaChi = $_POST['diaChi'];

	$update = $qlgame->updateUserAdmin($id, $tenUser, $sdt, $email, $diaChi);

	if ($update == "Success") {
		exit;
		include_once('pages/admin/_user.php');
	} else {
		notifyView($update, "_user_update");
		exit;
	}
}
?>

<!-- Modal -->
<form method='POST'>
	<div class="modal show" id="exampleModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
					<button type="button" class="close modal-btn-close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Full Name</label>
						<input name='hoTen' type="text" class="form-control" value="<?= $tenUser ?>">
					</div>
					<div class="form-group">
						<label>Phone Number</label>
						<input name='sdt' type="text" class="form-control" value="<?= $sdt ?>">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Email address</label>
						<input name='email' type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $email ?>">
					</div>
					<div class="form-group">
						<label>Address</label>
						<input name='diaChi' type="text" class="form-control" value="<?= $diaChi ?>">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary modal-btn-close">Close</button>
					<button type="submit" name="updateUser" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>
</form>

<script>
	const modal = document.getElementById("exampleModal");
	const closes = document.getElementsByClassName("modal-btn-close");
	for (let i = 0; i < closes.length; i++) {
		closes[i].addEventListener('click', function() {
			modal.className = modal.className.replace(" show", "");
			console.log("OK");
		});
	}
</script>
