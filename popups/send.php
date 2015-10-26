<?php
require_once('../connection.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php 
	$name=$_POST['name'];
	$name=stripslashes($name);
	$name=mysql_real_escape_string($name);
	
	$number=$_POST['number'];
	$number=stripslashes($number);
	$number=mysql_real_escape_string($number);
	
	$message=$_POST['message'];
	$message=stripslashes($message);
	$message=mysql_real_escape_string($message);
	
	if ($name&&$message)
	{
		$sql="INSERT INTO messages (name,number,message) VALUES('$name','$number','$message')";
		$res=mysql_query($sql) or die (mysql_error());
		
		echo "<script type='text/javascript'>
				alert('Your message has been sent. The admin will look into the problem and contact you.');
				window.location='../index.html';
		</script>";
		
	}
	else
	{
		echo "<script type='text/javascript'>
				alert('You must fill a name and a message!');
				window.location='../index.html';
		</script>";
	}
?>
</body>
</html>