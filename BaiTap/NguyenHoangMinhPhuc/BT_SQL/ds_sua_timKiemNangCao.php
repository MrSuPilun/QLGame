<style>
    .wrap {
        margin: 4px auto;
        width: 700px;
        background-color: #fdfef0;
    }

    h1, h2, p {
        margin: 0;
    }

    h1 {
        color: #f43d56;
        background-color: #fecccd;
        text-align: center;
    }

    form {
        margin-top: 2px;
        text-align: center;
        
    }

    .section_search {
        margin-top: 2px;
        background-color: #fecccd;
    }

    table {
        margin: 0 auto;
    }

    h2 {
        color: #f5590b;
        text-align: center;
    }

    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    th {
        background-color: #ffeee6;
    }

    td {
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
        $ten_sua = isset($_GET['ten_sua'])? $_GET['ten_sua'] : "";
        $ma_hang_sua = isset($_GET['ma_hang_sua'])? $_GET['ma_hang_sua'] : "";
        $ma_loai_sua = isset($_GET['ma_loai_sua'])? $_GET['ma_loai_sua'] : "";

        $sql = "SELECT Ma_loai_sua,Ten_loai FROM loai_sua";
        $loai_sua = mysqli_query($conn, $sql);

        $sql = "SELECT Ma_hang_sua,Ten_hang_sua FROM hang_sua";
        $hang_sua = mysqli_query($conn, $sql);

        if(isset($_GET['search'])) {
            $sql = "SELECT sua.Ten_sua, sua.Hinh, hang_sua.Ten_hang_sua, sua.TP_Dinh_Duong, sua.Loi_ich,sua.Trong_luong,sua.Don_gia 
                FROM sua JOIN hang_sua ON sua.Ma_hang_sua = hang_sua.Ma_hang_sua
                        JOIN loai_sua ON sua.MA_loai_sua = loai_sua.Ma_loai_sua
                WHERE 
                    loai_sua.Ma_loai_sua LIKE '%$ma_loai_sua%' AND
                    hang_sua.Ma_hang_sua LIKE '%$ma_hang_sua%' AND
                    sua.Ten_sua LIKE '%$ten_sua%'
                ";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0) {
                $ketqua .= "<p style='margin: 2px 0 8px 0; text-align: center;'>
                                <b>Có ". mysqli_num_rows($result) ." sản phẩm được tìm thấy</b>
                            </p>";
                while($row = mysqli_fetch_array($result)){
                    $hinh_sua = "Hinh_sua/".$row['Hinh'];
                    $ketqua .= "<table align='center'>
                                <tr>
                                    <th colspan='2' align='center'>
                                        <h2>" . $row['Ten_sua']. " - " . $row['Ten_hang_sua'] . "</h2>   
                                    </th>
                                </tr>
                                <tr>
                                    <td align='center' style='width: 200px'><img src= $hinh_sua width='150px'/></td>
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
            } else {
                $ketqua .= "<p style='margin: 2px 0 8px 0; text-align: center;'>
                                <b>Không tìm thấy sản phẩm này</b>
                            </p>";
            }
        }

        ?>

        <div class="wrap">
            <h1>TÌM KIẾM THÔNG TIN SỮA</h1>
            <form action="" method="GET">
                <p class="section_search">
                    <b style="color: red;">Loại sữa: </b>
                    <select name="ma_loai_sua">
                        <option value="">= Tất cả =</option>
                        <?php 
                        if(mysqli_num_rows($loai_sua) > 0) {
                            while($row = mysqli_fetch_array($loai_sua)){
                                $selected = isset($_GET['ma_loai_sua']) && $_GET['ma_loai_sua'] == $row['Ma_loai_sua'] ? "selected" : "";
                                echo "<option value='". $row['Ma_loai_sua'] ."' $selected>".$row['Ten_loai']."</option>";
                            }
                        }
                        ?>
                    </select>

                    <b style="color: red; margin-left: 8px;">Hãng sữa: </b>
                    <select name="ma_hang_sua">
                        <option value="">= Tất cả =</option>
                        <?php 
                        if(mysqli_num_rows($hang_sua) > 0) {
                            while($row = mysqli_fetch_array($hang_sua)){
                                $selected = isset($_GET['ma_hang_sua']) && $_GET['ma_hang_sua'] == $row['Ma_hang_sua'] ? "selected" : "";
                                echo "<option value='". $row['Ma_hang_sua'] ."' $selected>".$row['Ten_hang_sua']."</option>";
                            }
                        }
                        ?>
                    </select>
                </p>
                <p class="section_search">
                    <b style="color: red;">Tên sữa: </b>
                    <input class="w-30" type="text" name="ten_sua" value="<?php echo isset($_GET['ten_sua'])? $_GET['ten_sua'] : ''; ?>">
                    <input type="submit" name="search" value="Tìm kiếm" width="100px">
                </p>
            </form>
            <div id="ketqua">
                <?php echo $ketqua; ?>
            </div>
        </div>
    </div>
</div>