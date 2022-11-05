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

    td>input,
    img {
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

  function inMang($arr, $str = ',')
  {
    return implode($str, $arr);
  }

  function taoMang($n)
  {
    $arr = array();
    for ($i = 0; $i < $n; $i++) {
      $arr[] = rand(0, 20);
    }
    return $arr;
  }

  function tong($arr)
  {
    if (count($arr) == 0)
      return "";
    $sum = 0;
    for ($i = 0; $i < count($arr); $i++) {
      $sum += $arr[$i];
    }
    return $sum;
  }

  function gtln($arr)
  {
    if (count($arr) == 0)
      return "";
    $max = -1;
    for ($i = 0; $i < count($arr); $i++) {
      if ($arr[$i] > $max)
        $max = $arr[$i];
    }
    return $max == -1 ? "" : $max;
  }

  function gtnn($arr)
  {
    if (count($arr) == 0)
      return "";
    $max = 21;
    for ($i = 0; $i < count($arr); $i++) {
      if ($arr[$i] < $max)
        $max = $arr[$i];
    }
    return $max == 21 ? "" : $max;
  }

  if (isset($_POST['sophantu']))
    $sophantu = trim($_POST['sophantu']);
  else
    $sophantu = 0;

  $arr = array();
  $str_kq = "";
  if (isset($_POST['so'])) {
    $so = $_POST['so'];
  }
  if (isset($_POST['tinh'])) {
    $arr = taoMang($sophantu);
    $str_kq = inMang($arr);
  }
  ?>
  <center>
    <form class="shadow-sm p-3 mb-5 bg-white rounded" method="post">
      <table class="table">
        <tbody>
          <tr>
            <td></td>
            <td style="text-align: center;">
              <h4 style="margin-bottom: 20px;">PHÁT SINH MẢNG VÀ TÍNH TOÁN</h4>
            </td>
          </tr>
          <tr class="form-group">
            <td>
              <label for="inp-sophantu" class="col-form-label">Nhập số phần tử: </label>
            </td>
            <td>
              <input type="text" name="sophantu" class="form-control" value="<?php echo $sophantu; ?>" />
              <small id="emailHelp" class="form-text text-muted">Nhập vào số phần tử</small>
            </td>
          </tr>
          <tr>
            <td></td>
            <td style="text-align: center;">
              <button type="submit" name="tinh" class="btn btn-primary" style="margin-top: 20px;">Phát sinh và tính toán</button>
            </td>
          </tr>
          <tr class="form-group">
            <td>
              <label class="col-form-label">Mảng: </label>
            </td>
            <td>
              <input type="text" name="mang_kq" class="form-control" disabled="disabled" value="<?php echo inMang($arr); ?>" />
            </td>
          </tr>
          <tr class="form-group">
            <td>
              <label class="col-form-label">GTLN: </label>
            </td>
            <td>
              <input type="text" name="mang_kq" class="form-control" disabled="disabled" value="<?php echo gtln($arr); ?>" />
            </td>
          </tr>
          <tr class="form-group">
            <td>
              <label class="col-form-label">GTNN: </label>
            </td>
            <td>
              <input type="text" name="mang_kq" class="form-control" disabled="disabled" value="<?php echo gtnn($arr); ?>" />
            </td>
          </tr>
          <tr class="form-group">
            <td>
              <label class="col-form-label">Tổng: </label>
            </td>
            <td>
              <input type="text" name="mang_kq" class="form-control" disabled="disabled" value="<?php echo tong($arr); ?>" />
            </td>
          </tr>
        </tbody>
      </table>
    </form>
  </center>
</body>

</html>