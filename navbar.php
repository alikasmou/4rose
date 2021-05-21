<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
        <span class="sr-only">Home</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="cpanel.php?page=home">
      <img alt="Brand" src="<?php echo $img_icon; ?>BrandLogo.svg">
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="menu">
      <ul class="nav navbar-nav">
        <li class=""><a href="cpanel.php?page=home">Home page <span class="sr-only">(current)</span></a></li>
        		 <li><a href="order.php">Orders</a></li>
        		 <li><a href="category.php">Categories & Item Type</a></li>
        		 <li><a href="item.php">Items</a></li>
                 <ul class="nav navbar-nav navbar-right">
        			<li class="dropdown drp_username">
          			<a href="" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        			 Sellers
          			<span class="caret"></span></a>
         		    <ul class="dropdown-menu">
         			  <li><a href="seller.php">Manage Sellers</a></li>
          			  <li><a href="seller.php?page=addadres">Add address for Company</a></li>
          		</ul>
        </li>
      </ul>
      </ul>
    
      <ul class="nav navbar-nav navbar-right">
        
        <li class="dropdown drp_username">
          <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php 
		  			if (isset($_SESSION['admin_username']))
					{ 
						echo $_SESSION['admin_giris_id'] .' '. mb_strtoupper($_SESSION['admin_username']); 
					} 
						 ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="myprofile.php">My profile</a></li>
            <?php
			if($_SESSION['admin_giris_id'] == '1'){
            	echo '<li><a href="users.php">Users</a></li>'; }
			?>
            <li><a href="notification.php">Notification</a></li>
            <li><a href="note.php">Note</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="cpanel.php?page=logout">Log out</a></li>
          </ul>
        </li>
      </ul>
   
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav><!----Navbar end -->
