<?php
$err = "";
$maKH = "";
$tenKH = "";
$phai = "";
$diaChi = "";
$sdt = "";
$email = "";


function checkGioiTinh($a, $b)
{
  return $a == $b ? "checked" : "";
}

function checkDinhDang($tenKH, $phai, $diaChi, $sdt, $email)
{
  $arr_err = array();
  // RegEx
  if ($tenKH == "") {
    $arr_err[] = "Không được để trống tên khách hàng";
  }
  if ($diaChi == "") {
    $arr_err[] = "Không được để trống địa chỉ";
  }
  $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";
  if (!preg_match($pattern, $email)) {
    $arr_err[] = "Không đúng định dạng Email";
  }
  $patternNumber = "/^[0-9]*$/i";
  if (!preg_match($patternNumber, $sdt)) {
    $arr_err[] = "Không đúng định dạng SĐT";
  }

  return implode(" | ", $arr_err);
}

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



if (isset($_POST['capNhap'])) {

  if (isset($_POST['email']))
    $email = $_POST['email'];
  if (isset($_POST['tenKH']))
    $tenKH = $_POST['tenKH'];
  if (isset($_POST['gioiTinh']))
    $phai = $_POST['gioiTinh'];
  if (isset($_POST['diaChi']))
    $diaChi = $_POST['diaChi'];
  if (isset($_POST['sdt']))
    $sdt = $_POST['sdt'];


  $err = checkDinhDang($tenKH, $phai, $diaChi, $sdt, $email);
  if ($err == "") {
    $query = $qlbs->queryDB("
      UPDATE KHACH_HANG
      SET Ten_khach_hang = '$tenKH', Phai = $phai, Dia_chi = '$diaChi', Dien_thoai = '$sdt', Email = '$email'
      WHERE Ma_khach_hang = '$maKH';
    ");

    if ($query) {
      $err = "<p style='color: green;'>Cập nhập thành công</p>";
    }
  }
  $err = "<p style='color: red;'>$err</p>";
}
?>

<style>
  label {
    width: 200px !important;
  }
</style>

<div class="container" style="margin: 40px auto;">
  <form class="shadow p-3 mb-5 bg-white rounded" method="post" enctype="multipart/form-data" style="width: 800px; margin: 0 auto; padding: 20px;">
    <div class="form-group row">
      <label class="col-sm-2 col-form-label"><a id='btn-arrow-left' href='javascript:window.history.back(-1);'><i class='fa-solid fa-arrow-left-long'></i>Trở lại</a></label>
      <div class="col-sm-10">
        <h2 style="margin-bottom: 40px; text-align: center;">Chỉnh Sửa Thông Tin Khách Hàng</h2>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Mã khách hàng</label>
      <div class="col-sm-10">
        <input style="width: 150px;" name="maKH" type="input" class="form-control" value="<?= $maKH ?>" disabled>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Tên khách hàng</label>
      <div class="col-sm-10">
        <input style="width: 500px;" name="tenKH" type="input" class="form-control" value="<?= $tenKH ?>">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Giới tính</label>
      <div class="col-sm-10">
        <div class="form-check form-check-inline">
          <label style="width: 70px !important;" class="form-check-label">
            <input class="form-check-input" type="radio" name="gioiTinh" id="" value="0" <?php echo checkGioiTinh($phai, 0) ?>> Nam
          </label>
        </div>
        <div class="form-check form-check-inline">
          <label style="width: 100px;" class="form-check-label">
            <input class="form-check-input" type="radio" name="gioiTinh" id="" value="1" <?php echo checkGioiTinh($phai, 1) ?>> Nữ
          </label>
        </div>
      </div>

    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Địa chỉ</label>
      <div class="col-sm-10">
        <input style="width: 500px;" name="diaChi" type="input" class="form-control" value="<?= $diaChi ?>">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">SĐT</label>
      <div class="col-sm-10">
        <input style="width: 500px;" name="sdt" type="input" class="form-control" value="<?= $sdt ?>">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input style="width: 500px;" name="email" type="input" class="form-control" value="<?= $email ?>">
      </div>
    </div>
    <div class="form-group row">
    <label class="col-sm-2 col-form-label"></label>
      <div class="col-sm-10">
        <?php echo $err ?>
      </div>
    </div>

    <div class="d-flex justify-content-center">
      <button name="capNhap" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>