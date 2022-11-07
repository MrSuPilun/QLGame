<style>
    #title {
        background-color: #ffeee4;
    }

    h2 {
        color: #fe6500;
    }

    h4 {
        margin: 0;
    }

    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    th, td {
        padding: 4px 12px 4px 4px;
    }

    img {
        margin-top: 4px;
    }
</style>
<div align="center">
    <div>
        <?php 
        $conn = mysqli_connect('localhost', 'root', '', 'qlbansua');
        mysqli_set_charset($conn, 'UTF8');
        $sql = "SELECT sua.Ten_sua, sua.Hinh, hang_sua.Ten_hang_sua, loai_sua.Ten_loai,sua.Trong_luong,sua.Don_gia 
                FROM sua,hang_sua,loai_sua
                WHERE sua.Ma_hang_sua = hang_sua.Ma_hang_sua and sua.Ma_loai_sua = loai_sua.Ma_loai_sua
                
                ";
        $result = mysqli_query($conn, $sql);
        ?>
        
        <table>
            <tr>
                <td colspan="5" align="center" id="title"><h2>THÔNG TIN CÁC SẢN PHẨM</h2></td>
            </tr>
            <?php 
            if(mysqli_num_rows($result)!=0) {
                $n = 0;
                while($row = mysqli_fetch_array($result)){
                    $hinh_sua = "Hinh_sua/".$row['Hinh'];
                    echo "
                        <td align='center' style='width: 180px'>
                            <h4>".$row['Ten_sua']."</h4>
                            <span>". $row['Trong_luong'] . " gr - ". number_format($row['Don_gia'], 0, '', '.') . " VNĐ" ."</span>
                            <img src= $hinh_sua height='100px'/>
                        </td>";
                    $n++;
                    
                    if($n % 5 == 0) {
                        echo "<tr></tr>";
                    }
                }
            }
            ?>
        </table>
    </div>
</div>
