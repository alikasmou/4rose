<?php
session_start();
if(isset($_SESSION['admin_giris_id'])){
$page_title = "cpanel";
$Connect = 1 ;
$navbar = 1 ;
$page = 'Sellers | ';
require_once 'Header.php';


if (isset($_GET['page']))
{
	$page = $_GET['page'];
		
}else { $page = 'home';}
?>	
<div class="container">
<div class="row">
<div class="col-md-4">
<a href="seller.php?page=add">
<button class="fa fa-plus btn-add"> Add Company</button>
</a>
</div>
</div><!---row---->
</div><!--container buttons Add | Update | Delete --->
<?php
if($page == 'home'){
	$fetchaddressContact = 'SELECT   
				tbl_SaticiAdres.satAdresid,
				tbl_SaticiAdres.adres_saticiid,
				tbl_SaticiAdres.adres_turu,
        		tbl_SaticiAdres.acikAdres,
        		tbl_SaticiAdres.googleAdres,
				tbl_SaticiIletisim.saticiemail,
     	        tbl_SaticiIletisim.saticicepTelefon,
   	      	    tbl_SaticiIletisim.saticifax,
   	    	    tbl_SaticiIletisim.saticitel,
				tbl_SaticiIletisim.adSoyad,
     	        tbl_saticilar.saticiFirmaAdi,
    	        tbl_saticilar.saticiVergiNo,
      	        tbl_ulke.ulke,
      	        tbl_sehir.sehir,
      	        tbl_vergiDairesi.vergiDairesi
        FROM
       		    tbl_SaticiAdres
        LEFT JOIN
       	 	    tbl_SaticiIletisim
        ON
      	  	    tbl_SaticiIletisim.for_adres_id = tbl_SaticiAdres.satAdresid
        LEFT JOIN
     	        tbl_saticilar
        ON
       	 		tbl_saticilar.saticiid = tbl_SaticiAdres.adres_saticiid
        LEFT JOIN
       	 		tbl_ulke
        ON
        		tbl_ulke.ulkeid = tbl_SaticiAdres.ulke
        LEFT JOIN
       	 		tbl_sehir
        ON
       	 		tbl_sehir.sehirid = tbl_SaticiAdres.sehir
        LEFT JOIN
      	  		tbl_vergiDairesi
        ON
       	 		tbl_vergiDairesi.vergiDairesiid = tbl_saticilar.saticiVergiDairesi
        ORDER BY
				saticiid DESC
		';
	?>
<div class="container">
	<div class="row">
    <?php
$stmnt = $connect-> prepare($fetchaddressContact);
$stmnt->execute();
while($satir = $stmnt->fetch()){
echo'	
	<div class="col-sm-12 col-md-6">
     <div class="cart">
        <h2>'.$satir['saticiFirmaAdi'].'('.strtoupper($satir['adres_turu']).')</h2>
        <strong>V.D</strong> '.$satir['vergiDairesi'].' '.$satir['saticiVergiNo'].'<br>
        <hr>
		<div class="adresBilgileri">
            <p>'.$satir['acikAdres'].'<br>
            <strong>'.$satir['ulke'].' - '.$satir['sehir'].'</strong><br>
            </p>
        </div>
        <div class="iletisimBilgileri">
            <label><h3>Contact :</h3></label><br>
            <table class="table">
				<tr>
					<td>Fullname </td>
					<td>'.$satir['adSoyad'].'</td>
				</tr>
            	<tr>
					<td>Gsm</td>
					<td>'.$satir['saticicepTelefon'].'</td>
				</tr>
            	<tr>
					<td>Phone</td>
					<td>'.$satir['saticitel'].'</td>
				</tr>
            	<tr>
					<td>Fax</td>
					<td>'.$satir['saticifax'].'</td>
				</tr>
            	<tr>
					<td><email>Email</td>
					<td>'.$satir['saticiemail'].'</email></td>
				</tr>
            </table>
			<a href="seller.php?page=addContact&sellerid='.$satir['adres_saticiid'].'&addresid='.$satir['satAdresid'].'">Add contact</a>
        </div>
	</div>
</div>
	';
}
	
?>
	</div><!---row end-->
</div><!---container end-->
	<?php	
}


elseif($page == 'add'){
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if(isset($_POST['companyName'],$_POST['taxRoom'],$_POST['taxNo']))
		{
			$companyName = $_POST['companyName'];
			$companyCode = substr($companyName,0,3) .'_'.rand(0,1000);
			$companyTaxRoom = $_POST['taxRoom'];
			$companyTaxNo = $_POST['taxNo'];
			$insertCompany = 'INSERT INTO tbl_saticilar (saticiFirmaAdi,
														 saticikodu,
														 saticiVergiDairesi,
														 saticiVergiNo)
													
													VALUES (
													:companyName,
													:companyCode,
													:companyTaxRoom,
													:companyTaxNo
															)';
			$stmntInsert = $connect-> prepare($insertCompany);
			$stmntInsert->execute(array(
				'companyName' 	=> $companyName,
				'companyCode' 	=> $companyCode,
				'companyTaxRoom' => $companyTaxRoom,
				'companyTaxNo'   => $companyTaxNo
			));
			header('refresh: 2 ; url=seller.php?page=addadres');
			echo '<div class="alert alert-info"> Company inserted .. </div>';
		}	
		
	}
