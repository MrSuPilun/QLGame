<!DOCTYPE html>

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<title>Xử lý n</title>

</head>

<body>

<?php

	if(isset($_POST['n'])) $n=$_POST['n'];

	else $n=0;



	$ketqua="";

	if(isset($_POST['hthi'])) 

	{	//tạo mảng có n phần tử, các phần tử có giá trị [-100,100]

		$arr=array();

		for($i=0;$i<$n;$i++)

		{

			$x=rand(-100,200);

			$arr[$i]=$x;

		}

		//In ra mảng vừa tạo

		$ketqua="Mảng được tạo là:" .implode(" ",$arr)."&#13;&#10;";



		//Tìm và in ra các số chẵn trong mảng dùng hàm foreach

		$count=0;

		foreach($arr as $v){

			if($v%2==0)

				$count++;

		}

		$ketqua.="Có $count số chẵn trong mảng". "&#13;&#10;";



		//Tìm và in ra các số <n có chữ số cuối là số lẻ

		// $ketqua .="Các số có chữ số cuối là số lẻ là: ";

		// $daySo = "";

		// for($i=0;$i<count($arr);$i++){

		// 	$soCuoi = $arr[$i]%10;

		// 	if($soCuoi %2 !=0)

		// 		$daySo .= "$arr[$i]  ";

		// }

		// $ketqua .= $daySo;

		$count_100=0;

		foreach($arr as $v){

			if($v<100)

				$count_100++;

		}

		$ketqua.="Có $count_100 số có giá trị nhỏ hơn 100". "&#13;&#10;";


		$tong_am=0;

		foreach($arr as $v) {

			if($v<0)

				$tong_am+=$v;
		}

		$ketqua.="Tổng của các thành phần trong mảng giá trị là số âm là $tong_am". "&#13;&#10;";


		$ketqua .="Các số có chữ số kề cuối là số 0 là: ";

		$daySoKe = "";

		for($i=0;$i<count($arr);$i++){

			$tam = $arr[$i]/10;

			$soKeCuoi = $tam%10;

			if($soKeCuoi == 0 && ($arr[$i] >= 100 || $arr[$i] <= -100)) {			
				$daySoKe .= "$arr[$i]  ";
			}

		}

		$ketqua .= $daySoKe."&#13;&#10;";


		function hoan_vi(&$a, &$b)
		{
			$temp = $a;
			$a = $b;
			$b = $temp;
		}

		for($i=0;$i<$n-1;$i++)
		{
			for($j=$i+1;$j<$n;$j++)
			{
				if($arr[$i] > $arr[$j]) {
					hoan_vi($arr[$i], $arr[$j]);
				}
			}			
		}
		$ketqua .="Mảng sắp xếp tăng dần:" .implode(" ",$arr)."&#13;&#10;";
	}

?>

<form action="" method="post">

	Nhập n: <input type="text" name="n" value="<?php echo $n?>"/>

	<input type="submit" name="hthi" value="Hiển thị"/><br>

	Kết quả: <br>

	<textarea cols="70" rows="10" name="ketqua"> <?php echo $ketqua?></textarea>

</form>

</body>

</html>