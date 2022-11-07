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
        $mang_can = array("Qúy", "Giáp", "Ất", "Bính", "Đinh", "Mậu", "Kỷ", "Canh", "Tân", "Nhâm");
        $mang_chi = array("Hợi", "Tý", "Sửu", "Dần", "Mẹo", "Thìn", "Tỵ", "Ngọ", "Mùi", "Thân", "Dậu", "Tuất");
        $mang_hinh = array("hoi.jpg", "chuot.jpg", "suu.jpg", "dan.jpg", "meo.jpg", "thin.jpg", "ty.jpg",
        "ngo.jpg", "mui.jpg", "than.jpg", "dau.jpg", "tuat.jpg");

        if(isset($_POST['nam'])) $nam=$_POST['nam'];

	    else $nam=0;

        $nam_al="";
        $hinh_anh="";

        if(isset($_POST['hthi'])){
            $nam = $nam-3;
            $can = $nam%10;
            $chi = $nam%12;
            $nam_al = $mang_can[$can];
            $nam_al = $nam_al." ".$mang_chi[$chi];
            $hinh = $mang_hinh[$chi];
            $hinh_anh = "<img src = 'images/$hinh'>";
        }
        
    ?>

    <form action="" method="post">
        Năm dương lịch:<input type="text" name="nam" value="<?php echo $nam+3 ?>"/> <br>
        <input type="submit" name="hthi" value="=>"> <br>
        Năm âm lịch: <input type="text" name="nam_al" value="<?php echo $nam_al ?>"/> <br>
        <div>
            <?php
                echo $hinh_anh
            ?>
        </div>
    </form>
    
</body>
</html>