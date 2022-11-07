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
    if(isset($_POST['somot']))  
        $somot=trim($_POST['somot']); 
    else $somot=0;


    if(isset($_POST['sohai'])) 
        $sohai=trim($_POST['sohai']); 
    else $sohai=0;


    if(isset($_POST['tinh']))
    {
        if(!is_numeric($somot) || !is_numeric($sohai) || !isset($somot) || !isset($sohai))
        {
            echo "<form align='center'><font color='black'>Nhập số và không để trống </font></form>";
        }
        else
        {
            header('Location: FormPhepTinh_kq.php');
        }
    }
?>

<form align='center' action="FormPhepTinh_kq.php" method="post">

    <p>
        <label for="ptinh">Phép tính:</label>
        <input type="radio" name="ptinh" value="Cộng"
        <?php if(isset($_POST['ptinh'])&&$_POST['ptinh']=='cong') echo 'checked="checked"'; ?> checked/> Cộng
        <input type="radio" name="ptinh" value="Trừ"
        <?php if(isset($_POST['ptinh'])&&$_POST['ptinh']=='tru') echo 'checked="checked"'; ?> /> Trừ
        <input type="radio" name="ptinh" value="Nhân"
        <?php if(isset($_POST['ptinh'])&&$_POST['ptinh']=='nhan') echo 'checked="checked"'; ?> /> Nhân
        <input type="radio" name="ptinh" value="Chia"
        <?php if(isset($_POST['ptinh'])&&$_POST['ptinh']=='chia') echo 'checked="checked"'; ?> /> Chia
    </p>
    <table align='center'>
        <tr><td>Số một:</td>

            <td><input type="text" name="somot" value="<?php echo $somot ?>"></td>

        </tr>

        <tr><td>Số hai:</td>

            <td><input type="text" name="sohai" value="<?php echo $sohai ?>"></td>

        </tr>  
    </table>
    <input type='submit' name='tinh' value="Tính"/>
</form>
</body>
</html>