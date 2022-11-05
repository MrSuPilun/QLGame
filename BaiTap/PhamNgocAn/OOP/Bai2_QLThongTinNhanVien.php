<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewPOST" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <style>
    * {
      box-sizing: border-box;
      margin: 0;
    }

    form {
      margin-top: 50px;
      width: fit-content;
    }

    th {
      text-align: left;
    }

    td>input[type=text] {
      width: 100%;
    }

    tr,
    th,
    td {
      border-bottom: none !important;
    }
  </style>
</head>

<body>
  <?php
  abstract class NhanVien
  {
    const LUONGCOBAN = 10000;
    protected $hoTen; // họ tên
    protected $gioiTinh; // giới tính 
    protected $ngayVaoLam; // ngày vào làm
    protected $heSoLuong; // hệ số lương
    protected $soCon; // số con

    function __construct($hoTen, $gioiTinh, $ngayVaoLam, $heSoLuong, $soCon)
    {
      $this->hoTen = $hoTen;
      $this->gioiTinh = $gioiTinh;
      $this->ngayVaoLam = $ngayVaoLam;
      $this->heSoLuong = $heSoLuong;
      $this->soCon = $soCon;
    }

    /**
     * Get the value of soCon
     */
    public function getsoCon()
    {
      return $this->soCon;
    }

    /**
     * Get the value of heSoLuong
     */
    public function getheSoLuong()
    {
      return $this->heSoLuong;
    }

    /**
     * Get the value of ngayVaoLam
     */
    public function getngayVaoLam()
    {
      return $this->ngayVaoLam;
    }

    /**
     * Get the value of gioiTinh
     */
    public function getgioiTinh()
    {
      return $this->gioiTinh;
    }

    /**
     * Get the value of hoTen
     */
    public function gethoTen()
    {
      return $this->hoTen;
    }

    abstract public function TinhTienLuong(): int;
    abstract public function TinhTroCap(): int;
    public function TinhTienThuong(): int
    {
      return (date("Y") - date("Y", strtotime($this->ngayVaoLam))) * 1000000;
    }
  }

  class NhanVienVanPhong extends NhanVien
  {
    private $soNgayVan; // số ngày vắng
    private $dinhMucVang; // định mức vắng
    private $donGiaPhat; // đơn giá phạt

    function __construct($hoTen, $gioiTinh, $ngayVaoLam, $heSoLuong, $soCon, $soNgayVan, $dinhMucVang, $donGiaPhat)
    {
      parent::__construct($hoTen, $gioiTinh, $ngayVaoLam, $heSoLuong, $soCon);
      $this->soNgayVan = $soNgayVan;
      $this->dinhMucVang = $dinhMucVang;
      $this->donGiaPhat = $donGiaPhat;
    }

    /**
     * Get the value of soNgayVan
     */
    public function getSoNgayVan()
    {
      return $this->soNgayVan;
    }

    /**
     * Get the value of dinhMucVang
     */
    public function getDinhMucVang()
    {
      return $this->dinhMucVang;
    }

    /**
     * Get the value of donGiaPhat
     */
    public function getDonGiaPhat()
    {
      return $this->donGiaPhat;
    }

    public function TinhTienLuong(): int
    {
      return self::LUONGCOBAN * $this->heSoLuong - $this->TinhTienPhat();
    }
    public function TinhTroCap(): int
    {
      $troCap = ($this->gioiTinh == 0) ? (200000 * $this->soCon * 1.5) : (200000 * $this->soCon);
      return round($troCap);
    }
    public function TinhTienPhat(): int
    {
      return ($this->soNgayVan > $this->dinhMucVang) ? ($this->soNgayVan * $this->donGiaPhat) : 0;
    }
  }

  class NhanVienSanXuat extends NhanVien
  {
    private $soSanPham; // số sản phẩm
    private $dinhMucSanPham; // định mức sản phẩm
    private $donGiaSanPham; // đơn giá sản phẩm

    function __construct($hoTen, $gioiTinh, $ngayVaoLam, $heSoLuong, $soCon, $soSanPham, $dinhMucSanPham, $donGiaSanPham)
    {
      parent::__construct($hoTen, $gioiTinh, $ngayVaoLam, $heSoLuong, $soCon);
      $this->soSanPham = $soSanPham;
      $this->dinhMucSanPham = $dinhMucSanPham;
      $this->donGiaSanPham = $donGiaSanPham;
    }

    /**
     * Get the value of donGiaSanPham
     */
    public function getDonGiaSanPham()
    {
      return $this->donGiaSanPham;
    }

    /**
     * Get the value of dinhMucSanPham
     */
    public function getDinhMucSanPham()
    {
      return $this->dinhMucSanPham;
    }

    /**
     * Get the value of soSanPham
     */
    public function getSoSanPham()
    {
      return $this->soSanPham;
    }

    public function TinhTienLuong(): int
    {
      return ($this->soSanPham * $this->donGiaSanPham) + $this->TinhTienThuong();
    }

    public function TinhTroCap(): int
    {
      return $this->soCon * 120000;
    }

    public function TinhTienThuong(): int
    {
      $tienLuong = ($this->soSanPham > $this->dinhMucSanPham) ? ($this->soSanPham - $this->dinhMucSanPham) * $this->donGiaSanPham * 0.03 : 0;
      return round($tienLuong);
    }
  }

  if (isset($_POST['hoTen'])) {
    $hoTen = $_POST['hoTen'];
  } else {
    $hoTen = "Phạm Ngọc Ẩn";
  }

  if (isset($_POST['soCon'])) {
    $soCon = $_POST['soCon'];
  } else {
    $soCon = "2";
  }

  if (isset($_POST['ngayVaoLam'])) {
    $ngayVaoLam = $_POST['ngayVaoLam'];
  } else {
    $ngayVaoLam = "2001-03-16";
  }

  if (isset($_POST['heSoLuong'])) {
    $heSoLuong = $_POST['heSoLuong'];
  } else {
    $heSoLuong = "1.5";
  }

  if (isset($_POST['gioiTinh'])) {
    $gioiTinh = $_POST['gioiTinh'];
  } else {
    $gioiTinh = "Nam";
  }

  if (isset($_POST['loaiNV'])) {
    $loaiNV = $_POST['loaiNV'];
  } else {
    $loaiNV = "Văn phòng";
  }

  // NHÂN VIÊN VĂN PHÒNG

  if (isset($_POST['soNgayVang'])) {
    $soNgayVang = $_POST['soNgayVang'];
  } else {
    $soNgayVang = "4";
  }

  if (isset($_POST['dinhMucVang'])) {
    $dinhMucVang = $_POST['dinhMucVang'];
  } else {
    $dinhMucVang = "3";
  }

  if (isset($_POST['donGiaPhat'])) {
    $donGiaPhat = $_POST['donGiaPhat'];
  } else {
    $donGiaPhat = "1000";
  }

  // NHÂN VIÊN SẢN XUẤT

  if (isset($_POST['soSanPham'])) {
    $soSanPham = $_POST['soSanPham'];
  } else {
    $soSanPham = "100";
  }

  if (isset($_POST['dinhMucSanPham'])) {
    $dinhMucSanPham = $_POST['dinhMucSanPham'];
  } else {
    $dinhMucSanPham = "10";
  }

  if (isset($_POST['donGiaSanPham'])) {
    $donGiaSanPham = $_POST['donGiaSanPham'];
  } else {
    $donGiaSanPham = "100000";
  }

  function Checked($a = "Nam", $b)
  {
    return ($a == $b) ? "checked" : "";
  }
  // Xử lý
  $tienLuong = 0;
  $tienThuong = 0;
  $tienPhat = 0;
  $tienTroCap = 0;


  if (isset($_POST["xuly"]) && $loaiNV == "Văn phòng") {
    $nhanvien = new NhanVienVanPhong($hoTen, $gioiTinh, $ngayVaoLam, $heSoLuong, (int)$soCon, (int)$soNgayVang, (int)$dinhMucVang, (int)$donGiaPhat);
    $tienLuong = $nhanvien->TinhTienLuong();
    $tienTroCap = $nhanvien->TinhTroCap();
    $tienPhat = $nhanvien->TinhTienPhat();
    $tienThuong = $nhanvien->TinhTienThuong();
  } else {
    $nhanvien = new NhanVienSanXuat($hoTen, $gioiTinh, $ngayVaoLam, $heSoLuong, (int)$soCon, (int)$soSanPham, (int)$dinhMucSanPham, (int)$donGiaSanPham);
    $tienLuong = $nhanvien->TinhTienLuong();
    $tienTroCap = $nhanvien->TinhTroCap();
    $tienThuong = $nhanvien->TinhTienThuong();
  }

  ?>
  <center>

    <form id="formQLNV" class="shadow-sm p-3 mb-5 bg-white rounded" method="post">
      <table class="table">
        <tbody>
          <tr>
            <td></td>
            <td style="text-align: center;" colspan="3">
              <h4 style="margin-bottom: 20px;" id="form-title">QUẢN LÝ NHÂN VIÊN</h4>
            </td>
          </tr>
          <tr class="form-group">
            <td>
              <label for="inp-hoTen" class="col-form-label">Họ và Tên: </label>
            </td>
            <td>
              <input type="text" name="hoTen" class="form-control" id="inp-hoTen" value="<?php echo $hoTen ?>" style="width: 350px;">
              <small id="hoTenHelp" class="form-text text-muted">Nhập vào họ tên</small>
            </td>
            <td>
              <label for="inp-soCon" class="col-form-label">Số con: </label>
            </td>
            <td>
              <input type="number" name="soCon" class="form-control" id="inp-soCon" value="<?php echo $soCon ?>" style="width: 100px;">
              <small id="soConHelp" class="form-text text-muted">Nhập vào số con</small>
            </td>
          </tr>
          <tr class="form-group">
            <td>
              <label for="inp-ngayVaoLam" class="col-form-label">Ngày vào làm: </label>
            </td>
            <td>
              <input type="date" name="ngayVaoLam" class="form-control" id="inp-ngayVaoLam" style="width: 200px;" value="<?php echo $ngayVaoLam ?>">
              <small id="ngayVaoLamHelp" class="form-text text-muted">Nhập vào ngày vào làm</small>
            </td>
            <td>
              <label for="inp-heSoLuong" class="col-form-label">Hệ số lương: </label>
            </td>
            <td>
              <input type="text" name="heSoLuong" class="form-control" id="inp-heSoLuong" style="width: 100px;" value="<?php echo $heSoLuong ?>">
              <small id="heSoLuongHelp" class="form-text text-muted">Nhập vào hệ số lương</small>
            </td>
          </tr>
          <tr class="form-group">
            <td>
              <label for="inp-gioiTinh" class="col-form-label">Giới tính: </label>
            </td>
            <td>
              <input type="radio" name="gioiTinh" id="inp-gioiTinh1" value="Nam" <?php echo Checked($gioiTinh, "Nam") ?>>
              <label class="col-form-label" for="inp-gioiTinh1" style="margin-right: 10px;">Nam</label>
              <input type="radio" name="gioiTinh" id="inp-gioiTinh2" value="Nữ" <?php echo Checked($gioiTinh, "Nữ") ?>>
              <label class="col-form-label" for="inp-gioiTinh2" style="margin-right: 10px;">Nữ</label>
              <input type="radio" name="gioiTinh" id="inp-gioiTinh3" value="Khác" <?php echo Checked($gioiTinh, "Khác") ?>>
              <label class="col-form-label" for="inp-gioiTinh2" style="margin-right: 10px;" >Khác</label>
            </td>
            <td>
              <label class="col-form-label">Loại nhân viên: </label>
            </td>
            <td id="loaiNV">
              <input id="inp-loaiNV1" type="radio" name="loaiNV" value="Văn phòng" <?php echo Checked($loaiNV, "Văn phòng") ?>>
              <label class="col-form-label" for="inp-loaiNV1" style="margin-right: 10px;">Văn phòng</label>
              <input id="ipn-loaiNV2" type="radio" name="loaiNV" value="Sản xuất" <?php echo Checked($loaiNV, "Sản xuất") ?>>
              <label class="col-form-label" for="inp-loaiNV2" style="margin-right: 10px;">Sản xuất</label>
            </td>
          </tr>
          <div id="NVVP">
            <tr class="nvvp">
              <td>
                <label for="inp-soNgayVang" class="col-form-label">Số ngày vắng: </label>
              </td>
              <td>
                <input type="number" name="soNgayVang" class="form-control" id="inp-soNgayVang" style="width: 200px;" value="<?php echo $soNgayVang ?>">
              </td>
              <td>
                <label for="inp-dinhMucVang" class="col-form-label">Định mức vắng: </label>
              </td>
              <td>
                <input type="number" name="dinhMucVang" class="form-control" id="inp-dinhMucvang" style="width: 200px;" value="<?php echo $dinhMucVang ?>">
              </td>
            </tr>
            <tr class="nvvp">
              <td>
                <label for="inp-donGiaPhat" class="col-form-label">Đơn giá phạt: </label>
              </td>
              <td>
                <input type="number" name="donGiaPhat" class="form-control" id="inp-donGiaPhat" style="width: 200px;" value="<?php echo $donGiaPhat ?>">
              </td>
              <td></td>
              <td></td>
            </tr>
          </div>
          <div id="NVSX" hidden>
            <tr class="nvsx" hidden>
              <td>
                <label for="inp-soSanPham" class="col-form-label">Số sản phẩm: </label>
              </td>
              <td>
                <input type="number" name="soSanPham" class="form-control" id="inp-soSanPham" style="width: 200px;" value="<?php echo $soSanPham ?>">
              </td>
              <td>
                <label for="inp-dinhMucSanPham" class="col-form-label">Định mức sản phẩm: </label>
              </td>
              <td>
                <input type="number" name="dinhMucSanPham" class="form-control" id="inp-dinhMucSanPham" style="width: 200px;" value="<?php echo $dinhMucSanPham ?>">
              </td>
            </tr>
            <tr class="nvsx" hidden>
              <td>
                <label for="inp-donGiaSanPham" class="col-form-label">Đơn giá sản phẩm: </label>
              </td>
              <td>
                <input type="number" name="donGiaSanPham" class="form-control" id="inp-donGiaSanPham" style="width: 200px;" value="<?php echo $donGiaSanPham ?>">
              </td>
              <td></td>
              <td></td>
            </tr>
          </div>

          <tr>
            <td></td>
            <td style="text-align: center;" colspan="3">
              <button type="submit" name="xuly" class="btn btn-primary" style="margin-top: 20px;">Xử Lý</button>
            </td>
          </tr>

          <tr>
            <td>
              <label for="inp-tienLuong" class="col-form-label">Tiền lương: </label>
            </td>
            <td>
              <input type="number" name="tienLuong" class="form-control" id="inp-tienLuong" style="width: 200px;" value="<?php echo $tienLuong; ?>" disabled>
            </td>
            <td>
              <label for="inp-troCap" class="col-form-label">Trợ cấp: </label>
            </td>
            <td>
              <input type="number" name="troCap" class="form-control" id="inp-troCap" style="width: 200px;" value="<?php echo $tienTroCap; ?>" disabled>
            </td>
          </tr>
          <tr>
            <td>
              <label for="inp-tienThuong" class="col-form-label">Tiền thưởng: </label>
            </td>
            <td>
              <input type="number" name="tienThuong" class="form-control" id="inp-tienThuong" style="width: 200px;" value="<?php echo $tienThuong ?>" disabled>
            </td>
            <td>
              <label for="inp-tienPhat" class="col-form-label">Tiền phạt: </label>
            </td>
            <td>
              <input type="number" name="tienPhat" class="form-control" id="inp-tienPhat" style="width: 200px;" value="<?php echo $tienPhat ?>" disabled>
            </td>
          </tr>
        </tbody>
      </table>
    </form>
  </center>
  <script>
    const selectNV = document.querySelector("#loaiNV");
    const nvvp = document.getElementsByClassName('nvvp');
    const nvsx = document.getElementsByClassName('nvsx');
    const inp_tienLuong = document.getElementById('inp-tienLuong');
    const inp_tienTroCap = document.getElementById('inp-troCap');
    const inp_tienThuong = document.getElementById('inp-tienThuong');
    const inp_tienPhat = document.getElementById('inp-tienPhat');

    selectNV.addEventListener("change", e => {
      let loaiNV = document.querySelector('input[name="loaiNV"]:checked').value;
      inp_tienLuong.value = "";
      inp_tienTroCap.value = "";
      inp_tienThuong.value = "";
      inp_tienPhat.value = "";

      if (loaiNV === "Văn phòng") {
        for (let i = 0; i < nvvp.length; i++) {
          const element = nvvp[i];
          element.hidden = false;
        }
        for (let i = 0; i < nvsx.length; i++) {
          const element = nvsx[i];
          element.hidden = true;
        }
      } else {
        for (let i = 0; i < nvvp.length; i++) {
          const element = nvvp[i];
          element.hidden = true;
        }
        for (let i = 0; i < nvsx.length; i++) {
          const element = nvsx[i];
          element.hidden = false;
        }
      }
    })
  </script>
</body>

</html>