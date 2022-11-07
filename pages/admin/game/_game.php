<link rel="stylesheet" href="css/_user.css">

<?php

if (isset($_GET['tag']) && $_GET['tag'] == 'updateGame') {
  include_once('pages/admin/game/_game_update.php');
} else if (isset($_GET['tag']) && $_GET['tag'] == 'deleteGame') {
  include_once('pages/admin/game/_game_del.php');
} else if (isset($_GET['tag']) && $_GET['tag'] == 'createGame') {
  include_once('pages/admin/game/_game_add.php');
}
include_once('pages/admin/game/_game_show.php');

?>

<script src="js/_user.js"></script>