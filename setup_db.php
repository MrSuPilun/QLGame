<?php
$p = 3;
$name_database = "QLGAME";
$page_title = 'Khởi tạo dữ liệu';
// Include database, session, general info
include_once('core/init.php');
// Include database, session, general info
include_once('includes/header.php');
echo "<div style='margin: 0 70px;'>";
// LAYOUT
$qlgame->setNameDatabase($name_database);
$qlgame->connectDB();
?>
<form method="get" style="margin: 50px auto; width: 500px;">
  <div class="form-group d-flex justify-content-between">
    <div class="form-check form-check-inline">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="action[]" value="createDB" checked> Create Database
      </label>
    </div>
    <div class="form-check form-check-inline">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="action[]" value="createTabel" checked> Create Table
      </label>
    </div>
    <div class="form-check form-check-inline">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="action[]" value="insertDB" checked> Insert Record
      </label>
    </div>
  </div>
  <div class="form-group d-flex justify-content-center mt-5">
    <button type="submit" class="btn btn-primary">Handle</button>
  </div>

</form>
<hr>
<?php
$listAction = array();
if (isset($_GET['action'])) {
  $listAction = $_GET['action'];
}
// CREATE DATABASE
if (!empty($listAction) && !empty($listAction[0])) {
  $result = $qlgame->queryDB("CREATE DATABASE IF NOT EXISTS " . $name_database);
  if ($result)
    echo "Database " . $name_database . " created successfully";
  else
    echo "Error creating database: " . mysqli_error($qlgame->getConnect());
  echo "<hr>";
  // SELECT DATABASE MỚI TẠO
  $qlgame->getConnect()->select_db($name_database);
}

if (!empty($listAction) && !empty($listAction[1])) {
  // CREATE TABLE
  include_once("pages/setup/_create_table.php");
  echo "<hr>";
}

if (!empty($listAction) && !empty($listAction[2])) {
  // INSERT USER
  include_once("pages/setup/_tb_user.php");

  // INSERT NHA PHAT TRIEN
  include_once("pages/setup/_tb_nph.php");

  // INSERT GAME
  include_once("pages/setup/_tb_game.php");

  // INSERT HOA_DON
  include_once("pages/setup/_tb_hoa_don.php");

  // INSERT CTHD
  include_once("pages/setup/_tb_cthd.php");
}


echo "</div>";

$qlgame->closeDB();
// Include footer
include_once('includes/footer.php');
