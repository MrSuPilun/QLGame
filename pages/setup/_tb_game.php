<?php
$arr_data = array(
  array('GA001', 'Grand Theft Auto V - GTA V', 'NPT02', 225000, 'https://images2.alphacoders.com/519/519170.jpg'),
  array('GA002', 'Left 4 Dead 2', 'NPT04', 120000, 'https://images.alphacoders.com/673/67393.jpg'),
  array('GA003', '7 Days to Die', 'NPT04', 217000, 'https://images4.alphacoders.com/709/709973.jpg'),
  array('GA004', 'Elden Ring', 'NPT03', 800000, 'https://images4.alphacoders.com/115/1151249.jpg'),
  array('GA005', 'Assassins Creed® Odyssey', 'NPT03', 990000, 'https://images3.alphacoders.com/128/1281618.png'),
  array('GA006', 'Cities: Skylines - Green Cities', 'NPT08', 192000, 'https://cdn1.epicgames.com/6009be9994c2409099588cde6f3a5ed0/offer/EGS_CitiesSkylinesGreenCities_ColossalOrder_DLC_S1-2560x1440-3728991e81ebdb13fe41b1b41b017fe0.jpg?h=270&resize=1&w=480'),
  array('GA007', 'Plants vs. Zombies', 'NPT08', 69000, 'https://images6.alphacoders.com/671/671912.jpg'),
  array('GA008', 'Assassin Creed® Origins', 'NPT03', 936000, 'https://images.alphacoders.com/845/845990.jpg'),
  array('GA009', 'Assassin Creed 2', 'NPT03', 163000, 'https://images6.alphacoders.com/304/304016.jpg'),
  array('GA010', 'Shadow Warrior 2', 'NPT10', 306000, 'https://images4.alphacoders.com/835/835754.jpg'),
  array('GA011', 'DRAGON BALL FighterZ', 'NPT09', 1940000, 'https://images2.alphacoders.com/901/901079.jpg'),
  array('GA012', 'Sword Art Online Re: Hollow Fragment', 'NPT09', 186000, 'https://images7.alphacoders.com/333/333852.jpg'),
  array('GA013', 'Call of Duty®: WWII', 'NPT07', 1364000, 'https://images2.alphacoders.com/879/879650.jpg'),
  array('GA014', 'Resident Evil Village', 'NPT10', 236000, 'https://images7.alphacoders.com/119/1193948.jpg'),
  array('GA015', 'Euro Truck Simulator 2', 'NPT08', 346000, 'https://images6.alphacoders.com/421/421200.jpg'),
  array('GA016', 'Call of Duty®: Modern Warfare® Remastered', 'NPT07', 860000, 'https://images3.alphacoders.com/720/720450.jpg'),
  array('GA017', 'NieR:Automata™', 'NPT09', 788000, 'https://images7.alphacoders.com/838/838020.png'),
  array('GA018', 'NARUTO SHIPPUDEN: Ultimate Ninja STORM 4', 'NPT09', 615000, 'https://images3.alphacoders.com/678/678440.jpg'),
  array('GA019', 'Red Dead Redemption 2', 'NPT02', 946000, 'https://images8.alphacoders.com/958/958091.jpg'),
  array('GA020', 'The Crew™ 2', 'NPT08', 186000, 'https://images6.alphacoders.com/882/882275.jpg')
);
?>
<h3>Game</h3>
<table class="table table-bordered">
  <thead class="thead-light">
    <tr>
      <!-- <th scope="col">#</th> -->
      <th scope="col">ID</th>
      <th scope="col">Tên Game</th>
      <th scope="col">Mã NPH</th>
      <th scope="col">Giá</th>
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
      $result = $qlgame->insertGame($value[0], $value[1], $value[2], $value[3], $value[4]);
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