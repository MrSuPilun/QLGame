<?php
$p = 3;
$name_database = "QLGAME";
$page_title = 'Khởi tạo dữ liệu';
// Include database, session, general info
include_once('core/init.php');
// Include database, session, general info
include_once('includes/header.php');

// LAYOUT
$qlgame->setNameDatabase($name_database);
$qlgame->connectDB();

// CREATE DATABASE
$result = $qlgame->queryDB("CREATE DATABASE IF NOT EXISTS " . $name_database);
if ($result)
  echo "Database " . $name_database . " created successfully";
else
  echo "Error creating database: " . mysqli_error($qlgame->getConnect());

// SELECT DATABASE MỚI TẠO
$qlgame->getConnect()->select_db($name_database);

// CREATE TABLE
include_once("pages/setup/_create_table.php");

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

$qlgame->closeDB();
// Include footer
include_once('includes/footer.php');
