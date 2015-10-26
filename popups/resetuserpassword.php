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
	$id=$_GET['id'];
	
	$sql="SELECT * FROM admin WHERE id='$id'";
	$res=mysql_query($sql) or die (mysql_error());
	
	while ($row=mysql_fetch_array($res, MYSQL_ASSOC))
	{
		$name=$row['name'];
		$username=$row['username'];		
	}
	
	$newpass=md5($username);	
	
	$sql_reset="UPDATE admin SET password='$newpass' WHERE id='$id'";
	$res_reset=mysql_query($sql_reset) or die (mysql_error());
	
	echo "<script type='text/javascript'>
		alert('The password for $name has been reset to $username');
		window.location='users.php';
	</script>";
?>
</body>
</html>