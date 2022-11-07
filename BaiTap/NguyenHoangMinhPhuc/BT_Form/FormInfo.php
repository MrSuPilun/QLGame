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
        if(isset($_POST['hoten']))  
            $hoten=$_POST['hoten']; 
        else $hoten="";


        if(isset($_POST['dchi'])) 
            $dchi=$_POST['dchi']; 
        else $dchi="";

        if(isset($_POST['sdt'])) 
            $sdt=trim($_POST['sdt']); 
        else $sdt="";
    ?>

    <form action='FormInfo_kq.php' method='post'>
    <table align='center'>
        <tr><td>Họ tên:</td>

            <td><input type="text" name="hoten" value="<?php echo $hoten ?>"></td>

        </tr>

        <tr><td>Địa chỉ:</td>

            <td><input type="text" name="dchi" value="<?php echo $dchi ?>"></td>

        </tr>
        <tr><td>Số điện thoại:</td>

            <td><input type="text" name="sdt" value="<?php echo $sdt ?>"></td>

        </tr>
        <tr><td>Giới tính:</td>

            <td>
                <input type="radio" name="radGT" value="Nam"<?php if(isset($_POST['radGT'])&&$_POST['radGT']=='Nam') echo 'checked="checked"';?> checked/>		Nam
	            <input type="radio" name="radGT" value="Nữ" <?php if(isset($_POST['radGT'])&&$_POST['radGT']=='Nu') echo 'checked="checked"';?>/>
			        N&#7919;<br>
            </td>

        </tr>
        <tr><td>Quốc tịch:</td>

            <td>
                <select name="qtich">

                    <option value="Việt Nam" <?php if(isset($_POST['qtich'])&& $_POST['qtich']=='vn') echo 'selected';?>>

                        Việt Nam

                    </option>

                    <option value="Anh" <?php if(isset($_POST['qtich'])&& $_POST['qtich']=='uk') echo 'selected';?>>

                        Anh

                    </option>

                    <option value="Mỹ" <?php if(isset($_POST['qtich'])&& $_POST['qtich']=='us') echo 'selected';?>>

                        Mỹ

                    </option>

                </select>
            </td>

        </tr>
        <tr><td>Các môn đã học:</td>

            <td>
                <input type="checkbox" name="chk1" value="PHP & My SQL" 
                <?php if(isset($_POST['chk1'])&& $_POST['chk1']=='ps') echo 'checked'; else echo ""?>/>PHP & My SQL  
                <input type="checkbox" name="chk2" value="C#"
                <?php if(isset($_POST['chk2'])&& $_POST['chk2']=='c') echo 'checked'; else echo ""?>/>C#
                <input type="checkbox" name="chk3" value="XML"
                <?php if(isset($_POST['chk3'])&& $_POST['chk3']=='xml') echo 'checked'; else echo ""?>/>XML
                <input type="checkbox" name="chk4" value="Python"
                <?php if(isset($_POST['chk4'])&& $_POST['chk4']=='py') echo 'checked'; else echo ""?>/>Python
            </td>

        </tr>
        <tr><td>Ghi chú:</td>

            <td>
                <textarea name="comment" rows="3" cols="40">
                <?php if(isset($_POST['comment'])) echo $_POST['comment']; ?></textarea>
            </td>

        </tr>
        <tr><td></td>
            <td>
                <input type='submit' name='gui' value="Gửi"/>
                <input type='reset' name='huy' value="Hủy"/>
            </td>
        </tr>
    </table>
    </form>
</body>
</html>