<?php
include ('includes/header.php');
?>
<link rel="stylesheet" href="css/homework.css">
<?php

function InThuMuc($data, &$str = "", $path = "")
{
  if ($str != "")
    $str .= "<ul class='nested'>";

  if (is_array($data) && !empty($data['folder'])) {
    $str .= "<li><span class='caret'>" . $data['name'] . "</span>";
    $path .= $data['folder'] . "/";
    foreach ($data['paths'] as $value) {
      InThuMuc($value, $str, $path);
    }
    $str .= "</li>";
  } else {
    $str .= "<li><a href='$path" . $data['file_name'] . "'>" . $data['name'] . "</a></li>";
  }
  $str .= "</ul>";
  return $str;
}

function HienThiBaiTap($store)
{
  $arr_dir = scandir($store);
  $arr_dir = array_values(array_diff($arr_dir, array('.', '..')));
  echo "<ul id='tree-folder'>";
  foreach ($arr_dir as $value) {
    $str = "";
    $path = "./$store/$value/path.json";
    $json = file_get_contents($path);
    $json_data = json_decode($json, true);
    echo InThuMuc($json_data, $str, $store . "/");
  }
  echo "</ul>";
}
HienThiBaiTap("BaiTap");
?>
<script src="js/homework.js"></script>
<?php
include ('includes/footer.php');
?>