<?php
$arr_data = array(
  array('US001', 'Nguyễn Văn An', '0912345678', 'NVAn@gmail.com', '150 Ngô Tất Tố', 'NVAn', '123456', '0'),
  array('US002', 'Nguyễn Thái Hồng', '0923456789', 'NTHong@gmail.com', '25 Hát Giang', 'NTHong', '123456', '0'),
  array('US003', 'Nguyễn Hồng Tâm', '0934567891', 'NHTam@gmail.com', '15 Lạc Thiện', 'NHTam', '123456', '0'),
  array('US004', 'Trần Văn Cường', '0945678912', 'TVCuong@gmail.com', '23 Trần Nguyên Hãn', 'TVCuong', '123456', '0'),
  array('US005', 'Ngô Thế Anh', '0956789901', 'NTAnh@gmail.com', '10 Nguyễn Trãi', 'NTAnh', '123456', '0'),
  array('US006', 'Phạm Ngọc Ẩn', '0911111112', 'PNAn@gmail.com', '12 Tôn Thất Tùng', 'PNAn', '123456', '0'),
  array('US007', 'Ngô Thiên', '0911111113', 'NThien@gmail.com', '100 Hồng Lĩnh', 'NThien', '123456', '0'),
  array('US008', 'Lâm Bình', '0911111114', 'LBinh@gmail.com', '120 Ngô Gia Tự', 'LBinh', '123456', '0'),
  array('US009', 'Thái Văn Thiên', '0911111156', 'TVThien@gmail.com', '30 Lê Thánh Tôn', 'TVThien', '123456', '0'),
  array('US010', 'Cao Thế Thái', '0911111117', 'CTThai@gmail.com', '32 Lý Thánh Tôn', 'CTThai', '123456', '0'),
  array('US011', 'Ngô Thục Kỳ', '0922222221', 'NTKy@gmail.com', '20 Tân Kỳ Tân Quý', 'NTKy', '123456', '1'),
  array('US012', 'Lưu Hoa', '0922222223', 'LHoa@gmail.com', '15 Nguyễn Khuyến', 'LHoa', '123456', '1'),
  array('US013', 'Hứa Thiên', '0999999999', 'HThien@gmail.com', '24 Ngô Đức Kế', 'HThien', '123456', '1'),
  array('US014', 'Trần Văn Toàn', '0899911122', 'TVToan@gmail.com', '10 Lê Đại Hành', 'TVToan', '123456', '1'),
  array('US015', 'Trần Văn Toàn Thiên', '0899911133', 'TVTThien@gmail.com', '150 Ngô Quyền', 'TVTThien', '123456', '2')
);
?>
<h3>Khách Hàng</h3>
<table class="table table-bordered">
  <thead class="thead-light">
    <tr>
      <!-- <th scope="col">#</th> -->
      <th scope="col">ID</th>
      <th scope="col">Tên KH</th>
      <th scope="col">SĐT</th>
      <th scope="col">Email</th>
      <th scope="col">Địa chỉ</th>
      <th scope="col">Tài khoản</th>
      <th scope="col">Mật khẩu</th>
      <th scope="col">Quyền</th>
      <th scope="col">Check</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($arr_data as $value) {
      echo "<tr>";
      echo "<td>$value[0]</td>";
      echo "<td>$value[1]</td>";
      echo "<td>$value[2]</td>";
      echo "<td>$value[3]</td>";
      echo "<td>$value[4]</td>";
      echo "<td>$value[5]</td>";
      echo "<td>$value[6]</td>";
      if ($value[7] == "0")
        echo "<td>User</td>";
      else if ($value[7] == "1")
        echo "<td>Employee</td>";
      else
        echo "<td>Admin</td>";
      $result = $qlgame->insertUser($value[0], $value[1], $value[2], $value[3], $value[4], $value[5], $value[6], $value[7]);
      echo "<td>";
      if ($result)
        echo "Successfully inserted";
      else
        echo "Record already exists";
      echo "</td>";
      echo "</tr>";
    }
    ?>
  </tbody>
</table>