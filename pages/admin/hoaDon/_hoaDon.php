<link rel="stylesheet" href="css/_user.css">

<?php

if (isset($_GET['tag']) && $_GET['tag'] == 'deleteHD') {
  include_once('pages/admin/hoaDon/_hoaDon_del.php');
}
include_once('pages/admin/hoaDon/_hoaDon_show.php');

?>

<script src="js/_user.js"></script>