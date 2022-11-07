<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Thông tin khách hàng</title>

</head>

<body>
    <style>
        tr:nth-child(even)
        {
            background-color: orange;
        }
    </style>

<?php

 

  // Ket noi CSDL

//require("connect.php");

$conn = mysqli_connect ('localhost', 'root', '', 'qlbansua') 

		OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );

$sql = 'select Ma_khach_hang,Ten_khach_hang,Phai,Dia_chi,Dien_thoai from khach_hang';

$result = mysqli_query($conn, $sql);



echo "<p align='center'><font size='5' color='blue'> THÔNG TIN KHÁCH HÀNG</font></P>";

 echo "<table align='center' width='900' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";

 echo '<tr>
    <th width="150">Mã khách hàng</th>

    <th width="150">Tên khách hàng</th>

    <th width="100">Giới tính</th>

    <th width="300">Địa chỉ</th>

    <th width="200">Điện thoại</th>
</tr>';



 if(mysqli_num_rows($result)<>0)

 {	

	while($rows=mysqli_fetch_row($result))

	{          echo "<tr>";

		     echo "<td>$rows[0]</td>";

		     echo "<td>$rows[1]</td>";

		     echo "<td style='text-align:center'>$rows[2]</td>";

             echo "<td>$rows[3]</td>";

             echo "<td>$rows[4]</td>";

		     echo "</tr>";
	}

 }

echo"</table>";

?>

</body>

</html>