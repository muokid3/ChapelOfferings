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
	
	$user=$_SESSION['user'];
	
	$oldpass=md5($_POST['oldpass']);
	$oldpass=stripslashes($oldpass);
	$oldpass=mysql_real_escape_string($oldpass);
	
	$pass1=md5($_POST['pass1']);
	$pass1=stripslashes($pass1);
	$pass1=mysql_real_escape_string($pass1);

	$pass2=md5($_POST['pass2']);
	$pass2=stripslashes($pass2);
	$pass2=mysql_real_escape_string($pass2);
	
	
	$sql_select="SELECT * FROM admin WHERE username='$user'";
	$res_select=mysql_query($sql_select) or die (mysql_error());
	
	while ($row_select=mysql_fetch_array($res_select, MYSQL_ASSOC))
	{
		$password=$row_select['password'];
	}
	
	if($oldpass&&$pass1&&$pass2)
	{
		if ($oldpass==$password)
		{
			if ($pass1==$pass2)
			{
				$sql_update="UPDATE admin SET password='$pass1' WHERE username='$user'";
				$res_update=mysql_query($sql_update) or die (mysql_error());
				
				echo "<script type='text/javascript'>
		alert('Password Changed Sucessfully!');
		window.location='../adminprofile.php';
	</script>";
			}
			else
			{
				echo "<script type='text/javascript'>
		alert('The New Password and Confirm Password Must Match!');
		window.location='../adminprofile.php';
	</script>";
			}
		}
		else
		{
			echo "<script type='text/javascript'>
		alert('You have entered a wrong old password');
		window.location='../adminprofile.php';
	</script>";
		}
	}
	else
	{
		echo "<script type='text/javascript'>
		alert('You Must Fill All the Fields');
		window.location='../adminprofile.php';
	</script>";
	}

	
	
?>
</body>
</html>