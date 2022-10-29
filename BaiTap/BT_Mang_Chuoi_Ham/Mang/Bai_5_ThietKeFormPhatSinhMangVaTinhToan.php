<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Mang tim kiem va thay the</title>

<style type="text/css">

    table{

        color: #ffff00;

        background-color: gray;     

    }

    table th{

        background-color: blue;

        font-style: vni-times;

        color: yellow;

    }

</style>

</head>

<body>

<?php 

function tinh_tong($arr){
    $tong=0;
    for($i=0;$i<count($arr);$i++){

        $tong+=$arr[$i];

    }

    return $tong;

}

function tim_max($arr)
{

    $max="";
    for($i=0;$i<count($arr);$i++){

        if($arr[$i]>$max)
            $max = $arr[$i];

    }

    return $max;
}

function tim_min($arr)
{
    $min=9999999999999;
    for($i=0;$i<count($arr);$i++){

        if($arr[$i]<$min)
            $min = $arr[$i];

    }

    return $min;
}

function tao_mang($n)
{
	for($i=0;$i<$n;$i++)

	{
		$x=rand(0,20);
		$arr[$i]=$x;
	}
    return $arr;
}

function xuat_mang($arr)
{
    $str="";
    for($i=0;$i<count($arr);$i++)
    {
        $str .=$arr[$i]." ";
    }
    return $str;
}

if(isset($_POST['n'])) 
    $n=$_POST['n'];
else $n=0;

$arr=array();
$mang="";
$mang_kq="";
$tong="";
$min="";
$max="";

if(isset($_POST['tinh'])){

    $mang=tao_mang($n);
    
    $mang_kq = xuat_mang($mang);
    $tong = tinh_tong($mang,$n);
    $min = tim_min($mang);
    $max = tim_max($mang);
    

}

?>

<form action="" method="post">

<table border="0" cellpadding="0">

    <th colspan="2"><h2>PHÁT SINH MẢNG VÀ TÍNH TOÁN</h2></th>

    <tr>

        <td>Nhập n:</td>

        <td><input type="text" name="n" size= "70" value="<?php echo $n;?>"/></td>

    </tr>

    <tr>

        <td></td>

        <td><input type="submit" name="tinh"  size="20" value="   Phát sinh và tính toán  "/></td>

    </tr>

    <tr>

        <td>Mảng:</td>

        <td><input type="text" name="mang" size= "70" disabled="disabled" value="<?php echo $mang_kq;?> "/></td>

    </tr>


    <tr>

        <td>GTLN:</td>

        <td><input type="text" name="kq" size= "70" disabled="disabled" value="<?php echo $max;?> "/></td>

    </tr>

    <tr>

        <td>GTNN:</td>

        <td><input type="text" name="kq" size= "70" disabled="disabled" value="<?php echo $min;?> "/></td>

    </tr>

    <tr>

        <td>Tổng:</td>

        <td><input type="text" name="kq" size= "70" disabled="disabled" value="<?php echo $tong;?> "/></td>

    </tr>

</table>

</form>

</body>

</html>