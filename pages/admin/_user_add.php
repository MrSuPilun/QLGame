<!-- Modal -->
<form method='POST'>
	<div class="modal show" id="exampleModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
					<button type="button" class="close modal-btn-close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<input name="hoTen" type="text" class="form-control" placeholder="Full Name">
					</div>
					<div class="form-group">
						<input name="sdt" type="text" class="form-control" placeholder="Phone Number">
					</div>
					<div class="form-group">
						<input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email Address">
					</div>
					<div class="form-group">
						<input name="diaChi" type="text" class="form-control" placeholder="Address">
					</div>
					<div class="form-row">
						<div class="form-group col-4">
							<input name="tenDN" type="text" class="form-control" placeholder="Sign Name">
						</div>
						<div class="form-group col-4">
							<input name="matKhau" type="password" class="form-control" placeholder="Password">
						</div>
						<div class="form-group col-4">
							<input name="xNMK" type="password" class="form-control" placeholder="Re-type Password">
						</div>
					</div>
					
					<div class="form-group">
						<select name="pQuyen" class="form-group col-lg-12">

							<option value="0" <?php if(isset($_POST['pQuyen'])&& $_POST['pQuyen']=='0') echo 'selected';?>>

								User

							</option>

							<option value="1" <?php if(isset($_POST['pQuyen'])&& $_POST['pQuyen']=='1') echo 'selected';?>>

								Employee

							</option>

							<option value="2" <?php if(isset($_POST['pQuyen'])&& $_POST['pQuyen']=='2') echo 'selected';?>>

								Admin

							</option>

						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary modal-btn-close">Close</button>
					<button type="submit" name="addUser" class="btn btn-primary">Save changes</button>
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