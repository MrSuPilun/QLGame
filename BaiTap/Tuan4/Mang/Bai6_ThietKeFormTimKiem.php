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

  function inMang($arr)
  {
    return implode(' ', $arr);
  }

  function fromStrToArr($str)
  {
    return explode(',', $str);
  }

  function search($arr, $x)
  {
    for ($i = 0; $i < count($arr); $i++) {
      if ($arr[$i] == $x)
        return $i;
    }
    return null;
  }

  $str_arr = '3,4,5,6,7,8,9';
  $x = '9';
  $str_kq = '';

  if (isset($_POST['xuly'])) {
    if (isset($_POST['str_arr']))
      $str_arr = $_POST['str_arr'];
    else
      $str_arr = '';

    if (isset($_POST['x']))
      $x = $_POST['x'];
    else
      $x = '';
    $t = search(fromStrToArr($str_arr), $x);
    if (!is_null($t))
      $str_kq = "Tìm thấy $x tại vị trí thứ $t trong mảng";
  }

  ?>
  <center>
    <form class="shadow-sm p-3 mb-5 bg-white rounded" method="post">
      <table class="table">
        <tbody>
          <tr>
            <td></td>
            <td style="text-align: center;">
              <h4 style="margin-bottom: 20px;">TÌM KIẾM</h4>
            </td>
          </tr>
          <tr class="form-group">
            <td>
              <label for="inp-arr" class="col-form-label">Nhập mảng: </label>
            </td>
            <td>
              <input type="text" name="str_arr" class="form-control" id="inp-arr" value="<?php echo $str_arr ?>">
              <small class="form-text text-muted">Nhập vào mảng cần xử lý</small>
            </td>
          </tr>
          <tr class="form-group">
            <td>
              <label for="inp-x" class="col-form-label">Nhập số cần tìm: </label>
            </td>
            <td>
              <input type="number" name="x" class="form-control" id="inp-x" value="<?php echo $x ?>">
              <small class="form-text text-muted">Nhập vào số cần tìm</small>
            </td>
          </tr>
          <tr>
            <td></td>
            <td style="text-align: center;">
              <button type="submit" name="xuly" class="btn btn-primary" style="margin-top: 20px;">Tìm</button>
            </td>
          </tr>
          <tr class="form-group">
            <td>
              <label for="inp-output-arr" class="col-form-label">Mảng: </label>
            </td>
            <td>
              <input class="form-control" id="inp-output-arr" value="<?php echo $str_arr ?>" disabled>
            </td>
          </tr>
          <tr class="form-group">
            <td>
              <label for="inp-output-kq" class="col-form-label">Kết quả tìm kiếm: </label>
            </td>
            <td>
              <textarea style="resize: none;" class="form-control" cols="30" rows="3" disabled><?php echo $str_kq ?></textarea>
            </td>
          </tr>
        </tbody>
      </table>
    </form>
  </center>
</body>

</html>