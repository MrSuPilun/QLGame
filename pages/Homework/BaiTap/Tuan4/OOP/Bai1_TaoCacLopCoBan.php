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

    form {
      margin-top: 50px;
      width: 500px;
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
  <center>

    <form action="Bai1_KetQua.php" class="shadow-sm p-3 mb-5 bg-white rounded" method="post">
      <table class="table">
        <tbody>
          <tr>
            <td></td>
            <td style="text-align: center;">
              <h4 style="margin-bottom: 20px;" id="form-title">NHẬP THÔNG TIN SINH VIÊN</h4>
            </td>
          </tr>
          <tr class="form-group">
            <td>
              <label class="col-form-label">Nghề nghiêp: </label>
            </td>
            <td>
              <select name="nghenghiep" class="form-select" id="nghenghiep">
                <option value="sv" selected>Sinh viên</option>
                <option value="gv">Giáo viên</option>
              </select>
            </td>
          </tr>
          <tr class="form-group">
            <td>
              <label for="inp-hoten" class="col-form-label">Họ và Tên: </label>
            </td>
            <td>
              <input type="text" name="hoten" class="form-control" id="inp-hoten" value="Phạm Ngọc Ẩn">
              <small id="hotenHelp" class="form-text text-muted">Nhập vào họ tên</small>
            </td>
          </tr>
          <tr class="form-group">
            <td>
              <label for="inp-diachi" class="col-form-label">Địa chỉ: </label>
            </td>
            <td>
              <input type="text" name="diachi" class="form-control" id="inp-diachi" value="157/2/7 Nguyễn Thiện Thuật">
              <small id="diachiHelp" class="form-text text-muted">Nhập vào địa chỉ</small>
            </td>
          </tr>
          <tr class="form-group">
            <td>
              <label for="inp-gioitinh" class="col-form-label">Giới tính: </label>
            </td>
            <td>
              <input type="radio" name="gioitinh" id="inp-gioitinh1" value="Nam" checked>
              <label for="inp-gioitinh1" class="col-form-label">Nam</label>
              <input type="radio" name="gioitinh" id="inp-gioitinh2" value="Nữ">
              <label for="inp-gioitinh3" class="col-form-label">Nữ</label>
              <input type="radio" name="gioitinh" id="inp-gioitinh3" value="Khác">
              <label for="inp-gioitinh3" class="col-form-label">Khác</label>
            </td>
          </tr>
          <tr class="form-group" id="field-1">
            <td>
              <label for="inp-lophoc" class="col-form-label">Lớp học: </label>
            </td>
            <td>
              <input type="text" name="lophoc" class="form-control" id="inp-lophoc" value="61.CNTT-1">
              <small id="lophocHelp" class="form-text text-muted">Nhập vào lớp học</small>
            </td>
          </tr>
          <tr class="form-group" id="field-2">
            <td>
              <label for="inp-nganhhoc" class="col-form-label">Ngành học: </label>
            </td>
            <td>
              <input type="text" name="nganhhoc" class="form-control" id="inp-nganhhoc" value="CNTT">
              <small id="nganhhocHelp" class="form-text text-muted">Nhập vào ngành học</small>
            </td>
          </tr>
          <tr class="form-group" id="field-3" hidden>
            <td>
              <label for="inp-trinhdo" class="col-form-label">Trình độ: </label>
            </td>
            <td>
            <input type="radio" name="trinhdo" id="inp-trinhdo1" value="Cử nhân" checked>
              <label for="inp-trinhdo1" class="col-form-label">Cử nhân</label>
              <input type="radio" name="trinhdo" id="inp-trinhdo2" value="Thạc sĩ">
              <label for="inp-trinhdo3" class="col-form-label">Thạc sĩ</label>
              <input type="radio" name="trinhdo" id="inp-trinhdo3" value="Tiến sĩ">
              <label for="inp-trinhdo3" class="col-form-label">Tiến sĩ</label>
            </td>
          </tr>
          <tr class="form-group" id="field-4" hidden>
            <td>
              <label for="inp-luongcoban" class="col-form-label">Lương cơ bản: </label>
            </td>
            <td>
              <input type="text" name="luongcoban" class="form-control" id="inp-luongcoban" value="1500000" disabled>
            </td>
          </tr>
          <tr>
            <td></td>
            <td style="text-align: center;">
              <button type="submit" name="xuly" class="btn btn-primary" style="margin-top: 20px;">Xử Lý</button>
            </td>
          </tr>
        </tbody>
      </table>
    </form>
  </center>
  <script>
    const nghenghiep = document.querySelector('#nghenghiep');
    const form_title = document.querySelector('#form-title');
    const field_1 = document.querySelector('#field-1');
    const field_2 = document.querySelector('#field-2');
    const field_3 = document.querySelector('#field-3');
    const field_4 = document.querySelector('#field-4');
    nghenghiep.addEventListener("change", (e) => {
      if (nghenghiep.value === "sv") {
        form_title.innerHTML = "NHẬP THÔNG TIN SINH VIÊN";
        field_1.hidden = false;
        field_2.hidden = false;
        field_3.hidden = true;
        field_4.hidden = true;
      } else {
        form_title.innerHTML = "NHẬP THÔNG TIN GIÁO VIÊN";
        field_1.hidden = true;
        field_2.hidden = true;
        field_3.hidden = false;
        field_4.hidden = false;
      }
    })
  </script>
</body>

</html>