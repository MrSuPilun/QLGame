<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $ptinh = $_POST["ptinh"];
        $somot = $_REQUEST["somot"];
        $sohai = $_REQUEST["sohai"];

        // if(!is_numeric($somot) || !is_numeric($sohai) || empty($somot) || empty($sohai))
        // {
        //     echo "<font color='black'>Nhập số và không để trống </font>";
        // }

        switch($ptinh)
        {
            case 'Cộng':
                $kq = $somot + $sohai;
                break;
            
            case 'Trừ':
                $kq = $somot - $sohai;
                break;

            case 'Nhân':
                $kq = $somot * $sohai;
                break;

            case 'Chia':
                $kq = $somot / $sohai;
                break;
        }
    ?>

    <form align='center'>
        Chọn phép tính: <?php echo $ptinh; ?> <br>
        <table align='center'>
        <tr><td>Số một:</td>

            <td><input type="text" value="<?php echo $somot ?>"></td>

        </tr>

        <tr><td>Số hai:</td>

            <td><input type="text" value="<?php echo $sohai ?>"></td>

        </tr>
        <tr><td>Kết quả:</td>

            <td><input type="text" value="<?php echo $kq ?>"></td>

        </tr>
        </table>
        <a href="javascript:window.history.back(-1);">Quay lại trang trước</a>
    </form>
    
</body>
</html>