<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Thay The</title>

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

function thaythe(&$arr,$cu,$moi)
{
    for($i=0;$i<count($arr);$i++)
    {
        if($arr[$i]==$cu)
        {
            $arr[$i] = $moi;
        }
    }
}

if(isset($_POST['cu'])){

    $cu=$_POST['cu'];

}
else $cu=0;

if(isset($_POST['moi'])){

    $moi=$_POST['moi'];

}
else $moi=0;

$str="";

$mang="";

$str_tt="";
// $str_tang="";

// $str_giam="";

if(isset($_POST['tinh'])){

    $str=$_POST['mang'];

    $arr=explode(",",$str);

    $mang=implode(", ",$arr);

    thaythe($arr,$cu,$moi);
    $str_tt=implode(", ",$arr);

    // sap_tang($arr);

    // $str_tang=implode(", ",$arr);

    // sap_giam($arr);

    // $str_giam=implode(", ",$arr);
    
}

?>

<form action="" method="post">

<table border="0" cellpadding="0">

    <th colspan="2"><h2>THAY THẾ</h2></th>

    <tr>

        <td>Nhập mảng:</td>

        <td><input type="text" name="mang" size= "70" value="<?php echo $str;?> "/></td>

    </tr>

    <tr>

        <td>Giá trị cần thay thế:</td>

        <td><input type="text" name="cu" size= "70" value="<?php echo $cu;?> "/></td>

    </tr>

    <tr>

        <td>Giá trị thay thế:</td>

        <td><input type="text" name="moi" size= "70" value="<?php echo $moi;?> "/></td>

    </tr>

    <tr>

        <td></td>

        <td><input type="submit" name="tinh"  size="20" value="   Thay thế  "/></td>

    </tr>

    <tr>

        <td>Mảng cũ:</td>

        <td><input type="text" name="arr" size= "70" disabled="disabled" value="<?php echo $mang;?> "/></td>

    </tr>

    

        <td>Mảng sau khi thay thế:</td>

        <td><input type="text" name="arrTT" size= "70" disabled="disabled" value="<?php echo $str_tt;?> "/></td>

    </tr>

    <tr >

        <td colspan="2" align="center"><label>(Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</label></td>

        

    </tr>

</table>

</form>

</body>

</html>