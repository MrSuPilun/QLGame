<link rel="stylesheet" href="css/_user.css">

<?php

if (isset($_GET['tag']) && $_GET['tag'] == 'updateNPT') {
  include_once('pages/admin/npt/_npt_update.php');
} else if (isset($_GET['tag']) && $_GET['tag'] == 'deleteNPT') {
  include_once('pages/admin/npt/_npt_del.php');
} else if (isset($_GET['tag']) && $_GET['tag'] == 'createNPT') {
  include_once('pages/admin/npt/_npt_add.php');
}
include_once('pages/admin/npt/_npt_show.php');

?>

<script src="js/_user.js"></script>