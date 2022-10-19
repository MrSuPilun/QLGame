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
      width:fit-content;
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
      white-space: nowrap;
    }
  </style>
</head>

<body>
  <?php
  function taoMangNgauNhien($n, $min, $max)
  {
    $arr = array();
    for ($i = 0; $i < $n; $i++) {
      $arr[] = rand($min, $max);
    }
    return $arr;
  }

  function fromStrToArr($str)
  {
    return explode(',', $str);
  }

  function inMang($arr, $str = ',')
  {
    return implode($str, $arr);
  }

  function dem($arr)
  {
    if ($arr === "")
      return "";
    return count($arr);
  }
  function mergeArr($a, $b)
  {
    return array_merge($a, $b);
  }


  $arrA = array();
  $arrB = array();
  $arrC = array();

  if (isset($_POST['arrA']))
    $strA = $_POST['arrA'];
  else
    $strA = "12,10,100,-1,10,9,3";

  if (isset($_POST['arrB']))
    $strB = $_POST['arrB'];
  else
    $strB = "1,5,2,3,50,57,83";

  if (isset($_POST['xuly'])) {
    $arrA = fromStrToArr($strA);
    $arrB = fromStrToArr($strB);
    $arrC = mergeArr($arrA, $arrB);
  }
  ?>
  <center>
    <form class="shadow-sm p-3 mb-5 bg-white rounded" method="post">
      <table class="table">
        <tbody>
          <tr>
            <td></td>
            <td style="text-align: center;">
              <h4 style="margin-bottom: 20px;">Đếm Số Phần Tử, Ghép Mảng Và Sắp Xếp</h4>
            </td>
          </tr>
          <tr class="form-group">
            <td>
              <label for="inp-arr-a" class="col-form-label">Mảng A: </label>
            </td>
            <td>
              <input type="text" name="arrA" class="form-control" id="inp-arr-a" value="<?php echo $strA ?>">
              <small class="form-text text-muted">Nhập vào mảng A</small>
            </td>
          </tr>
          <tr class="form-group">
            <td>
              <label class="col-form-label">Mảng B: </label>
            </td>
            <td>
              <input type="text" name="arrB" class="form-control" id="inp-arr-b" value="<?php echo $strB ?>">
              <small class="form-text text-muted">Nhập vào mảng B</small>
            </td>
          </tr>
          <tr>
            <td></td>
            <td style="text-align: center;">
              <button type="submit" name="xuly" class="btn btn-primary" style="margin-top: 20px;">Xử Lý</button>
            </td>
          </tr>
          <tr class="form-group">
            <td>
              <label class="col-form-label">Số phần tử A: </label>
            </td>
            <td>
              <input type="text" class="form-control" value="<?php echo dem($arrA) ?>" disabled>
            </td>
          </tr>
          <tr class="form-group">
            <td>
              <label class="col-form-label">Số phần tử B: </label>
            </td>
            <td>
              <input type="text" class="form-control" value="<?php echo dem($arrB) ?>" disabled>
            </td>
          </tr>
          <tr class="form-group">
            <td>
              <label class="col-form-label">Mảng C: </label>
            </td>
            <td>
              <input type="text" class="form-control" value="<?php echo inMang($arrC) ?>" disabled>
            </td>
          </tr>
          <tr class="form-group">
            <td>
              <label class="col-form-label">Mảng C tăng dần: </label>
            </td>
            <td>
              <input type="text" class="form-control" value="<?php sort($arrC); echo inMang($arrC) ?>" disabled>
            </td>
          </tr>
          <tr class="form-group">
            <td>
              <label class="col-form-label">Mảng C giảm dần: </label>
            </td>
            <td>
              <input type="text" class="form-control" value="<?php rsort($arrC); echo inMang($arrC) ?>" disabled>
            </td>
          </tr>
        </tbody>
      </table>
    </form>
  </center>
</body>

</html>