<?php
$p = 4;
$page_title = 'Hướng dẫn';
include_once('includes/header.php');
?>
<link rel="stylesheet" href="css/homework.css">
<link rel="stylesheet" href="css/tutorial.css">
<div class="row">
  <div class="col-12 col-md-2 col-xl-2 bd-sidebar">
    <?php include_once("pages/tutorial/sidebar.php") ?>
  </div>
  <main class="col-12 col-md-10 col-xl-10 bd-content">
    <iframe id="myiframe" name="myiframe" frameborder="0" src="pages/tutorial/_baitap.php">
    </iframe>
  </main>
  
</div>
<script src="js/homework.js"></script>
<?php
include_once('includes/footer.php');
?>