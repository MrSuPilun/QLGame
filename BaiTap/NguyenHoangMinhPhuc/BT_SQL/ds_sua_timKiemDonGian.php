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

        if(isset($_GET['search'])) {
            $sql = "SELECT sua.Ten_sua, sua.Hinh, hang_sua.Ten_hang_sua, sua.TP_Dinh_Duong, sua.Loi_ich,sua.Trong_luong,sua.Don_gia 
                FROM sua JOIN hang_sua ON sua.Ma_hang_sua = hang_sua.Ma_hang_sua
                WHERE sua.Ten_sua LIKE '%".$ten_sua ."%'
                ";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0) {
                $ketqua .= "<p style='margin: 2px 0 8px 0; text-align: center;'>
                                <b>Có ". mysqli_num_rows($result) ." sản phẩm được tìm thấy</b>
                            </p>";
                while($row = mysqli_fetch_array($result)){
                    $hinh_sua = "Hinh_sua/".$row['Hinh'];
                    $ketqua .= "<table>
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
                                <b>Có 0 sản phẩm được tìm thấy</b>
                            </p>";
            }
        }

        ?>

        <div class="wrap" >
            <h1>TÌM KIẾM THÔNG TIN SỮA</h1>
            <form action="" method="GET">
                <b style="color: red;">Tên sữa: </b>
                <input type="text" name="ten_sua" value="<?php echo isset($_GET['ten_sua'])? $_GET['ten_sua'] : ''; ?>">
                <input type="submit" name="search" value="Tìm kiếm" width="100px">
            </form>
            <div id="ketqua">
                <?php echo $ketqua; ?>
            </div>
        </div>
    </div>
</div>