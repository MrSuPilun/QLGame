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
  function tong($arr)
  {
    $sum = 0;
    for ($i = 0; $i < count($arr); $i++) {
      if(is_numeric($arr[$i]))
        $sum += $arr[$i];
    }
    return $sum;
  }
  $str = "";
  $kq = 0;
  if (isset($_POST['so'])) {
    $so = $_POST['so'];
  }
  if (isset($_POST['tinh'])) {
    $str = $_POST['mang'];
    if ($str == "") {
      $kq = 0;
    } else {
      $arr = explode(",", $str);
      $kq = tong($arr);
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
              <h4 style="margin-bottom: 20px;">TÍNH TỔNG</h4>
            </td>
          </tr>
          <tr class="form-group">
            <td>
              <label for="inp-mang" class="col-form-label">Nhập mảng: </label>
            </td>
            <td>
              <input type="text" name="mang" class="form-control" id="inp-mang" value="<?php echo $str; ?>" />
              <small id="emailHelp" class="form-text text-muted">Các phần tử trong mảng cách nhau bằng dấu ','</small>
            </td>
          </tr>
          <tr>
            <td></td>
            <td style="text-align: center;">
              <button type="submit" name="tinh" class="btn btn-primary" style="margin-top: 20px;">Tính</button>
            </td>
          </tr>
          <tr class="form-group">
            <td>
              <label for="inp-mang" class="col-form-label">Kết quả: </label>
            </td>
            <td>
              <input type="text" name="kq" class="form-control" id="inp-mang" disabled="disabled" value="<?php echo $kq; ?> " />
            </td>
          </tr>
        </tbody>
      </table>
    </form>
  </center>
</body>

</html>