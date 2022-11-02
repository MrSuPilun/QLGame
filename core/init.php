<?php
// error_reporting(E_ERROR | E_PARSE);
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

  public function isConnect()
  {
    return $this->connect->connect_errno;
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
  public function searchDB($fields='*', $table='', $fieldSearch='', $search_value='')
  {
    $str = "SELECT $fields FROM $table";
    if($search_value == "")
      return $this->queryDB($str);
    return $this->queryDB("$str WHERE $fieldSearch LIKE '%$search_value%'");
  }

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

  public function layMaUser()
  {
    $lastRow = $this->queryDB("SELECT MA_USER FROM USER ORDER BY MA_USER DESC LIMIT 1");
    $last =  implode(mysqli_fetch_array($lastRow));
    $maMax = substr($last, 2, 3);
    $maUS = (int)$maMax + 1;
    return "US0" . $maUS;
  }

  public function dangNhapUser($tenDN, $matKhau)
  {
    if (!$tenDN || !$matKhau) {
      return "Please enter full sign in name and password.";
    }
  
    $query = $this->queryDB("SELECT TEN_DN, MAT_KHAU, EMAIL, PHAN_QUYEN FROM user WHERE TEN_DN='$tenDN'");
    if (mysqli_num_rows($query) == 0) {
      return "Sign in name not exist. Please check again.";
    }
  
    $row = mysqli_fetch_array($query);
    if ($matKhau != $row['MAT_KHAU']) {
      return "Password incorrect. Please re-enter.";
    }

    return $row;
  }

  public function dangKyUser($tenUser="",$sdt="",$email="",$diaChi="",$tenDN="",$matKhau="", $xNMK="",$phanQuyen="")
  {
    if (!$tenDN || !$matKhau || !$tenUser || !$sdt || !$sdt || !$diaChi) {
      return "Please enter full information.";
    }
  
    if (mysqli_num_rows($this->queryDB("SELECT TEN_DN FROM USER WHERE TEN_DN='$tenDN'")) > 0) {
      return "Sign In name already exist. Please enter another Sign In name.";
    }
  
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return "Email incorrect. Please enter another Email.";
    }
  
    if (!preg_match("/^\\+?[0-9][0-9]{7,12}$/", $sdt)) {
      return "Phone number incorrect. Please enter another phone number.";
    }
  
    if (mysqli_num_rows($this->queryDB("SELECT EMAIL FROM USER WHERE EMAIL='$email'")) > 0) {
      return "Email already exist. Please enter another Email. ";
    }
  
    if ($matKhau != $xNMK) {
      return "Re-type password incorrect.";
    }
  
    $maUS = $this->LayMaUser();
    @$addUser = $this->insertUser($maUS, $tenUser, $sdt, $email, $diaChi, $tenDN, $matKhau, $phanQuyen);
  
    if ($addUser) {
      return "Success";
    } else {
      return "Don't have an account?";
    }
  }
}

$qlgame = new QLGame("localhost", "root", "", "qlgame");

?>