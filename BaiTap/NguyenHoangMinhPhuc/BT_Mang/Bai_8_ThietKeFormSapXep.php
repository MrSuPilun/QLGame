<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Sap Xep Mang</title>

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

$str="";

$str_tang="";

$str_giam="";

if(isset($_POST['tinh'])){

    $str=$_POST['mang'];

    $arr=explode(",",$str);

    sap_tang($arr);

    $str_tang=implode(", ",$arr);

    sap_giam($arr);

    $str_giam=implode(", ",$arr);
    
}

?>

<form action="" method="post">

<table border="0" cellpadding="0">

    <th colspan="2"><h2>SẮP XẾP MẢNG</h2></th>

    <tr>

        <td>Nhập mảng:</td>

        <td><input type="text" name="mang" size= "70" value="<?php echo $str;?> "/></td>

    </tr>

    <tr>

        <td></td>

        <td><input type="submit" name="tinh"  size="20" value="   Sắp xếp tăng/giảm  "/></td>

    </tr>

    <tr>

        <td>Tăng dần:</td>

        <td><input type="text" name="tang" size= "70" disabled="disabled" value="<?php echo $str_tang;?> "/></td>

    </tr>

    

        <td>Giảm dần:</td>

        <td><input type="text" name="giam" size= "70" disabled="disabled" value="<?php echo $str_giam;?> "/></td>

    </tr>

    <tr >

        <td colspan="2" align="center"><label>(Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</label></td>

        

    </tr>

</table>

</form>

</body>

</html>