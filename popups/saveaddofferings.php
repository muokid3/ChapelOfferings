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
	
	$sql="SELECT date_format(now(), '%y-%m-%d') as date";
	$res=mysql_query($sql) or die (mysql_error());
	
	while ($row=mysql_fetch_array($res, MYSQL_ASSOC))
	{
		$date=$row['date'];
	}
	
	$username=$_SESSION['user'];
	
	$sql_admin="SELECT * FROM admin WHERE username='$username'";
	$res_admin=mysql_query($sql_admin) or die (mysql_error());
	
	while ($row_admin=mysql_fetch_array($res_admin, MYSQL_ASSOC))
	{
		$name=$row_admin['name'];
		$type=$row_admin['type'];
	}
	
	
	$one=$_POST['one'];
	$one=stripslashes($one);
	$one=mysql_real_escape_string($one);
	
	$five=5*($_POST['five']);
	$five=stripslashes($five);
	$five=mysql_real_escape_string($five);
	
	$ten=10*($_POST['ten']);
	$ten=stripslashes($ten);
	$ten=mysql_real_escape_string($ten);
	
	$twenty=20*($_POST['twenty']);
	$twenty=stripslashes($twenty);
	$twenty=mysql_real_escape_string($twenty);
	
	$forty=40*($_POST['forty']);
	$forty=stripslashes($forty);
	$forty=mysql_real_escape_string($forty);
	
	$fifty=50*($_POST['fifty']);
	$fifty=stripslashes($fifty);
	$fifty=mysql_real_escape_string($fifty);
	
	$hundred=100*($_POST['hundred']);
	$hundred=stripslashes($hundred);
	$hundred=mysql_real_escape_string($hundred);
	
	$twohundred=200*($_POST['twohundred']);
	$twohundred=stripslashes($twohundred);
	$twohundred=mysql_real_escape_string($twohundred);
	
	$fivehundred=500*($_POST['fivehundred']);
	$fivehundred=stripslashes($fivehundred);
	$fivehundred=mysql_real_escape_string($fivehundred);
	
	$thousand=1000*($_POST['thousand']);
	$thousand=stripslashes($thousand);
	$thousand=mysql_real_escape_string($thousand);
	
	$sql_insert="INSERT INTO offerings (one_shilling,five_shilling,ten_shilling,twenty_shilling,forty_shilling,fifty_shilling,hundred_shilling,two_hundred_shilling,five_hundred_shilling,thousand_shilling,date,admin_name) VALUES ('$one','$five','$ten','$twenty','$forty','$fifty','$hundred','$twohundred','$fivehundred','$thousand','$date','$name')";
	$res_insert=mysql_query($sql_insert) or die (mysql_error());
	
	
	$total=$one+$five+$ten+$twenty+$forty+$fifty+$hundred+$twohundred+$fivehundred+$thousand;
	
	
	
	$sql_select="SELECT * FROM departments";
	$res_select=mysql_query($sql_select) or die (mysql_error());
	
	while ($row_select=mysql_fetch_array($res_select, MYSQL_ASSOC))
	{
		$id=$row_select['id'];
		$department=$row_select['department'];
		$percentage=$row_select['percentage'];
		$current_total=$row_select['current_total'];
		
		
		$new_addition=$percentage*$total;
		$new_total=$current_total+$new_addition;
		
		
		$sql_update="UPDATE departments SET current_total='$new_total' WHERE id='$id'";
		$res_update=mysql_query($sql_update) or die (mysql_error());
		
		
		$sql_alloc_insert="INSERT INTO allocations (department,amount,date) VALUES ('$department','$new_addition','$date')";
		$res_alloc_insert=mysql_query($sql_alloc_insert) or die (mysql_error());
	}
	
	
	
	if($type=="admin")
	{
		echo"<script type='text/javascript'>
		alert('Offerings added sucessfully!');
		window.location='../reports.php';
	</script>";
	}
	elseif($type=="user")
	{
		echo"<script type='text/javascript'>
		alert('Offerings added sucessfully!');
		window.location='../usersuccess.php';
	</script>";
		
	}
	
	
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>