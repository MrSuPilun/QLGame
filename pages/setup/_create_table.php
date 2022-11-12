<?php
// CREATE TABLE NHA_PHATTRIEN
$result = $qlgame->queryDB("
  CREATE TABLE IF NOT EXISTS `NHA_PHAT_TRIEN` (
    MA_NPT VARCHAR(8) COLLATE utf8_general_ci NOT NULL PRIMARY KEY,
    TEN_NPT VARCHAR(50) COLLATE utf8_general_ci NOT NULL
  )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
");
echo "<br>";
if ($result)
  echo "Table NHA_PHAT_TRIEN created successfully";
else
  echo "Error creating table NHA_PHAT_TRIEN: " . mysqli_error($qlgame->getConnect());

// CREATE TABLE GAME
$result = $qlgame->queryDB("
  CREATE TABLE IF NOT EXISTS `GAME` (
    `MA_GAME` VARCHAR(8) COLLATE utf8_general_ci NOT NULL PRIMARY KEY,
    `TEN_GAME` VARCHAR(100) COLLATE utf8_general_ci NOT NULL,
    `MA_NPT` VARCHAR(8) COLLATE utf8_general_ci NOT NULL,
    `DON_GIA` INT(11) NOT NULL,
    `HINH` VARCHAR(200) COLLATE utf8_general_ci NOT NULL,
    CONSTRAINT `GAME_IBFK_1` FOREIGN KEY (`MA_NPT`) REFERENCES `NHA_PHAT_TRIEN`(`MA_NPT`) ON DELETE CASCADE
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
");
echo "<br>";
if ($result)
  echo "Table GAME created successfully";
else
  echo "Error creating table GAME: " . mysqli_error($qlgame->getConnect());

// CREATE TABLE USER
$result = $qlgame->queryDB("
  CREATE TABLE IF NOT EXISTS `USER` (
    `MA_USER` VARCHAR(8) COLLATE utf8_general_ci NOT NULL PRIMARY KEY,
    `TEN_USER` VARCHAR(100) COLLATE utf8_general_ci NOT NULL,
    `SDT` VARCHAR(12) COLLATE utf8_general_ci NOT NULL,
    `EMAIL` VARCHAR(100) COLLATE utf8_general_ci NOT NULL,
    `DIA_CHI` VARCHAR(200) COLLATE utf8_general_ci NOT NULL,
    `TEN_DN` VARCHAR(50) COLLATE utf8_general_ci NOT NULL,
    `MAT_KHAU` VARCHAR(28) COLLATE utf8_general_ci NOT NULL,
    `PHAN_QUYEN` VARCHAR(1) COLLATE utf8_general_ci NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
");
echo "<br>";
if ($result)
  echo "Table USER created successfully";
else
  echo "Error creating table USER: " . mysqli_error($qlgame->getConnect());

// CREATE TABLE HOA_DON
$result = $qlgame->queryDB("
  CREATE TABLE IF NOT EXISTS `HOA_DON` (
    `MA_HD` VARCHAR(8) COLLATE utf8_general_ci NOT NULL PRIMARY KEY,
    `MA_USER` VARCHAR(8) COLLATE utf8_general_ci NOT NULL,
    `NGAY_BAN` DATE NOT NULL,
    `TRI_GIA` INT(11) NOT NULL,
    CONSTRAINT `HD_IBFK_1` FOREIGN KEY (`MA_USER`) REFERENCES `USER`(`MA_USER`) ON DELETE CASCADE
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
");
echo "<br>";
if ($result)
  echo "Table HOA_DON created successfully";
else
  echo "Error creating table HOA_DON: " . mysqli_error($qlgame->getConnect());


// CREATE TABLE CTHD
$result = $qlgame->queryDB("
  CREATE TABLE IF NOT EXISTS `CTHD` (
    `MA_HD` VARCHAR(8) COLLATE utf8_general_ci NOT NULL,
    `MA_GAME` VARCHAR(8) COLLATE utf8_general_ci NOT NULL,
    `GIA` INT(11) NOT NULL,
    `SO_LUONG` INT(11) NOT NULL,
    PRIMARY KEY(`MA_HD`,`MA_GAME`),
    CONSTRAINT `CTHD_IBFK_1` FOREIGN KEY (`MA_HD`) REFERENCES `HOA_DON`(`MA_HD`) ON DELETE CASCADE,
    CONSTRAINT `CTHD_IBFK_2` FOREIGN KEY (`MA_GAME`) REFERENCES `GAME`(`MA_GAME`) ON DELETE CASCADE
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
");
echo "<br>";
if ($result)
  echo "Table CTHD created successfully";
else
  echo "Error creating table CTHD: " . mysqli_error($qlgame->getConnect());
?>
