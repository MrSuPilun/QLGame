<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Mang tim kiem va thay the</title>
  <style type="text/css">
    table {
      color: #ffff00;
      background-color: gray;
    }

    table th {
      background-color: blue;
      font-style: vni-times;
      color: yellow;
    }
  </style>
</head>

<body>
  <?php
    function tong($arr)
    {
      $sum = 0;
      for ($i = 0; $i < count($arr); $i++) {
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
      $arr = explode(",", $str);

      $kq = tong($arr);
    }
  ?>
  <form action="" method="post">
    <table border="0" cellpadding="0">
      <th colspan="2">
        <h2>TÍNH TỔNG</h2>
      </th>
      <tr>
        <td>Nhập mảng:</td>
        <td><input type="text" name="mang" size="70" value="<?php echo $str; ?>" /></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" name="tinh" size="20" value="   Tính  " /></td>
      </tr>
      <td>Kết quả:</td>
      <td><input type="text" name="kq" size="70" disabled="disabled" value="<?php echo $kq; ?> " /></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><label>(Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</label></td>
      </tr>
    </table>
  </form>
</body>

</html>