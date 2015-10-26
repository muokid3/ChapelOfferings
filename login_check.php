<?php

	require_once('connection.php');
	
	$username=$_POST['username'];
	$username=stripslashes($username);
	$username=mysql_real_escape_string($username);
	
	$password=md5($_POST['password']);
	$password=stripslashes($password);
	$password=mysql_real_escape_string($password);
	
	$sql="SELECT * FROM admin WHERE username='$username' AND password='$password'";
	$res=mysql_query($sql);
	
	while ($row=mysql_fetch_array($res, MYSQL_ASSOC))
	{
		$type=$row['type'];
	}
	
	function check()
	{
		$connect=mysql_connect("localhost","root","");
		$choose_db=mysql_select_db("chapel", $connect);
		
		$username=$_POST['username'];
		$username=stripslashes($username);
		$username=mysql_real_escape_string($username);
		
		$password=md5($_POST['password']);
		$password=stripslashes($password);
		$password=mysql_real_escape_string($password);
		
		
		$sql="SELECT * FROM admin WHERE username='$username' AND password='$password'";
		$res=mysql_query($sql);
		
		return mysql_num_rows($res);
	}
	
	$check=check();
	
	if ($check==1)
	{
		if ($type=="admin")
		{
			$_SESSION['user']=$username;
			adminsuccess();
		}
		elseif($type=="user")
		{
			$_SESSION['user']=$username;
			usersuccess();			
		}
	}
	else
	{
		failure();
	}
	
	function adminsuccess()
	{
		header ("Location: success.php");
	}
	
	function usersuccess()
	{
		header ("Location: usersuccess.php");
	}
	
	function failure()
	{
		header("Location: login_failure.php");
	}
	
	

?>