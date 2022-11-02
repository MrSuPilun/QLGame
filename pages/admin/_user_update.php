<?php
if (isset($_GET['id'])) {
	$id = $_GET['id'];
} else {
	$id = "";
}
$tenUser = "";
$sdt = "";
$email = "";
$diaChi = "";
$result = $qlgame->queryDB("SELECT * FROM USER WHERE MA_USER like '$id'");
if($result) {
	$row = mysqli_fetch_array($result);
	$tenUser = $row['TEN_USER'];
	$sdt = $row['SDT'];
	$email = $row['EMAIL'];
	$diaChi = $row['DIA_CHI'];
}
?>

<style>
	.modal.show {
		background-color: rgba(0, 0, 0, 0.5);
		display: block;
		padding-right: 17px;
	}
</style>

<!-- Modal -->
<form>
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
						<input type="text" class="form-control" value="<?= $tenUser ?>">
					</div>
					<div class="form-group">
						<label>Phone Number</label>
						<input type="text" class="form-control" value="<?= $sdt ?>">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Email address</label>
						<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $email ?>">
					</div>
					<div class="form-group">
						<label>Address</label>
						<input type="text" class="form-control" value="<?= $diaChi ?>">
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
		});
	}
</script>