?>
	<div class="container">
    	<div class="row">
    		<div class="col-md-2 sm-hidden"></div>
            <div class="col-md-8 col-sm-12">
            	<form class="" action="seller.php?page=add" method="post">
                	<div class="form-group">
                        <label for="companyName">Company name :</label>
                        <input type="text"
                        	   id="companyName" 
                        	   class="form-control" 
                               name="companyName" >
                	</div>
                	<div class="form-group">
                    	<label for="taxRoom">Tax Department : </label>
                        <select class="selectpicker form-control" name="taxRoom" data-live-search="true">
                        <option value="">Select Tax Department....</option>
                        <?php
							$fetchVergiDairesi = 'SELECT * FROM tbl_vergiDairesi';
							$stmntvergi = $connect-> Prepare($fetchVergiDairesi);
							$stmntvergi->execute();
							while($satir = $stmntvergi->fetch())
							{
								echo '<option value="'.$satir['vergiDairesiid'].'">'.$satir['vergiDairesi'].'</option>';	
							}
						
						?>
                        </select>
                	</div>
                    <div class="form-group">
                        <label for="taxNo">Tax no :</label>
                        <input type="text"
                        	   id="taxNo" 
                        	   class="form-control" 
                               name="taxNo"
                               placeholder="Should be 10 number ex: 517 xxx xx xx"
                               >
                	</div>
                    <input type="submit" class="btn btn-info" value="Save Company">
                    
                </form> 
            </div>
            <div class="col-md-2 sm-hidden"></div>
    	</div>
    </div>
<?php	
}

elseif($page == 'edit'){
	echo "edit";
		if(isset ($_GET['sellerid'])){
		if(is_numeric($_GET['sellerid'])){
			$sellerid = intval($_GET['sellerid']);
			echo $sellerid;
		}else{ echo 'Requested ID is failed';}
		
		}else{ echo 'there is no such ID'; }
}
elseif($page == 'delete'){
	echo "delete";
			if(isset ($_GET['sellerid'])){
		if(is_numeric($_GET['sellerid'])){
			$sellerid = intval($_GET['sellerid']);
			echo $sellerid;
		}else{ echo 'Requested ID is failed';}
		
		}else{ echo 'there is no such ID'; }
}
	
