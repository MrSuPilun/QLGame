<?php

$str_card_sp = "";
$result = $qlgame->queryDB("SELECT * FROM GAME");
$countRows = mysqli_num_rows($result);
$numCardsInRow = 5;
$numRows = floor($countRows / $numCardsInRow) + 1;

function formatMoney($number, $fractional=false) {
  if ($fractional) {
      $number = sprintf('%.2f', $number);
  }
  while (true) {
      $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
      if ($replaced != $number) {
          $number = $replaced;
      } else {
          break;
      }
  }
  return $number;
}

for ($i = 0; $i < $numRows; $i++) {
  $j = 1;
  $str_card_sp .= "<div class='list-sp row'>";
  while ($rows = mysqli_fetch_array($result)) {
    $str_card_sp .= "
    <div class='card-sp col'>
      <div class='card-thumbnail'>
        <img src='$rows[4]'>
        <div class='card-btn-add'>
          <a href='#'><div class='card-icon-add'></div></a>
        </div>
      </div>
      <p>$rows[1]</p>
      <p><b><u>đ</u>" . formatMoney($rows[3]) . "</b></p>
    </div>
    ";
    if ($j == 5)
      break;
    $j++;
  }
  $str_card_sp .= "</div>";
}

echo $str_card_sp;

?>
