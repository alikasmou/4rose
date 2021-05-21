<?php

// Connect to database by PDO 

$Username_db='root';
$Password_db='';
$dns = 'mysql:host=localhost;dbname=alikasmo_forrose_db';
$option = array(
					PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
			   );

try
	{
		$connect = new PDO($dns, $Username_db , $Password_db , $option);
		$connect -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//echo '<div class="connect" > <i class="fa fa-wifi fa-3x"></i> </div>';
	}
catch(PDOException $erorr){
	echo $erorr -> getMessage();
	}

?>



