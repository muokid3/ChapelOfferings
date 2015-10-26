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
			<?php
				
				$department=$_POST['department'];
				echo $department;
				
			?> Expenses <br />
			
            on 
			<?php
				$specific_date=$_POST['date'];
				
				echo $specific_date;
				
			?><br />

           </center>

<div style="margin-top:20px" class="col-sm-12"> 
            	<center>
                <table cellspacing="0px" class="col-sm-12" style="float:left; text-align:left; border:thin solid #A3A3A3; margin-bottom:10px;">                        	
                            <thead>
								<tr height="40" >
									<th class="col-sm-1"> Department </th>
									<th class="col-sm-1"> Amount </th>
                                    <th class="col-sm-1"> Date </th>
                                    <th class="col-sm-1"> Description </th>
                                    
								</tr>
							</thead>
                          
                            
                            <?php 
							
								if ($specific_date && $department)
								{
								
								$sql_select="SELECT * FROM expenses WHERE date='$specific_date' AND department='$department'";
								$res_select=mysql_query($sql_select) or die (mysql_error());
								
								while ($row_select=mysql_fetch_array($res_select, MYSQL-ASSOC))
								{
									$dept=$row_select['department'];
									$amount=$row_select['amount'];
									$date=$row_select['date'];
									$description=$row_select['description'];
																		
									
									print "
									<tr style='border:thin solid; height:10px'>
										<td style='border-top:thin solid #C4C4C4; padding-left:10px; padding-top:5px; padding-bottom:5px;'>$dept</td>
										<td style='border-top:thin solid #C4C4C4; padding-left:10px; padding-top:5px; padding-bottom:5px;'>$amount</td>
										<td style='border-top:thin solid #C4C4C4; padding-left:10px; padding-top:5px; padding-bottom:5px;'>$date</td>
										<td style='border-top:thin solid #C4C4C4; padding-left:10px; padding-top:5px; padding-bottom:5px;'>$description</td>
										
									</tr>
								";
								}
					
					$total_alloc="SELECT SUM(amount) FROM expenses WHERE date='$specific_date' AND department='$department'";
					$res_total_alloc=mysql_query($total_alloc) or die (mysql_error());
					
					while($row_total_alloc=mysql_fetch_array($res_total_alloc, MYSQL_ASSOC))
					{
						$total_dept_alloc=$row_total_alloc['SUM(amount)'];
					}
					
								
			}
			else
			{
				echo"<script type='text/javascript'>
		alert('You Must Select a Date and a Department!');
		window.location='view_expenses_history.php';
	</script>";
			}
				?>
                            
                            
                </table>
               Grand Total: <?php echo $total_dept_alloc; ?>
                </center> 
       
       
       		
            </div>
</body>
</html>