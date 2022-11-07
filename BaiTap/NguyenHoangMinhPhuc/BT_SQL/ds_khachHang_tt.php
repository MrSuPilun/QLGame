<style>
    h1 {
        text-align: center;
    }

    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    tr:nth-child(even) {
        background-color: #fee0c1;
    }

    th, td {
        padding: 6px 12px 6px 4px;
    }

    th {
        color: #c62d0f;
        text-align: center;
    }
</style>

<div align="center">
    <div>
        <?php 
        $conn = mysqli_connect('localhost', 'root', '', 'qlbansua');
        mysqli_set_charset($conn, 'UTF8');

        $sql = "SELECT Ma_khach_hang, Ten_khach_hang, Phai, Dia_chi, Dien_thoai, Email FROM Khach_hang";
        $result = mysqli_query($conn, $sql);
        ?>

        <h1>THÔNG TIN KHÁCH HÀNG</h1>
        <table>
            <tr>
                <th>Mã KH</th>
                <th>Tên khách hàng</th>
                <th>Giới tính</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th><img src="data:image/png;base64,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" width="20px" alt="edit"/></th>
                <th><img src="data:image/jpeg;base64,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" width="20px" alt="delete"/></th>
            </tr>
            <?php 
            if(mysqli_num_rows($result)!=0) {
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo "<td>". $row['Ma_khach_hang'] ."</td>";
                    echo "<td>". $row['Ten_khach_hang'] ."</td>";
                    if($row['Phai'] == 0) {
                        echo "<td align='center'>
                                Nam
                            </td>";
                    }else {
                        echo "<td align='center'> 
                                Nữ
                            </td>";
                    } 
                    echo "<td>". $row['Dia_chi'] ."</td>";
                    echo "<td>". $row['Dien_thoai'] ."</td>";
                    echo "<td>". $row['Email'] ."</td>";
                    echo "<td>
                            <a href='ds_khachHang_edit.php?makh=". $row['Ma_khach_hang'] ."'>Sửa</a>
                        </td>";
                    echo "<td>
                            <a href='ds_khachHang_delete.php?makh=". $row['Ma_khach_hang'] ."'>Xóa</a>
                        </td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </div>
</div>