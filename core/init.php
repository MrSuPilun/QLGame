<?php
error_reporting(E_ERROR | E_PARSE);
abstract class DBSQL
{
  private $host;
  private $user;
  private $password;
  private $name_database;
  private $connect;

  function __construct($host="", $user="", $pw="", $db="")
  {
    $this->host = $host;
    $this->user = $user;
    $this->password = $pw;
    $this->name_database = $db;
  }
  public function setNameDatabase($name_database)
  {
    $this->name_database = $name_database;
  }
  public function connectDB()
  {
    return $this->connect = new mysqli($this->host, $this->user, $this->password, $this->name_database);
  }

  public function getConnect()
  {
    return $this->connect;
  }

  function queryDB($str_query = "")
  {
    return mysqli_query($this->connect, $str_query);
  }

  function closeDB()
  {
    mysqli_close($this->connect);
  }
}

class QLGame extends DBSQL
{
  public function insertNhaPhatTrien($maNPT="", $tenNPT="")
  {
    $str_query = "INSERT INTO `NHA_PHAT_TRIEN`(`MA_NPT`, `TEN_NPT`) VALUES ('$maNPT', '$tenNPT')";
    return $this->queryDB($str_query);
  }
  public function insertGame($maGame="", $tenGame="",$maNPT="",$donGia="",$hinh="")
  {
    $str_query = "INSERT INTO `GAME`(`MA_GAME`, `TEN_GAME`, `MA_NPT`, `DON_GIA`, `HINH`) VALUES ('$maGame', '$tenGame','$maNPT','$donGia','$hinh')";
    return $this->queryDB($str_query);
  }
  public function insertUser($maUser="",$tenUser="",$sdt="",$email="",$diaChi="",$tenDN="",$matKhau="",$phanQuyen="")
  {
    $str_query = "INSERT INTO `USER`(`MA_USER`, `TEN_USER`, `SDT`, `EMAIL`, `DIA_CHI`, `TEN_DN`, `MAT_KHAU`, `PHAN_QUYEN`) VALUES ('$maUser','$tenUser','$sdt','$email','$diaChi','$tenDN','$matKhau','$phanQuyen')";
    return $this->queryDB($str_query);
  }
  public function insertHoaDon($maHD="",$maUser="",$ngayBan="",$triGia="")
  {
    $str_query = "INSERT INTO `HOA_DON`(`MA_HD`, `MA_USER`, `NGAY_BAN`, `TRI_GIA`) VALUES ('$maHD','$maUser','$ngayBan','$triGia')";
    return $this->queryDB($str_query);
  }
  public function insertCTHD($maHD="", $maGame="", $gia="", $soLuong="")
  {
    $str_query = "INSERT INTO `CTHD`(`MA_HD`, `MA_GAME`, `GIA`, `SO_LUONG`) VALUES ('$maHD', '$maGame', '$gia', '$soLuong')";
    return $this->queryDB($str_query);
  }
}

$qlgame = new QLGame("localhost", "root");

?>