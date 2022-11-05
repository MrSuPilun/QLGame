<style>
  .card {
    margin-bottom: 40px;
  }

  .card-img-top {
    width: 100%;
    height: 200px;
    object-fit: contain;
    padding: 5px;
  }

  .card-title {
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    text-overflow: ellipsis;
  }
</style>

<?php
$rowsPerPage = 12;


// SEARCH
$loaiSua = "";
$hangSua = "";
$tenSua = "";
if (isset($_GET['loaiSua']))
  $loaiSua = $_GET['loaiSua'];
if (isset($_GET['hangSua']))
  $hangSua = $_GET['hangSua'];
if (isset($_GET['tenSua']))
  $tenSua = $_GET['tenSua'];

if (!isset($_GET['page']))
  $_GET['page'] = 1;
$offset = ($_GET['page'] - 1) * $rowsPerPage;

$str_search = formatQuerySearch($loaiSua, $hangSua, $tenSua);
$str_query_limit = "SELECT * FROM SUA LIMIT $offset, $rowsPerPage";
$str_query = "SELECT * FROM SUA";
if ($str_search != "") {
  $str_query_limit = "
  SELECT * 
  FROM Sua INNER JOIN Loai_sua ON Sua.Ma_loai_sua = Loai_sua.Ma_loai_sua INNER JOIN Hang_sua ON Sua.Ma_hang_sua = Hang_sua.Ma_hang_sua
  WHERE $str_search
  LIMIT $offset, $rowsPerPage
  ";
  $str_query = "
  SELECT * 
  FROM Sua INNER JOIN Loai_sua ON Sua.Ma_loai_sua = Loai_sua.Ma_loai_sua INNER JOIN Hang_sua ON Sua.Ma_hang_sua = Hang_sua.Ma_hang_sua
  WHERE $str_search
  ";
}

$query = $qlbs->queryDB($str_query_limit);
$str_kq = "";

if ($query) {
  while ($row = mysqli_fetch_array($query)) {
    $str_kq .= "
      <div class='col-md-3'>
        <div class='card' style='width: 100%;'>
          <img class='card-img-top' src='asset/Hinh_sua/" . $row['Hinh'] . "' alt='" . $row['Ten_sua'] . ".png'>
          <div class='card-body'>
            <a title='{$row['Ten_sua']}' href='" . $_SERVER['PHP_SELF'] . "?id=" . $row['Ma_sua'] . "' class='card-title'>" . $row['Ten_sua'] . "</a>
            <p class='card-text'>" . $row['Trong_luong'] . " gr - " . formatMoney($row['Don_gia']) . " VNĐ</p>
          </div>
        </div>
      </div>
    ";
  }
}

?>

<div style="margin: 40px;">
  <div class="row">
    <?= $str_kq ?>
  </div>
</div>

<nav aria-label="Page navigation example ">
  <ul class="pagination justify-content-center">
    <?php
    //------------------------------------------------------
    $re = $qlbs->queryDB($str_query);
    //tổng số mẩu tin cần hiển thị
    $rowsPerPages = mysqli_num_rows($re);
    //tổng số trang
    $maxPage = floor($rowsPerPages / $rowsPerPage) + 1;

    if ($maxPage > 1) {
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
    }
    ?>
  </ul>
</nav>