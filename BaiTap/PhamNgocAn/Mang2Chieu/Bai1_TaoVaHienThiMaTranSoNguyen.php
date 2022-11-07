<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewPOST" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <style>
    * {
      box-sizing: border-box;
      margin: 0;
    }

    form {
      margin-top: 50px;
      width: fit-content;
    }

    th {
      text-align: left;
    }

    td>input[type=text] {
      width: 100%;
    }

    tr,
    th,
    td {
      border-bottom: none;
    }

    .tb .tb-tr .tb-td{
      border: 2px solid #4C93FF;
    }
    .tb-td {
      text-align: center;
      width: 50px;
      height: 50px;
    }

  </style>
</head>

<body>
  <?php
  $soN = "0";
  $soM = "0";
  $err = "";

  if (isset($_GET['soN'])) {
    $soN = $_GET['soN'];
  }
  if (isset($_GET['soM'])) {
    $soM = $_GET['soM'];
  }

  $arr = array();

  function hienThi($soN, $soM, $arr)
  {
    echo "<table class='tb'>";
    for ($i=0; $i < $soN; $i++) { 
      echo "<tr class='tb-tr'>";
      for ($j=0; $j < $soM; $j++) { 
        echo "<td class='tb-td'>{$arr[$i][$j]}</td>";
      }
      echo "</tr>";
    }
    echo "</table>";
  }

  if(isset($_GET['xuly'])) {
    if(is_numeric($soN) && is_numeric($soM) && $soN > 0 && $soM > 0) {
      for ($i=0; $i < $soN; $i++) { 
        $temp = array();
        for ($j=0; $j < $soM; $j++) { 
          $temp[] = rand(-1000, 1000);
        }
        $arr[] = $temp;
      }
    } else {
      $err = "Kiểm tra lại giá trị !!!";
    }
  }

  ?>
  <center>

    <form class="shadow-sm p-3 mb-5 bg-white rounded" method="get">
      <table class="table">
        <tbody>
          <tr>
            <td></td>
            <td style="text-align: center;" colspan="3">
              <h4 style="margin-bottom: 20px;" id="form-title">Ma trận số nguyên</h4>
            </td>
          </tr>
          <tr class="form-group">
            <td>
              <label for="inp-soN" class="col-form-label">N</label>
            </td>
            <td>
              <input type="text" name="soN" class="form-control" id="inp-soN" value="<?php echo $soN ?>" style="width: 100px;">
            </td>
            <td>
              <label for="inp-soM" class="col-form-label">M</label>
            </td>
            <td>
              <input type="text" name="soM" class="form-control" id="inp-soM" value="<?php echo $soM ?>" style="width: 100px;">
            </td>
            <td style="text-align: center;" colspan="3">
              <button type="submit" name="xuly" class="btn btn-primary" >Xử lý</button>
            </td>
          </tr>
          <tr>
            <td colspan="5" class="text-center">
              <small class="form-text text-danger"><?= $err ?></small>
            </td>
          </tr>
        </tbody>
      </table>
    </form>
    <?= hienThi($soN, $soM, $arr) ?>
  </center>
</body>

</html>