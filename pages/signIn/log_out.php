<?php
 
if (isset($_SESSION['TEN_DN'])){
    unset($_SESSION['TEN_DN']);
    unset($_SESSION['PHAN_QUYEN']);
}
?>
<div class="notify">Log out successful. <a href="web.php">Homepage</a></div>
