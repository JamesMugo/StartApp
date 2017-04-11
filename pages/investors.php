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
	<title>investors' Page</title>

   
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

		<!--row-->
		<div class="row">
			
			<!--left sidebar begins-->
			<?php require_once($_SERVER["DOCUMENT_ROOT"].'/MeetYourInvestor/layout/leftSidebar.php');?>
			<!--left sidebar ends-->

			<!--middle bar-->
			<div class="col-md-8" id="middle">
				<h2 style="text-align: center;  font-family:'Roboto'; ">Investors</h2>
				<hr>

				<div id="cardrow">
					<!--card-->

					<a href="investorProfile.php">
						<div id="card1">

							<div id="investorInfo">
								<table>
									<tr>
										<td  class="tdtitle">Name: </td>
										<td>Alieu</td>
									</tr>
									<tr>
										<td  class="tdtitle">Nationality: </td>
										<td>Gambian</td>
									</tr>
									<tr>
										<td  class="tdtitle">Interest: </td>
										<td>Finance</td>
									</tr>
								</table>
							</div>
							<div id="pictb">
								<td><img src="../img/team/james.jpg" id="investorimg"></td>
							</div>
						</div>
					</a>

					<!--card-->
					<div id="card2">

						<div id="investorInfo">
							<table>
								<tr>
									<td  class="tdtitle">Name: </td>
									<td>Alieu</td>
								</tr>
								<tr>
									<td  class="tdtitle">Nationality: </td>
									<td>Gambian</td>
								</tr>
								<tr>
									<td  class="tdtitle">Interest: </td>
									<td>Finance</td>
								</tr>
							</table>
						</div>
						<div id="pictb">
							<td><img src="../img/team/james.jpg" id="investorimg"></td>
						</div>
					</div>
				</div>

				<div id="cardrow">
					<!--card-->
					<div id="card1">

						<div id="investorInfo">
							<table>
								<tr>
									<td  class="tdtitle">Name: </td>
									<td>Alieu</td>
								</tr>
								<tr>
									<td  class="tdtitle">Nationality: </td>
									<td>Gambian</td>
								</tr>
								<tr>
									<td  class="tdtitle">Interest: </td>
									<td>Finance</td>
								</tr>
							</table>
						</div>
						<div id="pictb">
							<td><img src="../img/team/james.jpg" id="investorimg"></td>
						</div>
					</div>

					<!--card-->
					<div id="card2">

						<div id="investorInfo">
							<table>
								<tr>
									<td  class="tdtitle">Name: </td>
									<td>Alieu</td>
								</tr>
								<tr>
									<td  class="tdtitle">Nationality: </td>
									<td>Gambian</td>
								</tr>
								<tr>
									<td  class="tdtitle">Interest: </td>
									<td>Finance</td>
								</tr>
							</table>
						</div>
						<div id="pictb">
							<td><img src="../img/team/james.jpg" id="investorimg"></td>
						</div>
					</div>
				</div>


				<div id="cardrow">
					<!--card-->
					<div id="card1">

						<div id="investorInfo">
							<table>
								<tr>
									<td  class="tdtitle">Name: </td>
									<td>Alieu</td>
								</tr>
								<tr>
									<td  class="tdtitle">Nationality: </td>
									<td>Gambian</td>
								</tr>
								<tr>
									<td  class="tdtitle">Interest: </td>
									<td>Finance</td>
								</tr>
							</table>
						</div>
						<div id="pictb">
							<td><img src="../img/team/james.jpg" id="investorimg"></td>
						</div>
					</div>

					<!--card-->
					<div id="card2">

						<div id="investorInfo">
							<table>
								<tr>
									<td  class="tdtitle">Name: </td>
									<td>Alieu</td>
								</tr>
								<tr>
									<td  class="tdtitle">Nationality: </td>
									<td>Gambian</td>
								</tr>
								<tr>
									<td  class="tdtitle">Interest: </td>
									<td>Finance</td>
								</tr>
							</table>
						</div>
						<div id="pictb">
							<td><img src="../img/team/james.jpg" id="investorimg"></td>
						</div>
					</div>
				</div>


			</div>
				<!--right sidebar begins-->
				<?php require_once($_SERVER["DOCUMENT_ROOT"].'/MeetYourInvestor/layout/rightSidebar.php');?>
				<!--right sidebar ends-->
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