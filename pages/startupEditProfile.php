<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Startups'Profile</title>



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
	<div class="container" style="padding-top: 60px;">
		<h1 class="page-header">Edit Profile</h1>
		<div class="row">
			<!-- left column -->
			<div class="col-md-4 col-sm-6 col-xs-12">
				<div class="text-center">
					<img src="../img/team/james.jpg" class="avatar img-circle img-thumbnail" alt="avatar" id="editprofilepic">
					<h6>Upload a different photo...</h6>
					<input type="file" class="text-center center-block well well-sm">
				</div>
			</div>
			<!-- edit form column -->
			<div class="col-md-8 col-sm-6 col-xs-12 personal-info">
				<div class="alert alert-info alert-dismissable">
					<a class="panel-close close" data-dismiss="alert">×</a> 
					<i class="fa fa-coffee"></i>
					This is an <strong>.alert</strong>. Use this to show important messages to the user.
				</div>
				<h3>Personal info</h3>
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label class="col-lg-3 control-label">CompanyName:</label>
						<div class="col-lg-8">
							<input class="form-control" value="TiwaleProject" type="text">
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-3 control-label">Location:</label>
						<div class="col-lg-8">
							<input class="form-control" value="Malawi" type="text">
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-3 control-label">Interested in:</label>
						<div class="col-lg-8">
							<div class="ui-select">
								<select id="user_time_zone" class="form-control">
									<option value="Hawaii">Agriculture</option>
									<option value="Hawaii">Health</option>
									<option value="Hawaii">Tourism</option>
									<option value="Hawaii">Education</option>
									<option value="Hawaii">Sports</option>
									<option value="Hawaii">Entertainment</option>
								</select>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Company address:</label>
						<div class="col-md-8">
							<input class="form-control" value="Malawi, Londoncorner" type="text">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Email:</label>
						<div class="col-md-8">
							<input class="form-control" value="tiwaleProject@gmail.com" type="email">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Tel (primary) :</label>
						<div class="col-md-8">
							<input class="form-control" value="0872274469" type="text">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Tel (secondary) :</label>
						<div class="col-md-8">
							<input class="form-control" value="002209954952" type="text">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Password:</label>
						<div class="col-md-8">
							<input class="form-control" value="11111122333" type="password">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Confirm password:</label>
						<div class="col-md-8">
							<input class="form-control" value="11111122333" type="password">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-8">
							<input class="btn btn-default" value="Save Changes" type="button" id="saveProfileBtn">

							<input class="btn btn-default" value="Cancel" type="reset">
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