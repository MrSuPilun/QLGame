<!-- Modal -->
<form method='POST'>
	<div class="modal show exampleModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><b>Create Game</b></h5>
					<button type="button" class="close modal-btn-close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<input name="tenGame" type="text" class="form-control" placeholder="Game Name">
					</div>
					<div class="form-group">
                        <select name="maNPT" class="form-control" required>
                            <option value="">Developer</option>
                            <?php
                                $dev = $qlgame->queryDB("SELECT MA_NPT, TEN_NPT FROM NHA_PHAT_TRIEN");
                                if(mysqli_num_rows($dev) > 0) {
                                    while($row = mysqli_fetch_array($dev)){
                                        $selected = isset($_POST['maNPT']) && $_POST['maNPT'] == $row['MA_NPT'] ? "selected" : "";
                                        echo "<option value='". $row['MA_NPT'] ."' $selected>".$row['TEN_NPT']."</option>";
                                    }
                                }
                            ?>
                        </select>
					</div>
					<div class="form-group">
                        <input name="donGia" type="text" class="form-control" placeholder="Price">
					</div>
					<div class="form-group">
						<input name="hinh" type="text" class="form-control" placeholder="Image Link">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary modal-btn-close">Close</button>
					<button type="submit" name="addGame" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>
</form>
