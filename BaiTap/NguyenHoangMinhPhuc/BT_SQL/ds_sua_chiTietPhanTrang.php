<style>
    h1, h2, p {
        margin: 0;
    }

    h1 {
        color: #f44363;
        text-align: center;
        margin-bottom: 12px;
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

    #phantrang {
        display: flex;
        margin-top: 18px;
        justify-content: center;
        align-items: center;
        gap: 12px;
        cursor: pointer;
    }

</style>

<div align="center">
    <div>
        <?php 
        $conn = mysqli_connect('localhost', 'root', '', 'qlbansua');
        mysqli_set_charset($conn, 'UTF8');

        //số mẩu tin trên mỗi trang
        $rowsPerPage = 2;
        if(!isset($_GET['page'])) {
            $_GET['page'] = 1;
        }

        //vị trí của mẩu tin đầu tiên trên mỗi trang
        $offset = ($_GET['page'] - 1) * $rowsPerPage;

        $sql = "SELECT sua.Ten_sua, sua.Hinh, hang_sua.Ten_hang_sua, sua.TP_Dinh_Duong, sua.Loi_ich,sua.Trong_luong,sua.Don_gia 
                FROM sua JOIN hang_sua ON sua.Ma_hang_sua = hang_sua.Ma_hang_sua
                LIMIT $offset, $rowsPerPage
        ";
        $result = mysqli_query($conn, $sql);
        

        //tổng số mẫu tin cần hiển thị
        $rows = mysqli_query($conn, "SELECT * FROM sua");
        $numRows = mysqli_num_rows($rows);

        //tổng số trang
        $maxPage = ceil($numRows/$rowsPerPage);
        ?>

        <h1>THÔNG TIN CHI TIẾT SỮA</h1>
        <?php 
            if(mysqli_num_rows($result)!=0) {
                while($row = mysqli_fetch_array($result)){
                    $hinh_sua = "Hinh_sua/".$row['Hinh'];
                    echo "<table class='mx-auto'> ";
                    echo "<tr>";
                    echo "<th colspan='2' align='center'>";
                    echo "<h2>" . $row['Ten_sua']. " - " . $row['Ten_hang_sua'] . "</h2>";    
                    echo "</th>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td align='center' style='width: 230px'><img src= $hinh_sua width='150px'/></td>";
                    echo "<td style='width: 450px' >
                            <p class='fw-bold'><i>Thành phần dinh dưỡng:</i></p>
                            <span>". $row['TP_Dinh_Duong'] ."</span>
                            <p class='fw-bold'><i>Lợi ích:</i></p>
                            <span>". $row['Loi_ich'] ."</span>
                            <p>
                                <b><i>Trọng lượng: </i></b> <span class='origin'>". $row['Trong_luong'] ." gr</span> - 
                                <b><i>Đơn giá: </i></b> <span class='origin'>". number_format($row['Don_gia'], 0, '', '.') ." VNĐ</span>
                            </p>
                        </td>";
                    echo "</tr>";
                    echo "</table>";
                }
            }
            ?>
        <div id="phantrang">
            <?php 
            //gắn thêm nút Back
            if($_GET['page'] > 1) {
                echo "<a href=" .$_SERVER['PHP_SELF']."?page=1><<</a> ";
                echo "<a href=" .$_SERVER['PHP_SELF']."?page=".($_GET['page']-1)."><</a> ";
            }
            //tạo link tương ứng tới các trang
            for ($i=1 ; $i<=$maxPage ; $i++) { 
                if ($i == $_GET['page']) { 
                    echo '<b style="color: #c62d0f">'.$i.'</b> '; //trang hiện tại sẽ được bôi đậm
                } else
                    echo "<a href=" .$_SERVER['PHP_SELF']. "?page=".$i.">".$i."</a>";
            }
            //gắn thêm nút Next
            if($_GET['page'] < $maxPage) {
                echo "<a href=" .$_SERVER['PHP_SELF']."?page=".($_GET['page']+1).">></a> ";
                echo "<a href=" .$_SERVER['PHP_SELF']."?page=".$maxPage.">>></a> ";
            }
            ?>
        </div>
    </div>
</div>