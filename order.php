<?php
session_start();
if(isset($_SESSION['admin_giris_id'])){
$page_title = "cpanel";
$Connect = 1 ;
$navbar = 1 ;
$page = '';
require_once 'Header.php';


if (isset($_GET['page']))
{
	$page = $_GET['page'];
		
}else { $page = 'home';}

if($page == 'home'){
	?>
<div class="container">
<div class="row">
<div class="col-md-1 sm-hidden"></div>
<div class="col-md-10">
	<div class="ordersTable">
    	<table class="table">
            <tr>
            	<th>Order id</th>
            	<th>Order Code</th>
                <th>Seller</th>
                <th>Total</th>
                <th>Currency</th>
                <th>Date</th>
                <th>Delivery Date</th>
                <th>Operations</th>
            </tr>
            <?php
			$sql = 'Select  tbl_siparislerimiz.siparisid,
							tbl_siparislerimiz.siparisKodu,
							tbl_siparislerimiz.saticiid,
							tbl_siparislerimiz.Toplam,
							tbl_siparislerimiz.siparisTarihi,
							tbl_siparislerimiz.teslimTarihi,
							tbl_doviz.doviz,
							tbl_saticilar.saticiFirmaAdi
					FROM
							tbl_siparislerimiz
							
					LEFT JOIN
							tbl_doviz
					ON
							tbl_siparislerimiz.doviz_id = tbl_doviz.doviz_id
					LEFT JOIN
							tbl_saticilar
					ON
							tbl_siparislerimiz.saticiid = tbl_saticilar.saticiid';
			$stmt = $connect->prepare($sql);
			$stmt->execute();
	while($satir = $stmt->fetch()){	
			echo'
            <tr>
            	<td>'.$satir['siparisid'].'</td>
            	<td>'.$satir['siparisKodu'].'</td>
                <td>'.$satir['saticiFirmaAdi'].'</td>
                <td>'.$satir['Toplam'].'</td>
                <td>'.$satir['doviz'].'</td>
                <td>'.$satir['siparisTarihi'].'</td>
                <td>'.$satir['teslimTarihi'].'</td>
				
                <td>
					<a href="order.php?page=view&orederid='.$satir['siparisid'].'">View</a>
				</td>
            </tr>';
	}
			?>
        </table>
    </div>
<div class="col-md-1 sm-hidden"></div>
</div>
</div>
	<?php
	}
elseif($page == 'add'){}
elseif($page == 'edit'){}
elseif($page == 'view' ){
	$orderid = $_GET['orederid'];
	$OrderView = 'SELECT  tbl_siparislerimiz.*,
						  tbl_siparisdurumu.siparisDurumu AS orderStatus,
        		          tbl_vergidairesi.vergiDairesi AS TaxDep ,
						  tbl_saticilar.saticiVergiNo AS Taxno,
       				      tbl_ulke.ulke AS Country,
       					  tbl_sehir.sehir AS City,
      					  tbl_doviz.doviz AS Currency,
       					  tbl_odemeplanlari.odemePlani AS PaymentMethod,
       					  tbl_odemedurmu.odemedurum AS PaymentStatus,
       					  tbl_odemeyapan.firmaAdi AS paidby,
       					  tbl_department.dep_name AS Department,
       					  tbl_saticilar.saticiFirmaAdi AS sellerCompany,
       					  tbl_saticiadres.*,
        				  tbl_saticiiletisim.*
FROM
		tbl_siparislerimiz
LEFT JOIN
		tbl_siparisdurumu
ON
		tbl_siparislerimiz.siparis_durumu = tbl_siparisdurumu.siparisdurumid
LEFT JOIN
		tbl_saticilar
ON
		tbl_siparislerimiz.saticiid = tbl_saticilar.saticiid
LEFT JOIN
		tbl_saticiadres
ON
		tbl_siparislerimiz.sat_adresid = tbl_saticiadres.satAdresid
LEFT JOIN
		tbl_saticiiletisim
ON
		tbl_siparislerimiz.iletisimid = tbl_saticiiletisim.iletisimid
LEFT JOIN
		tbl_vergidairesi
ON
		tbl_saticilar.saticiVergiDairesi = tbl_vergidairesi.vergiDairesiid
LEFT JOIN
		tbl_ulke
ON
		tbl_saticiadres.ulke = tbl_ulke.ulkeid
LEFT JOIN
		tbl_sehir
ON
		tbl_saticiadres.sehir = tbl_sehir.sehirid 
LEFT JOIN
		tbl_department
ON
		tbl_department.depid = tbl_saticiiletisim.depid
LEFT JOIN
		tbl_doviz
ON
		tbl_siparislerimiz.doviz_id = tbl_doviz.doviz_id
LEFT JOIN
		tbl_odemeplanlari
ON
		tbl_siparislerimiz.odemePlaniid = tbl_odemeplanlari.odemePlani_id
LEFT JOIN
		tbl_odemedurmu
ON
		tbl_siparislerimiz.odemeDurumu = tbl_odemedurmu.odemedurumuid
LEFT JOIN
		tbl_odemeyapan
ON
		tbl_siparislerimiz.odemeYapan = tbl_odemeyapan.odemeYapanid
WHERE
		siparisid = ?
';
$orderViewStmt = $connect-> prepare($OrderView);
$orderViewStmt->execute(array($orderid));
while($satir = $orderViewStmt -> fetch()){
	
	$orderCode = $satir['siparisKodu'];
	$sellerCompany = $satir['sellerCompany'];
	$orderDate = $satir['siparisTarihi'];
	$DeliveryDate = $satir['teslimTarihi'];
	$orderStatus = $satir['orderStatus'];
	$taxdep = $satir['TaxDep'];
	$taxno = $satir['Taxno'];
	$currency = $satir['Currency'];
	$paymethod = $satir['PaymentMethod'];
	$paystat = $satir['PaymentStatus'];
	$paidby = $satir['paidby'];
	$dep = $satir['Department'];
	$sellercom = $satir['sellerCompany'];
	$country = $satir['Country'];
	$city = $satir['City'];
	$adres = $satir['acikAdres'];
	$googlead = $satir['googleAdres'];
	$companyfax = $satir['saticifax'];
	$companytel = $satir['saticitel'];
	$exportcost = floatval($satir['ihracatMaliyeti']);
	$tax = floatval($satir['vergi']);
	
	
	
	}
	?>
<div class="container">
<div class="row">
<div id="headerInvoice" class="col-md-12">
<div class="invoice-title">
<h3>Order Code : <?php echo '#'.$orderCode; ?></h3>
<hr>	
</div><!--end header Invoice -->

<div class="row">
<div class="col-xs-6">
<address>
<strong style="font-size:26px ">Seller Company :</strong><br>
<span><?php echo $sellerCompany;  ?></span><br>
<?php echo $adres; ?><br>
<strong>V.D </strong> <?php echo $taxdep.'_'.$taxno; ?><span><a target="_blank" href="<?php echo $googlead ;?>">(MAP)</a></span><br>
<h4><?php echo $country.'-'.$city ?></h4>
</address>
</div>

<div class="col-xs-6 text-right">
<strong style="font-size:26px ">Shipped to:</strong><br>
<span>forrose accessories</span><br>
Merkez mah.izzetpasa sk-no:14 ayhan is merkezi D:20<br>
<strong>V.D </strong> Sisli 5175710808 <span><a target="_blank" href="www.google.com">(MAP)</a></span><br>
<h4>Jeddah - Sauudi arabia</h4>
</address>
</div>
</div>
    		
</div>
</div>
    
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">

<div class="panel-body">
<div class="table-responsive">
<table class="table table-hover">
<thead>
<tr>
<td><strong>Product</strong></td>
<td class="text-center"><strong>Price</strong></td>
<td class="text-center"><strong>Quantity</strong></td>
<td class="text-center"><strong>UNIT</strong></td>
<td class="text-center"><strong>Total</strong></td>
<td class="text-center"><strong>Operation</strong></td>

</tr>
</thead>
<tbody>
<!-- foreach ($order->lineItems as $line) or some such thing here -->
<?php
$siparisDetay = 'SELECT tbl_siparisdetay.*,
	   tbl_urunler.*,
       tbl_unit.unit,
       tbl_kategori.kategori
FROM
       tbl_siparisdetay
LEFT JOIN
		tbl_urunler
ON
		tbl_siparisdetay.itemid = tbl_urunler.urunid
LEFT JOIN
		tbl_unit
ON
		tbl_siparisdetay.unit_id = tbl_unit.unitid
LEFT JOIN
		tbl_kategori
ON
		tbl_kategori.katid = tbl_urunler.urunkat
WHERE 
	siparisid = ?';
$siparisDetaystmnt = $connect->prepare($siparisDetay);
$siparisDetaystmnt->execute(array($orderid));
$tutardizi = array();
while($satir = $siparisDetaystmnt->fetch()){
	$itemid= $satir['urunid'];
	$itempic = $satir['urunresim'];
	$itemcat = $satir['kategori'];
	$itemcode = $satir['urunkodu'];
	$price = floatval($satir['urunfiyat']);
	$qty = floatval($satir['miktar']);
	$unit = $satir['unit'];
	$tutar = floatval($price * $qty) ;
	$tutardizi[] = $tutar;
	

	
	echo'	
<tr><!--ITEM ROW BEGIN--->
<td class="col-md-3">
<div class="media ">
<a class="" href="item.php?page=view&itemid='.$itemid.'">
<img class="media-object" src="uploads/items/'.$itempic.'" style="width: 115px; height: 115px; margin-bottom: 5px "> </a>
<div class="media-body">
<h4 class="media-heading">'.$itemcat.'</h4>
<h5 class="media-heading">'.$itemcode.'</h5>
</div>
</div>
</td>
<td class="text-center">'.$price.' '.$currency.'</td>
<td class="text-center">'.$qty.'</td>
<td class="text-center">'.$unit.'</td>
<td class="text-center">'.$tutar.' '.$currency.'</td>
<td class="text-center">
<a href="order.php?page=edit&itemid='.$itemid.'" class="glyphicon glyphicon-pencil"></a> | <a href="order.php?page=delete&itemid='.$itemid.'" class="glyphicon glyphicon-remove"></a></td>
<td>
</td>
</tr><!-- ITEM ROW END --->
	
	
	';
	
	}
// Toplam hesablama 	
$subtotal = 0;
foreach($tutardizi as $e=> $deger)
	{
		$subtotal += $deger;
	}
?>



</tbody>
</table>
<div class="AddItem">
<a href="order.php?page=addItemOrder" class="fa fa-plus-circle fa-2x"></a>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="col-md-4">
<h3 class="">Payment Type</h3><hr>
<div class="">
<strong><?php echo strtoupper($paymethod) ;?></strong><br>
</div>
</div>
<div class="col-md-4">


</div>
<div class="col-md-4">
<h3 class="">Order Summary</h3><hr>
<div class="pull-left"><h4>Subtotal</h4> </div>
<div class="pull-right"><h4 class="text-right"><?php echo $subtotal; ?> <span><?php echo ' '.$currency; ?></span></h4></div>
<div class="clearfix"></div>
<div class="pull-left"><h4>Tax</h4> </div>
<div class="pull-right"><h4 class="text-right"><?php echo $tax; ?><span><?php echo ' '.$currency; ?></span></h4></div>
<div class="clearfix"></div>
<div class="pull-left"><h4>Export cost</h4> </div>
<div class="pull-right"><h4 class="text-right"><?php echo $exportcost; ?><span><?php echo ' '.$currency; ?></span></h4></div>
<div class="clearfix"></div><hr>
<div class="pull-left"><h4>Order Total</h4> </div>
<div class="pull-right"><h4 class="text-right"><strong><?php echo $finaltotal = $subtotal + $exportcost + $tax ; ?></strong><span><?php echo ' '.$currency; ?></span></h4></div>
<div class="clearfix"></div>
<?php
$update = 'UPDATE tbl_siparislerimiz SET tutar = ? , Toplam = ? ';
$updatestmnt = $connect-> prepare($update);
$updatestmnt->execute(array($subtotal , $finaltotal));

?>
</div> 
</div>
<div class="col-md-12">
<h3 class="">More details about order</h3><hr>
<div class="deliveryDate">
<table class="table table-hover">
<tr>
	<td>Order date</td>
    <td><?php echo $orderDate; ?></td>
</tr>
<tr>
	<td>Delivery date</td>
    <td><?php echo $DeliveryDate; ?></td>
</tr>
<tr>
<?php
 
//kalan sure hesablama

$Today = date("d-m-Y");
$now = date_create($Today);
$orderDate = date_create($DeliveryDate);
$restDays = date_diff($orderDate,$now);
$days = $restDays->d;
$month = $restDays->m;

?>
	<td>Order will be ready after</td>
    <td><?php if($month != '0'){ echo $month.' Month ';} echo ''.$days.' Days ' ; ?></td>
</tr>

<tr>
	<td>Order Status</td>
    <td><?php echo $orderStatus; ?></td>
</tr>
<tr>
	<td>Paid by</td>
    <td><?php if($paidby == ''){ echo 'unpaid yet';} else{ echo $paidby ;}?></td>
</tr>
</table>
</div>
<ul>
<?php 
	$siparisnote = 'SELECT * FROM tbl_siparisnote WHERE siparisid = ?';
	$stmnt = $connect->prepare($siparisnote);
	$stmnt->execute(array($orderid));
	while($satir = $stmnt->fetch()){
		$note = $satir['note'];
		$noteid = $satir['siparisnoteid'];
		 	echo'
			<li>'.$note.'....
	<a href="order.php?page=ordernoteSil&noteid='.$noteid.'&orderid='.$orderid.'" class="glyphicon glyphicon-remove"></a> | 
	<a href="order.php?page=ordernoteDuzelt&noteid='.$noteid.'&orderid='.$orderid.'&note='.$note.'" class="glyphicon glyphicon-pencil"></a></li>
		';
}
?>

</ul>
<a href="order.php?page=addOrderNote&orderid=<?php echo $orderid; ?>" class="fa fa-plus-circle">Add note</a>

</div>
</div>
</div>
	<?php
	}
elseif($page == 'addOrderNote'){
	$ordernoteid = intval($_GET['orderid']);
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if(isset($_POST['note']))
		{
			$newnote = $_POST['note'];
			$insertnote = 'INSERT INTO tbl_siparisnote(siparisid,note) VALUES(:zsiparisid,:znote)';
			$insertstmnt = $connect->prepare($insertnote);
			$insertstmnt->execute(array(
				'zsiparisid'=> intval($ordernoteid),
				'znote'=> $newnote
			));	
			header('location:order.php?page=view&orederid='.$ordernoteid.'');
		}
	}
	
	?>
    
    <div class="container">
    	<div class="row">
        	<div class="col-md-3 sm-hidden"></div>
           	    <div class="col-md-6">
                <form action="" method="post">
					<div class="form-group">
                    <label for="addnote">Add note</label>
                    <textarea name="note" cols="6" rows="6" class="form-control"></textarea>
                    </div>
                    <input type="submit" class="btn btn-info" value="Save note">            
            		</form>
                </div>
            <div class="col-md-3 sm-hidden"></div>
    	</div>
    </div>
	<?php
	}
