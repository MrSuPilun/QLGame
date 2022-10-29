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

        if(isset($_POST['nam'])) $nam=$_POST['nam'];

        else $nam=0;

        function nam_nhuan($nam)
        {
            if(($nam%400==0 || $nam%4==0) && $nam%100!=0)
                return 1;
            return 0;
        }

        $ketqua = "";

        if(isset($_POST['hthi']))
        {
            foreach(range(2000, $nam) as $year)
            {
                if(nam_nhuan($year)==1)
                    $ketqua .= "$year ";
            }

            $ketqua .= " là năm nhuận";
        }
    ?>

    <form action="" method="post">
        Năm<input type="text" name="nam" value="<?php echo $nam ?>"/> <br>
        <input type="submit" name="hthi" value="Hiển thị"/><br>
        <textarea cols="70" rows="1" name="ketqua"> <?php echo $ketqua?></textarea>
    </form>
</body>
</html>