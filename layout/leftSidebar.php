<!-- left side bar column-->
<?php
	$user="";
		if($_SESSION['roleId']==2)
		{
			$user="Startups";
		}
		elseif($_SESSION['roleId']==3)
		{
			$user="Investors";
		}
?>
<div class="col-md-2" id="lefSidebar">
	<ul id="lefSidebar-list" class="nav ">
		<li><a href="<?php echo URL;?>/pages/favorites.php">Favorite 
		<?php echo $user ?></a></li><br>
	</ul>
</div>