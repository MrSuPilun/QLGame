<style>
    table {
        margin: 0 auto;
    }

    th, td {
        padding: 4px;
    }
</style>

<div>
<?php 
class Person {
    protected $hoTen;
    protected $diaChi;
    protected $gioiTinh;
    function __construct($hoTen, $diaChi, $gioiTinh) {
        $this->hoTen = $hoTen;
        $this->diaChi = $diaChi;
        $this->gioiTinh = $gioiTinh;
    }
}

class SinhVien extends Person {
    private $lopHoc;
    private $nganhHoc;

    function __construct($hoTen, $diaChi, $gioiTinh, $lopHoc, $nganhHoc) {
        parent::__construct($hoTen,$diaChi,$gioiTinh);
        $this->lopHoc = $lopHoc;
        $this->nganhHoc = $nganhHoc;
    }

    public function ttsv(){
        return 'Họ tên: '.$this->hoTen.' Địa chỉ: '. $this->diaChi.' Giới tính: '. $this->gioiTinh.' Lớp học: '. $this->lopHoc.' Ngành: '. $this->nganhHoc;
    }

    public function diemThuong(){
        if($this->nganhHoc == 'CNTT') {
            return 1;
        } else if($this->nganhHoc == 'Kinh Tế'){
            return 1.5;
        } else return 0;
    }
}

class GiangVien extends Person {
    private $trinhDo;
    const luongCoBan = 15000000;

    function __construct($hoTen, $diaChi, $gioiTinh, $trinhDo) {
        parent::__construct($hoTen,$diaChi,$gioiTinh);
        $this->trinhDo = $trinhDo;
    }

    function ttgv(){
        return 'Họ tên: '.$this->hoTen.' Địa chỉ: '. $this->diaChi.' Giới tính: '. $this->gioiTinh.' Trình độ: '. $this->trinhDo.' Lương cơ bản: '.(string)self::luongCoBan;
    }

    function getTrinhdo(){
        return 'trình độ của GV là: '.$this->trinhDo;
    }

    function tinhLuong(){
        if($this->trinhDo == 'Cử nhân'){
            return self::luongCoBan * 2.34;
        } else if ($this->trinhDo == 'Thạc sĩ'){
            return self::luongCoBan * 3.67;
        } else if ($this->trinhDo == 'Tiến sĩ'){
            return self::luongCoBan * 5.66;
        }
    }
}

$str ='';
$name ='';
$dc='';
$gender ='';
if(isset($_POST['tinh'])){

	if(isset($_POST['person']) && ($_POST['person'])=="sv"){

        if(isset($_POST['name'])){
            $name=$_POST['name'];
        }
        if(isset($_POST['dc'])){
            $dc=$_POST['dc'];
        }
        if(isset($_POST['gender'])){
            $gender=$_POST['gender'];
        }
        if(isset($_POST['nganh'])){
            $nganh=$_POST['nganh'];
        }
        if(isset($_POST['class'])){
            $class=$_POST['class'];
        }

		$sv=new SinhVien($name,$dc,$gender,$class,$nganh);

		$str= "Thông tin Sinh Viên là ".$sv->ttsv()." \n".

		 		"Điểm thưởng của sinh viên là: ".$sv->diemThuong();

	}

	if(isset($_POST['person']) && ($_POST['person'])=="gv"){

		if(isset($_POST['name'])){
            $name=$_POST['name'];
        }
        if(isset($_POST['dc'])){
            $dc=$_POST['dc'];
        }
        if(isset($_POST['gender'])){
            $gender=$_POST['gender'];
        }
        if(isset($_POST['trinhdo'])){
            $trinhdo=$_POST['trinhdo'];
        }

		$gv=new GiangVien($name,$dc,$gender,$trinhdo);

		$str= "Thông tin Giảng Viên là ".$gv->ttgv()." \n".

		 		"Lương của Giảng Viên được nhận là: ".$gv->tinhLuong();


	}

}

?>

