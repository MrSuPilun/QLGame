<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
    }

    th {
      text-align: left;
    }

    td>input {
      width: 100%;
    }

    tr,
    th,
    td {
      border-bottom: none !important;
    }

    ul {

      list-style-type: none;
      overflow-y: scroll;
      height: 500px;
      width: 500px;
    }

    ul::-webkit-scrollbar {
      display: none;
    }

    li {
      height: 50px;
      width: 100%;
    }

    li>span {
      font-weight: bold;
      float: left;
    }

    /* MODAL */
    /* The Modal (background) */
    .modal {
      display: none;
      /* Hidden by default */
      position: fixed;
      /* Stay in place */
      z-index: 1;
      /* Sit on top */
      overflow: auto;
      width: 100%;
      height: 100%;
      background-color: rgb(0, 0, 0);
      /* Fallback color */
      background-color: rgba(0, 0, 0, 0.4);
      /* Black w/ opacity */
    }

    /* Modal Content/Box */
    .modal-content {
      width: 500px;
      background-color: #fefefe;
      margin: 10% auto;
      /* 15% from the top and centered */
      padding: 20px;
      border: 1px solid #888;
      /* Could be more or less, depending on screen size */

    }

    /* The Close Button */
    .close {
      position: absolute;
      right: 10px;
      top: 0;
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }
  </style>
</head>

<body>
  <?php
  session_start();
  if (!isset($_SESSION['DS']))
    $_SESSION['DS'] = array();
  $style_alert = '';
  $baihat = '';
  $xephang = '';
  $messenger = '';
  $str_kq = '';
  function sortXH(&$arr)
  {
    for ($i = 0; $i < count($arr) - 1; $i++) {
      for ($j = $i + 1; $j < count($arr); $j++) {
        if ($arr[$i][0] > $arr[$j][0]) {
          $t = $arr[$i];
          $arr[$i] = $arr[$j];
          $arr[$j] = $t;
        }
      }
    }
  }

  function hienThi($arr, &$str_kq, $mode = 0)
  {
    $arr1 = $arr;
    if ($mode == 1)
      sortXH($arr1);
    $str_kq = "";
    if (empty($arr[0][0])) {
      $str_kq = "<li class='shadow-sm p-3 mb-1 bg-white rounded'>Không có bài hát nào trong danh sách</li>";
      return;
    } else {
      foreach ($arr1 as $v) {
        $str_kq .= "<li class='shadow-sm p-3 mb-1 bg-white rounded'>";
        $str_kq .= "<span>$v[0]</span>";
        $str_kq .= $v[1];
        $str_kq .= "</li>";
      }
    }
  }

  function luuTruBH(&$arr, $xephang, $baihat, &$style_alert, &$messenger)
  {
    $arr[] = array($xephang, $baihat);
    $style_alert = 'alert-success show';
    $messenger = "Thêm bài hát <strong>$baihat</strong> xếp hạng thứ <strong>$xephang</strong> thành công !!!";
    $baihat = '';
    $xephang = '';
  }

  function kiemTraTrungLap($arr, $xh)
  {
    foreach ($arr as $a) {
      if (!empty($a[0])) {
        if ($a[0] === $xh) {
          return -1;
        }
      }
    }
    return 0;
  }

  hienThi($_SESSION['DS'], $str_kq);

  if (isset($_POST['xuly'])) {
    $baihat = $_POST['bh'];
    $xephang = $_POST['xh'];

    if ($baihat !== '' && is_numeric($xephang) && $xephang >= 0) {
      $kttl = kiemTraTrungLap($_SESSION['DS'], $xephang);
      if ($kttl == 0) {
        luuTruBH($_SESSION['DS'], $xephang, $baihat, $style_alert, $messenger);
        hienThi($_SESSION['DS'], $str_kq);
      } else {
        $style_alert = 'alert-danger show';
        $messenger = "Bài hát hoặc xếp hạng bị trùng lặp !!!";
      }
    } else {
      if ($baihat !== '') {
        $style_alert = 'alert-danger show';
        $messenger = 'Thông tin nhập vào sai, vui lòng kiểm tra lại';
      }
    }
  }

  if (isset($_POST['xuly2'])) {
    hienThi($_SESSION['DS'], $str_kq, 1);
  }
  if (isset($_POST['xuly3'])) {
    session_destroy();
    hienThi($_SESSION['DS'], $str_kq);
  }
  ?>
  <center>

    <div class="alert alert-success alert-dismissible fade <?php echo $style_alert ?>" role="alert" id="alert">
      <?php echo $messenger ?>
    </div>
    <form class="" method="post" id="form-bh">
      <div style="height: 40px; width: 500px; margin: auto; padding-left: 2rem; display: table;">
        <div style="display: table-cell;">
        <div id="myBtn" class="btn btn-primary">Thêm bài hát</div>
        </div>
        <div style="display: table-cell;">
        <button type="submit" name="xuly2" class="btn btn-warning">Sắp xếp danh sách</button>
        </div>
        <div style="display: table-cell;">
        <button type="submit" name="xuly3" class="btn btn-danger">Xóa danh sách</button>
        </div>
        
        
      </div>
      <ul>
        <?php echo $str_kq ?>
      </ul>
      <div id="myModal" class="modal">
        <div class="modal-content shadow-sm p-3 mb-5 bg-white rounded">
          <span class="close">&times;</span>
          <table class="table">
            <tbody>
              <tr>
                <td></td>
                <td style="text-align: center;">
                  <h4 style="margin-bottom: 20px;">Xếp hạng bài hát</h4>
                </td>
              </tr>
              <tr class="form-group">
                <td>
                  <label for="inp-bh" class="col-form-label">Tên bài hát: </label>
                </td>
                <td>
                  <input type="text" name="bh" class="form-control" id="inp-bh" value="<?php echo $baihat ?>">
                  <small class="form-text text-muted">Nhập vào tên bài hát</small>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="xh" class="col-form-label">Xếp hạng: </label>
                </td>
                <td>
                  <input type="text" name="xh" class="form-control" id="inp-xh" value="<?php echo $xephang ?>">
                  <small class="form-text text-muted">Nhập vào xếp hạng của bài bát</small>
                </td>
              </tr>
              <tr>
                <td></td>
                <td style="text-align: center;">
                  <button type="submit" name="xuly" class="btn btn-primary" style="margin-top: 20px;">Thêm bài hát</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </form>
  </center>
  <script>
    const alert = document.querySelector('#alert');
    const form_bh = document.querySelector('#form-bh');
    setTimeout(function() {
      alert.classList.remove('show');
    }, 3000);

    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    btn.onclick = function() {
      modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  </script>
</body>

</html>