<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
    }

    form {
      margin-top: 50px;
      width: 500px;
    }

    th {
      text-align: left;
    }

    td > input, img {
      width: 100%;
    }

    tr,
    th,
    td {
      border-bottom: none !important;
    }
  </style>
</head>

<body>
  <?php
  $arr_can = array("Quý", "Giáp", "Ất", "Bình", "Đinh", "Mậu", "Kỷ", "Canh", "Tân", "Nhâm");
  $arr_chi = array("Hợi", "Tý", "Sửu", "Dần", "Mão", "Thìn", "Tỵ", "Ngọ", "Mùi", "Thân", "Dậu", "Tuất");
  $arr_img = array("hoi.jpg", "chuot.jpg", "suu.jpg", "dan.jpg", "mao.jpg", "thin.jpg", "ty.jpg", "ngo.jpg", "mui.jpg", "than.jpg", "dau.jpg", "tuat.jpg");

  function tinhNamAmLich($n, $arr_can, $arr_chi, $arr_img, &$nam_al = '', &$hinh_anh = '')
  {
    $n = $n - 3;
    $can = $n % 10;
    $chi = $n % 12;
    $hinh = $arr_img[$chi];
    $nam_al = $arr_can[$can] . " " . $arr_chi[$chi];
    $hinh_anh = "<img src = 'images/$hinh'>";
  }

  if (isset($_POST['nam'])){
    $nam = $_POST['nam'];
    if ($nam < 3 || !is_numeric($nam))
      $nam = "";
  }
  else
    $nam = "";

  $str_kq = "";
  $hinh = "";
  if (isset($_POST['xuly'])) {
    if (isset($_POST['nam']) && is_numeric($nam)) {
      tinhNamAmLich($nam, $arr_can, $arr_chi, $arr_img, $str_kq, $hinh);
    }
  }
  ?>
  <center>
    <form class="shadow-sm p-3 mb-5 bg-white rounded" method="post">
      <table class="table">
        <tbody>
          <tr>
            <td></td>
            <td style="text-align: center;">
              <h4 style="margin-bottom: 20px;">TÍNH NĂM ÂM LỊCH</h4>
            </td>
          </tr>
          <tr class="form-group">
            <td>
              <label for="inp-soNam" class="col-form-label">Năm: </label>
            </td>
            <td>
              <input type="text" name="nam" class="form-control" id="inp-soNam" value="<?php echo $nam ?>">
              <small id="emailHelp" class="form-text text-muted">Nhập vào số năm cần tính > 3</small>
            </td>
          </tr>
          <tr>
            <td>
              <label for="kq" class="col-form-label">Năm: </label>
            </td>
            <td>
              <p style="line-height: 1.5;padding-top: calc(0.375rem + 1px);padding-bottom: calc(0.375rem + 1px);margin-bottom: 0;font-size: inherit;"><?php echo $str_kq ?></p>
            </td>
          </tr>
          <tr>
            <td></td>
            <td>
              <?php echo $hinh ?>
            </td>
          </tr>
          <tr>
            <td></td>
            <td style="text-align: center;">
              <button type="submit" name="xuly" class="btn btn-primary" style="margin-top: 20px;">Xử Lý</button>
            </td>
          </tr>
        </tbody>
      </table>
    </form>
  </center>
</body>

</html>