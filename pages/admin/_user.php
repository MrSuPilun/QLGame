<link rel="stylesheet" href="css/_user.css">
<?php

$str = "";
// ----------------------------------------- Khoi tao cac bien phan trang
$rowsPerPage = 5;
if (!isset($_GET['page']))
  $_GET['page'] = 1;
$offset = ($_GET['page'] - 1) * $rowsPerPage;
// -----------------------------------------
$result = $qlgame->queryDB("SELECT * FROM USER LIMIT $offset, $rowsPerPage");

if ($result) {
  if (mysqli_num_rows($result) != 0) {
    $stt = ($_GET['page'] - 1) * $rowsPerPage;
    $stt++;
    while ($rows = mysqli_fetch_array($result)) {
      $str .= "<tr>";
      $str .= "<td><b>$stt</b></td>";
      for ($i = 0; $i < mysqli_num_fields($result); $i++) {
        switch ($i) {
          case 7:
            if ($rows[$i] == 2) {
              $str .= "<td><b style='color: #f25961;'>Admin</b></td>";
            } else if ($rows[$i] == 1) {
              $str .= "<td><b>Employee</b></td>";
            } else {
              $str .= "<td>User</td>";
            }
            break;
          default:
            $str .= "<td>" . $rows[$i] . "</td>";
            break;
        }
      }
      $str .= "<td>
        <div class='form-button-action'>
          <button type='button' data-toggle='tooltip' title='' class='admin-btn-edit btn btn-link btn-simple-primary btn-lg' data-original-title='Edit Task'>
            <i class='fa fa-edit'></i>
          </button>
          <button type='button' data-toggle='tooltip' title='' class='admin-btn-delete btn btn-link btn-simple-danger' data-original-title='Remove'>
            <i class='fa fa-times'></i>
          </button>
        </div>
      </td>";
      $str .= "</tr>";
      $stt++;
    }
  }
}
?>

<table class="table table-bordered table-head-bg-info table-bordered-bd-info">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ID</th>
      <th scope="col">User Name</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
      <th scope="col">Sign Name</th>
      <th scope="col">Password</th>
      <th scope="col">Auth</th>
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
    $re = $qlgame->queryDB("SELECT * FROM USER");
    //tổng số mẩu tin cần hiển thị
    $rowsPerPages = mysqli_num_rows($re);
    //tổng số trang
    $maxPage = floor($rowsPerPages / $rowsPerPage) + 1;
    //gắn thêm nút Back
    if ($_GET['page'] > 1) {
      echo "<li class='page-item'><a class='page-link' href=" . $_SERVER['PHP_SELF'] . "?page=1><<</a></li>";
      echo "<li class='page-item'><a class='page-link' href=" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] - 1) . "><</a></li>";
    }
    if ($_GET['page'] > 1) {
    }
    for ($i = 1; $i <= $maxPage; $i++) //tạo link tương ứng tới các trang
    {
      if ($i == $_GET['page'])
        echo "<li class='page-item active'><a class='page-link'>Trang" . $i . "</a></li>"; //trang hiện tại sẽ được bôi đậm
      else
        echo "<li class='page-item'><a class='page-link' href="
          . $_SERVER['PHP_SELF'] . "?page=" . $i . ">Trang" . $i . "</a></li>";
    }
    //gắn thêm nút Next
    if ($_GET['page'] < $maxPage) {
      echo "<li class='page-item'><a class='page-link' href = " . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] + 1) . ">></a></li>";
      echo "<li class='page-item'><a class='page-link' href = " . $_SERVER['PHP_SELF'] . "?page=$maxPage>>></a></li>";
    }
    ?>
  </ul>
</nav>