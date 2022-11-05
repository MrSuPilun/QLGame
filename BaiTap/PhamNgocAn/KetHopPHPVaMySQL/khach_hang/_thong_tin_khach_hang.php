<?php
$query = $qlbs->queryDB("SELECT * FROM KHACH_HANG");
$str_kq = "";
if ($query) {
  while ($rows = mysqli_fetch_array($query)) {
    $str_kq .= "<tr scope='row'>";
    for ($i = 0; $i < mysqli_num_fields($query); $i++) {
      switch ($i) {
        case 2:
          $str_kq .= "<td>";
          if ($rows[2] == "0")
            $str_kq .= "<i class='fa-solid fa-mars'></i>";
          else
            $str_kq .= "<i class='fa-solid fa-venus'></i>";
          $str_kq .= "</td>";
          break;
        default:
          $str_kq .= "<td>$rows[$i]</td>";
          break;
      }
    }
    $str_kq .= "<td class='action'>";
    $str_kq .= "<a href='" . $_SERVER['PHP_SELF'] . "?action=edit&id=$rows[0]'><i class='fa-solid fa-pen-to-square' tabindex='0' data-toggle='tooltip' title='Cập nhập'></i></a>";
    $str_kq .= "<a href='" . $_SERVER['PHP_SELF'] . "?action=delete&id=$rows[0]'><i class='fa-solid fa-trash' tabindex='0' data-toggle='tooltip' title='Xóa'></i></a>";
    $str_kq .= "</td>";
    $str_kq .= "</tr>";
  }
} else {
  echo "Không thể truy vấn thông tin khách hàng";
}
?>

<table class="table table-bordered">
  <thead class="thead-light">
    <tr>
      <th scope="col">Mã KH</th>
      <th scope="col">Tên khách hàng</th>
      <th scope="col">Giới tính</th>
      <th scope="col">Địa chỉ</th>
      <th scope="col">Số điện thoại</th>
      <th scope="col">Email</th>
      <th scope="col">Hành động</th>
    </tr>
  </thead>
  <tbody>
    <?= $str_kq ?>
  </tbody>
</table>