<form action="" method="post">
<h3 align="center">Quản lý Thông Tin GV-SV</h3>
	<table border='0'>
        <tr><td>Nhập tên:</td><td><input type="text"  name="name" value="<?php if(isset($_POST['name'])) echo $_POST['name'];?>"/></td></tr>
        <tr><td>Địa chỉ:</td><td><input type="text"  name="dc" value="<?php if(isset($_POST['dc'])) echo $_POST['dc'];?>"/></td></tr>
        <tr><td>Giới tính:</td>
            <td>
                <input type="radio"  name="gender" checked value="Nam"<?php if(isset($_POST['gender'])&&$_POST['gender']=='Nam') echo 'checked="checked"';?>/>
                <label for="">Nam</label>
                <input type="radio"  name="gender" value="Nu"<?php if(isset($_POST['gender'])&&$_POST['gender']=='Nu') echo 'checked="checked"';?>/>
                <label for="">Nữ</label>
            </td>
        </tr>
		<tr>
            <td>Chọn chức vụ: </td>
            <td>
                <input type="radio" id="gv" name="person" value="gv" <?php if(isset($_POST['person'])&&($_POST['person'])=="gv") echo 'checked="checked"'?>/>Giáo Viên
			    <input type="radio" id="sv" name="person" value="sv"<?php if(isset($_POST['person'])&&($_POST['person'])=="sv") echo 'checked="checked"'?>/>Sinh Viên
            </td>
        </tr>

        <tr>
            <td>
                <fieldset id='tt'> 
                    <legend>Giáo viên</legend>
                    <table>
                        <tr>
                            <td>
                                Trình độ
                            </td>
                            <td>
                            <select name="trinhdo">
                                <option value="Cử nhân" <?php if(isset($_POST['trinhdo'])&& $_POST['trinhdo']=='Cử nhân') echo 'selected';?>>
                                    Cử nhân
                                </option>
                                <option value="Thạc sĩ" <?php if(isset($_POST['trinhdo'])&& $_POST['trinhdo']=='Thạc sĩ') echo 'selected';?>>
                                    Thạc sĩ
                                </option>
                                <option value="Tiến sĩ" <?php if(isset($_POST['trinhdo'])&& $_POST['trinhdo']=='Tiến sĩ') echo 'selected';?>>
                                    Tiến sĩ
                                </option>
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Lương cơ bản
                            </td>
                            <td>
                                <input type="text" name='luongcb' value="15.000.000" disabled>
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </td>
            <td>
            <fieldset id="lh"> 
                    <legend>Sinh Viên</legend>
                    <table>
                        <tr>
                            <td>
                                Lớp học
                            </td>
                            <td>
                                <input type="text" name='class' value="<?php if(isset($_POST['class'])) echo $_POST['class']?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Ngành
                            </td>
                            <td>
                                <select name="nganh">
                                    <option value="Kinh Tế" <?php if(isset($_POST['nganh'])&& $_POST['nganh']=='Kinh Tế"') echo 'selected';?>>
                                        Kinh tế
                                    </option>
                                    <option value="CNTT" <?php if(isset($_POST['nganh'])&& $_POST['nganh']=='CNTT') echo 'selected';?>>
                                        CNTT
                                    </option>
                                    <option value="Khác" <?php if(isset($_POST['nganh'])&& $_POST['nganh']=='Khác') echo 'selected';?>>
                                        Khác
                                    </option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </td>
        </tr>
        <tr><td colspan="2" align="center"><input type="submit" name="tinh" value="XỬ LÝ"/></td></tr>

		<tr><td>Kết quả:</td>

			<td><textarea name="ketqua" cols="70" rows="4" disabled="disabled"><?php echo $str;?></textarea></td></tr>


	</table>
</form>

<script>
    var gv = document.querySelector('#gv');
    var sv = document.querySelector('#sv');
    var tt = document.querySelector('#tt');
    var lh = document.querySelector('#lh');
    gv.addEventListener('change', function(e) {
        lh.setAttribute('disabled', 'disabled');
        tt.removeAttribute('disabled');
    })
    sv.addEventListener('change', function(e) {
        tt.setAttribute('disabled', 'disabled');
        lh.removeAttribute('disabled');
    })
</script>
</div>
</div>
