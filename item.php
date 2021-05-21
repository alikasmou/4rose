<?php
session_start();
if(isset($_SESSION['admin_giris_id'])){
$page_title = "items";
$Connect = 1 ;
$navbar = 1 ;
$page = '';
$hata=array();
require_once 'Header.php';


if (isset($_GET['page']))
{
	$page = $_GET['page'];
		
}else { $page = 'home';}

		?>
<div class="container">
<div class="row">
<div class="col-md-4">
<a href="item.php?page=add">
<button class="fa fa-plus btn-add"> Add new item</button>
</a>
</div>
</div><!---row---->
</div><!--container buttons Add | Update | Delete --->
        
        <?php
if($page == 'home'){
	
	?>
    <div class="container itemsDiv">
    <div class="row">
    <?php
	$selectitems = 'SELECT  
							tbl_urunler.urunid AS Item_id,
							tbl_urunler.urunkodu AS Item_Code,
							tbl_urunler.urunresim AS Item_Image,       
							tbl_kategori.kategori AS Item_category ,
							tbl_urunTipi.urunTipi AS Item_type,
							tbl_urunler.urunfiyat AS Item_price,
							tbl_saticilar.saticiFirmaAdi AS Company_name,
							tbl_urunMense.mense AS Item_origin,
							tbl_kullanicilar.k_kullaniciAdi AS Username,
							tbl_urunDurumu.urunDurumu AS Item_Status,
							tbl_urunler.tesciltarihi AS Item_Reg
      				 FROM
        					tbl_urunler
        			LEFT JOIN
        					tbl_kategori
       				 ON
        					tbl_kategori.katid = tbl_urunler.urunkat
       				 LEFT JOIN
        					tbl_urunTipi
       				 ON
        					tbl_urunTipi.tipid = tbl_urunler.uruntipi
       				 LEFT JOIN
        					tbl_saticilar
      				 ON
      					  	tbl_saticilar.saticiid = tbl_urunler.saticiid
       				LEFT JOIN
         					tbl_urunMense
        			 ON
         					tbl_urunMense.menseid = tbl_urunler.menseid
         			LEFT JOIN
         					tbl_kullanicilar
         			ON
        				    tbl_kullanicilar.k_id = tbl_urunler.userid
         			LEFT JOIN
        				    tbl_urunDurumu
       			    ON
       					    tbl_urunDurumu.durumid = tbl_urunler.urunDurumu
					ORDER BY
							Item_Reg DESC
							
            ';
$innerJoin = $connect-> prepare($selectitems);
$innerJoin->execute();
while($satir = $innerJoin->fetch())
{
	$i_id 		= $satir['Item_id'] ;
	$icode	   = $satir['Item_Code'];
	$iImage 	  = $satir['Item_Image'] ;
	$ikat 		= $satir['Item_category'] ; 
	$itipi 	   = $satir['Item_type'] ;
	$ifiyat 	  = $satir['Item_price'] ;
	$icompany    = $satir['Company_name'] ;
	$imense      = $satir['Item_origin'] ;
	$iuser       = $satir['Username'] ; 
	$istatus     = $satir['Item_Status'];
	$itescil     = $satir['Item_Reg'] ;
	echo '
	<div class="col-sm-6 col-md-4 ">
	     <div class="thumbnail">
          <img src="uploads/items/'.$iImage.'" class="img-responsive" alt="'.$icode.'"/>
            <br>
            <table class="table table-hover text-center">
            <tr>
            <td colspan="3">'.$icompany.'</td>
            </tr>
            <tr>
            	<td colspan="2">
                    <div style="background-color:#B515CE" class="itemColor"></div>
                    <div style="background-color:#EB1761" class="itemColor"></div>
                    <div style="background-color:#289219" class="itemColor"></div>
            	</td>
                <td>'.$icode.'</td>
            </tr>
			<tr>
				<td>'.$ikat.'</td>
				<td>'.$itipi.'</td>
				<td>'.$ifiyat.' TRY</td>
            </tr>
            <tr class="text-center">
            	<td><a href="?page=edit&itemid='.$i_id.'">Edit</a></td>
                <td><a href="?page=addToFav&itemid='.$i_id.'">Add to Fav</a></td>
                <td><a href="?page=delete&itemid='.$i_id.'">Delete</a></td>
            </tr>
            </table>          
        </div>
      </div>
';//end of echo for print items
}
			
			
			
?>  
    </div>
</div>
<?php	
}

elseif($page == 'add'){//start of add page 
	if($_SERVER['REQUEST_METHOD']== 'POST'){
		if(isset(
				 $_FILES['add_picture']['name'],
				 $_FILES['add_picture']['size'],
				 $_FILES['add_picture']['tmp_name'],
				 $_FILES['add_picture']['type'],
				 $_POST['add_itemPrice'],
				 $_POST['add_itemSeller'],
				 $_POST['add_itemOrigin'],
				 $_POST['add_itemCategory'],
				 $_POST['add_itemType'],
				 $_POST['add_itemSatuts'])
				 ){
		//  upload file 		 
		$PicName    = strtolower($_FILES['add_picture']['name']);
		$PicSize    = $_FILES['add_picture']['size'] ;
		$picTmp     = $_FILES['add_picture']['tmp_name'];
		$picType    = $_FILES['add_picture']['type'];
		
		//  information about item
		
		
		$itemPrice  = floatval($_POST['add_itemPrice']);
		$itemSeller = intval($_POST['add_itemSeller']);
		$itemOrigin = intval($_POST['add_itemOrigin']);
		$itemCat    = intval($_POST['add_itemCategory']);
		$itemType   = intval($_POST['add_itemType']);
		$itemStatus = intval($_POST['add_itemSatuts']);
		$itemTargetDir = 'uploads/items/';
		$maxSizePic = 10000000 ;
		//-----allowed extantions -------
		$allowedType = array ('jpg','jepg','png','gif');
		$getTypeString = explode('.',$PicName);
		$filteredType = end($getTypeString);
		//-------- end control allowed ext -----
		$itemCode = $itemCat.'_'.$itemSeller.'_'.rand(0,1000);
		$PicToDataBase = $itemCode.'.'.$filteredType;
		// upload controller ---- Start 
		/*if( $itemPrice == '' )  { $hata[] = 'Price is empty '; }
		if( $itemSeller == 0)   { $hata[] = 'Item seller is empty '; }
		if( $itemOrigin == 0)   { $hata[] = 'Item origin is empty '; }
		if( $itemCat == 0)  	  { $hata[] = 'Item category is empty '; }
		if( $itemType == 0)  	 { $hata[] = 'Item type is empty '; }
		if( $itemStatus == 0 )  { $hata[] = 'Item Status is empty '; }
		//upload controller ----- End 
		if(in_array($filteredType,$allowedType)){
			if($PicSize == 0 || $PicSize > $maxSizePic )
				{
					$hata[] = 'item lager then alwoded size  ';	
				}
			}else {
					$hata[] =  'this file is not allowed to upload  ';
				  }	 */ 
		if(empty($hata)){
			
			move_uploaded_file($picTmp,$itemTargetDir.$PicToDataBase);
		}
		
		foreach ($hata as $deger)
		{	echo '<ul>';
					echo '<li>'.$deger.'</li>';
			 echo '</ul>';	
		}
		
$usersession = $_SESSION['admin_giris_id'];
$AddItemSql = 'INSERT INTO tbl_urunler(urunkodu, urunresim, urunkat, uruntipi, urunfiyat, saticiid, menseid, userid,urunDurumu)
	values(:zurunkodu,:zurunresim , :zurunkat , :zuruntipi , :zurunfiyat , :zsaticiid , :zmenseid , :zuserid , :zurunDurumu )';
$stmnt = $connect-> prepare($AddItemSql);
$stmnt->execute(array(
						'zurunkodu'    => $itemCode,
						'zurunresim'   => $PicToDataBase,
						'zurunkat'     => $itemCat,
						'zuruntipi'    => $itemType,
						'zurunfiyat'   => $itemPrice,
						'zsaticiid'    => $itemSeller,
						'zmenseid'     => $itemOrigin,
						'zuserid'      => intval($usersession),
						'zurunDurumu'  => $itemStatus
						));
	echo '<div class="alert alert-info"> Item inserted .. </div>';	
		}//isset fileds
	}// Server request
	?>
<div class="container"><!--start add container items--->
	<div class="row"><!--start add row items--->
    <div class="col-md-3 sm-hidden"></div><!---for centering main div-->
	<div class="formBody col-md-6 col-sm-12"><!---start form div --->
	<form action="?page=add" enctype="multipart/form-data" method="post"><!---start add forms --->
    
    <div class="form-group"><!---Start Picture filed --->
        <label for="" >Item Picture :</label>
        <input class="form-control" name="add_picture" type="file">
        <i></i>
    </div><!---End Picture filed --->
            
            
    <div class="form-group"><!---Start Item Price filed --->
        <label for="" >Item Price :</label>
        <input class="form-control" type="text" name="add_itemPrice" placeholder="Price allways in TRY...">
        <i></i>
     </div><!---End Item Price filed --->
            
    <div class="form-group"><!---Start Item Seller filed --->
        <label for="" >Item Seller :</label>
        <select class="selectpicker form-control" name="add_itemSeller" data-live-search="true">
        <option value="0">Select Company....</option>
  		<?php
		$sorgu = 'SELECT * FROM tbl_saticilar';
		$stmt = $connect-> Prepare($sorgu);
		$stmt-> execute();
		while ($satir = $stmt -> fetch())
		{
			echo '<option value="'.$satir['saticiid'].'">'.$satir['saticiFirmaAdi'].'</option>';	
		}
		?>
        </select>
    </div><!---End Item Seller filed --->
            
   <div class="form-group"><!---Start Item Origin filed --->
        <label for="" >Item Origin :</label>
        <select class="selectpicker form-control" name="add_itemOrigin" data-live-search="true">
        <option value="0">Select Country....</option>
        <?php
        $sorgu = 'SELECT * FROM tbl_urunMense';
		$stmt = $connect-> Prepare($sorgu);
		$stmt-> execute();
		while ($satir = $stmt -> fetch())
		{
			echo '<option value="'.$satir['menseid'].'">'.$satir['mense'].'</option>';	
		}
		?>
        </select>
    </div><!---End Item Origin filed --->
            
  <div class="form-group"><!---Start Item Category filed --->
        <label for="" >Item Category :</label>
        <select class="selectpicker form-control" name="add_itemCategory" data-live-search="true">
        <option value="0">Select category....</option>
        <?php
			$sorgu = 'SELECT * FROM tbl_kategori';
			$stmt = $connect-> Prepare($sorgu);
			$stmt-> execute();
			while ($satir = $stmt -> fetch())
			{
				echo '<option value="'.$satir['katid'].'">'.$satir['kategori'].'</option>';	
			}
		?>
        </select>
  </div><!---End Item Category filed --->
            
   <div class="form-group"><!---Start Item Type filed --->
        <label for="" >Item Type :</label>
        <select class="selectpicker form-control" name="add_itemType" data-live-search="true">
        <option value="0">Select Item type....</option>
            <?php
			$sorgu = 'SELECT * FROM tbl_urunTipi';
			$stmt = $connect-> Prepare($sorgu);
			$stmt-> execute();
			while ($satir = $stmt -> fetch())
			{
				echo '<option value="'.$satir['tipid'].'">'.$satir['urunTipi'].'</option>';	
			}
		?>
        </select>
    </div><!---End Item Type filed --->
            
    <div class="form-group"><!---Start Item Status filed --->
        <label for="" >Item Status :</label>
        <select class="selectpicker form-control" name="add_itemSatuts" data-live-search="true">
        <option value="0">Select Status....</option>
        <?php
			$sorgu = 'SELECT * FROM tbl_urunDurumu';
			$stmt = $connect-> Prepare($sorgu);
			$stmt-> execute();
			while ($satir = $stmt -> fetch())
			{
				echo '<option value="'.$satir['durumid'].'">'.$satir['urunDurumu'].'</option>';	
			}
		?>
        </select>
     </div><!---End Item Status filed --->
            
  <div class="form-group"><!---Start User id filed --->
    <label for="" >User id :</label>
    <input class="form-control" type="text" value="<?php echo $_SESSION['admin_giris_id']; ?>" disabled>
    <i></i>
  </div><!---End User id filed --->
  
  <div class="form-group"><!---Start Button--->
    <input class="btn btn-success btn-md btn-block" type="submit" value="Add this Item">
    <i></i>
  </div><!---End Button--->
</form> 
</div><!---end form body -->
<div class="col-md-3 sm-hidden"></div><!--empty div for centering--->              
	</div><!---end form row --->
    <a href="?page=home">Back </a>
</div><!---end of add item container--->
	<?php	
}//==================  end of add page  ==========================================================================

elseif($page == 'edit'){
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$secilmisitemid = intval($_GET['itemid']);
		if(isset( $_FILES['update_picture']['name'],
				 $_FILES['update_picture']['size'],
				 $_FILES['update_picture']['tmp_name'],
				 $_FILES['update_picture']['type'],
				 $_POST['update_picName'],
				 $_POST['update_itemPrice'],
				 $_POST['update_itemSeller'],
				 $_POST['update_itemOrigin'],
				 $_POST['update_itemCategory'],
				 $_POST['update_itemType'],
				 $_POST['update_itemSatuts'])){
				 if($_POST['update_itemSeller'] != "")
				 { $updatedSatici 	  = intval($_POST['update_itemSeller']); }
				 else { $hata[] = 'Please Select item Seller again '; }
				 if($_POST['update_itemOrigin'] != "")
				 { $updateMense 	    = intval($_POST['update_itemOrigin']); }
				 else { $hata[] = 'Please Select item Origin again '; }
				 if($_POST['update_itemType'] != "")
				 {$updateType 	     = intval($_POST['update_itemType']); }
				 else { $hata[] = 'Please Select item Type again '; }
				 if($_POST['update_itemCategory'] != "")
				 {$updateCat = intval($_POST['update_itemCategory']) ;}
				 else{ $hata[] = 'Please Select item Category again '; }
				 if($_POST['update_itemSatuts'] != "")
				 { $updateStatus       = intval($_POST['update_itemSatuts']); }
				 else { $hata[] = 'Please Select item Status again '; }
				 $updatePrice        = floatval($_POST['update_itemPrice']);
				 //============ File upload control 
				 $updatePicName      = $_FILES['update_picture']['name'];
				 $updatePictureSize  = $_FILES['update_picture']['size'];
				 $updatePicTmp       = $_FILES['update_picture']['tmp_name'];
				 $updatePicType      = $_FILES['update_picture']['type'];
				 $updateNewPicName   = $_POST['update_picName'];
				 $maxSizePic = 10000000 ;
				 //-----allowed extantions -------
				 $allowedType = array ('jpg','jepg','png','gif','');
				 $getTypeString = explode('.',$updatePicName);
				 $filteredType = end($getTypeString);
				 if(!in_array($filteredType,$allowedType)){
					 $hata[] = 'You can not upload this file , jpg | jepg | png | gif';
				 }
			     //-------- end control allowed ext -----
				 //end File upload control
				 foreach($hata as $deger)
				 {
					 echo '<div class="alert alert-info">'.$deger.'</div>';
				 }
				 if(empty($hata))
				 {
					 
					//chmod($updateNewPicName,0755);
					//unlink($updateNewPicName,$itemTargetDir);
					$itemTargetDir = 'uploads/items/';
					move_uploaded_file($updatePicTmp,$itemTargetDir.$updateNewPicName); 
					$itemUpdate = 'UPDATE tbl_urunler SET 
				 										urunresim = ?,
														urunkat = ? ,
														uruntipi = ? ,
														urunfiyat = ? ,
														menseid = ? ,
														saticiid = ? ,
														urunDurumu = ? 
													WHERE 
														urunid = ? ';
				$stmntupdateitem = $connect-> prepare($itemUpdate);
				$stmntupdateitem->execute(array($updateNewPicName,
												$updateCat,
												$updateType,
												$updatePrice,
												$updateMense,
												$updatedSatici,
												$updateStatus,
												$secilmisitemid));
												
				echo '<div class="alert alert-success">'.$stmntupdateitem->rowCount() .' Row Updated </div>';
						 
				 }
				 
			
		
			}		
	}//if server request method post
	else { 
	$secilmisitemid = intval($_GET['itemid']);
	$filterItemid = filter_var( $secilmisitemid , FILTER_SANITIZE_STRING , FILTER_FLAG_STRIP_HIGH );
	$filterItemid;
	$sorgu = 'SELECT  
							tbl_urunler.urunid AS Item_id,
							tbl_urunler.urunkodu AS Item_Code,
							tbl_urunler.urunresim AS Item_Image,       
							tbl_kategori.kategori AS Item_category ,
							tbl_urunTipi.urunTipi AS Item_type,
							tbl_urunler.urunfiyat AS Item_price,
							tbl_saticilar.saticiFirmaAdi AS Company_name,
							tbl_urunMense.mense AS Item_origin,
							tbl_kullanicilar.k_kullaniciAdi AS Username,
							tbl_urunDurumu.urunDurumu AS Item_Status,
							tbl_urunler.tesciltarihi AS Item_Reg
      				 FROM
        					tbl_urunler
       
        			 INNER JOIN
        					tbl_kategori
       				 ON
        					tbl_kategori.katid = tbl_urunler.urunkat
            
       				 INNER JOIN
        					tbl_urunTipi
       				 ON
        					tbl_urunTipi.tipid = tbl_urunler.uruntipi
            
       				 INNER JOIN
        					tbl_saticilar
      				 ON
      					  	tbl_saticilar.saticiid = tbl_urunler.saticiid
            
       				 INNER JOIN
         					tbl_urunMense
        			 ON
         					tbl_urunMense.menseid = tbl_urunler.menseid
            
         			INNER JOIN
         					tbl_kullanicilar
         			ON
        				    tbl_kullanicilar.k_id = tbl_urunler.userid
         
         			INNER JOIN
        				    tbl_urunDurumu
       			    ON
       					    tbl_urunDurumu.durumid = tbl_urunler.urunDurumu
            WHERE tbl_urunler.urunid = ? ';
			
			$stmnt = $connect->prepare($sorgu);
			$stmnt->execute(array($filterItemid));
			while($satir = $stmnt->fetch())
			{
				$i_id 		= $satir['Item_id'] ;
				$icode	   = $satir['Item_Code'];
				$iImage 	  = $satir['Item_Image'] ;
				$ikat 		= $satir['Item_category'] ; 
				$itipi 	   = $satir['Item_type'] ;
				$ifiyat 	  = $satir['Item_price'] ;
				$icompany    = $satir['Company_name'] ;
				$imense      = $satir['Item_origin'] ;
				$iuser       = $satir['Username'] ; 
				$istatus     = $satir['Item_Status'];
				$itescil     = $satir['Item_Reg'] ;
			}
	
	?>
	<div class="container"><!--start add container items--->
	<div class="row"><!--start add row items--->
    <div class="col-md-3 sm-hidden"></div><!---for centering main div-->
	<div class="formBody col-md-6 col-sm-12"><!---start form div --->
	<form action="?page=edit&itemid=<?php echo $filterItemid; ?>" enctype="multipart/form-data" method="post"><!---start add forms --->
    <div class="itemImg">
    	<img src="uploads/items/<?php echo $iImage ?>" alt="<?php echo $icode; ?>" class="img-responsive"/>
    </div>
    <div class="form-group"><!---Start Picture filed --->
        <label for="" >Item Picture :</label>
        <input class="form-control" value="" accept="image/jpeg" name="update_picture" type="file">
        <i></i>
    </div><!---End Picture filed --->
     <div class="form-group"><!---Start Item Price filed --->
        <label for="" >Picture Name :</label>
        <input class="form-control" 	
        	   type="text" name="update_picName" 
               placeholder="Price allways in TRY..." 
               value="<?php echo $iImage ; ?>" >
        <i></i>
     </div><!---End Item Price filed --->        
            
    <div class="form-group"><!---Start Item Price filed --->
        <label for="" >Item Price :</label>
        <input class="form-control" 	
        	   type="text" name="update_itemPrice" 
               placeholder="Price allways in TRY..." 
               value="<?php echo $ifiyat ; ?>">
        <i></i>
     </div><!---End Item Price filed --->
            
    <div class="form-group"><!---Start Item Seller filed --->
        <label for="" >Item Seller :</label>
        <select class="selectpicker form-control" name="update_itemSeller" data-live-search="true">
        <option value=""><?php echo $icompany; ?></option>
  		<?php
		$sorgu = 'SELECT * FROM tbl_saticilar';
		$stmt = $connect-> Prepare($sorgu);
		$stmt-> execute();
		while ($satir = $stmt -> fetch())
		{
			echo '<option value="'.$satir['saticiid'].'">'.$satir['saticiFirmaAdi'].'</option>';	
		}
		?>
        </select>
    </div><!---End Item Seller filed --->
            
   <div class="form-group"><!---Start Item Origin filed --->
        <label for="" >Item Origin :</label>
        <select class="selectpicker form-control" name="update_itemOrigin" data-live-search="true">
        <option value=""><?php echo $imense; ?></option>
        <?php
        $sorgu = 'SELECT * FROM tbl_urunMense';
		$stmt = $connect-> Prepare($sorgu);
		$stmt-> execute();
		while ($satir = $stmt -> fetch())
		{
			echo '<option value="'.$satir['menseid'].'">'.$satir['mense'].'</option>';	
		}
		?>
        </select>
    </div><!---End Item Origin filed --->
            
  <div class="form-group"><!---Start Item Category filed --->
        <label for="" >Item Category :</label>
        <select class="selectpicker form-control" name="update_itemCategory" data-live-search="true">
        <option value=""><?php echo $ikat;  ?></option>
        <?php
			$sorgu = 'SELECT * FROM tbl_kategori';
			$stmt = $connect-> Prepare($sorgu);
			$stmt-> execute();
			while ($satir = $stmt -> fetch())
			{
				echo '<option value="'.$satir['katid'].'">'.$satir['kategori'].'</option>';	
			}
		?>
        </select>
  </div><!---End Item Category filed --->
            
   <div class="form-group"><!---Start Item Type filed --->
        <label for="" >Item Type :</label>
        <select class="selectpicker form-control" name="update_itemType" data-live-search="true">
        <option value=""><?php echo $itipi; ?></option>
            <?php
			$sorgu = 'SELECT * FROM tbl_urunTipi';
			$stmt = $connect-> Prepare($sorgu);
			$stmt-> execute();
			while ($satir = $stmt -> fetch())
			{
				echo '<option value="'.$satir['tipid'].'">'.$satir['urunTipi'].'</option>';	
			}
		?>
        </select>
    </div><!---End Item Type filed --->
            
    <div class="form-group"><!---Start Item Status filed --->
        <label for="" >Item Status :</label>
        <select class="selectpicker form-control" name="update_itemSatuts" data-live-search="true">
        <option value=""><?php echo $istatus; ?></option>
        <?php
			$sorgu = 'SELECT * FROM tbl_urunDurumu';
			$stmt = $connect-> Prepare($sorgu);
			$stmt-> execute();
			while ($satir = $stmt -> fetch())
			{
				echo '<option value="'.$satir['durumid'].'">'.$satir['urunDurumu'].'</option>';	
			}
		?>
        </select>
     </div><!---End Item Status filed --->
            
  <div class="form-group"><!---Start User id filed --->
    <label for="" >User id :</label>
    <input class="form-control" type="text" value="<?php echo $_SESSION['admin_giris_id']; ?>" disabled>
    <i></i>
  </div><!---End User id filed --->
  
  <div class="form-group"><!---Start Button--->
    <input class="btn btn-info btn-md btn-block" type="submit" value="Update this Item">
    <i></i>
  </div><!---End Button--->
</form> 
</div><!---end form body -->
<div class="col-md-3 sm-hidden"></div><!--empty div for centering--->              
	</div><!---end form row --->
    <a href="?page=home">Back </a>
</div><!---end of add item container--->
	

	<?php
	}// else request not post
	
}///==============================  end of Edit page ============================================================
	
elseif($page == 'delete'){
	$secilmisitemid = intval($_GET['itemid']);
	$filterItemid = filter_var( $secilmisitemid , FILTER_SANITIZE_STRING , FILTER_FLAG_STRIP_HIGH );
	$filterItemid;
	
	
	
	
}	
	
	
elseif($page == 'addToFav'){
	$secilmisitemid = intval($_GET['itemid']);
	$filterItemid = filter_var( $secilmisitemid , FILTER_SANITIZE_STRING , FILTER_FLAG_STRIP_HIGH );
	$filterItemid;
	
	
	
}	
require_once 'footer.php';
}else{ header('Location:index.php'); }
?>