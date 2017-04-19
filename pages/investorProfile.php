<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>investors</title>


	 <!-- Custom styles -->
    <link href="../css/css/style.css" rel="stylesheet">

	<!--css links begins-->
    <?php require_once($_SERVER["DOCUMENT_ROOT"].'/MeetYourInvestor/layout/cssLinks.php');?>
    <!--csslinks ends-->
	
</head>
<body>

	<!--header begins-->
	<?php require_once($_SERVER["DOCUMENT_ROOT"].'/MeetYourInvestor/layout/InvestorStartupHeader.php');?>
	<!--header ends-->

	<!--CONTAINER-->
	<div class="container-fluid">

		<!--PANNEL BEGINS-->
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
				<div class="panel panel-info" id="panel">
					<?php
						require_once($_SERVER["DOCUMENT_ROOT"].'/MeetYourInvestor/controller/viewProfileController.php');
						$userid = $_GET['id'];
						viewUserProfile($userid);
					?>
					<div class="panel-footer">
					</div>
				</div>
				</div>
			</div>
		</div>
		<!--PANNEL ENDS-->
		<div id="panelf" style="color: white;"><p>safsdffsfsffsf</p>
		<p>safsdffsfsffsf</p>
		<p>safsdffsfsffsf</p>
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
	<script src="contactform/contactform.js"></script>
</body>
</html>