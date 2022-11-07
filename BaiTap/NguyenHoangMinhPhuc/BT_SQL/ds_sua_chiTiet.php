<style>
    h2, p {
        margin: 0;
    }

    h2 {
        color: #fe7a26;
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

</style>

<div align="center">
    <div>
        <?php 
        $conn = mysqli_connect('localhost', 'root', '', 'qlbansua');
        mysqli_set_charset($conn, 'UTF8');
        $maSua = isset($_GET['ma'])? $_GET['ma'] : '';

        $sql = "SELECT sua.Ten_sua, sua.Hinh, hang_sua.Ten_hang_sua, sua.TP_Dinh_Duong, sua.Loi_ich,sua.Trong_luong,sua.Don_gia 
                FROM sua JOIN hang_sua ON sua.Ma_hang_sua = hang_sua.Ma_hang_sua
                WHERE sua.Ma_sua = '".$maSua ."'
                ";
        $result = mysqli_query($conn, $sql);
        $data = '';
        if(mysqli_num_rows($result)!=0){	
            while($rows=mysqli_fetch_array($result)){          
                $data = $rows;
            }
        }
        ?>

        <table border="1"> 
            <tr>
                <th colspan="2" align="center">
                    <h2>
                    <?php echo $data['Ten_sua']. " - " . $data['Ten_hang_sua'] ?>
                    </h2>
                </th>
            </tr>
            <tr>
            <?php 
            $hinh_sua = "Hinh_sua/".$data['Hinh'];
            echo "<td align='center' style='width: 230px'><img src= $hinh_sua width='150px'/></td>";
            echo "<td style='width: 450px' >
                <p class='fw-bold'><i>Thành phần dinh dưỡng:</i></p>
                <span>". $data['TP_Dinh_Duong'] ."</span>
                <p class='fw-bold'><i>Lợi ích:</i></p>
                <span>". $data['Loi_ich'] ."</span>
                <p style='text-align: right;'>
                    <b><i>Trọng lượng: </i></b> <span>". $data['Trong_luong'] ." gr</span> - 
                    <b><i>Đơn giá: </i></b> <span>". number_format($data['Don_gia'], 0, '', '.') ." VNĐ</span>
                </p>
            </td>";
            ?>
            </tr>
            <tr>
                <td align="right">
                    <a href="ds_sua_cot_link.php">Quay về</a>
                </td>
            </tr>
        </table>
    </div>
</div>