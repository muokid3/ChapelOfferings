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
	
	$user=$_SESSION['user'];
	$sql="SELECT * FROM admin WHERE username='$user'";
	$res=mysql_query($sql) or die (mysql_error());
	
	while ($row=mysql_fetch_array($res, MYSQL_ASSOC))
	{
			$name=$row['name'];
	}

?>
<!DOCTYPE html>

<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Expenses - Chapel Union</title>

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




<style>
a 
{
	padding:5px;
	color:#000;
	font-weight:bold;
}

a:hover
{
	background-color:#000;
	color:#FFF;
	text-decoration:none;
}



</style>

</head>

<body>
	<div class="container-fluid">
    
    <div class="row" style="margin-top:5px">
    	<div class="col-sm-12">
        	<center>
   	    		<img src="images/head.jpg" width="250" height="150"  style="-webkit-border-radius:10px" />
            </center>
        </div>       
    </div><!--end of row-->
         
         
    	<div class="row" style="margin-top:2%; border-bottom:3px solid #c7c7c7">
        	<div align="center" style="float:left; padding-bottom:5px; background-color:#FFF" class="col-sm-12">
       	    	                
                	
                    <div style="margin-top:3%" class="row">
        
                    
                    <div class="col-sm-2 col-sm-offset-1">
                        <a class="thumbnail" href="reports.php"><img src="images/win.png" width="30%" height="30%" 
                        alt="Winners">Reports</a>
                    </div>
                    
                    <div class="col-sm-2">
                        <a class="thumbnail" href="allocations.php"><img src="images/candidates.png" width="30%" height="30%" 
                        alt="Candidates">Allocations</a>
                    </div>
                    
                    <div class="col-sm-2">
                        <a class="thumbnail" href="expenses.php"><img src="images/icon_media.png" width="30%" height="30%" 
                        alt="Candidates">Expenses</a>
                    </div>
                    
                     <div class="col-sm-2">
                        <a class="thumbnail" href="adminprofile.php"><img src="images/icon_users.png" width="30%" height="30%" 
                        alt="Adm Profile">Admin Profile</a>
                    </div>
                                        
                    
                    
                    <div class="col-sm-2">
                        <a class="thumbnail" href="logout.php"><img src="images/logoutnew.png" width="30%" height="30%" 
                        alt="Adm Profile">Logout</a>
                    </div>
                    
                </div>
                
                
                
            </div>
        </div><!--end of header row-->
        
        			<div style="margin-top:20px">
                        	<center>
                            	Logged In as: <?php echo $name ?>
                            	
                       		</center>
      </div>  
                      
                      
                      <div style="margin-top:20px">
                        	<center>
                            	<a href="add_expenses.php" target="admin">Add Expenses </a>|
                            	<a href="view_expenses_history.php" target="admin"> View Expenses </a>                                
                            	
                       		</center>
                      </div>   
        
       
        	
            
       <div class="row"> 
       
       		<div align="center" class="col-sm-8 col-sm-offset-2" style="height:auto; font-size:16px; border:double #55C8FF; float:left; margin-top:20px; margin-bottom:30px;">  
       
       <iframe src="add_expenses.php" width="100%" height="480px" name="admin" frameborder="0" style="margin-top:10px; margin-bottom:10px; overflow:scroll;"></iframe>	
       		
            </div>
       
       </div>
       
       

        
        <footer align="center" class="col-sm-10 col-sm-offset-1" style="margin-top:3%; margin-bottom:3%; background-color:#73b9e6; 
        -webkit-border-bottom-right-radius:10px; -webkit-border-bottom-left-radius:10px; -moz-border-radius-bottomright:10px;
         -moz-border-radius-bottomleft:10px; border-bottom-left-radius:10px; border-bottom-right-radius:10px">
         &copy; 2014 Chapel Union. All Rights Reserved </footer>
                
	</div><!--end of main container fluid-->
</body>
</html>
