<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>MYI - Meet Your Investor</title>

	<!--css links begins-->
    <?php require_once('layout/cssLinks.php');?>
    <!--csslinks ends-->
	
</head>
<body>	
	 <?php
 	  include('unsecure/unsecureProcessing.php');
 	 ?>	
	<!--header begins-->
	<?php require_once('layout/mainHeader.php');?>
	<!--header ends-->

	<div class="slider">		
		<div id="about-slider">
			<div id="carousel-slider" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators visible-xs">
					<li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-slider" data-slide-to="1"></li>
					<li data-target="#carousel-slider" data-slide-to="2"></li>
				</ol>

				<div class="carousel-inner">

					<div class="item active">						
						<img src="img/7.jpg" class="img-responsive" alt=""> 
						<div class="carousel-caption">
							<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.3s">								
								<h2><span>Meet Your Investor Co. Ltd</span></h2>
							</div>
							<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.6s">								
								<p>Where start-ups meet Investors!!!</p>
							</div>
							<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.9s">

								<div id="form2s">
										<div id="form2">
											<div class="form-group" id="sign2">
												<a class="btn btn-primary btn-lg" href="#signup" style=" background-color: green;" >Sign Up</a>
											</div>
											<div class="form-group" id="sign2">
												<a class="btn btn-primary btn-lg" href="login/signin.php" style=" background-color:#0BA9F9;" >Sign in</a>
											</div>
										</div>
								</div>	

							</div>
						</div>
					</div>
					
					<div class="item">
						<img src="img/6.jpg" class="img-responsive" alt=""> 
						<div class="carousel-caption">
							<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="1.0s">								
								<h2>Are you an Investor?</h2>
							</div>
							<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="1.3s">								
								<p>Invest today and see some dreams grow into business</p>
							</div>
							<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="1.6s">								
								
								<div id="form2s">
									<form class="form-inline" action="#signup">
										<div id="form2">
											<div class="form-group" id="sign2">
												<a class="btn btn-primary btn-lg" href="#signup" style=" background-color: green;" >Sign Up</a>
											</div>
											<div class="form-group" id="sign2">
												<a class="btn btn-primary btn-lg" href="login/signin.php" style=" background-color:#0BA9F9;" >Sign in</a>
											</div>
										</div>

									</form>
								</div>	
							</div>
						</div>
					</div>

					<div class="item">
						<img src="img/1.jpg" class="img-responsive" alt=""> 
						<div class="carousel-caption">
							<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.3s">								
								<h2>Are you a start-up?</h2>
							</div>
							<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.6s">								
								<p>You could get an investor to boost your idea !!!</p>
							</div>
							<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.9s">								
								
								<div id="form2s">
									<form class="form-inline" action="#signup">
										<div id="form2">
											<div class="form-group" id="sign2">
												<a class="btn btn-primary btn-lg" href="#signup" style=" background-color: green;" >Sign Up</a>
											</div>
											<div class="form-group" id="sign2">
												<a class="btn btn-primary btn-lg" href="login/signin.php" style=" background-color:#0BA9F9;" >Sign in</a>
											</div>
										</div>

									</form>
								</div>		
							</div>
						</div>
					</div> 

				</div>
				
				<a class="left carousel-control hidden-xs" href="#carousel-slider" data-slide="prev">
					<i class="fa fa-angle-left"></i> </a>
					
					<a class=" right carousel-control hidden-xs"href="#carousel-slider" data-slide="next">
						<i class="fa fa-angle-right"></i> 
					</a>
				</div> <!--/#carousel-slider-->
			</div><!--/#about-slider-->
		</div><!--/#slider-->


		<div class="parallax-window">
			<div class="col-md-6 col-md-offset-3">
				<div class="text-center">
					<div class="wow bounceIn" data-wow-offset="0" data-wow-delay="0.2s">
						<h2>Greatness starts now</h2>
					</div>
					<div class="wow bounceIn" data-wow-offset="0" data-wow-delay="0.6s">
						<p>Don't let anything stop you from becoming part of our vision<br>
						</p>
					</div>
				</div>
			</div>
		</div><!--/#parallax-window-->

		<!--ABOUT BEGINS-->
		<div id="about">
			<div class="about">
				<div class="container">
					<div class="row">
						<h1 id="h1Header">About MYI</h1>
						<hr>
						<p>
							Today, the world has seen many startups spring than any other time in history. However, because of inadequate funds and relevant advice, many of these startups do not survive the first 3 years of operation. Meanwhile there are many investors out there who are willing and capable of investing in projects they are passionate about or they believe with their money.
						</p>
						<hr>
						<h1 id="h1Header">Purpose</h1>
						<hr>
						<p>
							The purpose of Meet Your Investors (MYI) is to assist startups who are seeking to grow and expand their businesses to meet with potential investors and negotiate on investment deals.
						</p>
						<hr>
						<h1 id="h1Header">Mission</h1>
						<hr>
						<p>
							To be the company leading the market where both the start-ups and investors are involved. 
						</p>
						<hr>
					</div>
				</div>
			</div>
		</div>
		<!--ABOUT ENDS-->

		<!--SIGNUP BEGINS-->
		<div id="signup">
			<div class="container" id="signupBtnContainer">
				<div class="col-lg-10">  

					<!-- SIGN UP Button -->
					<a href="register/startupRegister.php"> <div  class="signupBtn">I am a startup</div></a><br>

					<!-- SIGN UP Button -->
					<a href="register/investorRegister.php"><div class="signupBtn"> I am an Investor</div></a><br>

					<!-- SIGN UP Button -->
					<a href="investmentCompanyRegister.html"><div class="signupBtn"> I am an investment company</div></a><br>
				</div>
			</div>
		</div>
		<!--SIGNUP ENDS-->


		<!--MEET OUR TEAM BEGINS-->
		<div id="our-team">
			<div class="team">
				<div class="container">
					<div class="row">
						<div class="col-md-3 wow fadeInRight" data-wow-offset="0" data-wow-delay="0.3s">
							<div class="text-center">
								<img src="img/team/alieu.jpg" class="img-responsive" alt="">
								<h2>Alieu Jallow</h2>
								<h4>Solution Architect</h4>
								<p>Bachelors Degree: Computer Science, Ashesi University College</p>
							</div>
						</div>
						<span></span>
						<div class="col-md-3 wow fadeInRight" data-wow-offset="0" data-wow-delay="0.3s">
							<div class="text-center">
								<img src="img/team/james.jpg" class="img-responsive" alt="">
								<h2>James Mugo</h2>
								<h4>Developer</h4>
								<p>Bachelors Degree: Computer Science, Ashesi University College</p>
							</div>
						</div>

						<div class="col-md-3 wow fadeInLeft" data-wow-offset="0" data-wow-delay="0.3s">
							<div class="text-center">
								<img src="img/team/kwabena.jpg" class="img-responsive" alt="">
								<h2>Kwabena Adu Darkwa</h2>
								<h4>Project Manager</h4>
								<p>Bachelors Degree: Management Information System, Ashesi University College</p>
							</div>
						</div>

						<div class="col-md-3 wow fadeInLeft" data-wow-offset="0" data-wow-delay="0.3s">
							<div class="text-center">
								<img src="img/team/kaaniru.jpg" class="img-responsive" alt="">
								<h2>Josephine Kaaniru</h2>
								<h4>Deployment Officer</h4>
								<p>Bachelors Degree: Computer Science, Ashesi University College</p>
							</div>
						</div>
					</div>	
				</div>
			</div>
		</div>
		<!--MEET OUR TEAM ENDS-->
		
			<!--CONTACT BEGINS-->
			<div id="contact">
				<div class="container">
					<div class="text-center">
						<h3>Contact Us</h3>
						<p>Do you have any feedback or comment for us?<br>
							Kindly contact us with the details below. 
						</p>
					</div>
				</div>
				<div class="container">
					<div class="row">
						<div class="col-md-4 wow fadeInUp" data-wow-offset="0" data-wow-delay="0.2s">
							<h2>Contact us any time</h2>
							<p>Our offices are open from <b><font color="blue">8:00 am to 5:00 pm</font></b> every week <b><font color="blue">Monday to Friday</font></b>.<br>
								You can walk to our offices and talk to us or use the contact details provided on the right to talk to us. 
							</p>				
						</div>				
						
						<div class="col-md-4 wow fadeInUp" data-wow-offset="0" data-wow-delay="0.4s">
							<h2>Contact Info</h2>
							<ul>
								<li><i class="fa fa-home fa-2x"></i> Ashesi University, 1 University Avenue, E/R, Berekuso</li><hr>
								<li><i class="fa fa-phone fa-2x"></i> +233 54 887 8709</li><hr>
								<li><i class="fa fa-envelope fa-2x"></i>meetyourinvestor@gmail.com</li>
							</ul>
						</div>
						
						<div class="col-md-4 wow fadeInUp" data-wow-offset="0" data-wow-delay="0.6s">  	
							<div style="color: red;"><?php echo $sendEmailError;?></div>
							<div id="errormessage"></div>
							<form action="" method="post" role="form" class="contactForm" name="contactForm" onsubmit="return validateContactForm()">
								<div class="form-group">
									<input type="text" name="fname" class="form-control" id="name" placeholder="Your Name" style="border-color:<?php echo $firstNameColor;?>" 
									value="<?php echo $firstName;?>"/>
									 <span id="firstNameSpan" style="color:red;"><?php echo $firstNameErrorMessage;?></span>
								</div>
								<div class="form-group">
									<input type="email" class="form-control" name="email" id="email" placeholder="Your Email" style="border-color:<?php echo $emailColor;?>"
									value="<?php echo $email;?>"/>
									 <span id="emailSpan" style="color:red"><?php echo $emailErrorMessage;?></span>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" name="subject" id="subject"
									 placeholder="Subject" style="border-color:<?php echo $subjectColor;?>"
									 value="<?php echo $subject;?>" />
									<span id="subjectSpan" style="color:red;"><?php echo $subjectErrorMessage;?></span>
								</div>
								<div class="form-group">
									<textarea class="form-control" name="message" rows="5" placeholder="Message" 
									style="border-color:<?php echo $messageColor;?>"><?php echo $message;?></textarea>
									<span id="messageSpan" style="color:red;"><?php echo $messageErrorMessage;?></span>
								</div>
								
								<button type="submit" class="btn btn-theme pull-left" name="contactButton">SEND MESSAGE</button>
							</form>
						</div>	
					</div>
				</div>
			</div>
			<!--CONTACT ENDS-->

			<!--footer begins-->
			<?php require_once('layout/mainFooter.php');?>
			<!--footer ends-->
			
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery-2.1.1.min.js"></script>		
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>	
		<script src="js/parallax.min.js"></script>
		<script src="js/wow.min.js"></script>
		<script src="js/jquery.easing.min.js"></script>
		<script type="text/javascript" src="js/fliplightbox.min.js"></script>
		<script src="js/functions.js"></script>
		<!-- <script src="js/ourjs.js"></script>-->
		
	</body>
	</html>