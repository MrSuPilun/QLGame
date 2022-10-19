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
  <center>

    <form action="Bai1_KetQua.php" class="shadow-sm p-3 mb-5 bg-white rounded" method="post">
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
              <label for="inp-hoten" class="col-form-label">Họ và Tên: </label>
            </td>
            <td>
              <input type="text" name="hoten" class="form-control" id="inp-hoten" value="Phạm Ngọc Ẩn" style="width: 350px;">
              <small id="hotenHelp" class="form-text text-muted">Nhập vào họ tên</small>
            </td>
            <td>
              <label for="inp-socon" class="col-form-label">Số con: </label>
            </td>
            <td>
              <input type="number" name="socon" class="form-control" id="inp-socon" value="2" style="width: 100px;">
              <small id="soconHelp" class="form-text text-muted">Nhập vào số con</small>
            </td>
          </tr>
          <tr class="form-group">
            <td>
              <label for="inp-ngaysinh" class="col-form-label">Ngày sinh: </label>
            </td>
            <td>
              <input type="date" name="ngaysinh" class="form-control" id="inp-ngaysinh" style="width: 200px;">
              <small id="ngaysinhHelp" class="form-text text-muted">Nhập vào ngày sinh</small>
            </td>
            <td>
              <label for="inp-ngayvaolam" class="col-form-label">Ngày vào làm: </label>
            </td>
            <td>
              <input type="date" name="ngayvaolam" class="form-control" id="inp-ngayvaolam" style="width: 200px;">
              <small id="ngayvaolamHelp" class="form-text text-muted">Nhập vào ngày vào làm</small>
            </td>
          </tr>
          <tr class="form-group">
            <td>
              <label for="inp-gioitinh" class="col-form-label">Giới tính: </label>
            </td>
            <td>
              <input type="radio" name="gioitinh" id="inp-gioitinh1" value="Nam" checked>
              <label for="inp-gioitinh1" class="col-form-label" style="margin-right: 10px;">Nam</label>
              <input type="radio" name="gioitinh" id="inp-gioitinh2" value="Nữ">
              <label for="inp-gioitinh3" class="col-form-label" style="margin-right: 10px;">Nữ</label>
              <input type="radio" name="gioitinh" id="inp-gioitinh3" value="Khác">
              <label for="inp-gioitinh3" class="col-form-label" style="margin-right: 10px;">Khác</label>
            </td>
            <td>
              <label for="inp-hesoluong" class="col-form-label">Hệ số lương: </label>
            </td>
            <td>
              <input type="text" name="hesoluong" class="form-control" id="inp-hesoluong" style="width: 100px;">
              <small id="hesoluongHelp" class="form-text text-muted">Nhập vào hệ số lương</small>
            </td>
          </tr>
          <tr class="form-group">
            <td>
              <label class="col-form-label">Loại nhân viên: </label>
            </td>
            <td>
              <input type="radio" name="loainv" id="inp-loainv1" value="Văn phòng" checked>
              <label for="inp-loainv1" class="col-form-label" style="margin-right: 10px;">Văn phòng</label>
              <input type="radio" name="loainv" id="inp-loainv2" value="Sản xuất">
              <label for="inp-loainv2" class="col-form-label" style="margin-right: 10px;">Sản xuất</label>
            </td>
          </tr>
          <tr>
            <td></td>
            <td style="text-align: center;" colspan="3">
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