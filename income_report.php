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

 <div class="row">
    	<div align="center" class="col-sm-6 col-sm-offset-3" style="margin-top:3%; background-color:#0093af; padding:5px; color:#FFF; 
                -webkit-border-radius:10px; -moz-border-radius:10px; border-radius:10px">
                        <form class="form-horizontal" method="post" name="register" action="income_report_action.php" enctype="multipart/form-data">
                                            
                                            <div style="margin:5px" class="form-group">
                                                <label class="col-sm-5">Select Date:</label>
                                                <div class="col-sm-7">
                                                    <input type="date" name="date" class="form-control" />
                                                </div>
                                            </div>
                                            
                                                                                       
                                            <button type="submit" class="btn btn-default">View Income Report</button>
                        </form> <br>

    
    </div>
    </div><!--end of row-->
</body>
</html>