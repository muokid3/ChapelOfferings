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
			Chapel Income<br />
			
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
									<th class="col-sm-1"> Amount </th>
									<th class="col-sm-1"> Description </th>
                                    <th class="col-sm-1"> Date </th>
                                    <th class="col-sm-1"> Added By </th>
								</tr>
							</thead>
                          
                            
                            <?php 
							
								if ($specific_date)
								{
								
								$sql_select="SELECT * FROM income WHERE date='$specific_date'";
								$res_select=mysql_query($sql_select) or die (mysql_error());
								
								while ($row_select=mysql_fetch_array($res_select, MYSQL-ASSOC))
								{
									$amount=$row_select['amount'];
									$desc=$row_select['description'];
									$date=$row_select['date'];
									$name=$row_select['admin_name'];
									
									
									print "
									<tr style='border:thin solid; height:10px'>
										<td style='border-top:thin solid #C4C4C4; padding-left:10px; padding-top:5px; padding-bottom:5px;'>$amount</td>
										<td style='border-top:thin solid #C4C4C4; padding-left:10px; padding-top:5px; padding-bottom:5px;'>$desc</td>
										<td style='border-top:thin solid #C4C4C4; padding-left:10px; padding-top:5px; padding-bottom:5px;'>$date</td>
										<td style='border-top:thin solid #C4C4C4; padding-left:10px; padding-top:5px; padding-bottom:5px;'>$name</td>
									</tr>
								";
								}
					
					
					
					
					$amount_total="SELECT SUM(amount) FROM income WHERE date='$specific_date'";
					$res_amount_total=mysql_query($amount_total) or die (mysql_error());
					
					while($row_amount_total=mysql_fetch_array($res_amount_total, MYSQL_ASSOC))
					{
						$income_total=$row_amount_total['SUM(amount)'];
					}
					
					
								
			}
			else
			{
				echo"<script type='text/javascript'>
		alert('You Must Select a Date!');
		window.location='income_report.php';
	</script>";
			}
				?>
                            
                            
                </table>
                
                Grand Total: <?php echo $income_total ?>
                
                </center> 
       
       
       		
            </div>
</body>
</html>