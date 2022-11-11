<?php
$arr_data = array(
  array('HD001', 'US001', '2022-10-09', 225000),
  array('HD002', 'US002', '2022-09-11', 120000),
  array('HD003', 'US003', '2022-08-12', 217000),
  array('HD004', 'US004', '2022-10-15', 800000),
  array('HD005', 'US005', '2022-09-22', 990000),
  array('HD006', 'US006', '2022-07-11', 192000),
  array('HD007', 'US007', '2022-08-22', 69000),
  array('HD008', 'US008', '2022-09-12', 936000),
  array('HD009', 'US009', '2022-09-16', 163000),
  array('HD010', 'US010', '2022-09-17', 306000),
  array('HD011', 'US001', '2022-10-01', 1940000),
  array('HD012', 'US002', '2022-10-02', 186000),
  array('HD013', 'US003', '2022-10-02', 1364000),
  array('HD014', 'US004', '2022-10-02', 236000),
  array('HD015', 'US005', '2022-10-04', 346000),
  array('HD016', 'US006', '2022-10-05', 860000),
  array('HD017', 'US007', '2022-10-05', 788000),
  array('HD018', 'US008', '2022-10-06', 615000),
  array('HD019', 'US009', '2022-10-06', 946000),
  array('HD020', 'US010', '2022-10-06', 186000)
);
?>
<h3>Hóa Đơn</h3>
<table class="table table-bordered">
  <thead class="thead-light">
    <tr>
      <!-- <th scope="col">#</th> -->
      <th scope="col">ID</th>
      <th scope="col">ID User</th>
      <th scope="col">Date</th>
      <th scope="col">Price</th>
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
      $result = $qlgame->insertHoaDon($value[0], $value[1], $value[2], $value[3]);
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