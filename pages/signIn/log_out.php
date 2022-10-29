<link rel="stylesheet" href="/my_web/QLGame/css/web.css">
<?php session_start(); 
 
if (isset($_SESSION['TEN_DN'])){
    unset($_SESSION['TEN_DN']);
}
?>
<div class="notify">Log out successful. <a href="/my_web/QLGame/web.php">Homepage</a></div>