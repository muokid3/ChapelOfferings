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
<title>Untitled Document</title>
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

<?php

	$sql_select="SELECT * FROM departments";
	$res_select=mysql_query($sql_select) or die (mysql_error());
	
	$sql_select_2="SELECT * FROM departments";
	$res_select_2=mysql_query($sql_select_2) or die (mysql_error());



?>


 <div class="row">
    	<div align="center" class="col-sm-6 col-sm-offset-3" style="margin-top:3%; background-color:#0093af; padding:5px; color:#FFF; 
                -webkit-border-radius:10px; -moz-border-radius:10px; border-radius:10px">
                        Add Expense
                        <form class="form-horizontal" method="post" name="register" action="add_expenses_action.php" enctype="multipart/form-data">
                                            
                                            <div style="margin:5px" class="form-group">
                                            	
                                                <label class="col-sm-5">Department:</label>
                                                <div class="col-sm-7">
                                                    <select class="form-control" name="department">
                                                    	<option value="">--Select Department--</option>
                                                        <?php 
															while ($row_select=mysql_fetch_array($res_select, MYSQL_ASSOC))
															{
																$department=$row_select['department'];
														?>
                                                		<option value="<?php echo $department ?>"><?php echo $department ?></option>
                                                        <?php }?>
                                                        
                                                	</select>
                                                    
                                                </div>
                                            </div>
                                            
                                            
                                            
                                            
                                            <div style="margin:5px" class="form-group">
                                                <label class="col-sm-5">Amount:</label>
                                                <div class="col-sm-7">
                                                    <input type="number" name="amount" class="form-control" placeholder="Amount"  />
                                                </div>
                                            </div>
                                            
                                            
                                            <div style="margin:5px" class="form-group">
                                                <label class="col-sm-5">Description:</label>
                                                <div class="col-sm-7">
                                                	<textarea cols="4" rows="5" name="description" placeholder="Description. eg. Buying Speakers, Buying Chapel Biscuits etc" class="form-control"></textarea>
                                                    
                                                </div>
                                            </div>
                                            
                                            
                                            
                                            
                                            
                                                                                       
                                            <button type="submit" class="btn btn-default">Add Expense</button>
                        </form> <br>
                        
                        
                        

    
    </div>
    </div><!--end of row-->
</body>
</html>