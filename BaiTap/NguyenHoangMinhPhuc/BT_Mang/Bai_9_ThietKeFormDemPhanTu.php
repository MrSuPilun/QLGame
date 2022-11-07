<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>ĐẾM PHẦN TỬ, GHÉP MẢNG VÀ SẮP XẾP</title>

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

function hoan_vi(&$a, &$b)
{
    $temp = $a;
    $a = $b;
    $b = $temp;
}           

function sap_tang(&$arr)
{
    for($i=0;$i<count($arr)-1;$i++)
	{
        for($j=$i+1;$j<count($arr);$j++)
        {
            if($arr[$i] > $arr[$j]) {
                hoan_vi($arr[$i], $arr[$j]);
            }
        }			
    }
}

function sap_giam(&$arr)
{
    for($i=0;$i<count($arr)-1;$i++)
	{
        for($j=$i+1;$j<count($arr);$j++)
        {
            if($arr[$i] < $arr[$j]) {
                hoan_vi($arr[$i], $arr[$j]);
            }
        }			
    }
}

$strA="";
$slA="";

$strB="";
$slB="";

$c="";

$strC="";

$str_tang="";

$str_giam="";

if(isset($_POST['tinh'])){

    $strA=$_POST['mangA'];

    $arrA=explode(",",$strA);

    $slA = count($arrA);

    $strB=$_POST['mangB'];

    $arrB=explode(",",$strB);

    $slB = count($arrB);

    $c=array_merge($arrA,$arrB);

    $strC=implode(", ",$c);

    sap_tang($c);

    $str_tang=implode(", ",$c);

    sap_giam($c);

    $str_giam=implode(", ",$c);
    
}

?>

<form action="" method="post">

<table border="0" cellpadding="0">

    <th colspan="2"><h2>ĐẾM PHẦN TỬ, GHÉP MẢNG VÀ SẮP XẾP</h2></th>

    <tr>

        <td>Mảng A:</td>

        <td><input type="text" name="mangA" size= "70" value="<?php echo $strA;?> "/></td>

    </tr>

    <tr>

        <td>Mảng B:</td>

        <td><input type="text" name="mangB" size= "70" value="<?php echo $strB;?> "/></td>

    </tr>

    <tr>

        <td></td>

        <td><input type="submit" name="tinh"  size="20" value="   Thực hiện  "/></td>

    </tr>

    <tr>

        <td>Số phần tử mảng A:</td>

        <td><input type="text" name="slA" size= "70" disabled="disabled" value="<?php echo $slA;?> "/></td>

    </tr>

    <tr>

        <td>Số phần tử mảng B:</td>

        <td><input type="text" name="slB" size= "70" disabled="disabled" value="<?php echo $slB;?> "/></td>

    </tr>

    <tr>

        <td>Mảng C:</td>

        <td><input type="text" name="mangC" size= "70" disabled="disabled" value="<?php echo $strC;?> "/></td>

    </tr>

    <tr>

        <td>Mảng C tăng dần:</td>

        <td><input type="text" name="tang" size= "70" disabled="disabled" value="<?php echo $str_tang;?> "/></td>

    </tr>

    

        <td>Mảng C giảm dần:</td>

        <td><input type="text" name="giam" size= "70" disabled="disabled" value="<?php echo $str_giam;?> "/></td>

    </tr>

    <tr >

        <td colspan="2" align="center"><label>(Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</label></td>

        

    </tr>

</table>

</form>

</body>

</html>