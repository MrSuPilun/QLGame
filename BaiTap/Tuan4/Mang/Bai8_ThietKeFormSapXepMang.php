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
    return implode(', ', $arr);
  }

  function fromStrToArr($str)
  {
    return explode(',', $str);
  }

  function sapXepTang(&$arr)
  {
    // 0 Tang 1 Giam
    for ($i = 0; $i < count($arr) - 1; $i++) {
      for ($j = $i; $j < count($arr); $j++) {
        if ($arr[$i] > $arr[$j]) {
          $temp = $arr[$i];
          $arr[$i] = $arr[$j];
          $arr[$j] = $temp;
        }
      }
    }
  }

  function inMangGiam($arr)
  {
    $str = '';
    for ($i = count($arr) - 1; $i >= 0; $i--) {
      if ($i == 0)
        $str .= "$arr[$i]";
      else
      $str .= "$arr[$i], ";
    }
    return $str;
  }

  $str_arr = '3,4,5,6,7,8,9';
  $arr = array();

  if (isset($_POST['xuly'])) {
    if (isset($_POST['str_arr']))
      $str_arr = $_POST['str_arr'];
    else
      $str_arr = '';

    $arr = fromStrToArr($str_arr);
    sapXepTang($arr);
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
          <tr>
            <td></td>
            <td style="text-align: center;">
              <button type="submit" name="xuly" class="btn btn-primary" style="margin-top: 20px;">Sắp xếp</button>
            </td>
          </tr>
          <tr class="form-group">
            <td>
              <label for="inp-output-arr" class="col-form-label">Tăng dần: </label>
            </td>
            <td>
              <input class="form-control" id="inp-output-arr" value="<?php echo inMang($arr) ?>" disabled>
            </td>
          </tr>
          <tr class="form-group">
            <td>
              <label for="inp-output-kq" class="col-form-label">Giảm dần: </label>
            </td>
            <td>
              <input class="form-control" id="inp-output-arr" value="<?php echo inMangGiam($arr) ?>" disabled>
            </td>
          </tr>
        </tbody>
      </table>
    </form>
  </center>
</body>

</html>