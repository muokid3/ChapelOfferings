<?php
require_once('../connection.php');

	function protect()
	{
		$connect=mysql_connect("localhost","root","");
		$choose_db=mysql_select_db("chapel", $connect);
		
		set_error_handler ("Errors", E_NOTICE);
		
		$user=$_SESSION['user'];
		
		$sql="SELECT * FROM admin WHERE username='$user'";
		$res=mysql_query($sql) or die (mysql_error());
		$count_sess=mysql_num_rows($res);
		
		if (!isset($_SESSION['user']) && !isset($_COOKIE['user']))
		{
			header("Location: index.html");
			exit();
		}
		elseif ($count_sess==0)
		{
			header("Location: index.html");
		}
		
	}
	
	protect();
	
	

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
	
	$username=$_POST['username'];
	$username=stripslashes($username);
	$username=mysql_real_escape_string($username);
	
	$password=md5($username);
	
	$type="user";
	
	$sql="INSERT INTO admin (username,name,type,password) VALUES ('$username','$name','$type','$password')";
	$res=mysql_query($sql) or die (mysql_error());
	
	echo "<script type='text/javascript'>
		alert('User added sucessfully. The password for $name is $username');
		window.location='../adminprofile.php';
	</script>";
?>
</body>
</html>