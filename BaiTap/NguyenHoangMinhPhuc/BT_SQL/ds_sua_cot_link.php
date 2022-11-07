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

    img {
        margin-top: 4px;
    }
</style>

<div align="center">
    <div>
        <?php 
        $conn = mysqli_connect('localhost', 'root', '', 'qlbansua');
        mysqli_set_charset($conn, 'UTF8');

        $sql = "SELECT sua.Ma_sua, sua.Ten_sua, sua.Hinh, hang_sua.Ten_hang_sua, loai_sua.Ten_loai,sua.Trong_luong,sua.Don_gia 
                FROM sua,hang_sua,loai_sua
                WHERE sua.Ma_hang_sua = hang_sua.Ma_hang_sua and sua.Ma_loai_sua = loai_sua.Ma_loai_sua
                ";
        $result = mysqli_query($conn, $sql);
        $numRows = mysqli_num_rows($result);
        $itemPerRow = 5;
        $maxRow = ceil($numRows/$itemPerRow);

        $mang = [];
        if($numRows!=0) {
            while($row = mysqli_fetch_array($result)){
                $mang[] = $row;
            }
        }
        ?>  

        <table>
            <tr>
                <td colspan="<?php echo $itemPerRow; ?>" align="center" id="title"><h2>THÔNG TIN CÁC SẢN PHẨM</h2></td>
            </tr>
            
            <?php 
            if(count($mang)!=0) {
                for($i = 1; $i <= $maxRow; $i++) {
                    echo "<tr style='height: 150px'>";
                    for($j = ($i - 1)* $itemPerRow; $j < $itemPerRow*$i; $j++) {
                        if($j < $numRows) {
                            $hinh_sua = "Hinh_sua/".$mang[$j]['Hinh'];
                            $linkToDetail = "ds_sua_chiTiet.php?ma=".$mang[$j]['Ma_sua']; 
                            echo "<td align='center' style='width: 180px'>
                                    <a href= $linkToDetail>
                                        <p class='fw-bold mb-0'>".$mang[$j]['Ten_sua']."</p>
                                    </a>
                                    <span>". $mang[$j]['Trong_luong'] . " gr - ". number_format($mang[$j]['Don_gia'], 0, '', '.') . " VNĐ" ."</span>
                                    <img src= $hinh_sua height='100px'/>
                                </td>";
                        } else {
                            echo "<td align='center' style='width: 160px'></td>";
                        }  
                    }
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </div>
</div>