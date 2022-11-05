<!-- Image and text -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">
    <img src="asset/logo.svg" width="30" height="30" class="d-inline-block align-top" alt="">
    QUẢN LÝ BÁN SỮA
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item <?php echo activeTab($tabIndex, 0) ?>">
        <a class="nav-link" href="index.php">Trang chủ</span></a>
      </li>
      <li class="nav-item <?php echo activeTab($tabIndex, 2) ?>">
        <a class="nav-link" href="khach_hang.php">Thông tin khách hàng</a>
      </li>
      <li class="nav-item <?php echo activeTab($tabIndex, 3) ?>">
        <a class="nav-link" href="hang_sua.php">Thông tin hãng sữa</a>
      </li>
      <li class="nav-item <?php echo activeTab($tabIndex, 1) ?>">
        <a class="nav-link" href="san_pham.php">Thêm sản phẩm</span></a>
      </li>
    </ul>

</nav>

<?php
$queryHS = $qlbs->queryDB("SELECT * FROM HANG_SUA");
$queryLS = $qlbs->queryDB("SELECT * FROM LOAI_SUA");

function optionTable($query, $key, $value)
{
  $str_kq = "";
  if ($query) {
    $str_kq .= "<option value='' selected>Lựa chọn</option>";
    while ($row = mysqli_fetch_array($query)) {
      if (!is_null($row[$key]) && !is_null($row[$value])) {
          $str_kq .= "<option value='$row[$key]'>$row[$value]</option>";
      }
    }
  }
  return $str_kq;
}

if ($tabIndex == 0 && !isset($_GET['id'])) {
  echo "
    <nav class='navbar navbar-expand-lg navbar-light bg-light'>
      <form class='form-inline my-2 my-lg-0' method='GET'>
        <label class='label-nav' for='loaiSua'>Loại sữa</label>
        <select id='loaiSua' name='loaiSua' class='custom-select' style='width: 200px'>
          " . optionTable($queryLS, 'Ma_loai_sua', 'Ten_loai') . "
        </select>
        <label class='label-nav' for='hangSua'>Hãng sữa</label>
        <select id='hangSua' name='hangSua' class='custom-select' style='width: 200px'>
          " . optionTable($queryHS, 'Ma_hang_sua', 'Ten_hang_sua') . "
        </select>
        <label class='label-nav' for='tenSua'>Tên sữa</label>
        <input id='tensua' class='form-control mr-sm-2' type='search' name='tenSua' placeholder='Search' aria-label='Search'>
        <button class='btn btn-outline-success my-2 my-sm-0' type='submit'>Search</button>
      </form>
    </nav>
  ";
}
?>