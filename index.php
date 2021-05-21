<?php 
session_start();
$page_title = "Login";    // =*= page title
$Connect = 1 ; 			  // =*= open connect
$navbar = 0 ;			  //  =*= '0' don't use navbar => '1' use navbar
$UsernameCheck = 0;  	  //   =*= check if posted username is exist in database
$PassCheck = 0;		  //   =*= check if posted password is true
$giris = 0;			  //   =*= check if giris = 1 => will direct the user to cpanel 		       
$durum = 0;			  //   =*= control steps   
$btn = 0;			    //   =*= for change the submit button 'check your username' or 'Login'
$hata = array();		 //   =*= erorrs message array
$filter = 1 ;			 //   =*= post value check up filters 
require_once 'Header.php';

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
	if(isset ($_POST['txt_username'],$_POST['txt_password']))
	{	
		
		$var_username = strlen($_POST['txt_username']) ;
	if ($var_username == "")
	{	$hata[]= " username is empty  ";
		
		}else {
			if( $var_username < 3 )
			{
				$filter + 1 ;
				$hata[]= "user name must be greater than 3 characters ";
					
			}else { 
					$var_username = filter_var($_POST['txt_username'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH) ;
					$filter = 0; 
				  }
	 }
		
		$var_password = $_POST['txt_password'] ;
		$hashPassword = md5($var_password);	
		$satir;
		$sorgu = 'SELECT * FROM tbl_kullanicilar';
		$stmt = $connect-> Prepare($sorgu);
		$stmt-> execute();
		$durum=0;
while ($satir = $stmt -> fetch())
	{
		if ($var_username == $satir['k_kullaniciAdi'] && $filter == 0)
		{
			$_SESSION['kullaniciAdi'] = $satir['k_ad'] .' '. $satir['k_soyad'];
			$kullaniciAdi = $_SESSION['kullaniciAdi'] ;
			$durum = 1;
			$UsernameCheck = 1;
			$btn = 1 ;
			if($var_password != "")
				{
					if ($hashPassword == $satir['k_kullaniciSifre'])
						{
							$durum = 2 ;
							$PassCheck = 1;
							
							if($satir['kullaniciDurum_id'] == "1")
								{   
									$durum = 3 ;
									
									if ($satir['kullaniciTipi_id'] != "0")
									{
										
										$giris = 1 ;
										$_SESSION['admin_giris_id'] = $satir['k_id'] ;
										$_SESSION['admin_username'] = $satir['k_kullaniciAdi'];
										break;
									}else { $hata[] = "sorry you can not enter to this page"; }
								} else { $hata[] = 'Hi , <span class="text_username">'.$kullaniciAdi.'</span> your username and password correct but you\'re in waiting list'; }
						}else { $hata[] = "your Password is incorrect"; } 
			     }else { $hata[] = ' Hello ; <span class="text_username">'.$kullaniciAdi.'</span> Could you write your password (: ';}
				
			} else { /*$hata[] = "your username is incorrect";*/ }
			
			 
		}

	}		
}
else // else for if server == POST
	{
		//echo "Erorr please try to login by server";
	}



?>

<div id="backgroundLogin" class="backgroundLogin">
    <div id="Loginalani" class="LoginAlani">
    	<div class="borderLogin">
        	<div class="Logo">
            	
    		</div><!---logo-->
            <div class="LoginForm">
                <form class="form-group" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"><!--form method -->
                <div class="formItem">   
                        <input  class="form-control"
                                type="text" 
                                id="txt_username" 
                                name="txt_username"  
                                autocomplete="off"
                                placeholder="Username" 
                                value="<?php if(isset($var_username)) 
								{ if($durum == 1 || $durum == 2 || $durum == 3)
									{ echo $var_username; }else {echo "" ;}
									
								 } else { echo ""; }?>" >     
                        <i class="fa fa-user-o"></i>
                        <!--php code gelecek -->
                        <?php if(isset($UsernameCheck))
						{
                        	if($UsernameCheck == 1)
							{ 
								echo '<i class="fa fa-check" aria-hidden="true"></i>';
							}else { echo '<i class="fa fa-times" aria-hidden="true"></i>'; }
						}?>
						
						<!-- txt_username End --> 
                    </div>                   
                    <div class="formItem <?php if(isset($durum)){ if($durum != 1 ) { echo "passcontrol"; } }?>">
                        <input  type="password"
                                class="form-control "
                                id="txt_password"
                                name="txt_password"
                                autocomplete="new-password"
                                placeholder="Password"
                                value="";
                                >
                        <i class="fa fa-key"></i><!-- txt_password End -->
                        <?php if(isset($PassCheck)) { if($PassCheck == 1) { echo '<i class="fa fa-check" aria-hidden="true"></i>'; } } ?>
                        
                    </div>
                    
                    <div class="formItem">
                        <input type="submit" class="btn btn-block " name="btn_Login" 
                        value=
                        "<?php 
						if(isset($btn)) 
						{ 
							if ( $btn == 0 )  
								{ 
									echo "Check your username " ;
									
									
								} else if ($btn == 1) {
										echo "Login"; 
										
									} 
						} ?>">  
                        <?php
						if (isset($btn))
							{
								if($btn == 0)
								{
									echo '<i class="fa fa-search"></i>';
								}
								else if ($btn == 1)
								{
									echo '<i class="fa fa-unlock-alt"></i>';
								}
							} 
						 ?>
                        <!-- btn End -->
                    </div>
                
                
                </form>
            </div><!--LoginForm-->
            <div class="ForgetYourPassword">
            	<h3>Do you forget Password ?</h3>
                <p>if you forget your password click here <a href="sifremiUnuttum.php">..."I forget my password"</a></p>
                <p>Or send message to admin <a href="sendAdmin.php">"Send E-mail to Admin"</a></p>
				<p>your feedback will support us to make this application better <a href="feedback.php">"please send your feedback"</a></p>
                <p>Chat with us by Whatsapp  +90 553 020 92 50</p>
                <div class="hatalar">
                	<?php
						foreach($hata as $deger)
						{
							echo '<ul>';
							echo  '<li>'.$deger.'</li>';
							echo '</ul>';
						} 
                	?>
                </div><!---hatalar end-->
            </div><!--Forget your password-->
    	</div><!---border Login--->
    </div><!---Login alani-->
</div><!---Background-->

<?php
 if (isset($giris))
{
	if($giris == 1)
	{
		header("Location:cpanel.php");
	}	
}
require_once 'footer.php'; 

?>>