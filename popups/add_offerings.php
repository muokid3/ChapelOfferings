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
<form class="form-horizontal" method="post" name="addclass" action="popups/saveaddofferings.php">
                    	
                       
                        
                        <div style="margin:5px" class="form-group">
                        	<label class="col-sm-5">One Shilling:</label>
                            <div class="col-sm-7">
                            	<input type="number" name="one" class="form-control" placeholder="One Shilling" />
                            </div>
                        </div>
                        
                        <div style="margin:5px" class="form-group">
                        	<label class="col-sm-5">Five Shilling:</label>
                            <div class="col-sm-7">
                            	<input type="number" name="five" class="form-control" placeholder="Five Shilling" />
                            </div>
                        </div>
                        
                        <div style="margin:5px" class="form-group">
                        	<label class="col-sm-5">Ten Shilling:</label>
                            <div class="col-sm-7">
                            	<input type="number" name="ten" class="form-control" placeholder="Ten Shilling" />
                            </div>
                        </div>
                        
                        <div style="margin:5px" class="form-group">
                        	<label class="col-sm-5">Twenty Shilling:</label>
                            <div class="col-sm-7">
                            	<input type="number" name="twenty" class="form-control" placeholder="Twenty Shilling" />
                            </div>
                        </div>
                        
                        <div style="margin:5px" class="form-group">
                        	<label class="col-sm-5">Forty Shilling:</label>
                            <div class="col-sm-7">
                            	<input type="number" name="forty" class="form-control" placeholder="Forty Shilling" />
                            </div>
                        </div>
                        
                        <div style="margin:5px" class="form-group">
                        	<label class="col-sm-5">Fifty Shilling:</label>
                            <div class="col-sm-7">
                            	<input type="number" name="fifty" class="form-control" placeholder="Fifty Shilling" />
                            </div>
                        </div>
                        
                        <div style="margin:5px" class="form-group">
                        	<label class="col-sm-5">Hundred Shilling:</label>
                            <div class="col-sm-7">
                            	<input type="number" name="hundred" class="form-control" placeholder="Hundred Shilling" />
                            </div>
                        </div>
                        
                        <div style="margin:5px" class="form-group">
                        	<label class="col-sm-5">Two Hundred Shilling:</label>
                            <div class="col-sm-7">
                            	<input type="number" name="twohundred" class="form-control" placeholder="Two Hundred Shilling" />
                            </div>
                        </div>
                        
                        <div style="margin:5px" class="form-group">
                        	<label class="col-sm-5">Five Hundred Shilling:</label>
                            <div class="col-sm-7">
                            	<input type="number" name="fivehundred" class="form-control" placeholder="Five Hundred Shilling" />
                            </div>
                        </div>
                        
                        <div style="margin:5px" class="form-group">
                        	<label class="col-sm-5">Thousand Shilling:</label>
                            <div class="col-sm-7">
                            	<input type="number" name="thousand" class="form-control" placeholder="Thousand Shilling" />
                            </div>
                        </div>
                        
                       
                        
                        <center><input type="submit" name="save" value="Save" id="submit" style="width:200px; height:30px; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; color:#002435; font-size:14px; cursor:pointer"/>
                        </center>
    </form> 

</body>
</html>