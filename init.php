<?php 


$css	     = 'Content/css/';
$js          = 'Content/js/';
$func        = 'Content/function/';
$img_bg	  = 'img/bg/';
$img_icon	= 'img/icon/';
$inc         = 'inc/';

/* -- includes sections  -- */

if(isset($Connect))
{ 
	if ($Connect == 1)
		{ 
			include 'bag.php';
		}
} 

include $func.'function.php';

if (isset($navbar))
{ 
	if($navbar == 1)
	{
		include 'navbar.php';
	}
}

/* -- End includes sections  -- */



?>