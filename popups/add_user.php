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
<form class="form-horizontal" method="post" name="addclass" action="popups/saveadduser.php">
                    	
                       
                        
                        <div style="margin:5px" class="form-group">
                        	<label class="col-sm-5">Name:</label>
                            <div class="col-sm-7">
                            	<input type="text" name="name" class="form-control" placeholder="Name" />
                            </div>
                        </div>
                        
                        <div style="margin:5px" class="form-group">
                        	<label class="col-sm-5">Username:</label>
                            <div class="col-sm-7">
                            	<input type="text" name="username" class="form-control" placeholder="Username" />
                            </div>
                        </div>
                        
                        
                        
                        <center><input type="submit" name="save" value="Save" id="submit" style="width:200px; height:30px; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; color:#002435; font-size:14px; cursor:pointer"/>
                        </center>
    </form> 
</body>
</html>