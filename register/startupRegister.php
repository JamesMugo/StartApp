<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>MYI - Meet Your Investor</title>

  <!--css links begins-->
  <?php require_once($_SERVER["DOCUMENT_ROOT"].'/MeetYourInvestor/layout/cssLinks.php');?>
  <!--csslinks ends-->
    
</head>
<body>	
	<!--header begins-->
  <?php require_once($_SERVER["DOCUMENT_ROOT"].'/MeetYourInvestor/layout/mainHeader.php');?>
  <!--header ends-->

  <!--REGISTER STARTS HERE-->
  <!--CONTAINER-->
  <div class="container" id="register">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">

            	<!--FORM BEGINS -->
                <form class="form-horizontal form-position" method="post" name="signUpStartUpForm" onsubmit="return validateRegisterForm()" action="">
                    <fieldset>
                        <legend class="text-center header">Register As a Startup</legend>

                        <!--NAME -->
                        <div class="form-group">
                            <span class="col-md-2 "></span>
                            <div class="col-md-8">
                                <input id="name" name="name" type="text" placeholder="Name" class="form-control">
                            </div>
                            <span id="startUpNameSpan" style="color:red;"></span>
                        </div>

                        <!--USER NAME -->
                        <div class="form-group">
                            <span class="col-md-2 "></span>
                            <div class="col-md-8">
                                <input id="username" name="username" type="text" placeholder="Username" class="form-control">
                            </div>
                            <span id="startUpUsernameSpan" style="color:red;"></span>
                        </div>

                        <!--EMAIL ADDRESS -->
                        <div class="form-group">
                         <span class="col-md-2 "></span>
                         <div class="col-md-8">
                            <input id="email" name="email" type="email" placeholder="Email Address" class="form-control">
                        </div>
                        <span id="startUpEmailSpan" style="color:red"></span>
                    </div>

                    <!--PHONE -->
                    <div class="form-group">
                     <span class="col-md-2 "></span>
                     <div class="col-md-8">
                        <input id="phone" name="phone" type="text" placeholder="Phone Number" class="form-control" maxlength="13" minlength="4">
                    </div>
                    <span id="startUpPhoneSpan" style="color:red"></span>
                </div>

                <!--COUNTRY -->
                <div class="form-group">
                    <span class="col-md-2 "></span>
                    <div class="col-md-8">
                        <input id="country" name="country" type="text" placeholder="country" class="form-control">
                    </div>
                    <span id="startUpcountrySpan" style="color:red"></span>
                </div>

                <!--PASSWORD-->
                <div class="form-group">
                 <span class="col-md-2 "></span>
                 <div class="col-md-8">
                    <input id="password" name="password" type="password" class="form-control" placeholder="password">
                </div>
                <span id="startUpPasswordSpan" style="color:red"></span>
            </div>

            <!--CONFIRM PASSWORD-->
            <div class="form-group">
             <span class="col-md-2 "></span>
             <div class="col-md-8">
                <input id="passwordConfirm" name="passwordConfirm" type="password" class="form-control" placeholder="password">
            </div>
            <span id="startUpConfirmPasswordSpan" style="color:red"></span>
        </div>

        <!--BUTTON -->
        <div class="form-group">
            <span class="col-md-2 "></span>

            <div class="col-md-8 text-center">
              <span id="passwordMissmarch" style="color:red"></span>
              <button type="submit" class="btn btn-primary btn-lg col-md-12" id="submitBtn">Submit</button>
          </div>
      </div>
  </fieldset>
</form>
<!--FORM ENDS -->
</div>
</div>
</div>
</div>

<!--REGISTER ENDS HERE-->


    <!--footer begins-->
      <?php require_once($_SERVER["DOCUMENT_ROOT"].'/MeetYourInvestor/layout/mainFooter.php');?>
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
    <script src="contactform/contactform.js"></script>
    <script src="js/ourjs.js"></script>
    
</body>
</html>