<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Profile</title>



	<!-- Custom styles -->
    <link href="../css/css/style.css" rel="stylesheet">

	<!--css links begins             <?php ///echo "../controller/getImage.php?id=".$_SESSION['userId']?>-->
    <?php require_once($_SERVER["DOCUMENT_ROOT"].'/MeetYourInvestor/layout/cssLinks.php');?>
    <!--csslinks ends-->
</head>
<body>

	<!--header begins-->
	<?php
	 require_once($_SERVER["DOCUMENT_ROOT"].'/MeetYourInvestor/layout/InvestorStartupHeader.php');
	 require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/MeetYourInvestor/controller/userController.php');
	 require_once($_SERVER["DOCUMENT_ROOT"].'/MeetYourInvestor/settings/initialization.php');
	 checkUserLogin();
	 ?>
	<!--header ends-->

	<!--CONTAINER-->
	<div class="container" style="padding-top: 60px;">
		<h1 class="page-header">Edit Profile</h1>
		<div class="row">
			<!-- left column -->
			<div class="col-md-4 col-sm-6 col-xs-12">
				<form action="" method="post" enctype="multipart/form-data">
					<div class="text-center">
					<?php
						if (isset($_SESSION['profilePicture']) & empty($_SESSION['profilePicture']))
                        {
                             echo"<img src=\"../img/placeholder.png\" class=\"avatar img-circle img-thumbnail\">";
                        }
                        else
                        {
                            echo"<img src=\"../controller/getImage.php?id=".$_SESSION['userId']."\"
							class=\"avatar img-circle img-thumbnail\">";
                        }
					?>
						<h6 style="color: red;"><?php echo $generalError;?></h6>
						<h6 style="color: red;"><?php echo $sizeError;?></h6>
						<input type="file" class="text-center center-block well well-sm" name="image" class="form-control">
						<input type="submit" value="save" name="saveImage" class="btn btn-primary" style="width: 80%; margin-top:-4%;">
					</div>
				</form>
			</div>
			<!-- edit form column -->
			<div class="col-md-8 col-sm-6 col-xs-12 personal-info">
				<div id="confirmation" style="color: green; text-align: center;">
					<?php echo $confirmationMessage;?>
				</div>
				<h3>Personal info</h3>
				<form class="form-horizontal" role="form" method="post" action=""  name="editProfileForm" onsubmit="return validateEditProfileForm()">

					<?php
						getProfile($_SESSION['userId']);
					?>

					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-8" style="margin-left: 35%; padding-bottom: 3%;">
							<input class="btn btn-default" value="Save Changes" type="submit" id="saveProfileBtn" name="saveChanges">
							<input class="btn btn-default" value="Cancel" type="reset" style="background-color: red;">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!--footer begins-->
	<?php require_once($_SERVER["DOCUMENT_ROOT"].'/MeetYourInvestor/layout/footer.php');?>
	<!--footer ends-->

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="../js/jquery-2.1.1.min.js"></script>		
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="../js/bootstrap.min.js"></script>	
	<script src="../js/parallax.min.js"></script>
	<script src="../js/wow.min.js"></script>
	<script src="../js/jquery.easing.min.js"></script>
	<script type="text/javascript" src="../js/fliplightbox.min.js"></script>
	<script src="../js/functions.js"></script>
	<script src="../contactform/contactform.js"></script>
	<script src="../js/ourjs.js"></script>
</body>
</html>