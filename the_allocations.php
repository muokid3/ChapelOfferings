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

<div class="col-sm-12">
            <input type="button" value="Print" onclick="print()" />
            <br />
            <center>
   		     <img src="images/head.jpg" width="112" height="128" alt="head" /><br />
			Today's Allocations<br />
			As at 
			<?php
				$sql_time="SELECT date_format(now(), '%H:%i:%S') as time";
				$res_time=mysql_query($sql_time) or die (mysql_error());
				
				while ($row_time=mysql_fetch_array($res_time, MYSQL_ASSOC))
				{
					$time=$row_time['time'];
					echo $time;
				}
			 ?>
            on 
			<?php
				$sql_date="SELECT date_format(now(), '%d-%m-20%y') as date";
				$res_date=mysql_query($sql_date) or die (mysql_error());
				
				while ($row_date=mysql_fetch_array($res_date, MYSQL-ASSOC))
				{
					$date=$row_date['date'];
					echo $date;
				}
			?><br />

           </center>

<div style="margin-top:20px" class="col-sm-12"> 
            	<center>
                <table cellspacing="0px" class="col-sm-6 col-sm-offset-3" style="float:left; text-align:left; border:thin solid #A3A3A3; margin-bottom:10px;">                        	
                            <center>
                            <thead>
								<tr height="40" >
									<th class="col-sm-3"> Department </th>
									<th class="col-sm-3"> Amount Allocated </th>
                                    
								</tr>
							</thead>
                          	</center>
                            
                            <?php 
							
								$sql_date="SELECT date_format(now(), '%y-%m-%d') as date";
								$res_date=mysql_query($sql_date) or die (mysql_error());
								
								while ($row_date=mysql_fetch_array($res_date, MYSQL-ASSOC))
								{
									$today=$row_date['date'];
								}
								
								
								
								$sql_select="SELECT * FROM departments";
								$res_select=mysql_query($sql_select) or die (mysql_error());
								
								while ($row_select=mysql_fetch_array($res_select, MYSQL_ASSOC))
								{
									
									$department=$row_select['department'];
									
									$sql_dept="SELECT SUM(amount) FROM allocations WHERE department='$department' AND date='$today'";
									$res_dept=mysql_query($sql_dept) or die (mysql_error());
									
									while($row_res_dept=mysql_fetch_array($res_dept, MYSQL_ASSOC))
									{
										$dept_amount=$row_res_dept['SUM(amount)'];
										print " 
										<tr style='border:thin solid; height:10px'>
											<td style='border-top:thin solid #C4C4C4; padding-left:10px; padding-top:5px; padding-bottom:5px;'>$department</td>
										<td style='border-top:thin solid #C4C4C4; padding-left:10px; padding-top:5px; padding-bottom:5px;'>$dept_amount</td>
										
									</tr>
								";
									}
									
								}
					
					
					
					
							?>
                            
                            
                </table>
                
                
                
                </center> 
       
       
       		
            </div>
</body>
</html>