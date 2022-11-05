<?php
$err = "";
$maKH = "";
$tenKH = "";
$phai = "";
$diaChi = "";
$sdt = "";
$email = "";

if (isset($_GET['id'])) {
  $maKH = $_GET['id'];
  $query = $qlbs->queryDB("SELECT * FROM KHACH_HANG WHERE MA_KHACH_HANG = '$maKH'");
  if ((mysqli_num_rows($query) > 0)) {
    $row = mysqli_fetch_array($query);
    $tenKH = $row['Ten_khach_hang'];
    $phai = $row['Phai'];
    $diaChi = $row['Dia_chi'];
    $sdt = $row['Dien_thoai'];
    $email = $row['Email'];
  }
}

if(isset($_POST['xoaKH'])) {
  if($maKH != "") {
    $query = $qlbs->queryDB("DELETE FROM KHACH_HANG WHERE Ma_khach_hang = '$maKH';");
    echo $qlbs->getConnect()->error;
    if($query === TRUE) {
      header('Location: khach_hang.php');
    } else {
      $err = "ERR: Không thể xóa";
    }
  }
}

?>
<form method="post">
  <div class="container" style="margin: 150px auto;">
    <div class="card" style="width: 500px; margin: auto">
      <div class="card-body" style="padding: 10px 50px;">
        <h5 class="card-title text-danger text-center"><?= $tenKH ?></h5>
        <h6 class="card-subtitle mb-2 text-muted text-center">id: <?= $maKH ?></h6>
        <p class="card-text"><b>Phái: </b><?= $phai == 0 ? "Nam" : "Nữ" ?></p>
        <p class="card-text"><b>Địa chỉ: </b><?= $diaChi ?></p>
        <p class="card-text"><b>Số điện thoại: </b><?= $sdt ?></p>
        <p class="card-text"><b>Email: </b><?= $email ?></p>
        <p class="card-text text-danger text-center"><b>Bạn có muốn xóa khách hàng này không</b></p>
        <p class="card-text text-danger text-center"><b><?= $err ?></b></p>
        <div class="card-text text-center">
          <button type="submit" name="xoaKH" style="color: red; background-color: transparent; border: none;" class="card-link">Xóa</button>
          <a href="javascript:window.history.back(-1);" class="card-link">hủy</a>
        </div>
      </div>
    </div>
  </div>
</form>