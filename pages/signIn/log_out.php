<link rel="stylesheet" href="css/web.css">
<?php session_start(); 
 
if (isset($_SESSION['TEN_DN'])){
    unset($_SESSION['TEN_DN']);
}
?>
<div class="notify">Log out successful. <a href="web.php">Homepage</a></div>