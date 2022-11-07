<style>
    h2 {
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
        padding: 4px 12px 4px 4px;
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

        $sql = "SELECT Ma_khach_hang, Ten_khach_hang, Phai, Dia_chi, Dien_thoai FROM Khach_hang";
        $result = mysqli_query($conn, $sql);
        ?>

        <h2>THÔNG TIN KHÁCH HÀNG</h2>
        <table>
            <tr>
                <th>Mã KH</th>
                <th>Tên khách hàng</th>
                <th>Giới tính</th>
                <th>Địa chỉ</th>
                <th>Điện thoại</th>
            </tr>
            <?php 
            if(mysqli_num_rows($result)!=0) {
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo "<td>". $row['Ma_khach_hang'] ."</td>";
                    echo "<td>". $row['Ten_khach_hang'] ."</td>";
                    if($row['Phai'] == 0) {
                        echo "<td align='center'>
                                <img width='40px' src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIAAAACACAMAAAD04JH5AAAAaVBMVEX////8whv+9Nf/+uv9zUL+6rD+7sD8wRv+56T+5Jz+8Mf//vv92G78xSX/9+H/+u78yDH//PT+45X9z03+6av+89H92nT94I3/9tz8yjn9zkn91mT90lX923r+5qH+78T93oL901z+7Ljyor26AAAD9klEQVR4nO1a7ZaiMAx1EN1BKIiAovj9/g+5OnOcYUja5rZ055w93N8m99ImaZo6m02YMGHC/wX1psGfAd4DCdDxE0wCJgGTgEnAJGASMAkIJSDpYbc2CFgGEtDDPDatQPTL/OEFWPiDC7DxhxZg5Q8swM4fVoCAP6gACX9IASL+gAJk/OEECPmDCdDx78YRUOZRs1w1+RzlX6x8BaTNJqu+Tzd16HaXUs4/8xMwT27stbvatUJ+HwFlfeTdfuCQFBJ+dwFlYuoqnlBZa+d3FVBetROPPrK5jd9RQG37+hfULjXzOwloKyH9E/u9kd9FQC1afQte/LiAMhuB/psfFlAgyy/gRwXkmh3FcO95xARE0ug3YtF3WSwHoHW89/3j80OQnuih+MvD7/LPRs4/GLXJ76MNyLbbrrIFiQd/q61/Kqvzr5/NF1uDCA/+ma4AxfUwb9K7rk9QphSzQLMBMT9OaDRyr878Jb+um1QrmN+xVvd7G66ct31jsMjZRbg58hfc9xwKo03Kpq1JswHk9vD8GGtEnRirzomfi4BKENFbRoFTFLxTP3vz+n8iZfLx6iKA8SPbyzldurU2cQxuKP9GaHqnphdcQEKcxOLP6IjtFhdAd0A+Ts3pHsD8KSkCMWBNqwGcBw1xUXtZw+PwzdADdqiRPi5DBZBFxDyQKnpABZBWENkBZg8UKoDEYG636YHGsHaQxKPw/QJyLq8we5LJ6B6SGLrbbfqIhvboiUqiEGxNye0RraUkjcFCsBzan0AB56GDBLP3XgFylp0xe5LH3jGA1ZFZO7SvQAGkMQOzgLQj6HlKTnO0JfGtZKQtwyopc5xheUzqiEK7QtJVYWlAkgBpZz5AohhrbMlRAN9NSCWCXthpUwjWoce9iLg4Atb0foZfD+k9V+6DXmvhGOSupvIloAvgcD0ltVCeibQnRuvgB+iAUMmKSUpHm05zInKiPzZBtJPM/Rxuyp/gBiQSR4xwxxEJN+u4Wq2YsQKUwT3QavJcA8su0Ev1m/u/hNiB0810LJbcfAa/Fb2Qs2O/tf57In60D14JeuDmZA90fDoWXNC8OabAJ1LdY1FG33hy3bOqAluZH7hoBDzO903TC8f2rH/SBtvhATSb8Plpx+0ueU82p6PpwcBtSPkFbugHYS0ZLZrADP0QKMcxcQ+R16Oxyyk4xMpDwTj/1Lw7K5COVm1wXYPx/qnq9Hqsxtj/F3L8/dT4tIMjNVUkDp1v/hPckW1QfvWXRylfhBt6FRYiuonoD+7nvxWN/TG9GjP4GbQnUyyobNzYZ5EuM16D6hYe79QYonMW/yiPcZc0Di9jfshX9/q8SerFJf/n3BMmTAiHv1YpMvi3ueILAAAAAElFTkSuQmCC' alt='nam'/>
                            </td>";
                    }else {
                        echo "<td align='center'> 
                                <img width='40px' src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSmXrk6Z0yTbuXBYkoMXrrRTJb7Ve0jVFQAKQ&usqp=CAU' alt='nữ'/>
                            </td>";
                    } 
                    echo "<td>". $row['Dia_chi'] ."</td>";
                    echo "<td>". $row['Dien_thoai'] ."</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </div>
</div>
