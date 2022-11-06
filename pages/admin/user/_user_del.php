<?php
if (isset($_GET['idDelete'])) {
	$id = $_GET['idDelete'];
} else {
	$id = "";
}

$result="";

if(isset($_POST['delUser'])) {
	$result = $qlgame->deleteUser($id);
	include_once('pages/admin/_user.php');
	exit;
}
?>

<!-- Modal -->
<form method='POST'>
	<div class="modal show exampleModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
					<button type="button" class="close modal-btn-close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Are you want to delete this record</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary modal-btn-close">No</button>
					<button type="submit" name="delUser" class="btn btn-primary">Yes</button>
				</div>
			</div>
		</div>
	</div>
</form>
