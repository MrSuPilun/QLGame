<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Phát sinh mảng và tính toán</title>
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
      $sum = 0;
      for ($i = 0; $i < count($arr); $i++) {
        $sum += $arr[$i];
      }
      return $sum;
    }

    function gtln($arr)
    {
      $max = -1;
      for ($i=0; $i < count($arr); $i++) { 
        if($arr[$i] > $max)
          $max = $arr[$i];
      }
      return $max;
    }

    function gtnn($arr)
    {
      $max = 21;
      for ($i=0; $i < count($arr); $i++) { 
        if($arr[$i] < $max)
          $max = $arr[$i];
      }
      return $max;
    }

    if (isset($_POST['sophantu']))
      $sophantu = trim($_POST['sophantu']);
    else
      $sophantu = 0;

    $str_kq = "";
    if (isset($_POST['so'])) {
      $so = $_POST['so'];
    }
    if (isset($_POST['tinh'])) {
      $arr = taoMang($sophantu);
      $str_kq = inMang($arr);
    }
  ?>

  <form action="" method="post">
    <table border="0" cellpadding="0">
      <th colspan="2">
        <h2>Phát sinh mảng và tính toán</h2>
      </th>
      <tr>
        <td>Nhập số phần tử:</td>
        <td><input type="text" name="sophantu" size="70" value="<?php echo $sophantu; ?>" /></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" name="tinh" size="20" value="   Phát sinh và tính toán  " /></td>
      </tr>
      <tr>
        <td>Mảng:</td>
        <td><input type="text" name="mang_kq" size="70" disabled="disabled" value="<?php echo inMang($arr); ?>" /></td>
      </tr>

      <tr>
        <td>GTLN:</td>
        <td><input type="text" name="mang_kq" size="70" disabled="disabled" value="<?php echo gtln($arr); ?>" /></td>
      </tr>

      <tr>
        <td>GTNN:</td>
        <td><input type="text" name="mang_kq" size="70" disabled="disabled" value="<?php echo gtnn($arr); ?>" /></td>
      </tr>

      <tr>
        <td>Tổng mảng:</td>
        <td><input type="text" name="mang_kq" size="70" disabled="disabled" value="<?php echo tong($arr); ?>" /></td>
      </tr>
    </table>
  </form>
</body>

</html>