elseif($page == 'preview'){
	
	echo "preview";
	if(isset ($_GET['sellerid'])){
		if(is_numeric($_GET['sellerid'])){
			$sellerid = intval($_GET['sellerid']);
			echo $sellerid;
		}else{ echo 'Requested ID is failed';}
		
		}else{ echo 'there is no such ID'; }
	
}
elseif($page == 'addContact'){
	if (isset($_GET['sellerid'],$_GET['addresid'])){
		$sellerid = intval($_GET['sellerid']);
		$addresid = intval($_GET['addresid']);
	}else{
			header("location:seller.php");
		 }
	
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{	
		if(isset($_POST['contactName'],
				 $_POST['selectAdres'],
				 $_POST['gsm'],
				 $_POST['email'],
				 $_POST['tel'],
				 $_POST['fax'])){
					 
			$fullname = 	$_POST['contactName'];
			$Foradres =    $_POST['selectAdres'];
			$gsm      =    $_POST['gsm'];
			$email    =    $_POST['email'];
			$tel      =	$_POST['tel'];
			$fax      =	$_POST['fax'];
$AddcontactSql = 'INSERT INTO tbl_SaticiIletisim (ilet_saticiid, for_adres_id, adSoyad, saticiemail, saticicepTelefon, saticifax, saticitel)
	values(:zilet_saticiid,:zfor_adres_id , :zadSoyad , :zsaticiemail , :zsaticicepTelefon , :zsaticifax , :saticitel)';
$stmnt = $connect-> prepare($AddcontactSql);
$stmnt->execute(array(
						'zilet_saticiid'    => $sellerid,
						'zfor_adres_id'   => $Foradres,
						'zadSoyad'     => $fullname,
						'zsaticiemail'    => $email,
						'zsaticicepTelefon'   => $gsm ,
						'zsaticifax'    => $fax,
						'saticitel'     => $tel,
						));
	echo '<div class="alert alert-info"> Contact inserted .. </div>';
		}
	}
	?>
    	<div class="container">
        	<div class="row">
        		<div class="col-md-2 sm-hidden"></div>
                	<div class="col-md-8 col-sm-12">
                    <form action="" method="post">
                    	<div class="form-group">
                        	<label for="">Contact name :</label>
                            <input  type="text"
                            		class="form-control" 
                            		id="contactName"
                                    name="contactName"
                                    placeholder="ex : Contact Person Name and Surname">
                                    <i></i>
                        </div>
                        
                        <div class="form-group">
                        	<label for="">Select Address:</label>
                       <select class="selectpicker form-control" name="selectAdres" data-live-search="true">
        <option value="">Select Address....</option>
        <?php
        $sorgu = 'SELECT tbl_SaticiAdres.satAdresid,
	   tbl_SaticiAdres.adres_turu,
	   tbl_SaticiAdres.acikAdres,
	   tbl_sehir.sehir
FROM
		tbl_SaticiAdres
INNER JOIN
		tbl_sehir
ON
		tbl_sehir.sehirid = tbl_SaticiAdres.sehir
WHERE
		tbl_SaticiAdres.adres_saticiid = ?';
		$stmt = $connect-> Prepare($sorgu);
		$stmt-> execute(array($sellerid));
		while ($satir = $stmt -> fetch())
		{
			$acikAdres = $satir['adres_turu'];
			$sehirAdres = $satir['sehir'];
			$selectAdres = $sehirAdres .'_'. strtoupper($acikAdres);
			echo '<option value="'.$satir['satAdresid'].'">'.$selectAdres.'</option>';	
		}
		?>
        </select>
                        </div>
                        
                        <div class="form-group">
                        	<label for="">Gsm :</label>
                            <input  type="text"
                            		class="form-control" 
                            		id="gsm"
                                    name="gsm"
                                    placeholder="ex : +90 505 xxx xx xx">
                                    <i></i>
                        </div>
                        <div class="form-group">
                        	<label for="">E-mail :</label>
                            <input  type="email"
                            		class="form-control" 
                            		id="email"
                                    name="email"
                                    placeholder="must be a valid email">
                                    <i></i>
                        </div>
                        <div class="form-group">
                        	<label for="">Office phone :</label>
                            <input class="form-control" 
                            		id="tel"
                                    name="tel"
                                    placeholder="ex : +90 212 xxx xx xx ">
                                    <i></i>
                        </div>
                        <div class="form-group">
                        	<label for="">Fax :</label>
                            <input class="form-control" 
                            		id="fax"
                                    name="fax"
                                    placeholder="fax">
                                    <i></i>
                        </div>
                            <div class="form-group">
                        	<label for="">Sellerid :</label>
                            <input class="form-control" 
                            		id="sellerid"
                                    name="sellerid"
                                    value="<?php echo $sellerid; ?>"
                                    disabled>
                                    <i></i>
                        </div>
                    	<input type="submit" class="btn btn-info" value="Save Contact">
                        </form> 
                    </div>
                    
                <div class="col-md-2 sm-hidden"></div>
        	</div>
        </div>
	<?php
	}//end of add contact
