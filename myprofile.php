<?php
session_start();
if(isset($_SESSION['admin_giris_id'])){
$page_title = "cpanel";
$Connect = 1 ;
$navbar = 1 ;
$page = '';
$userid = $_SESSION['admin_giris_id'] ;
require_once 'Header.php';


if (isset($_GET['page'],$_GET['userid']))
{
	$page   = $_GET['page'];
		
}else { $page = 'home';}
	
	
	
if($page == 'home'){
	$sorgu = 'Select * FROM tbl_kullanicilar WHERE k_id = ? ';
	$stmt = $connect-> prepare($sorgu);
	$stmt->execute(array($userid));
	$satir;
	while($satir = $stmt-> fetch())
	{
		$name    	= $satir['k_ad'];
		$surname     = $satir['k_soyad'];
		$username 	= $satir['k_kullaniciAdi'];
		$birthday 	= $satir['k_dtarihi'];
		$gsm		 = $satir['k_cepTelefon'];
		$email 	   = $satir['k_email'];
		$tescil	  = $satir['k_tescilTarihi'];
		$fullname    = $name .' '.$surname ;
	}
echo '
		<div class="container">	
			<div class="row">
				<h1>My profile :</h1>
					<div class="col-md-2"></div>
					<div class="col-md-6 col-sm-12">
						<div class="profilePic">
							<img src="img/bg/user.png" alt="your Profile Picture">
						</div>
						<div class="kullaniciBilgileri">
			<label for="k_fullname">Fullname   : </label>
			<span class="k_fullname">'.$fullname.'</span><br>
			
			<label for="k_kullaniciAdi">Username : </label>
			<span class="k_kullaniciAdi">'.$username.'</span><br>
			
			<label for="k_tescilTarihi">Gsm : </label>
			<span class="k_cepTelefonu">'.$gsm.'</span><br>
			
			<label for="k_tescilTarihi">E-mail :</label>
			<span class="k_email">'.$email.'</span><br>
			
			<label for="k_tescilTarihi">Reg Date :</label>
			<span class="k_tescilTarihi">'.$tescil.'</span><br>
						<a href="myprofile.php?page=edit&userid='.$userid.'">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Edit Your Profile</a>
						</div>	
			</div>
			<div class="col-md-3"></div>
		</div>
		</div>
		';
		
}//home page end 
if($page == 'edit'){
if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
if(isset($_POST['k-ad'], $_POST['k_soyad'], $_POST['k_kullaniciAdi'], 
		 $_POST['k_kullaniciSifre'], $_POST['k_dtarihi'], 
		 $_POST['k_cepTelefon'], $_POST['k_email']))
	{	 
		 $updateName 		 = $_POST['k-ad'];
		 $updateSurname 	  = $_POST['k_soyad'];
		 $updateUsername 	 = $_POST['k_kullaniciAdi'];
		 $updateUserPassword = $_POST['k_kullaniciSifre'];
		 $hashedPass 		 = md5($updateUserPassword);
		 $updateBirthday     = $_POST['k_dtarihi'];
		 $updateGsm          = $_POST['k_cepTelefon'];
		 $updateEmail        = $_POST['k_email'];
		 $updateSql = 'UPDATE tbl_kullanicilar SET k_ad = ?, 
		 										   k_soyad = ?,
												   k_kullaniciAdi = ?,
												   k_kullaniciSifre = ?,
												   k_dtarihi = ?,
												   k_cepTelefon = ?,
												   k_email = ?
												WHERE 
												   k_id = ?
												   ';
	  $stmtUpdate = $connect-> prepare($updateSql);
									   
	  $stmtUpdate-> execute(array($updateName, 
	  							  $updateSurname, 
								  $updateUsername, 
								  $hashedPass, 
								  $updateBirthday,
								  $updateGsm,
								  $updateEmail,
								  $userid ));
	 echo $stmtUpdate->rowCount() . ' Row Updated ';
								  
	}
	
}
	$sorgu = 'Select * FROM tbl_kullanicilar WHERE k_id = ? ';
	$stmt = $connect-> prepare($sorgu);
	$stmt->execute(array($userid));
	$satir;
	while($satir = $stmt-> fetch())
	{
		$name    	= $satir['k_ad'];
		$surname     = $satir['k_soyad'];
		$username 	= $satir['k_kullaniciAdi'];
		$password 	= $satir['k_kullaniciSifre'];
		$birthday 	= $satir['k_dtarihi'];
		$gsm		 = $satir['k_cepTelefon'];
		$email 	   = $satir['k_email'];
		$tescil	  = $satir['k_tescilTarihi'];
		$fullname    = $name .' '.$surname ;
		}	
	?>
	<div class="container">
	<div class="row">
	<div class="col-md-offset-1 col-md-5">
    	<div class="profilePic">
							<img src="img/bg/user.png" alt="">
						</div>
	<form action="myprofile.php?page=edit&userid=<?php echo $userid; ?>" method="post" >
		<div class="form-group">
	
						
		<label for="k_id">USER ID :</label>
		<input class="form-control" type="text" name="userid" value="<?php if(isset($userid)){ echo $userid; }?>" disabled>
 		</div>
		
		<div class="form-group">
		<label for="k_ad">Name :</label>
		<input class="form-control" type="text" value="<?php if(isset($name)){ echo $name; }?>" name ="k-ad" id="k_ad" autocomplete="off">
 		</div>
		
		<div class="form-group">
		<label for="k_soyad">surname :</label>
		<input class="form-control" type="text" value="<?php if(isset($surname)){ echo $surname; }?>" name ="k_soyad" id="k_soyad" autocomplete="off">
 		</div>
		
		<div class="form-group">
		<label for="k_kullaniciAdi">username :</label>
		<input class="form-control" type="text" value="<?php if(isset($username)){ echo $username; }?>" name ="k_kullaniciAdi" id="k_kullaniciAdi">
 		</div>
		
		<div class="form-group">
		<label for="old_password">old-password :</label>
		<input class="form-control" type="password" value="<?php if(isset($password)){ echo $password; }?>" name ="old_password" id="old_password" disabled>
 		</div>
		
		<div class="form-group">
		<label for="k_kullaniciSifre">new-password :</label>
		<input class="form-control" type="password" value="" name ="k_kullaniciSifre" id="k_kullaniciSifre" autocomplete="new-password" >
 		</div>
		
		<div class="form-group">
		<label for="k_dtarihi">Birthday (yyyy-mm-dd) :</label>
		<input class="form-control" type="date" value="<?php if(isset($birthday)){ echo $birthday; }?>" name ="k_dtarihi" id="k_dtarihi" >
 		</div>
		
		<div class="form-group">
		<label for="k_cepTelefon">GSM :</label>
		<input class="form-control" type="text" value="<?php if(isset($gsm)){ echo $gsm; }?>" name ="k_cepTelefon" id="k_cepTelefon" >
 		</div>
		
		<div class="form-group">
		<label for="k_email">E-mail :</label>
		<input class="form-control" type="text" value="<?php if(isset($email)){ echo $email; }?>" name ="k_email" id="k_email" >
 		</div>
		<input class="btn btn-info btn-block" type="submit" value="Update">
		</form>
		</div>
		</div>
		</div>
	<?php
		}

elseif($page == 'Delete'){
	
	//delete page 
	
	
	
	}	
	
	
	
	
	
	
	
	
	
require_once 'footer.php';
}else{/// if isset session 
	
	header('location:index.php');
	
	}
?>