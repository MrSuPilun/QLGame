<style>
    #title {
        background-color: #ffeee4;
    }

    h2 {
        color: #fe6500;
    }

    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    th, td {
        padding: 4px 12px 4px 4px;
    }
</style>
<div align="center">
    <div>
        <?php 
        $conn = mysqli_connect('localhost', 'root', '', 'qlbansua');
        mysqli_set_charset($conn, 'UTF8');

        $sql = "SELECT sua.Ten_sua, sua.Hinh, hang_sua.Ten_hang_sua, loai_sua.Ten_loai,sua.Trong_luong,sua.Don_gia 
                FROM sua,hang_sua,loai_sua
                WHERE sua.Ma_hang_sua = hang_sua.Ma_hang_sua and sua.Ma_loai_sua = loai_sua.Ma_loai_sua";
        $result = mysqli_query($conn, $sql);
        ?>
        
        <table class="mx-auto">
            <tr>
                <td colspan="2" align="center" id="title"><h2>THÔNG TIN CÁC SẢN PHẨM</h2></td>
            </tr>
            <?php 
            if(mysqli_num_rows($result)!=0) {
                while($row = mysqli_fetch_array($result)){
                    $hinh_sua = "Hinh_sua/".$row['Hinh'];
                    echo "<tr style='height: 150px'>";
                    echo "<td align='center' style='width: 200px'><img src= $hinh_sua width='100px'/></td>";
                    echo "<td style='width: 350px'>
                        <h4>".$row['Ten_sua']."</h4>
                        <span>Nhà sản xuất: ".$row['Ten_hang_sua']."</span>
                        <br>
                        <span>".$row['Ten_loai']. " - " . $row['Trong_luong'] . "gr - ". $row['Don_gia'] . "VND" ."</span>
                    </td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </div>
</div>