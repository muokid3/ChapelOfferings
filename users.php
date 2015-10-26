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
	
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chapel Offerings</title>

<link rel="stylesheet" href="src/facebox.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="src/facebox.js"></script>

<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>

</head>

<body>           

<div style="margin-top:20px" class="col-sm-12"> 
            	<center>
                <table cellspacing="0px" class="col-sm-12" style="float:left; text-align:left; border:thin solid #A3A3A3; margin-bottom:10px;">                        	
                            <thead>
								<tr height="40" >
									<th class="col-sm-3"> Name </th>
									<th class="col-sm-3"> Username </th>
                                    <th class="col-sm-3"> Type </th>
                                    <th class="col-sm-3"> Action </th>
                                    
								</tr>
							</thead>
                          
                            
                            <?php 
							
							
								
								$sql_select="SELECT * FROM admin";
								$res_select=mysql_query($sql_select) or die (mysql_error());
								
								while ($row_select=mysql_fetch_array($res_select, MYSQL-ASSOC))
								{
									$id=$row_select['id'];
									$name=$row_select['name'];
									$username=$row_select['username'];
									$type=$row_select['type'];									
									
									
									print "
									<tr style='border:thin solid; height:10px'>
										<td style='border-top:thin solid #C4C4C4; padding-left:10px; padding-top:5px; padding-bottom:5px;'>$name</td>
										<td style='border-top:thin solid #C4C4C4; padding-left:10px; padding-top:5px; padding-bottom:5px;'>$username</td>
										<td style='border-top:thin solid #C4C4C4; padding-left:10px; padding-top:5px; padding-bottom:5px;'>$type</td>
										<td style='border-top:thin solid #C4C4C4; padding-left:10px; padding-top:5px; padding-bottom:5px;'>
											<a rel='facebox' href='popups/deleteuser.php?id=$id' title='click here to delete this user'>Delete</a> |
											<a rel='facebox' href='popups/resetuserpassword.php?id=$id' title='click here to reset this user password'>Reset Password</a>
										</td>
										
									</tr>
								";
								}
					
					
		
				?>
                            
                            
                </table>
                
               
                
                </center> 
       
       
       		
            </div>
</body>
</html>