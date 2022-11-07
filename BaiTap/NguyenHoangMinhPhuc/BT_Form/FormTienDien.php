<!DOCTYPE html>

<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>tinh tien dien</title>
    <style type="text/css">

        body {  
            background-color: #d24dff;
        }
        table{
            background: #ffd94d;
            border: 0 solid yellow;
        }
        thead{
            background: #fff14d;    
        }
        td {

            color: blue;
        }
        h3{

            font-family: verdana;
            text-align: center;
            /* text-anchor: middle; */
            color: #ff8100;
            font-size: medium;
        }
    </style>
</head>
<body>

<?php 
if(isset($_POST['ten']))  
$ten=trim($_POST['ten']); 
else $ten="";

if(empty($ten) && !is_numeric($ten))
    echo "<font color='black'>Vui lòng nhập tên! </font>";

if(isset($_POST['chisocu']))  
    $chisocu=trim($_POST['chisocu']); 
else $chisocu=0;


if(isset($_POST['chisomoi'])) 
    $chisomoi=trim($_POST['chisomoi']); 
else $chisomoi=0;

// if(!is_numeric($_POST['dongia']))
//     echo "<font color='black'>Vui lòng nhập số vào đơn giá! </font>";

if(isset($_POST['tinh']))
        if (is_numeric($chisocu) && is_numeric($chisomoi) && is_numeric($_POST['dongia']))
        {
            if ($chisocu > $chisomoi)
                echo "<font color='black'>Chỉ số cũ không được nhỏ hơn chỉ số mới! </font>";
            else
                $thanhtien= ($chisomoi - $chisocu)*$_POST['dongia'];
        }
            
        else {
                echo "<font color='black'>Vui lòng nhập vào số! </font>"; 
                $thanhtien="";
            }
else $thanhtien=0;

?>

<form align='center' action="" method="post">

<table>

    <thead>

        <th colspan="2" align="center"><h3>THANH TOÁN TIỀN ĐIỆN</h3></th>

    </thead>

    <tr><td>Tên chủ hộ:</td>

     <td><input type="text" name="ten" value="<?php  echo $ten;?> "/></td>

    </tr>

    <tr><td>Chỉ số cũ:</td>

     <td><input type="text" name="chisocu" value="<?php  echo $chisocu;?> "/></td>

    </tr>

    <tr><td>Chỉ số mới:</td>

     <td><input type="text" name="chisomoi" value="<?php  echo $chisomoi;?> "/></td>
    
    </tr>

    <tr><td>Đơn giá:</td>

     <td><input type="text" name="dongia" value="<?php if(isset($_POST['dongia'])) echo $_POST['dongia']; else echo 2000?>" /></td>

    </tr>

    <tr><td>Số tiền thanh toán:</td>

     <td><input type="text" name="thanhtien" disabled="disabled" value="<?php  echo $thanhtien;?> "/></td>

    </tr>

    <tr>

     <td colspan="2" align="center"><input type="submit" value="Tính" name="tinh" /></td>

    </tr>
</table>

</form>

</body>

</html>