<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Startups' Page</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/overwrite.css">
	<link href="css/animate.min.css" rel="stylesheet"> 
	<link href="css/style.css" rel="stylesheet" />	
	<link href="css/ourStyle.css" rel="stylesheet" />	
	
</head>
<body>
	<!--header begins-->
	<?php require_once($_SERVER["DOCUMENT_ROOT"].'/MeetYourInvestor/layout/startup.php');?>
	<!--header ends-->

	<!--CONTAINER-->
	<div class="container-fluid">

		<!--row-->
		<div class="row">
			
			<!-- left side bar column-->
			<div class="col-md-2" id="lefSidebar">
				<ul id="lefSidebar-list" class="nav ">
					<li><a href="favoriteInvestorpage.html">Favorite Investors</a></li><br>
				</ul>
			</div>

			<!--middle bar-->
			<div class="col-md-8" id="middle">
				<h2 style="text-align: center;  font-family:'Roboto'; ">View Investors</h2>
				<hr>

				<div id="cardrow">
					<!--card-->

					<a href="startupProfile.html">
						<div id="card1">

							<div id="investorInfo">
								<table>
									<tr>
										<td  class="tdtitle">Name: </td>
										<td>Alice Kamanda</td>
									</tr>
									<tr>
										<td  class="tdtitle">Nationality: </td>
										<td>Ugandan</td>
									</tr>
									<tr>
										<td  class="tdtitle">Interest: </td>
										<td>Entrepreneurship</td>
									</tr>
								</table>
							</div>
							<div id="pictb">
								<td><img src="img/team/james.jpg" id="investorimg"></td>
							</div>
						</div>
					</a>

					<!--card-->
					<div id="card2">

						<div id="investorInfo">
							<table>
								<tr>
									<td  class="tdtitle">Name: </td>
									<td>M. A. Barasa</td>
								</tr>
								<tr>
									<td  class="tdtitle">Nationality: </td>
									<td>Kenyan</td>
								</tr>
								<tr>
									<td  class="tdtitle">Interest: </td>
									<td>Finance</td>
								</tr>
							</table>
						</div>
						<div id="pictb">
							<td><img src="img/team/james.jpg" id="investorimg"></td>
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
									<td>Gikonyo Wandawa</td>
								</tr>
								<tr>
									<td  class="tdtitle">Nationality: </td>
									<td>Tanzania</td>
								</tr>
								<tr>
									<td  class="tdtitle">Interest: </td>
									<td>Finance</td>
								</tr>
							</table>
						</div>
						<div id="pictb">
							<td><img src="img/team/james.jpg" id="investorimg"></td>
						</div>
					</div>

					<!--card-->
					<div id="card2">

						<div id="investorInfo">
							<table>
								<tr>
									<td  class="tdtitle">Name: </td>
									<td>B. B. Wanjala</td>
								</tr>
								<tr>
									<td  class="tdtitle">Nationality: </td>
									<td>Kenyan</td>
								</tr>
								<tr>
									<td  class="tdtitle">Interest: </td>
									<td>Social Marketing</td>
								</tr>
							</table>
						</div>
						<div id="pictb">
							<td><img src="img/team/james.jpg" id="investorimg"></td>
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
									<td>Phyllis Sitati</td>
								</tr>
								<tr>
									<td  class="tdtitle">Nationality: </td>
									<td>Kenyan</td>
								</tr>
								<tr>
									<td  class="tdtitle">Interest: </td>
									<td>Technology</td>
								</tr>
							</table>
						</div>

						<div id="pictb">
							<td><img src="img/team/james.jpg" id="investorimg"></td>
						</div>
					</div>

					<!--card-->
					<div id="card2">

						<div id="investorInfo">
							<table>
								<tr>
									<td  class="tdtitle">Name: </td>
									<td>Phyllis Sitati</td>
								</tr>
								<tr>
									<td  class="tdtitle">Nationality: </td>
									<td>Kenyan</td>
								</tr>
								<tr>
									<td  class="tdtitle">Interest: </td>
									<td>Technology</td>
								</tr>
							</table>
						</div>

						<div id="pictb">
							<td><img src="img/team/james.jpg" id="investorimg"></td>
						</div>
					</div>
				</div>


			</div>

			<!-- right side bar column-->
			<div class="col-md-2" id="rightSidebar">
				<!-- searh-->
				<h4>Filter by: </h4>
				<form class="form-horizontal" role="form" name="searchForm" onsubmit="return validateSearchForm()" action="">

					<div class="form-group">
						<label class="col-lg-3 control-label">Name:</label>
						<div class="col-lg-10">
							<input class="form-control" placeholder="StartupName" type="text" name="name">
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-3 control-label">Nationality: </label>
						<div class="col-lg-10">
							<input class="form-control" placeholder="Choose Country" type="text" name="nationality">
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-3 control-label">Interest:</label>
						<div class="col-lg-10">
							<input class="form-control" placeholder="Choose interest" type="text" name="interest">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<span style="color: red;" id="searhSpan"></span>
						<div class="col-md-10">
							<input class="btn btn-primary" value="Search" type="submit">
						</div>
					</div>

				</form>
			</div>

		</div>

	</div>	

	<!--Footer-->
	<footer>
		<div class="container">
			<div class="sub-footer">
				<div class="text-center">
					<div class="col-md-12">
						<form class="form-inline">
							<div class="form-group">
								<button type="purchase" name="purchase" class="btn btn-primary btn-lg" required="required">Enter Your Email</button>
							</div>
							<div class="form-group">
								<button type="subscribe" name="subscribe" class="btn btn-primary btn-lg" required="required">Subscribe Now</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>			
		<div class="social-icon">
			<div class="container">
				<div class="col-md-6 col-md-offset-3">						
					<ul class="social-network">
						<li><a href="#" class="fb tool-tip" title="Facebook"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#" class="twitter tool-tip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#" class="gplus tool-tip" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#" class="linkedin tool-tip" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="#" class="ytube tool-tip" title="You Tube"><i class="fa fa-youtube-play"></i></a></li>
						<li><a href="#" class="dribbble tool-tip" title="Dribbble"><i class="fa fa-dribbble"></i></a></li>
						<li><a href="#" class="pinterest tool-tip" title="Pinterest"><i class="fa fa-pinterest-square"></i></a></li>
					</ul>						
				</div>
			</div>
		</div>						
		<div class="text-center">
			<div class="copyright">
				&copy; Meet Your Investor. All Rights Reserved.
				<div class="credits">

				</div>
			</div>
		</div>									
	</footer>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery-2.1.1.min.js"></script>		
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>	
	<script src="js/parallax.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/jquery.easing.min.js"></script>
	<script type="text/javascript" src="js/fliplightbox.min.js"></script>
	<script src="js/functions.js"></script>
	<script src="contactform/contactform.js"></script>
	<script src="js/ourjs.js"></script>
</body>
</html>