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

    .frac {
      display: inline-block;
      position: relative;
      vertical-align: middle;
      letter-spacing: 0.001em;
      text-align: center;
    }

    .frac>span {
      display: block;
      padding: 0.1em;
    }

    .frac span.bottom {
      border-top: thin solid black;
    }

    .frac span.symbol {
      display: none;
    }

    .ket-qua {
      border: 1px solid black !important;
    }

    ul,
    li {
      list-style: none;
      display: flex;
    }

    li {
      margin-left: 15px;
    }
  </style>
</head>

<body>
  <?php

  class PhanSo
  {
    public $a, $b;
    function __construct($a = 0, $b = 1)
    {
      if ($a == "")
        $a = 0;
      if ($b == "")
        $b = 0;
      $this->a = (int)$a;
      $this->b = (int)$b;
    }

    public function UCLN($a, $b): int
    {
      if ($a % $b != 0)
        return $this->UCLN($b, $a % $b);
      else
        return $b;
    }

    public function rutGonPhanSo(): PhanSo
    {
      if ($this->b == 0)
        return $this;
      if ($this->a == $this->b)
        return new PhanSo(1, 1);
      $c = $this->UCLN(abs($this->a), abs($this->b));
      if ($c == $this->b)
        return $this;
      return new PhanSo($this->a / $c, $this->b / $c);
    }

    public function Cong($a): PhanSo
    {
      $c = new PhanSo($this->a * $a->b + $a->a * $this->b, $this->b * $a->b);
      return $c->rutGonPhanSo();
    }

    public function Tru($x): PhanSo
    {
      $c = new PhanSo($this->a * $x->b - $x->a * $this->b, $this->b * $x->b);
      return $c->rutGonPhanSo();
    }

    public function Nhan($x): PhanSo
    {
      $c = new PhanSo($this->a * $x->a, $this->b * $x->b);
      return $c->rutGonPhanSo();
    }

    public function Chia($x): PhanSo
    {
      $c = new PhanSo($this->a * $x->b, $this->b * $x->a);
      return $c->rutGonPhanSo();
    }

    public function kiemTra(): bool
    {
      if ($this->b != 0)
        return true;
      return false;
    }

    public function Tinh($pt = "cong", $x): string
    {
      $dau = "+";
      $c = new PhanSo();
      switch ($pt) {
        case 'cong':
          $dau="+";
          $c = $this->Cong($x);
          break;
        case 'tru':
          $dau="-";
          $c = $this->Tru($x);
          break;
        case 'nhan':
          $dau="*";
          $c = $this->Nhan($x);
          break;
        case 'chia':
          $dau="/";
          $c = $this->Chia($x);
          break;
        default:
          return "Không Thể Thực Hiện Phép Tính Này";
      }
      if ($this->b == 0 || $x->b == 0)
        return "
        <div class='frac'>
        <span>{$this->a}</span><span class='symbol'>/</span><span class='bottom'>{$this->b}</span>
        </div>
         $dau 
        <div class='frac'>
          <span>{$x->a}</span><span class='symbol'>/</span><span class='bottom'>{$x->b}</span>
        </div>
        = ???
        ";
      return "
      <div class='frac'>
        <span>{$this->a}</span><span class='symbol'>/</span><span class='bottom'>{$this->b}</span>
      </div>
       $dau 
      <div class='frac'>
        <span>{$x->a}</span><span class='symbol'>/</span><span class='bottom'>{$x->b}</span>
      </div>
       = 
      <div class='frac'>
        <span>{$c->a}</span><span class='symbol'>/</span><span class='bottom'>{$c->b}</span>
      </div>
      ";
    }
  }

  $err = "";
  $pt = "cong";
  $soA = "";
  $soB = "";
  $soC = "";
  $soD = "";
  $kq = "";

  $errA = "";
  $errB = "";

  if (isset($_GET['xuly'])) {
    if (isset($_GET['soA']))
      $soA = $_GET['soA'];
    if (isset($_GET['soB']))
      $soB = $_GET['soB'];
    if (isset($_GET['soC']))
      $soC = $_GET['soC'];
    if (isset($_GET['soD']))
      $soD = $_GET['soD'];
    if (isset($_GET['phepTinh']))
      $pt = $_GET['phepTinh'];

    if ($soB == "0")
      $errA = "Mẫu khác 0";
    if ($soD == "0")
      $errB = "Mẫu khác 0";
    $a = new PhanSo($soA, $soB);
    $b = new PhanSo($soC, $soD);
    $kq = $a->Tinh($pt, $b);
  }

  ?>
  <center>

    <form class="shadow-sm p-3 mb-5 bg-white rounded" method="get">
      <table class="table">
        <tbody>
          <tr>
            <td></td>
            <td style="text-align: center;" colspan="3">
              <h4 style="margin-bottom: 20px;" id="form-title">Máy tính phân số</h4>
            </td>
          </tr>
          <tr class="form-group">
            <td class="form-row"><b>Phân số 1</b></td>
          </tr>
          <tr class="form-group">
            <td>
              <label for="inp-soA" class="col-form-label">Tử số</label>
            </td>
            <td>
              <input type="text" name="soA" class="form-control" id="inp-soA" value="<?php echo $soA ?>" style="width: 100px;">
            </td>
            <td>
              <label for="inp-soB" class="col-form-label">Mẫu số</label>
            </td>
            <td>
              <input type="text" name="soB" class="form-control" id="inp-soB" value="<?php echo $soB ?>" style="width: 100px;">
              <small class="form-text text-danger"><?= $errA ?></small>
            </td>
          </tr>
          <tr class="form-group">
            <td class="form-row"><b>Phân số 2</b></td>
          </tr>
          <tr class="form-group">
            <td>
              <label for="inp-soC" class="col-form-label">Tử số</label>
            </td>
            <td>
              <input type="text" name="soC" class="form-control" id="inp-soC" value="<?php echo $soC ?>" style="width: 100px;">
            </td>
            <td>
              <label for="inp-soD" class="col-form-label">Mẫu số</label>
            </td>
            <td>
              <input type="text" name="soD" class="form-control" id="inp-soD" value="<?php echo $soD ?>" style="width: 100px;">
              <small class="form-text text-danger"><?= $errB ?></small>
            </td>
          </tr>
          <tr class="form-group">
            <td colspan="4">
              <ul class="justify-content-between">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="phepTinh" value="cong" checked>
                      Cộng
                    </label>
                  </div>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="phepTinh" value="tru">
                      Trừ
                    </label>
                  </div>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="phepTinh" value="nhan">
                      Nhân
                    </label>
                  </div>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="phepTinh" value="chia">
                      Chia
                    </label>
                  </div>
                </li>
              </ul>
            </td>
          </tr>
          <tr>
            <td></td>
            <td style="text-align: center;" colspan="3">
              <button type="submit" name="xuly" class="btn btn-primary" style="margin-top: 20px;">Tính</button>
            </td>
          </tr>
          <tr class="form-group">
            <td>
              <label for="kq" class="col-form-label">Kết quả:</label>
            </td>
            <td class="text-center ket-qua" colspan="3">
              <?= $kq ?>
            </td>
          </tr>
        </tbody>
      </table>
    </form>
  </center>
</body>

</html>