<!-- Modal -->
<form method='POST'>
	<div class="modal show exampleModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><b>Update Developer</b></h5>
					<button type="button" class="close modal-btn-close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Developer</label>
						<input name='tenNPT' type="text" class="form-control" value="<?= $tenNPT ?>">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary modal-btn-close">Close</button>
					<button type="submit" name="updateNPT" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>
</form>
