<?php
require_once('connection.php');

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
	
	
	$department=$_POST['department'];
	$department=stripslashes($department);
	$department=mysql_real_escape_string($department);
	
	$amount=$_POST['amount'];
	$amount=stripslashes($amount);
	$amount=mysql_real_escape_string($amount);
	
	$description=$_POST['description'];
	$description=stripslashes($description);
	$description=mysql_real_escape_string($description);
	
	
	
	/*$sql_insert="INSERT INTO expenses (department,amount,description,date) VALUES ('$department','$amount','$description','$date')";
	$res_insert=mysql_query($sql_insert) or die (mysql_error());*/
	
	
		
	
	$sql_select="SELECT * FROM departments WHERE department='$department'";
	$res_select=mysql_query($sql_select) or die (mysql_error());
	
	while ($row_select=mysql_fetch_array($res_select, MYSQL_ASSOC))
	{
		$id=$row_select['id'];
		$department=$row_select['department'];
		$percentage=$row_select['percentage'];
		$current_total=$row_select['current_total'];
		
		
		/*$new_addition=$percentage*$total;
		$new_total=$current_total+$new_addition;
		
		
		$sql_update="UPDATE departments SET current_total='$new_total' WHERE id='$id'";
		$res_update=mysql_query($sql_update) or die (mysql_error());
		
		
		$sql_alloc_insert="INSERT INTO allocations (department,amount,date) VALUES ('$department','$new_addition','$date')";
		$res_alloc_insert=mysql_query($sql_alloc_insert) or die (mysql_error());*/
	}
	
	if ($description&&$department&&$amount)
	{
		if ($amount<=$current_total)
		{
			$new_current_total=$current_total-$amount;
			
			$sql_update="UPDATE departments SET current_total='$new_current_total' WHERE id='$id'";
			$res_update=mysql_query($sql_update) or die (mysql_error());
			
			$sql_expense_insert="INSERT INTO expenses (department,amount,description,date) VALUES ('$department','$amount','$description','$date')";
			$res_expense_insert=mysql_query($sql_expense_insert) or die (mysql_error());
			
			
			echo"<script type='text/javascript'>
				alert('Record Added Successfully!');
				window.location='add_expenses.php';
			</script>";
			
		}
		else
		{
			echo"<script type='text/javascript'>
				alert('$department can not use that amount for expenses. The available balance for the department is $current_total');
				window.location='add_expenses.php';
			</script>";
		}
	}
	else
	{
		echo"<script type='text/javascript'>
		alert('You Must Fill All The Fields!');
		window.location='add_expenses.php';
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