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
        $hoten = $_REQUEST["hoten"];
        $dchi = $_REQUEST["dchi"];
        $sdt = $_REQUEST["sdt"];
        $qtich = $_REQUEST["qtich"];
        $gt = $_REQUEST["radGT"];
        $gchu = $_REQUEST["comment"];
    ?>

    <h3>Bạn đã đăng nhập thành công, dưới đây là những thông tin bạn nhập: </h3><br>
    <form>
        Họ tên: <?php echo $hoten ?><br>
        Giới tính: <?php echo $gt ?><br>
        Địa chỉ: <?php echo $dchi ?><br>
        Số điện thoại: <?php echo $sdt ?><br>
        Quốc tịch: <?php echo $qtich ?><br>
        Môn học:
        <?php
            if(isset($_POST['chk1'])) echo $_POST['chk1'].", ";
            if(isset($_POST['chk2'])) echo $_POST['chk2'].", ";
            if(isset($_POST['chk3'])) echo $_POST['chk3'].", ";
            if(isset($_POST['chk4'])) echo $_POST['chk4'].", ";
        ?>
         <br>
        Ghi chú: <?php echo $gchu ?><br> 
    </form>
</body>
</html>