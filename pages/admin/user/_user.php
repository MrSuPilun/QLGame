<link rel="stylesheet" href="css/_user.css">

<?php

if (isset($_GET['tag']) && $_GET['tag'] == 'updateUS') {
  include_once('pages/admin/user/_user_update.php');
} else if (isset($_GET['tag']) && $_GET['tag'] == 'deleteUS') {
  include_once('pages/admin/user/_user_del.php');
} else if (isset($_GET['tag']) && $_GET['tag'] == 'createUS') {
  include_once('pages/admin/user/_user_add.php');
}
include_once('pages/admin/user/_user_show.php');

?>

<script src="js/_user.js"></script>
