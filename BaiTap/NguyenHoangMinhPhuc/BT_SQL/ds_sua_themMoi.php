<style>
    form {
        margin: 8px auto;
        width: 550px;
        background-color: #fddedc;
    }

    table {
        width: 100%;
    }

    h1, h2, p {
        margin: 0;
    }

    h1 {
        background-color: #fe6d6c;
        color: white;
        padding: 0 4px;
        text-align: center;
    }

    h2 {
        text-align: center;
    }

    td {
        padding: 4px;
    }

    
    #ketqua {
        margin: 4px auto;
        width: 550px;
        background-color: #fdfef0;
    }

    #tb_ketqua {
        margin: 0 auto;
    }

    #tb_ketqua h2 {
        color: #f5590b;
    }

    #tb_ketqua , #tb_ketqua th, #tb_ketqua td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    #tb_ketqua th {
        background-color: #ffeee6;
    }

    #tb_ketqua td {
        padding: 4px 8px;
    }

    .origin {
        color: #f44363;
    }
    
</style>

<div align="center">
    <div>
        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'qlbansua');
        mysqli_set_charset($conn, 'UTF8');
        $ketqua = "";

        $sql = "SELECT Ma_loai_sua,Ten_loai FROM loai_sua";
        $loai_sua_sql = mysqli_query($conn, $sql);

        $sql = "SELECT Ma_hang_sua,Ten_hang_sua FROM hang_sua";
        $hang_sua_sql = mysqli_query($conn, $sql);

        $ma_sua = isset($_POST['ma_sua'])? $_POST['ma_sua'] : '';
        $ten_sua = isset($_POST['ten_sua'])? $_POST['ten_sua'] : '';
        $hang_sua = isset($_POST['hang_sua'])? $_POST['hang_sua'] : '';
        $loai_sua = isset($_POST['loai_sua'])? $_POST['loai_sua'] : '';
        $trong_luong = isset($_POST['trong_luong'])? (int)$_POST['trong_luong'] : '';
        $don_gia = isset($_POST['don_gia'])? (int)$_POST['don_gia'] : '';
        $tp_dinh_duong = isset($_POST['tp_dinh_duong'])? $_POST['tp_dinh_duong'] : '';
        $loi_ich = isset($_POST['loi_ich'])? $_POST['loi_ich'] : '';
        $hinh = isset($_FILES['hinh'])? $_FILES['hinh']['name'] : '';

        if(isset($_POST['them'])) {
            // thêm hình vào server
            if($hinh!='') {
                    move_uploaded_file($_FILES["hinh"]["tmp_name"],
                    "Hinh_sua\\".$hinh);
            } else {
                $ketqua .= "<p style='margin: 2px 0 8px 0; text-align: center;color: red;'>Vui lòng nhập vào hình</p>";
                return 0;
            }

            //=============================
            $sql = "INSERT INTO sua(Ma_sua, Ten_sua, Ma_hang_sua, Ma_loai_sua, Trong_luong, Don_gia, TP_Dinh_Duong,Loi_ich, Hinh)
                    VALUES ('$ma_sua', '$ten_sua', '$hang_sua','$loai_sua', $trong_luong, $don_gia, '$tp_dinh_duong', '$loi_ich','$hinh')
            ";
            $result = mysqli_query($conn, $sql);
            
            if($result) {
                $sql = "SELECT sua.Ten_sua, sua.Hinh, hang_sua.Ten_hang_sua, sua.TP_Dinh_Duong, sua.Loi_ich,sua.Trong_luong,sua.Don_gia 
                        FROM sua JOIN hang_sua ON sua.Ma_hang_sua = hang_sua.Ma_hang_sua
                        WHERE sua.Ma_sua LIKE '".$ma_sua ."'
                ";
                $sua = mysqli_query($conn, $sql);
                if(mysqli_num_rows($sua) > 0){
                    $ketqua .= "<p style='margin: 2px 0 8px 0; text-align: center;'>
                                <b>Thêm sữa thành công</b>
                            </p>";
                    while($row = mysqli_fetch_array($sua)){
                        $hinh_anh = "Hinh_sua/".$row['Hinh'];
                        $ketqua .= "<table id='tb_ketqua' align='center'>
                                    <tr>
                                        <th colspan='2' align='center'>
                                            <h2>" . $row['Ten_sua']. " - " . $row['Ten_hang_sua'] . "</h2>   
                                        </th>
                                    </tr>
                                    <tr>
                                        <td align='center' style='width: 200px'><img src= $hinh_anh width='150px'/></td>
                                        <td style='width: 450px' >
                                            <p class='fw-bold'><i>Thành phần dinh dưỡng:</i></p>
                                            <span>". $row['TP_Dinh_Duong'] ."</span>
                                            <p class='fw-bold'><i>Lợi ích:</i></p>
                                            <span>". $row['Loi_ich'] ."</span>
                                            <p>
                                                <b><i>Trọng lượng: </i></b> <span class='origin'>". $row['Trong_luong'] ." gr</span> - 
                                                <b><i>Đơn giá: </i></b> <span class='origin'>". number_format($row['Don_gia'], 0, '', '.') ." VNĐ</span>
                                            </p>
                                        </td>
                                    </tr>
                                    </table>";
                    }
                }
            } else 
                $ketqua .= "<p style='margin: 2px 0 8px 0; text-align: center;color: red;'>Kiểm tra lại thông tin nhập vào !!!!!</p>";
            
        }

        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <th colspan="2" align="center">
                        <h1>THÊM SỮA MỚI</h1>
                    </th>
                </tr>
                <tr>
                    <td>Mã sữa:</td>
                    <td><input required type="text" name="ma_sua" value="<?php echo isset($_POST['ma_sua'])? $_POST['ma_sua'] : '' ?>"></td>
                </tr>
                <tr>
                    <td>Tên sữa:</td>
                    <td><input required type="text" name="ten_sua" value="<?php echo isset($_POST['ten_sua'])? $_POST['ten_sua'] : '' ?>" style="width: 230px;"></td>
                </tr>
                <tr>
                    <td>Hãng sữa:</td>
                    <td>
                        <select name="hang_sua" required>
                            <option value="">Chọn hãng sữa</option>
                            <?php 
                            if(mysqli_num_rows($hang_sua_sql) > 0) {
                                while($row = mysqli_fetch_array($hang_sua_sql)){
                                    $selected = isset($_POST['hang_sua']) && $_POST['hang_sua'] == $row['Ma_hang_sua'] ? "selected" : "";
                                    echo "<option value='". $row['Ma_hang_sua'] ."' $selected >".$row['Ten_hang_sua']."</option>";
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Loại sữa:</td>
                    <td>
                    <select name="loai_sua" required>
                        <option value="">Chọn loại sữa</option>
                        <?php 
                        if(mysqli_num_rows($loai_sua_sql) > 0) {
                            while($row = mysqli_fetch_array($loai_sua_sql)){
                                $selected = isset($_POST['loai_sua']) && $_POST['loai_sua'] == $row['Ma_loai_sua'] ? "selected" : "";
                                echo "<option value='". $row['Ma_loai_sua'] ."' $selected>".$row['Ten_loai']."</option>";
                            }
                        }
                        ?>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>Trọng lượng:</td>
                    <td><input required type="number" name="trong_luong" value="<?php echo isset($_POST['trong_luong'])? $_POST['trong_luong'] : '' ?>"> (gr hoặc ml)</td>
                </tr>
                <tr>
                    <td>Đơn giá:</td>
                    <td><input required type="number" name="don_gia" value="<?php echo isset($_POST['don_gia'])? $_POST['don_gia'] : '' ?>"> (VNĐ)</td>
                </tr>
                <tr>
                    <td style="float: left;">Thành phần dinh dưỡng:</td>
                    <td>
                        <textarea name="tp_dinh_duong" cols="45" rows="2"><?php echo isset($_POST['tp_dinh_duong'])? $_POST['tp_dinh_duong'] : '' ?>
                        </textarea>
                    </td>
                </tr>
                <tr>
                    <td style="float: left;">Lợi ích:</td>
                    <td>
                        <textarea name="loi_ich" cols="45" rows="2"><?php echo isset($_POST['loi_ich'])? $_POST['loi_ich'] : '' ?>
                        </textarea>
                    </td>
                </tr>
                <tr>
                    <td>Hình ảnh:</td>
                    <td><input required type="file" name="hinh" value="<?php echo isset($_FILES['hinh'])? $_FILES['hinh']['name'] : '' ?>"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="them" value="Thêm mới" style="width: 80px;">
                    </td>
                </tr>
            </table>
        </form>

        <div id="ketqua">
            <?php echo $ketqua; ?>
        </div>
    </div>
</div>