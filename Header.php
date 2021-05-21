<?php
ob_start("ob_gzhandler");
include 'init.php';
?>
<!doctype html>
<html lang="tr">
<head>
<title>
<?php  gettitle();  ?>
</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" >
<meta http-equiv="Content-Type" content="text/html; charset=x-mac-turkish" >
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1 ">
<link rel="stylesheet" type="text/css" href="<?php echo $css; ?>animate.css">
<link rel="stylesheet" type="text/css" href="<?php echo $css; ?>font-awesome.css">
<link rel="stylesheet" type="text/css" href="<?php echo $css; ?>bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="<?php echo $css; ?>normalize.css">
<link rel="stylesheet" type="text/css" href="<?php echo $css; ?>bootstrap-select.css">
<link rel="stylesheet" type="text/css" href="<?php echo $css; ?>bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?php echo $css; ?>style.css">
<link rel="stylesheet" type="text/css" href="Content/css/style.css">
</head>
<body>
