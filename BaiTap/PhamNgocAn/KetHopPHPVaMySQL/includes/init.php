<!-- OBJECT -->
<?php
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

class QLBANSUA extends DBSQL
{

}


$qlbs = new QLBANSUA('localhost', 'root', '', 'qlbansua');
?>
<!-- FUNCTION -->
<?php
function activeTab($a, $b)
{
  return $a === $b ? "active" : "";
}

function formatMoney($number, $fractional = false)
{
  if ($fractional) {
    $number = sprintf('%.2f', $number);
  }
  while (true) {
    $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1.$2', $number);
    if ($replaced != $number) {
      $number = $replaced;
    } else {
      break;
    }
  }
  return $number;
}

function formatQuerySearch($maLS="", $maHS="", $tenSua="")
{
  $arr = array();
  if($maLS != "") {
    $arr[] = "Loai_sua.Ma_loai_sua = '$maLS'";
  }
  if($maHS != "") {
    $arr[] = "Hang_sua.Ma_hang_sua = '$maHS'";
  }
  if($tenSua != "") {
    $arr[] = "Sua.Ten_sua LIKE '%$tenSua%'";
  }
  return implode(" AND ", $arr);
}
?>
