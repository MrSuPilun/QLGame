<?php
$query = $qlbs->queryDB("SELECT * FROM HANG_SUA");
$str_kq = "";
if($query){
  while ($rows = mysqli_fetch_array($query)) {
    $str_kq .= "<tr scope='row'>";
    for ($i=0; $i < mysqli_num_fields($query); $i++) {
      $str_kq .= "<td>$rows[$i]</td>";
    }
    $str_kq .= "</tr>";
  }
} else {
  echo "Không thể truy vấn thông tin khách hàng";
}
?>

<table class="table table-bordered">
  <thead class="thead-light">
    <tr>
      <th scope="col">Mã HS</th>
      <th scope="col">Tên hãng sữa</th>
      <th scope="col">Địa chỉ</th>
      <th scope="col">Điện thoại</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
    <?= $str_kq ?>
  </tbody>
</table>