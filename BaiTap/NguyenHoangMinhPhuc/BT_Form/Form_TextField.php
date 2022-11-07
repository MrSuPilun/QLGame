<html> 

<head>

	<title>Input/Ouput data</title></head>

<body>

<form action="Form_TextField.php" name="myform" method="post">

	Your Name: <input type="test" name="Name" size=20 
    value="<?php if(isset($_POST['Name'])) echo $_POST['Name'];?>" />

	<br>

	<input type="submit" value="Submit">

</form>

<?php

	if (isset($_POST["Name"]))

		print "Hello " . $_POST["Name"];

?>
</body>

</html>