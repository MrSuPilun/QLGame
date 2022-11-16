<!-- Modal -->
<form method='POST'>
	<div class="modal show exampleModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><b>Update User</b></h5>
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
					<button type="submit" name="updateUserAdmin" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>
</form>
