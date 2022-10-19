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

    td>input {
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
  function timNamNhuan($nam)
  {
    $arr = array();
    for ($i = 2000; $i >= $nam; $i--) {
      if ($i % 400 == 0 || $i % 4 == 0)
        $arr[] = $i;
    }
    return $arr;
  }

  function timNamNhuanv2($nam)
  {
    $arr = array();
    for ($i = 2000; $i <= $nam; $i++) {
      if ($i % 400 == 0 || $i % 4 == 0)
        $arr[] = $i;
    }
    return $arr;
  }

  function inMang($arr)
  {
    return implode(' ', $arr);
  }
  $soNam = "";
  $str_kq = "";
  if (isset($_POST['xuly'])) {
    if (isset($_POST['soNam'])) {
      $soNam = $_POST['soNam'];
      if (!is_numeric($soNam) || $soNam > 2000)
        $soNam = "";
    } else
      $soNam = "";
    if (isset($_POST['soNam']) && is_numeric($soNam)) {
      $str_kq = inMang(timNamNhuan($soNam));
    }
  }
  $soNam2 = "";
  $str_kqv2 = "";
  if (isset($_POST['xuly2'])) {
    if (isset($_POST['soNam2'])) {
      $soNam2 = $_POST['soNam2'];
      if (!is_numeric($soNam2) || $soNam2 < 2000)
        $soNam2 = "";
    } else
      $soNam2 = "";
    if (isset($_POST['soNam2']) && is_numeric($soNam2)) {
      $str_kqv2 = inMang(timNamNhuanv2($soNam2));
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
              <h4 style="margin-bottom: 20px;">TÌM NĂM NHUẬN < 2000</h4>
            </td>
          </tr>
          <tr class="form-group">
            <td>
              <label for="inp-soNam" class="col-form-label">Năm: </label>
            </td>
            <td>
              <input type="text" name="soNam" class="form-control" id="inp-soNam" value="<?php echo $soNam ?>">
              <small id="emailHelp" class="form-text text-muted">Nhập vào số năm < năm 2000</small>
            </td>
          </tr>
          <tr>
            <td>
              <label for="kq" class="col-form-label">Năm nhuận: </label>
            </td>
            <td>
              <p style="line-height: 1.5;padding-top: calc(0.375rem + 1px);padding-bottom: calc(0.375rem + 1px);margin-bottom: 0;font-size: inherit;"><?php echo $str_kq ?></p>
            </td>
          </tr>
          <tr>
            <td></td>
            <td style="text-align: center;">
              <button type="submit" name="xuly" class="btn btn-primary" style="margin-top: 20px;">Xử Lý</button>
            </td>
          </tr>
          <tr>
            <td></td>
            <td style="text-align: center;">
              <h4 style="margin-bottom: 20px;">TÌM NĂM NHUẬN > 2000</h4>
            </td>
          </tr>
          <tr class="form-group">
            <td>
              <label for="inp-soNam2" class="col-form-label">Năm: </label>
            </td>
            <td>
              <input type="text" name="soNam2" class="form-control" id="inp-soNam2" value="<?php echo $soNam2 ?>">
              <small id="emailHelp" class="form-text text-muted">Nhập vào số năm > năm 2000</small>
            </td>
          </tr>
          <tr>
            <td>
              <label class="col-form-label">Năm nhuận: </label>
            </td>
            <td>
              <p style="line-height: 1.5;padding-top: calc(0.375rem + 1px);padding-bottom: calc(0.375rem + 1px);margin-bottom: 0;font-size: inherit;"><?php echo $str_kqv2 ?></p>
            </td>
          </tr>
          <tr>
            <td></td>
            <td style="text-align: center;">
              <button type="submit" name="xuly2" class="btn btn-primary" style="margin-top: 20px;">Xử Lý</button>
            </td>
          </tr>
        </tbody>
      </table>
    </form>
  </center>
</body>

</html>