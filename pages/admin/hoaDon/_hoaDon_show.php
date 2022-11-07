<?php
$str = "";
// ----------------------------------------- Khoi tao cac bien phan trang
$rowsPerPage = 7;
if (!isset($_GET['page']))
  $_GET['page'] = 1;
$offset = ($_GET['page'] - 1) * $rowsPerPage;
// -----------------------------------------
$result = $qlgame->queryDB("SELECT * FROM HOA_DON LIMIT $offset, $rowsPerPage");

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
          default:
            $str .= "<td>" . $rows[$i] . "</td>";
            break;
        }
      }
      $str .= "<td>
        <div class='form-button-action'>
          <a href='" . $_SERVER['PHP_SELF'] . "?tag=deleteHD&id=$id&page=". $_GET['page'] ."'>
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
?>

<table class="table table-bordered table-head-bg-info table-bordered-bd-info">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ID</th>
      <th scope="col">ID User</th>
      <th scope="col">Date</th>
      <th scope="col">Value</th>
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
        echo "<li class='page-item active'><a class='page-link'>Page" . $i . "</a></li>"; //trang hiện tại sẽ được bôi đậm
      else
        echo "<li class='page-item'><a class='page-link' href="
          . $_SERVER['PHP_SELF'] . "?page=" . $i . ">Page" . $i . "</a></li>";
    }
    //gắn thêm nút Next
    if ($_GET['page'] < $maxPage) {
      echo "<li class='page-item'><a class='page-link' href = " . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] + 1) . ">></a></li>";
      echo "<li class='page-item'><a class='page-link' href = " . $_SERVER['PHP_SELF'] . "?page=$maxPage>>></a></li>";
    }
    ?>
  </ul>
</nav>
