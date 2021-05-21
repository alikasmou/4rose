<?php
session_start();
if (isset($_SESSION['admin_giris_id']))
{
$page_title = "cpanel";
$Connect = 1 ;
$navbar = 1 ;
$page = '';
require_once 'Header.php';

if (isset($_GET['page']))
{
	$page = $_GET['page'];
		
}else { $page = 'home';}

if ($page == 'home'){
	
//here home design
echo 'Here is home page ';
	
}

elseif($page == 'logout'){	
	session_unset(); 
	session_destroy(); 
	header('Location:index.php');
	exit();
}
require_once 'footer.php';
}else{ header('Location:index.php'); }
?>