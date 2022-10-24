<?php
error_reporting(E_ERROR | E_PARSE);
abstract class DBSQL
{
  private $connect;

  function __construct($host="", $user="", $pw="", $db="")
  {
    $this->setConnect($host, $user, $pw, $db);
  }
  public function setConnect($host, $user, $pw, $db)
  {
    $conn = new mysqli($host, $user, $pw, $db);
    if($conn->connect_errno) {
      return ("Connection failed: " . $conn->connect_error);
    }
    $this->connect = $conn;
    return ("Connection successfully");
  }

  function queryDB($str_query = "")
  {
    $result = mysqli_query($this->connect, $str_query);
    if (!$result) {
      return null;
    } else {
      return $result;
    }
  }
  function closeDB()
  {
    mysqli_close($this->connect);
  }
}

class QLGame extends DBSQL
{
  
}

$qlgame = new QLGame();

?>