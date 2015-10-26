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
			Chapel Offerings<br />
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
                <table cellspacing="0px" class="col-sm-12" style="float:left; text-align:left; border:thin solid #A3A3A3; margin-bottom:10px;">                        	
                            <thead>
								<tr height="40" >
									<th class="col-sm-1"> One Shilling </th>
									<th class="col-sm-1"> Five Shilling </th>
                                    <th class="col-sm-1"> Ten Shilling </th>
                                    <th class="col-sm-1"> Twenty Shilling </th>
                                    <th class="col-sm-1"> Forty Shilling </th>
                                    <th class="col-sm-1"> Fifty Shilling </th>
                                    <th class="col-sm-1"> Hundred Shilling </th>
                                    <th class="col-sm-1"> Two Hundred </th>
                                    <th class="col-sm-1"> Five Hundred </th>
                                    <th class="col-sm-1"> One Thousand </th>
                                    <th class="col-sm-1"> Date </th>
                                    <th class="col-sm-1"> Added By </th>
								</tr>
							</thead>
                          
                            
                            <?php 
							
								$sql_date="SELECT date_format(now(), '%y-%m-%d') as date";
								$res_date=mysql_query($sql_date) or die (mysql_error());
								
								while ($row_date=mysql_fetch_array($res_date, MYSQL-ASSOC))
								{
									$today=$row_date['date'];
								}
								
								$sql_select="SELECT * FROM offerings WHERE date='$today' ORDER BY id DESC";
								$res_select=mysql_query($sql_select) or die (mysql_error());
								
								while ($row_select=mysql_fetch_array($res_select, MYSQL-ASSOC))
								{
									$one=$row_select['one_shilling'];
									$five=$row_select['five_shilling'];
									$ten=$row_select['ten_shilling'];
									$twenty=$row_select['twenty_shilling'];
									$forty=$row_select['forty_shilling'];
									$fifty=$row_select['fifty_shilling'];
									$hundred=$row_select['hundred_shilling'];
									$twohundred=$row_select['two_hundred_shilling'];
									$fivehundred=$row_select['five_hundred_shilling'];
									$thousand=$row_select['thousand_shilling'];
									$date=$row_select['date'];
									$name=$row_select['admin_name'];
									
									
									print "
									<tr style='border:thin solid; height:10px'>
										<td style='border-top:thin solid #C4C4C4; padding-left:10px; padding-top:5px; padding-bottom:5px;'>$one</td>
										<td style='border-top:thin solid #C4C4C4; padding-left:10px; padding-top:5px; padding-bottom:5px;'>$five</td>
										<td style='border-top:thin solid #C4C4C4; padding-left:10px; padding-top:5px; padding-bottom:5px;'>$ten</td>
										<td style='border-top:thin solid #C4C4C4; padding-left:10px; padding-top:5px; padding-bottom:5px;'>$twenty</td>
										<td style='border-top:thin solid #C4C4C4; padding-left:10px; padding-top:5px; padding-bottom:5px;'>$forty</td>
										<td style='border-top:thin solid #C4C4C4; padding-left:10px; padding-top:5px; padding-bottom:5px;'>$fifty</td>
										<td style='border-top:thin solid #C4C4C4; padding-left:10px; padding-top:5px; padding-bottom:5px;'>$hundred</td>
										<td style='border-top:thin solid #C4C4C4; padding-left:10px; padding-top:5px; padding-bottom:5px;'>$twohundred</td>
										<td style='border-top:thin solid #C4C4C4; padding-left:10px; padding-top:5px; padding-bottom:5px;'>$fivehundred</td>
										<td style='border-top:thin solid #C4C4C4; padding-left:10px; padding-top:5px; padding-bottom:5px;'>$thousand</td>
										<td style='border-top:thin solid #C4C4C4; padding-left:10px; padding-top:5px; padding-bottom:5px;'>$date</td>
										<td style='border-top:thin solid #C4C4C4; padding-left:10px; padding-top:5px; padding-bottom:5px;'>$name</td>
									</tr>
								";
								}
					
					$sql_one_total="SELECT SUM(one_shilling) FROM offerings WHERE date='$date'";
					$res_one_total=mysql_query($sql_one_total) or die (mysql_error());
					
					while($row_one_total=mysql_fetch_array($res_one_total, MYSQL_ASSOC))
					{
						$one_total=$row_one_total['SUM(one_shilling)'];
					}
					
					
					$sql_five_total="SELECT SUM(five_shilling) FROM offerings WHERE date='$date'";
					$res_five_total=mysql_query($sql_five_total) or die (mysql_error());
					
					while($row_five_total=mysql_fetch_array($res_five_total, MYSQL_ASSOC))
					{
						$five_total=$row_five_total['SUM(five_shilling)'];
					}
					
					
					$sql_ten_total="SELECT SUM(ten_shilling) FROM offerings WHERE date='$date'";
					$res_ten_total=mysql_query($sql_ten_total) or die (mysql_error());
					
					while($row_ten_total=mysql_fetch_array($res_ten_total, MYSQL_ASSOC))
					{
						$ten_total=$row_ten_total['SUM(ten_shilling)'];
					}
					
					
					$sql_twenty_total="SELECT SUM(twenty_shilling) FROM offerings WHERE date='$date'";
					$res_twenty_total=mysql_query($sql_twenty_total) or die (mysql_error());
					
					while($row_twenty_total=mysql_fetch_array($res_twenty_total, MYSQL_ASSOC))
					{
						$twenty_total=$row_twenty_total['SUM(twenty_shilling)'];
					}
					
					
					$sql_forty_total="SELECT SUM(forty_shilling) FROM offerings WHERE date='$date'";
					$res_forty_total=mysql_query($sql_forty_total) or die (mysql_error());
					
					while($row_forty_total=mysql_fetch_array($res_forty_total, MYSQL_ASSOC))
					{
						$forty_total=$row_forty_total['SUM(forty_shilling)'];
					}
					
					
					$sql_fifty_total="SELECT SUM(fifty_shilling) FROM offerings WHERE date='$date'";
					$res_fifty_total=mysql_query($sql_fifty_total) or die (mysql_error());
					
					while($row_fifty_total=mysql_fetch_array($res_fifty_total, MYSQL_ASSOC))
					{
						$fifty_total=$row_fifty_total['SUM(fifty_shilling)'];
					}
					
					
					$sql_hundred_total="SELECT SUM(hundred_shilling) FROM offerings WHERE date='$date'";
					$res_hundred_total=mysql_query($sql_hundred_total) or die (mysql_error());
					
					while($row_hundred_total=mysql_fetch_array($res_hundred_total, MYSQL_ASSOC))
					{
						$hundred_total=$row_hundred_total['SUM(hundred_shilling)'];
					}
					
					
					$sql_two_hundred_total="SELECT SUM(two_hundred_shilling) FROM offerings WHERE date='$date'";
					$res_one_total=mysql_query($sql_two_hundred_total) or die (mysql_error());
					
					while($row_two_hundred_total=mysql_fetch_array($res_one_total, MYSQL_ASSOC))
					{
						$two_hundred_total=$row_two_hundred_total['SUM(two_hundred_shilling)'];
					}
					
					
					$sql_five_hundred_total="SELECT SUM(five_hundred_shilling) FROM offerings WHERE date='$date'";
					$res_one_total=mysql_query($sql_five_hundred_total) or die (mysql_error());
					
					while($row_five_hundred_total=mysql_fetch_array($res_one_total, MYSQL_ASSOC))
					{
						$five_hundred_total=$row_five_hundred_total['SUM(five_hundred_shilling)'];
					}
					
					
					$sql_thousand_total="SELECT SUM(thousand_shilling) FROM offerings WHERE date='$date'";
					$res_thousand_total=mysql_query($sql_thousand_total) or die (mysql_error());
					
					while($row_thousand_total=mysql_fetch_array($res_thousand_total, MYSQL_ASSOC))
					{
						$thousand_total=$row_thousand_total['SUM(thousand_shilling)'];
					}
					
					$grand_total=$one_total+$five_total+$ten_total+$twenty_total+$forty_total+$fifty_total+$hundred_total+$two_hundred_total+$five_hundred_total+$thousand_total;
								
							?>
                            
                            
                </table>
                
                Grand Total: <?php echo $grand_total ?>
                
                </center> 
       
       
       		
            </div>
</body>
</html>