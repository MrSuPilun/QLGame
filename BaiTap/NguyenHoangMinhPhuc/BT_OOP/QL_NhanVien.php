<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quan ly nhan vien</title>
    <style>
        table{
            padding-left: 70px;
            padding-right: 70px;
            padding-bottom: 50px;
        }
        table tr td.button{
            background-color: white;
        }
        table tr td{
            border: 2px solid white;
            background-color: #fff;
        }
        table th{
            padding: 10px;
            background-color: white;
            font-size: 30px;
            border: 0;
        }
    </style>
</head>
<body>
    <?php 
        abstract class nhanvien{
            protected $hoten,$gioitinh,$ngayvaolam,$hesoluong,$socon,$luongcanban;
            const luongcanban = 1500000;
            public function getHoten(){
                return $this->hoten;
            }
            public function getGioiTinh(){
                return $this->gioitinh;
            }
            public function getNgayVaoLam(){
                return $this->ngayvaolam;
            }
            public function getHeSoLuong(){
                return $this->hesoluong;
            }
            public function getSoCon(){
                return $this->socon;
            }
            public function getLuongCanBan(){
                return self::luongcanban;
            }
            public function tinhTienThuong(){
                return 3 * self::luongcanban;
            }
            abstract public function tinhTienLuong();
            abstract public function tinhTienTroCap();
        }
        class nhanvienvanphong extends nhanvien{
            const dinhmucvang = 5;
            const dongiaphat = 100000;
            private $songayvang;
            public function getSoNgayVang(){
                return $this->songayvang = $_POST['songayvang'];
            }
            public function setSoNgayVang($songayvang){
                $this->songayvang = $songayvang;
            }
            public function getHoTen(){
               return $this->hoten = $_POST['hoten']; 
            }
            public function getGioiTinh()
            {
                return $this->gioitinh = $_POST['gioitinh'];
            }
            public function getNgayVaoLam()
            {
                return $this->ngayvaolam = $_POST['ngayvaolam'];
            }
            public function getHeSoLuong()
            {
                return $this->hesoluong = $_POST['hesoluong'];
            }
            public function getSoCon()
            {
                return $this->socon =  $_POST['socon'];
            }
            public function getTinhTienThuong(){
                return parent::tinhTienThuong();
            }
            public function tinhTienPhat(){
                if($this->songayvang > self::dinhmucvang){
                    return ($this->songayvang - self::dinhmucvang)*self::dongiaphat;
                }
            }
            public function tinhTienLuong()
            {
                return parent::luongcanban * $this->getHeSoLuong() - $this->tinhTienPhat();
                print_r(parent::luongcanban);
            }
            public function tinhTienTroCap()
            {
                if($this->getGioiTinh() == 'nu'){
                    return 200000 * $this->getSoCon() * 1.5;
                }
                else{
                    return 200000 * $this->getSoCon();
                }
            }
        }
        class nhanviensanxuat extends nhanvien{
            const dinhmucsp = 500;
            const dongiasanpham = 5000;
            private $sosanpham;
            public function getSoSanPham(){
                return $this->sosanpham = $_POST['sosanpham'];
            }
            public function setSoSanPham($sosanpham){
                $this->sosanpham = $sosanpham;
            }
            public function getHoTen(){
                return $this->hoten = $_POST['hoten']; 
             }
             public function getGioiTinh()
             {
                 return $this->gioitinh = $_POST['gioitinh'];
             }
             public function getNgayVaoLam()
             {
                 return $this->ngayvaolam = $_POST['ngayvaolam'];
             }
             public function getHeSoLuong()
             {
                 return $this->hesoluong = $_POST['hesoluong'];
             }
             public function getSoCon()
             {
                 return $this->socon =  $_POST['socon'];
             }
             public function getLuongCoBan(){
                return self::luongcanban;
             }
             public function getTinhTienThuong(){
                if($this->getSoSanPham() > self::dinhmucsp){
                    return ($this->getSoSanPham() - self::dinhmucsp) * self::dongiasanpham * 0.03;
                }
                else{
                    return 0;
                }
             }
             public function tinhTienLuong()
             {
                return $this->getSoSanPham() * self::dongiasanpham;
             }
             public function tinhTienTroCap()
             {
                return 120000 * $this->getSoCon();
             }
        }
        $tienLuong = 0;
        $tienThuong = 0;
        $tienPhat = 0;
        $tienTrocap = 0;
        if(isset($_POST['loainv']) && ($_POST['loainv']) == "nvvp"){
            $nvvp = new nhanvienvanphong();
            $nvvp->setSoNgayVang($_POST['songayvang']);
            $tienLuong = $nvvp->tinhTienLuong();
            $tienThuong = $nvvp->tinhTienThuong();
            $tienPhat = $nvvp->tinhTienPhat();
            $tienTrocap = $nvvp->tinhTienTroCap();
        }
        if(isset($_POST['loainv']) && ($_POST['loainv']) == "nvsx"){
            $nvsx = new nhanviensanxuat();
            $nvsx->setSoSanPham($_POST['sosanpham']);
            $tienThuong=$nvsx->tinhTienThuong();
            $tienLuong = $nvsx->tinhTienLuong();
            $tienTrocap =$nvsx->tinhTienTrocap();
        }
    ?>
    <form action="" method="post">
        <table align="center" border="1" cellspacing="0" cellpadding="0" style="width:80%">
            <th style="text-align:center; align-items:center;" colspan="4">
                QUẢN LÝ NHÂN VIÊN
            </th>
            <tr>
                <tr>
                    <td>Họ và tên:</td>
                    <td>
                        <input type="text" name="hoten" value="<?php if(isset($_POST['hoten'])) echo $_POST['hoten']; ?>" size="60">
                    </td>
                    <td>Số con:</td>
                    <td>
                        <input type="number" name="socon" value="<?php if(isset($_POST['socon'])) echo $_POST['socon']; ?>" >
                    </td>
                </tr>
                <tr>
                    <td>Ngày vào làm:</td>
                    <td>
                        <input type="date" name="ngayvaolam" value="<?php if(isset($_POST['ngayvaolam'])) echo $_POST['ngayvaolam'];?>" size="40"> 
                    </td>
                </tr>
                <tr>
                    <td>Giới tính:</td>
                    <td>
                    <input type="radio" name="gioitinh" value="nam" <?php if(isset($_POST['gioitinh'])&&($_POST['gioitinh'])=="nam") echo 'checked="checked"'?>/>Nam
                    <input type="radio" name="gioitinh" value="nu"<?php if(isset($_POST['gioitinh'])&&($_POST['gioitinh'])=="nu") echo 'checked="checked"'?>/>Nữ
                    </td>
                    <td>Hệ số lương:</td>
                    <td>
                        <input type="number" name="hesoluong" value="<?php if(isset($_POST['hesoluong'])) echo $_POST['hesoluong'];?>"> 
                    </td>
                </tr>
                <tr>
                    <td>Loại nhân viên:</td>
                    <td colspan="1">
                    <input type="radio" name="loainv" value="nvvp" <?php if(isset($_POST['loainv'])&&($_POST['loainv'])=="nvvp") echo 'checked="checked"'?>/>Văn Phòng
                    </td>
                    <td colspan="2">
                    <input type="radio" name="loainv" value="nvsx" <?php if(isset($_POST['loainv'])&&($_POST['loainv'])=="nvsx") echo 'checked="checked"'?>/>Sản xuất
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>Số ngày vắng: <input type="number" name="songayvang" value="<?php
                         if(isset($_POST['loainv']) && $_POST['loainv']=="nvvp"){
                            echo $_POST['songayvang']; ;
                         }  
                         else echo 0 ;
                         ?>">
                    </td>
                    <td colspan="2">Số sản phẩm: <input type="number" name="sosanpham" value="<?php 
                        if(isset($_POST['loainv']) && $_POST['loainv']=="nvsx"){
                            echo $_POST['sosanpham'] ;
                         }  
                         else echo 0 ;
                         ?>">
                    </td>
                </tr>
                <tr style="text-align:center; align-items:center;">
                    <td class="button" colspan="4"><button type="submit" name="submit">Tính lương</button></td>
                </tr>
                <tr>
                    <td>Tiền lương: </td>
                    <td><input type="text" size="40" value="<?php echo $tienLuong;?>"></td>
                    <td>Trợ cấp:</td>
                    <td><input type="text" size="40" value="<?php echo $tienTrocap;?>"></td>
                </tr>
                <tr>
                    <td>Tiền thưởng:</td>
                    <td><input type="text" size="40" value="<?php echo $tienThuong;?>"></td>
                    <td>Tiền phạt:</td>
                    <td><input type="text" size="40" value="<?php echo $tienPhat;?>"></td>
                </tr>
                <tr style="text-align:center; align-items:center;" >
                    <td colspan="4">Thực lĩnh:
                        <input type="text" size="60" 
                        value="<?php echo $tienLuong 
                        + $tienThuong 
                        + $tienTrocap
                        -$tienPhat;?>">
                    </td>
                </tr>
            </tr>
        </table>
    </form>
</body>
</html>