<?php

session_start();

function Errors($errno, $errstr)
							{
							error_log("Error: [$errno] $errstr",1,
							"noexist@gmail.com","From: localhost"); //sends error msg to the email
							}
							//set error handler
							set_error_handler("Errors",E_NOTICE); //E_NOTICE...This is an error type
					
	$connect=mysql_connect("localhost","root","");
	
	if (!$connect)
	{
		echo "Could not connect to the database";
	}
	
	mysql_select_db("chapel", $connect);
	
	
?>