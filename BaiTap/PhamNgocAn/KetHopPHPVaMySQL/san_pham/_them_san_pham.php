<?php
$queryHS = $qlbs->queryDB("SELECT * FROM HANG_SUA");
$queryLS = $qlbs->queryDB("SELECT * FROM LOAI_SUA");

function optionTableSP($query, $key, $value)
{
  $str_kq = "";
  if ($query) {
    $i = 0;
    while ($row = mysqli_fetch_array($query)) {
      if (!is_null($row[$key]) && !is_null($row[$value])) {
        if ($i == 0)
          $str_kq .= "<option value='$row[$key]' selected>$row[$value]</option>";
        else
          $str_kq .= "<option value='$row[$key]'>$row[$value]</option>";
        $i++;
      }
    }
  }
  return $str_kq;
}

if (isset($_POST['maSua'])) {
  $maSua = $_POST['maSua'];
} else {
  $maSua = "";
}
if (isset($_POST['tenSua'])) {
  $tenSua = $_POST['tenSua'];
} else {
  $tenSua = "";
}
if (isset($_POST['hangSua'])) {
  $hangSua = $_POST['hangSua'];
} else {
  $hangSua = "";
}
if (isset($_POST['loaiSua'])) {
  $loaiSua = $_POST['loaiSua'];
} else {
  $loaiSua = "";
}
if (isset($_POST['trongLuong'])) {
  $trongLuong = $_POST['trongLuong'];
} else {
  $trongLuong = "0";
}
if (isset($_POST['donGia'])) {
  $donGia = $_POST['donGia'];
} else {
  $donGia = "0";
}
if (isset($_POST['thanhPhanDinhDuong'])) {
  $thanhPhanDinhDuong = $_POST['thanhPhanDinhDuong'];
} else {
  $thanhPhanDinhDuong = "";
}
if (isset($_POST['loiIch'])) {
  $loiIch = $_POST['loiIch'];
} else {
  $loiIch = "";
}
$fileName = "";
$err = "";
if (isset($_POST['themSP'])) {
  if ($maSua != "") {
    $query = $qlbs->queryDB("SELECT * FROM SUA WHERE Ma_sua = '$maSua'");
    if (!(mysqli_num_rows($query) > 0)) {
      if (isset($_FILES['productImg']['name'])) {
        if ($_FILES['productImg']['name'] != NULL) {
          move_uploaded_file(
            $_FILES["productImg"]["tmp_name"],
            ".\\asset\\Hinh_sua\\" . $_FILES["productImg"]["name"]
          );
          $fileName = $_FILES["productImg"]["name"];
        }
      }
      $result = $qlbs->queryDB("INSERT INTO `Sua`(`Ma_sua`, `Ten_sua`, `Ma_hang_sua`, `Ma_loai_sua`, `Trong_luong`, `Don_gia`, `TP_Dinh_Duong`, `Loi_ich`, `Hinh`) 
      VALUES ('$maSua', '$tenSua', '$hangSua', '$loaiSua', $trongLuong, $donGia, '$thanhPhanDinhDuong', '$loiIch', '$fileName')");
      if ($result)
        $err = "Đã thêm SP";
      else
        $err = "Không thể thêm SP";
    } else {
      $err = "Mã sản phẩm đã tồn tại, vui lòng sử dụng mã khác";
    }
  }
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
        <h2 style="margin-bottom: 40px; text-align: center;">Thêm sản phẩm</h2>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Mã sữa</label>
      <div class="col-sm-10">
        <input style="width: 150px;" name="maSua" type="input" class="form-control">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Tên sữa</label>
      <div class="col-sm-10">
        <input style="width: 500px;" name="tenSua" type="input" class="form-control">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Hãng sữa</label>
      <div class="col-sm-10">
        <div class="form-group">
          <select style="width: 300px;" class="form-control" name="hangSua">
            <?php echo optionTableSP($queryHS, 'Ma_hang_sua', 'Ten_hang_sua')  ?>
          </select>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Loại sữa</label>
      <div class="col-sm-10">
        <div class="form-group">
          <select style="width: 300px;" class="form-control" name="loaiSua">
            <?php echo optionTableSP($queryLS, 'Ma_loai_sua', 'Ten_loai')  ?>
          </select>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Trọng lượng</label>
      <div class="col-sm-10">
        <div class="input-group" style="width: 350px;">
          <input name="trongLuong" type="number" class="form-control">
          <div class="input-group-append">
            <span class="input-group-text">Gram</span>
          </div>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Đơn giá</label>
      <div class="col-sm-10">
        <div class="input-group" style="width: 350px;">
          <input name="donGia" type="number" class="form-control">
          <div class="input-group-append">
            <span class="input-group-text">VNĐ</span>
          </div>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Thành phần dinh dưỡng</label>
      <div class="col-sm-10">
        <textarea class="form-control" name="thanhPhanDinhDuong" rows="3"></textarea>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Lợi ích</label>
      <div class="col-sm-10">
        <textarea class="form-control" name="loiIch" rows="3"></textarea>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Ảnh minh họa</label>
      <div class="col-sm-10 input-group">
        <div class="custom-file">
          <input name="productImg" type="file" accept="image/png, image/gif, image/jpeg" class="custom-file-input" id="inputGroupFile01">
          <label style="width: 100% !important;" class="custom-file-label" for="inputGroupFile01">Choose file</label>
        </div>
      </div>
    </div>
    <?php echo $err ?>
    <div class="d-flex justify-content-center">
      <button name="themSP" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>

<script>
  $('#inputGroupFile01').on('change', function(e) {
    //get the file name
    var fileName = e.target.files[0].name;
    //replace the "Choose a file" label
    $(this).next('.custom-file-label').html(fileName);
  })
</script>