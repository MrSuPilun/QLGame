<?php
$arr_data = array(
  array('HD001', 'GA001', 225000, 1),
  array('HD002', 'GA002', 120000, 1),
  array('HD003', 'GA003', 217000, 1),
  array('HD004', 'GA004', 800000, 1),
  array('HD005', 'GA005', 990000, 1),
  array('HD006', 'GA006', 192000, 1),
  array('HD007', 'GA007', 69000, 1),
  array('HD008', 'GA008', 936000, 1),
  array('HD009', 'GA009', 163000, 1),
  array('HD010', 'GA010', 306000, 1),
  array('HD011', 'GA011', 1940000, 1),
  array('HD012', 'GA012', 186000, 1),
  array('HD013', 'GA013', 1364000, 1),
  array('HD014', 'GA014', 236000, 1),
  array('HD015', 'GA015', 346000, 1),
  array('HD016', 'GA016', 860000, 1),
  array('HD017', 'GA017', 788000, 1),
  array('HD018', 'GA018', 615000, 1),
  array('HD019', 'GA019', 946000, 1),
  array('HD020', 'GA020', 186000, 1)
);
?>
<h3>Chi Tiết Hóa Đơn</h3>
<table class="table">
  <thead>
    <tr>
      <!-- <th scope="col">#</th> -->
      <th scope="col">ID HĐ</th>
      <th scope="col">ID Game</th>
      <th scope="col">Price</th>
      <th scope="col">Số lượng</th>
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
      $result = $qlgame->insertCTHD($value[0], $value[1], $value[2], $value[3]);
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
