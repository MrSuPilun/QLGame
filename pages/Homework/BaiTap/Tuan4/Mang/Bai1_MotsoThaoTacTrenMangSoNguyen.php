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
    function taoMangNgauNhien($n, $min, $max)
    {
      $arr = array();
      for ($i=0; $i < $n; $i++) { 
        $arr[] = rand($min, $max);
      }
      return $arr;
    }
    // Câu A
    function inMang($arr, $str = ',')
    {
      return implode($str, $arr);
    }
    // Câu B
    function demPhanTuChan($arr)
    {
      $sum = 0;
      for ($i=0; $i < count($arr); $i++) { 
        if ($arr[$i] % 2 == 0)
          $sum++;
      }
      return $sum;
    }
    // Câu C
    function demPhanTuNho($arr, $max = 0)
    {
      $sum = 0;
      for ($i=0; $i < count($arr); $i++) { 
        if ($arr[$i] < $max)
          $sum++;
      }
      return $sum;
    }
    // Câu D
    function demPhanTuAm($arr)
    {
      $sum = 0;
      for ($i=0; $i < count($arr); $i++) { 
        if ($arr[$i] < 0)
          $sum++;
      }
      return $sum;
    }
    // Câu E
    function viTriPhanTu($arr)
    {
      $arr_index = array();
      for ($i=0; $i < count($arr); $i++) { 
        if ($arr[$i] / 10 % 10 == 0 && (int)($arr[$i] / 100) != 0)
          $arr_index[] = $i;
      }
      return $arr_index;
    }
    // Câu F
    function sort1($arr)
    {
      for ($i=0; $i < count($arr) - 1; $i++) { 
        for ($j=$i+1; $j < count($arr); $j++) { 
          if($arr[$i] > $arr[$j]){
            $t = $arr[$i];
            $arr[$i] = $arr[$j];
            $arr[$j] = $t;
          }
        }
      }
      return $arr;
    }

    if (isset($_POST['soN']))
      $soN = $_POST['soN'];
    else
      $soN = "";
    $arr = array();
    $kq_a = "";
    $kq_b = "";
    $kq_c = "";
    $kq_d = "";
    $kq_e = "";
    $kq_f = "";
    if (isset($_POST['xuly']) && isset($_POST['soN'])){
      if (is_numeric($soN)) {
        $arr = taoMangNgauNhien($soN, -1000, 1000);
        if (isset($_POST['kq_a'])) {
          $kq_a = inMang($arr);
        }
        if (isset($_POST['kq_b'])) {
          $kq_b = demPhanTuChan($arr);
        }
        if (isset($_POST['kq_c'])) {
          $kq_c = demPhanTuNho($arr, 100);
        }
        if (isset($_POST['kq_d'])) {
          $kq_d = demPhanTuAm($arr);
        }
        if (isset($_POST['kq_e'])) {
          $kq_e = inMang(viTriPhanTu($arr));
        }
        if (isset($_POST['kq_f'])) {
          $kq_f = inMang(sort1($arr));
        }
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
              <h4 style="margin-bottom: 20px;">THAO TÁC TRÊN MẢNG</h4>
            </td>
          </tr>
          <tr class="form-group">
            <td>
              <label for="inp-soN" class="col-form-label">Nhập số N: </label>
            </td>
            <td>
              <input type="text" name="soN" class="form-control" id="inp-soN" value="<?php echo $soN ?>">
              <small id="emailHelp" class="form-text text-muted">Nhập vào số N để tạo mảng ngẫu nhiên</small>
            </td>
          </tr>
          <tr>
            <td>
            <label for="kq" class="col-form-label">Mảng: </label>
            </td>
            <td>
            <input type="text" name="kq_a" class="form-control" id="kq" value="<?php echo $kq_a ?>" readonly>
            </td>
          </tr>
          <tr>
            <td>
            <label for="kq" class="col-form-label">Số phần tử chẵn: </label>
            </td>
            <td>
            <input type="text" name="kq_b" class="form-control" id="kq" value="<?php echo $kq_b ?>" readonly>
            </td>
          </tr>
          <tr>
            <td>
            <label for="kq" class="col-form-label">Số phần tử < 100: </label>
            </td>
            <td>
            <input type="text" name="kq_c" class="form-control" id="kq" value="<?php echo $kq_c ?>" readonly>
            </td>
          </tr>
          <tr>
            <td>
            <label for="kq" class="col-form-label">Số phần tử âm: </label>
            </td>
            <td>
            <input type="text" name="kq_d" class="form-control" id="kq" value="<?php echo $kq_d ?>" readonly>
            </td>
          </tr>
          <tr>
            <td>
            <label for="kq" class="col-form-label">Hàng chục là số 0: </label>
            </td>
            <td>
            <input type="text" name="kq_e" class="form-control" id="kq" value="<?php echo $kq_e ?>" readonly>
            </td>
          </tr>
          <tr>
            <td>
            <label for="kq" class="col-form-label">Sắp xếp tăng dần: </label>
            </td>
            <td>
            <input type="text" name="kq_f" class="form-control" id="kq" value="<?php echo $kq_f ?>" readonly>
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