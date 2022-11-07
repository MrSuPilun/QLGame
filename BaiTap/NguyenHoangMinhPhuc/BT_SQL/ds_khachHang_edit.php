<style>
    form {
        margin: 8px auto;
        width: 500px;
        background-color: #feebca;
    }

    table {
        width: 100%;
    }

    td {
        padding: 4px;
    }
</style>

<div align="center">
    <div>
        <?php 
        $conn = mysqli_connect('localhost', 'root', '', 'qlbansua');
        mysqli_set_charset($conn, 'UTF8');
        $ketqua = "";
        $makh = isset($_GET['makh'])? $_GET['makh'] : '';
        $ten_kh = isset($_POST['ten_kh'])? $_POST['ten_kh'] : '';
        $phai = isset($_POST['phai'])? (int)$_POST['phai'] : '';
        $dia_chi = isset($_POST['dia_chi'])? $_POST['dia_chi'] : '';
        $dien_thoai = isset($_POST['dien_thoai'])? $_POST['dien_thoai'] : '';
        $email = isset($_POST['email'])? $_POST['email'] : '';


        if(isset($_POST['update'])) {
            $sql = "UPDATE khach_hang
                    SET Ten_khach_hang = '$ten_kh',
                        Phai = $phai,
                        Dia_chi = '$dia_chi',
                        Dien_thoai = '$dien_thoai',
                        Email = '$email'
                    WHERE Ma_khach_hang = '$makh'
            ";
            $result = mysqli_query($conn, $sql);

            if($result) {
                $ketqua .= "Cập nhật thành công!!!";
            } else {
                $ketqua .= "Kiểm tra lại thông tin!!!";
            }
        } else {
            $sql = "SELECT * FROM khach_hang WHERE Ma_khach_hang = '$makh'";
            $result = mysqli_query($conn, $sql);
            
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_array($result)){
                    $ten_kh = $row['Ten_khach_hang'];
                    $phai = $row['Phai'];
                    $dia_chi = $row['Dia_chi'];
                    $dien_thoai = $row['Dien_thoai'];
                    $email = $row['Email'];
                }
            }
        }

        ?>
        <form action="" method="post">
            <table>
                <tr style="background-color: #fecc66;">
                    <th colspan="2" align="center">
                        <h3 class="text-center py-1 mb-0" style="color: #ca4b06">CẬP NHẬT THÔNG TIN KHÁCH HÀNG</h2>
                    </th>
                </tr>
                <tr>
                    <td>Mã khách hàng: </td>
                    <td><input type="text" name="ma_kh" value="<?php echo $makh; ?>" disabled></td>
                </tr>
                <tr>
                    <td>Tên khách hàng: </td>
                    <td><input required type="text" name="ten_kh" value="<?php echo $ten_kh;?>"  style="width: 100%;"></td>
                </tr>
                <tr>
                    <td>Phái: </td>
                    <td>
                        <input type="radio" name="phai"  value="0" <?php echo $phai == 0? "checked": "" ?>> Nam
                        <input type="radio" name="phai" value="1" <?php echo $phai == 1? "checked": "" ?>> Nữ
                    </td>
                </tr>
                <tr>
                    <td>Địa chỉ:</td>
                    <td><input required type="text" name="dia_chi" value="<?php echo $dia_chi; ?>" style="width: 100%;"></td>
                </tr>
                <tr>
                    <td>Điện thoại: </td>
                    <td><input required type="text" name="dien_thoai" value="<?php echo $dien_thoai; ?>"></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input required type="email" name="email" value="<?php echo $email; ?>" style="width: 100%;"></td>
                </tr>
                <tr style="background-color: #fee2a8;">
                    <td colspan="2" align="center">
                        <input type="submit" name="update" value="Cập nhật" style="padding: 0 8px;">
                    </td>
                </tr>
            </table>
        </form>
        <p style="margin-top: 12px;text-align: center;"><b><?php echo $ketqua; ?></b></p>
        <a href="ds_khachHang_tt.php">Quay về</a>
    </div>
</div>