elseif( $page == 'ordernoteSil'){
	
	$ordernoteid = intval($_GET['orderid']);
	$Deletenote = intval($_GET['noteid']);
	$sql = "DELETE FROM tbl_siparisnote WHERE siparisnoteid =  ? ";
	$stmt = $connect->prepare($sql);
	$stmt->execute(array($Deletenote));
	header('location:order.php?page=view&orederid='.$ordernoteid.'');	
	}
	
elseif($page == 'ordernoteDuzelt'){
	$updatenoteid = intval($_GET['orderid']);
	$updatenote = intval($_GET['noteid']);
	$note = $_GET['note'];
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if(isset($_POST['note']))
		{
			$newnote = $_POST['note'];
			$update = ' UPDATE tbl_siparisnote SET note = ? WHERE siparisnoteid = ? ';
			$updatestmnt = $connect->prepare($update);
			$updatestmnt->execute(array($newnote,$updatenote));	
			header('location:order.php?page=view&orederid='.$updatenoteid.'');
		}	
		
	}
	?>
        <div class="container">
    	<div class="row">
        	<div class="col-md-3 sm-hidden"></div>
           	    <div class="col-md-6">
                <form action="" method="post">
					<div class="form-group">
                    <label for="addnote">Add note</label>
                    <textarea name="note" cols="6" rows="6" class="form-control"><?php echo $note; ?></textarea>
                    </div>
                    <input type="submit" class="btn btn-info" value="Edit note">            
            		</form>
                </div>
            <div class="col-md-3 sm-hidden"></div>
    	</div>
    </div>
	<?php
	}
elseif($page == 'confirm'){}
elseif($page == 'print'){}
elseif($page == ''){}	
	
	
	
	
	
	
	
require_once 'footer.php';
}else{ header('Location:index.php'); }
?>