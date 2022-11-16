<!-- Modal -->
<form method='POST'>
	<div class="modal show exampleModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><b>Update Game</b></h5>
					<button type="button" class="close modal-btn-close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Game Name</label>
						<input name='tenGame' type="text" class="form-control" value="<?= $tenGame ?>">
					</div>
					<div class="form-group">
						<label>Developer</label>
						<select name="maNPT" class="form-control" required>
							<?php
							if (mysqli_num_rows($listNPT) > 0) {
								while ($row = mysqli_fetch_array($listNPT)) {
									$selected = $maNPT == $row['MA_NPT'] ? "selected" : "";
									echo "<option value='" . $row['MA_NPT'] . "' $selected>" . $row['TEN_NPT'] . "</option>";
								}
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Price</label>
						<input name='donGia' type="text" class="form-control" value="<?= $donGia ?>">
					</div>
					<div class="form-group">
						<label>Image Link</label>
						<input name='hinh' type="text" class="form-control" value="<?= $hinh ?>">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary modal-btn-close">Close</button>
					<button type="submit" name="updateGameAdmin" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>
</form>