<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
    }

    .card {
      margin-top: 100px;
    }

    .card-body>p {
      text-align: left;
    }
  </style>
</head>

<body>
  <?php
  class People
  {
    private $hoten;
    private $diachi;
    private $gioitinh;
    function __construct($hoten = "", $diachi = "", $gioitinh = "")
    {
      $this->hoten = $hoten;
      $this->diachi = $diachi;
      $this->gioitinh = $gioitinh;
    }
  }

  class Student extends People
  {
    private $lopHoc;
    private $nganh;
    function __construct($hoten = "", $diachi = "", $gioitinh = "", $lopHoc = "", $nganh = "")
    {
      $this->hoten = $hoten;
      $this->diachi = $diachi;
      $this->gioitinh = $gioitinh;
      $this->lopHoc = $lopHoc;
      $this->nganh = $nganh;
    }
    public function diemCong()
    {
      switch ($this->nganh) {
        case 'CNTT':
          return 1;
        case 'Kinh tế':
          return 1.5;
        default:
          return 0;
      }
    }

    /**
     * Get the value of hoten
     */
    public function getHoten()
    {
      return $this->hoten;
    }

    /**
     * Set the value of hoten
     *
     * @return  self
     */
    public function setHoten($hoten)
    {
      $this->hoten = $hoten;

      return $this;
    }

    /**
     * Get the value of diachi
     */
    public function getDiachi()
    {
      return $this->diachi;
    }

    /**
     * Set the value of diachi
     *
     * @return  self
     */
    public function setDiachi($diachi)
    {
      $this->diachi = $diachi;

      return $this;
    }

    /**
     * Get the value of gioitinh
     */
    public function getGioitinh()
    {
      return $this->gioitinh;
    }

    /**
     * Set the value of gioitinh
     *
     * @return  self
     */
    public function setGioitinh($gioitinh)
    {
      $this->gioitinh = $gioitinh;

      return $this;
    }

    /**
     * Get the value of lopHoc
     */
    public function getLopHoc()
    {
      return $this->lopHoc;
    }

    /**
     * Set the value of lopHoc
     *
     * @return  self
     */
    public function setLopHoc($lopHoc)
    {
      $this->lopHoc = $lopHoc;

      return $this;
    }

    /**
     * Get the value of nganh
     */
    public function getNganh()
    {
      return $this->nganh;
    }

    /**
     * Set the value of nganh
     *
     * @return  self
     */
    public function setNganh($nganh)
    {
      $this->nganh = $nganh;

      return $this;
    }
  }

  class Teacher extends People
  {
    private $trinhdo;
    const LUONGCOBAN = 1500000;
    function __construct($hoten = "", $diachi = "", $gioitinh = "", $trinhdo = "")
    {
      $this->hoten = $hoten;
      $this->diachi = $diachi;
      $this->gioitinh = $gioitinh;
      $this->trinhdo = $trinhdo;
    }

    public function tinhLuong()
    {
      switch ($this->trinhdo) {
        case 'Cử nhân':
          return self::LUONGCOBAN * 2.34;
        case 'Thạc sĩ':
          return self::LUONGCOBAN * 3.67;
        case 'Tiến sĩ':
          return self::LUONGCOBAN * 5.66;
        default:
          return self::LUONGCOBAN;
      }
    }
    /**
     * Get the value of hoten
     */
    public function getHoten()
    {
      return $this->hoten;
    }

    /**
     * Set the value of hoten
     *
     * @return  self
     */
    public function setHoten($hoten)
    {
      $this->hoten = $hoten;

      return $this;
    }

    /**
     * Get the value of diachi
     */
    public function getDiachi()
    {
      return $this->diachi;
    }

    /**
     * Set the value of diachi
     *
     * @return  self
     */
    public function setDiachi($diachi)
    {
      $this->diachi = $diachi;

      return $this;
    }

    /**
     * Get the value of gioitinh
     */
    public function getGioitinh()
    {
      return $this->gioitinh;
    }

    /**
     * Set the value of gioitinh
     *
     * @return  self
     */
    public function setGioitinh($gioitinh)
    {
      $this->gioitinh = $gioitinh;

      return $this;
    }

    /**
     * Get the value of trinhdo
     */
    public function getTrinhdo()
    {
      return $this->trinhdo;
    }

    /**
     * Set the value of trinhdo
     *
     * @return  self
     */
    public function setTrinhdo($trinhdo)
    {
      $this->trinhdo = $trinhdo;

      return $this;
    }
  }

  if (isset($_POST['xuly'])) {
    if (isset($_POST['hoten']))
      $hoten = $_POST['hoten'];
    else
      $hoten = "";

    if (isset($_POST['diachi']))
      $diachi = $_POST['diachi'];
    else
      $diachi = "";

    if (isset($_POST['gioitinh']))
      $gioitinh = $_POST['gioitinh'];
    else
      $gioitinh = "";

    if (isset($_POST['nghenghiep'])) {
      $nghenghiep = 'Sinh Viên';
      if ($_POST['nghenghiep'] === 'gv')
        $nghenghiep = 'Giáo Viên';
    } else
      $nghenghiep = 'Sinh Viên';

    $str_kq = "";
    if ($nghenghiep === 'Sinh Viên') {
      if (isset($_POST['lophoc']))
        $lophoc = $_POST['lophoc'];
      else
        $lophoc = "";
      if (isset($_POST['nganhhoc']))
        $nganhhoc = $_POST['nganhhoc'];
      else
        $nganhhoc = "";
      $sv = new Student($hoten, $diachi, $gioitinh, $lophoc, $nganhhoc);
      $str_kq .= "<h5 class='card-title'>". $sv->getHoten() . "</h5>";
      $str_kq .= "<p class='card-text'><b>Nghề nghiệp: </b>". $nghenghiep . "</p>";
      $str_kq .= "<p class='card-text'><b>Địa chỉ: </b>" . $sv->getDiachi() . "</p>";
      $str_kq .= "<p class='card-text'><b>Giới tính: </b>" . $sv->getGioitinh() . "</p>";
      $str_kq .= "<p class='card-text'><b>Lớp học: </b>" . $sv->getLopHoc() . "</p>";
      $str_kq .= "<p class='card-text'><b>Ngành học: </b>" . $sv->getNganh() . "</p>";
      $str_kq .= "<p class='card-text'><b>Điểm thưởng: </b>" . $sv->diemCong() . "</p>";
    } else {
      if (isset($_POST['trinhdo']))
        $trinhdo = $_POST['trinhdo'];
      else
        $trinhdo = "";
      $gv = new Teacher($hoten, $diachi, $gioitinh, $trinhdo);
      $str_kq .= "<h5 class='card-title'>". $gv->getHoten() . "</h5>";
      $str_kq .= "<p class='card-text'><b>Nghề nghiệp: </b>". $nghenghiep . "</p>";
      $str_kq .= "<p class='card-text'><b>Địa chỉ: </b>" . $gv->getDiachi() . "</p>";
      $str_kq .= "<p class='card-text'><b>Giới tính: </b>" . $gv->getGioitinh() . "</p>";
      $str_kq .= "<p class='card-text'><b>Trình độ: </b>" . $gv->getTrinhdo() . "</p>";
      $str_kq .= "<p class='card-text'><b>Lương: </b>" . $gv->tinhLuong() . "</p>";
    }
  }
  ?>
  <center>
    <div class="card" style="width: 18rem;">
      <img src="https://gooova.com/wp-content/uploads/2021/03/cheems.png" class="card-img-top" alt="...">
      <div class="card-body">
        <?php echo $str_kq ?>
        <a href="javascript:window.history.back(-1);" class="btn btn-primary">Trở lại</a>
      </div>
    </div>
  </center>
</body>

</html>