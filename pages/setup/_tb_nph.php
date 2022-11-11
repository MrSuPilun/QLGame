<?php
$arr_data = array(
  array('NPT01', 'FromSoftware'),
  array('NPT02', 'Rockstar Games'),
  array('NPT03', 'Ubisoft'),
  array('NPT04', 'Valve'),
  array('NPT05', 'Sony'),
  array('NPT06', 'Microsoft'),
  array('NPT07', 'Activision Blizzard'),
  array('NPT08', 'Electronic Arts'),
  array('NPT09', 'Bandai Namco'),
  array('NPT10', 'Square Enix')
);
?>
<h3>Nhà Phát Hành</h3>
<table class="table table-bordered">
  <thead class="thead-light">
    <tr>
      <!-- <th scope="col">#</th> -->
      <th scope="col">ID</th>
      <th scope="col">Tên Nhà Phát Triển</th>
      <th scope="col">Check</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($arr_data as $value) {
      echo "<tr>";
      echo "<td>$value[0]</td>";
      echo "<td>$value[1]</td>";
      $result = $qlgame->insertNhaPhatTrien($value[0], $value[1]);
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