elseif($page == 'addadres'){
	
	if($_SERVER['REQUEST_METHOD']){
		if(isset($_POST['adresLabel'],
				 $_POST['company'],
				 $_POST['country'],
				 $_POST['city'],
				 $_POST['fulladres'],
				 $_POST['googleAdres'])){
					 
				$AdresLabel = $_POST['adresLabel'];
				$company = $_POST['company'];
				$country = $_POST['country'];
				$city = $_POST['city'];
				$fulladres = $_POST['fulladres'];
				$googleAdres = $_POST['googleAdres'];
				
				$insertAdres = '
				INSERT INTO tbl_SaticiAdres(adres_saticiid, ulke, adres_turu, sehir, acikAdres, googleAdres )
				values(:varAdresSatici , :varUlke , :varAdresTuru, :varSehir , :varAcikAdres , :varGoogleAdres )
				';
				$stmntInserAdres = $connect-> prepare($insertAdres);
				$stmntInserAdres->execute(array(
						'varAdresSatici'=> $company,
						'varUlke'=> 		$country,
						'varAdresTuru'=>   $AdresLabel,
						'varSehir'=> 	   $city,
						'varAcikAdres'=>   $fulladres,
						'varGoogleAdres'=> $googleAdres
						));
				echo '<div class="alert alert-info"> Address inserted .. </div>';	
			}
		}
	?>
<div class="container">
    	<div class="row">
    		<div class="col-md-2 sm-hidden"></div>
            <div class="col-md-8 col-sm-12">
            	<form class="" action="seller.php?page=addadres" method="post">
                	<div class="form-group">
                        <label for="adresLabel">Address Label :</label>
                        <input type="text"
                        	   id="adresLabel" 
                        	   class="form-control"
                               placeholder="Example Office , Branch ,Call Center" 
                               name="adresLabel" >
                	</div>
                	<div class="form-group">
                    	<label for="company">Select company : </label>
                        <select class="selectpicker form-control" 
                        		id="company" 
                                name="company" 
                                data-live-search="true">
                        <option value="">Select company....</option>
                        <?php
						//// fetch company table 
						$fetchCompany = 'SELECT saticiid,saticiFirmaAdi FROM tbl_saticilar';
						$stmntCompany = $connect-> prepare($fetchCompany);
						$stmntCompany->execute();
						while($satir = $stmntCompany->fetch())
						{
							echo '<option value="'.$satir['saticiid'].'">'.$satir['saticiFirmaAdi'].'</option>';	
						}
						
						?>
                        </select>
                	</div>
                    <div class="form-group">
                        <label for="country">Country :</label>
                       <select class="selectpicker form-control" 
                       		   id="country" 
                               name="country" 
                               data-live-search="true">
                        <option value="">Select country....</option>
                        <?php
						//// fetch countries
						$fetchUlke = 'SELECT * FROM tbl_ulke';
						$stmntUlke = $connect-> prepare($fetchUlke);
						$stmntUlke->execute();
						while($satir = $stmntUlke->fetch())
						{
							$ulkeid = $satir['ulkeid'];
							echo '<option value="'.$satir['ulkeid'].'">'.$satir['ulke'].'</option>';	
						}
						
						?>
                        </select>
                	</div>
                            <div class="form-group">
                        <label for="city">City :</label>
                      <select class="selectpicker form-control" 
                      		  id="city" 
                              name="city" 
                              data-live-search="true">
                        <option value="">Select City....</option>
                         <?php
						//// fetch cities
						$fetchSehir = 'SELECT * FROM tbl_sehir';
						$stmntSehir = $connect-> prepare($fetchSehir);
						$stmntSehir->execute();
						while($satir = $stmntSehir->fetch())
						{
							echo '<option value="'.$satir['sehirid'].'">'.$satir['sehir'].'</option>';	
						}
						
						?>
                        </select>
                	</div>
                    <div class="form-group">
                        <label for="fulladres">Full address :</label>
                   		<textarea class="form-control" 
                        		  name="fulladres"
                                  id="fulladres"></textarea>
                	</div>
                         <div class="form-group">
                        <label for="googleAdres">Google address :</label>
             			<textarea class="form-control" 
                        		  name="googleAdres"
                                  id="googleAdres"></textarea>
                	</div>
                    <input type="submit" class="btn btn-info" value="Save Address">
                    
                </form> 
            </div>
            <div class="col-md-2 sm-hidden"></div>
    	</div>
    </div>
	<?php
}	
	
	
	
	
	
	
	
require_once 'footer.php';
}else{ header('Location:index.php'); }
?>