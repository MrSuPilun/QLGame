<style>
  .img-responsive {
    width: 220px;
    height: 300px;
    object-fit: contain;
  }
</style>
<?php

if (isset($_GET['id']))
  $id = $_GET['id'];

$query = $qlbs->queryDB("
  SELECT * 
  FROM Sua INNER JOIN Loai_sua ON Sua.Ma_loai_sua = Loai_sua.Ma_loai_sua INNER JOIN Hang_sua ON Sua.Ma_hang_sua = Hang_sua.Ma_hang_sua
  WHERE Sua.Ma_sua LIKE '$id'
");
if ($row = mysqli_fetch_array($query)) {
  if (count($row) > 0) {
    echo "
      <div class='container' style='margin: 40px auto;'>
      <a id='btn-arrow-left' href='javascript:window.history.back(-1);'><i class='fa-solid fa-arrow-left-long'></i>Trở lại</a>
        <div class='row'>
          <div class='col-lg-3 col-md-3 col-sm-2'>
            <div class='white-box text-center'><img src='asset/Hinh_sua/" . $row['Hinh'] . "' class='img-responsive'></div>
          </div>
          <div class='col-lg-7 col-md-7 col-sm-6'>
            <h4 class='box-title mt-5'>" . $row['Ten_sua'] . "</h4>
            <b>Mô tả sản phẩm</b>
            <p>" . $row['Loi_ich'] . "</p>
            <b>Thành phần</b>
            <p>" . $row['TP_Dinh_Duong'] . "</p>
            <h2 class='mt-5'>" . formatMoney($row['Don_gia']) . " VNĐ</h2>
            <button class='btn btn-dark btn-rounded mr-1' data-toggle='tooltip' title=' data-original-title='Add to cart'>
              <i class='fa fa-shopping-cart'></i>
            </button>
            <button class='btn btn-primary btn-rounded'>Buy Now</button>
          </div>
        </div>
        <div class='col-lg-12 col-md-12 col-sm-12'>
        <h3 class='box-title mt-5'>Thông tin chi tiết</h3>
        <div class='table-responsive'>
            <table class='table table-striped table-product'>
                <tbody>
                    <tr>
                        <th width='390'>Loại sữa</th>
                        <td>" . $row['Ten_loai'] . "</td>
                    </tr>
                    <tr>
                        <th width='390'>Trọng lượng</th>
                        <td>" . $row['Trong_luong'] . " gram</td>
                    </tr>
                    <tr>
                        <th width='390'>Hãng sữa</th>
                        <td>" . $row['Ten_hang_sua'] . "</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
      </div>
    ";
  }
}
?>