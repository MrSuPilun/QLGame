<?php
  include_once("pages/includes/header.php");
  echo "<br>" . $qlgame->setConnect("localhost", "root", "", "qlgame") . "<br>";
  include_once("pages/includes/footer.php");
?>