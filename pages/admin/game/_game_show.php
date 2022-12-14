<?php
$str = "";
// ----------------------------------------- Khoi tao cac bien phan trang
$rowsPerPage = 7;
if (!isset($_GET['page']))
  $_GET['page'] = 1;
$offset = ($_GET['page'] - 1) * $rowsPerPage;
// -----------------------------------------
$result = $qlgame->queryDB("SELECT * FROM GAME LIMIT $offset, $rowsPerPage");

if ($result) {
  if (mysqli_num_rows($result) != 0) {
    $stt = ($_GET['page'] - 1) * $rowsPerPage;
    $stt++;
    $id = '';
    while ($rows = mysqli_fetch_array($result)) {
      $id='';
      $str .= "<tr>";
      $str .= "<td><b>$stt</b></td>";
      for ($i = 0; $i < mysqli_num_fields($result); $i++) {
        switch ($i) {
          case 0:
            $str .= "<td>" . $rows[$i] . "</td>";
            $id = $rows[$i];
            break;
          case 2:
            $tenNPT = mysqli_fetch_array($qlgame->queryDB("SELECT TEN_NPT FROM NHA_PHAT_TRIEN WHERE MA_NPT = '$rows[$i]'"));
            $str .= "<td>" . $tenNPT['TEN_NPT'] . "</td>";
            break;
          case 4:
            $str .= "<td>" . "<img width='120' src='$rows[$i]'>" . "</td>";
            break;
          default:
            $str .= "<td>" . $rows[$i] . "</td>";
            break;
        }
      }
      $str .= "<td>
        <div class='form-button-action'>
          <a href='" . $_SERVER['PHP_SELF'] . "?tag=updateGame&id=$id&page=". $_GET['page'] ."'>
            <button type='button' data-toggle='tooltip' class='admin-btn-edit btn btn-link btn-simple-primary btn-lg' data-original-title='Edit Task'>
              <i class='fa fa-edit'></i>
            </button>
          </a>
          <a href='" . $_SERVER['PHP_SELF'] . "?tag=deleteGame&id=$id&page=". $_GET['page'] ."'>
            <button type='button' data-toggle='tooltip' title='' class='admin-btn-delete btn btn-link btn-simple-danger' data-original-title='Remove'>
              <i class='fa fa-times'></i>
            </button>
          </a>
        </div>
      </td>";
      $str .= "</tr>";
      $stt++;
    }
  }
}

echo "<a href='" . $_SERVER['PHP_SELF'] . "?tag=createGame&page=". $_GET['page'] ."'>Add Game<i class='fa-solid fa-user-plus ml-1'></i></a>";
?>

<table class="table table-bordered table-head-bg-info table-bordered-bd-info">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ID</th>
      <th scope="col">Game Name</th>
      <th scope="col">Developer</th>
      <th scope="col">Price</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php echo $str ?>
  </tbody>
</table>

<!-- PHAN TRANG -->
<nav>
  <ul class="pagination justify-content-center">
    <?php
    //------------------------------------------------------
    $re = $qlgame->queryDB("SELECT * FROM GAME");
    //t???ng s??? m???u tin c???n hi???n th???
    $rowsPerPages = mysqli_num_rows($re);
    //t???ng s??? trang
    $maxPage = floor($rowsPerPages / $rowsPerPage) + 1;
    //g???n th??m n??t Back
    if ($_GET['page'] > 1) {
      echo "<li class='page-item'><a class='page-link' href=" . $_SERVER['PHP_SELF'] . "?page=1><<</a></li>";
      echo "<li class='page-item'><a class='page-link' href=" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] - 1) . "><</a></li>";
    }
    if ($_GET['page'] > 1) {
    }
    for ($i = 1; $i <= $maxPage; $i++) //t???o link t????ng ???ng t???i c??c trang
    {
      if ($i == $_GET['page'])
        echo "<li class='page-item active'><a class='page-link'>Page" . $i . "</a></li>"; //trang hi???n t???i s??? ???????c b??i ?????m
      else
        echo "<li class='page-item'><a class='page-link' href="
          . $_SERVER['PHP_SELF'] . "?page=" . $i . ">Page" . $i . "</a></li>";
    }
    //g???n th??m n??t Next
    if ($_GET['page'] < $maxPage) {
      echo "<li class='page-item'><a class='page-link' href = " . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] + 1) . ">></a></li>";
      echo "<li class='page-item'><a class='page-link' href = " . $_SERVER['PHP_SELF'] . "?page=$maxPage>>></a></li>";
    }
    ?>
  </ul>
</nav>