<link rel="stylesheet" href="css/web.css">
<?php
 
    if (!isset($_POST['hoTen'])){
        die('');
    }
     
    header('Content-Type: text/html; charset=UTF-8');
    $conn = mysqli_connect('localhost', 'root', '', 'qlgame');
    mysqli_set_charset($conn, 'UTF8');
          
    function LayMaUser()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'qlgame');
        mysqli_set_charset($conn, 'UTF8');
        
        $lastRow = $conn->query("SELECT MA_USER FROM USER ORDER BY MA_USER DESC LIMIT 1");
        $last =  implode(mysqli_fetch_array($lastRow));
        $maMax = substr($last,2,3);
        $maUS = (int)$maMax + 1;
        return "US0".$maUS;
    }

    $tenDN = addslashes($_POST['tenDN']);
    $matKhau = addslashes($_POST['matKhau']);
    $xNMK = addslashes($_POST['xNMK']);
    $hoTen = addslashes($_POST['hoTen']);
    $email = addslashes($_POST['email']);
    $sdt = addslashes($_POST['sdt']);
    $diaChi = addslashes($_POST['diaChi']);
    $pQuyen = 0;
          
    if (!$tenDN || !$matKhau || !$hoTen || !$sdt || !$sdt || !$diaChi)
    {
        echo "<div class='notify'>Please enter full information. <a href='javascript: history.go(-1)'>Return</a></div>";
        exit;
    }
          
    if (mysqli_num_rows(mysqli_query($conn,"SELECT TEN_DN FROM USER WHERE TEN_DN='$tenDN'")) > 0){
        echo "<div class='notify'>Sign In name already exist. Please enter another Sign In name. <a href='javascript: history.go(-1)'>Return</a></div>";
        exit;
    }
          
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        echo "<div class='notify'>Email incorrect. Please enter another Email. <a href='javascript: history.go(-1)'>Return</a></div>";
        exit;
    }

    if (!preg_match("/^\\+?[0-9][0-9]{7,12}$/", $sdt))
    {
        echo "<div class='notify'>Phone number incorrect. Please enter another phone number. <a href='javascript: history.go(-1)'>Return</a></div>";
        exit;
    }
          
    if (mysqli_num_rows(mysqli_query($conn,"SELECT EMAIL FROM USER WHERE EMAIL='$email'")) > 0)
    {
        echo "<div class='notify'>Email already exist. Please enter another Email. <a href='javascript: history.go(-1)'>Return</a></div>";
        exit;
    }
    
    if ($matKhau != $xNMK)
    {
        echo "<div class='notify'>Re-type password incorrect. <a href='javascript: history.go(-1)'>Return</a></div>";
        exit;
    }

    $maUS = LayMaUser();

    @$addUser = mysqli_query($conn,"
        INSERT INTO USER (
            MA_USER,
            TEN_USER,
            SDT,
            EMAIL,
            DIA_CHI,
            TEN_DN,
            MAT_KHAU,
            PHAN_QUYEN
        )
        VALUE (
            '{$maUS}',
            '{$hoTen}',
            '{$sdt}',
            '{$email}',
            '{$diaChi}',
            '{$tenDN}',
            '{$matKhau}',
            '{$pQuyen}'
        )
    ");
    
    if ($addUser)
        echo "<div class='notify'>Sign up successful. <a href='/'>Homepage</a></div>";
    else
        echo "<div class='notify'>Sign up has an error. <a href='dangky.php'>Return</a></div>";
?>