<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<?php
		require_once($_SERVER["DOCUMENT_ROOT"].'/MeetYourInvestor/settings/initialization.php');
		require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/MeetYourInvestor/controller/favoriteController.php');

		require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/MeetYourInvestor/controller/messageController.php');
	?>
	<title>messages</title>

   
    <!-- Custom styles -->
    <link href="../css/css/style.css" rel="stylesheet">

	<!--css links begins-->
    <?php require_once($_SERVER["DOCUMENT_ROOT"].'/MeetYourInvestor/layout/cssLinks.php'); ob_start();?>
    <!--csslinks ends-->
	
</head>
<body>
	<!--header begins-->
	<?php 
		require_once($_SERVER["DOCUMENT_ROOT"].'/MeetYourInvestor/layout/InvestorStartupHeader.php');
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
	<!--header ends-->

	<!--CONTAINER-->
	<div class="container-fluid">

		<!--row-->
		<div class="row">
			
				<!-- left side bar column-->
	      <div class="col-md-2" id="lefSidebar">
	        <ul id="lefSidebar-list" class="nav ">
	          <li><a href="users.php">Back to <?php echo $user;?></a></li><br>
	          <li><a href="">Messages</a></li><br>
	        </ul>
	      </div>

			<!--middle bar-->
			<div class="col-md-8" id="middle">
				<h2 style="text-align: center;  font-family:'Roboto'; ">
					Messages
				</h2>
				<hr>
					<form action="" method="post" onsubmit="">
						<span style="color:green;"><?php echo $confirmationMessage;?></span><br>
						<label>subject</label><br>
						<input type="text" name="subject" class="form-control"><br>

						<label>Message</label><br>
						<textarea class="form-control" name="message" style="border-color:<?php echo $messageColor;?>"></textarea>
						<span id="messageSpan" style="color:red;"><?php echo $messageErrorMessage;?></span>

						<button class=" btn btn-primary form-control" name="sendEmailToUser">Send</button>
					</form>
			</div>
				<!--right sidebar begins-->
				<?php require_once($_SERVER["DOCUMENT_ROOT"].'/MeetYourInvestor/layout/rightSidebar.php');?>
				<!--right sidebar ends-->
		</div>
	</div>	

	<!--footer begins-->
	<?php 
		require_once($_SERVER["DOCUMENT_ROOT"].'/MeetYourInvestor/layout/footer.php');
		ob_end_flush();
	?>
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
	<!--<script src="../js/ourjs.js"></script>-->
</body>
</html>