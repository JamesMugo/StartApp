<!-- left side bar column-->
<div class="col-md-2" id="lefSidebar">
	<ul id="lefSidebar-list" class="nav ">
	<?php 	
		// session_start();
		if($_SESSION['roleId']==3 || $_SESSION['roleId']==2)
		{
			?><li><a href='<?php echo URL;?>/pages/favoriteInvestorpage.php'>Favorite Investors</a></li><br><?php
		}
		elseif ($_SESSION['roleId']==1) {
			?><li><a href='<?php echo URL;?>/pages/blockedUserspage.php'>Blocked Users</a></li><br><?php
		}
	?>
		<!-- <li><a href="<?php echo URL;?>/pages/favoriteInvestorpage.php">Favorite Investors</a></li><br> -->
	</ul>
</div>