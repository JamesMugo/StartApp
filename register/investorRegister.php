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

  <?php
   include('../unsecure/unsecureProcessing.php');
  ?>  
  <!--header begins-->
  <?php
   require_once($_SERVER["DOCUMENT_ROOT"].'/MeetYourInvestor/layout/mainHeader.php');
  ?>
  <!--header ends-->

  <!--REGISTER STARTS HERE-->
  <!--CONTAINER-->
  <div class="container" id="register">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">

              <!--FORM BEGINS -->
                <form class="form-horizontal form-position" method="post" name="registerForm" onsubmit="return validateRegisterForm()" action="">
                    <fieldset>
                        <legend class="text-center header">Register As an Investor</legend>

                        <!--FIRST NAME -->
                        <div class="form-group">
                            <span class="col-md-2 "></span>
                            <div class="col-md-8">
                                <input name="fname" type="text" placeholder="First Name" class="form-control" style="border-color: <?php echo $firstNameColor;?>" value="<?php echo $firstName;?>">
                                <span id="firstNameSpan" style="color:red;"><?php echo $firstNameErrorMessage;?></span>
                            </div>
                        </div>

                        <!--LAST NAME -->
                        <div class="form-group">
                            <span class="col-md-2 "></span>
                            <div class="col-md-8">
                                <input name="lname" type="text" placeholder="Last Name" class="form-control" style="border-color: <?php echo $lastNameColor;?>" value="<?php echo $lastName;?>">
                                <span id="lastNameSpan" style="color:red;"><?php echo $lastNameErrorMessage;?></span>
                            </div>
                        </div>

                        <!--USER NAME -->
                        <div class="form-group">
                            <span class="col-md-2 "></span>
                            <div class="col-md-8">
                                <input id="username" name="username" type="text" placeholder="Username" class="form-control" style="border-color: <?php echo $usernameColor;?>" value="<?php echo $username;?>">
                                 <span id="usernameSpan" style="color:red;"><?php echo $usernameErrorMessage;?></span>
                            </div>
                        </div>

                        <!--EMAIL ADDRESS -->
                        <div class="form-group">
                         <span class="col-md-2 "></span>
                         <div class="col-md-8">
                            <input id="email" name="email" type="email" placeholder="Email Address" class="form-control" style="border-color: <?php echo $emailColor;?>" value="<?php echo $email;?>">
                            <span id="emailSpan" style="color:red"><?php echo $emailErrorMessage;?></span>
                        </div>
                    </div>

                    <!--PHONE -->
                    <div class="form-group">
                     <span class="col-md-2 "></span>
                     <div class="col-md-8">
                        <input id="phone" name="phone" type="text" placeholder="Phone Number" class="form-control" maxlength="13" minlength="4" style="border-color: <?php echo $phoneColor;?>" value="<?php echo $phone;?>">
                        <span id="phoneSpan" style="color:red"><?php echo $phoneErrorMessage;?></span>
                    </div>
                </div>

                <!--COUNTRY -->
                <div class="form-group">
                    <span class="col-md-2 "></span>
                    <div class="col-md-8">
                        <input id="country" name="country" type="text" placeholder="country" class="form-control" style="border-color: <?php echo $countryColor;?>"  value="<?php echo $country;?>">
                        <span id="countrySpan" style="color:red"><?php echo $countryErrorMessage;?></span>
                    </div>
                </div>

                <!--Interest-->
                <div class="form-group">
                    <span class="col-md-2 "></span>
                    <div class="col-md-8">
                        <input id="country" name="country" type="text" placeholder="country" class="form-control" style="border-color: <?php echo $countryColor;?>"  value="<?php echo $country;?>">
                        <span id="countrySpan" style="color:red"><?php echo $countryErrorMessage;?></span>
                    </div>
                </div>

                <!--PASSWORD-->
                <div class="form-group">
                 <span class="col-md-2 "></span>
                 <div class="col-md-8">
                    <input id="password" name="password" type="password" class="form-control" placeholder="password" style="border-color: <?php echo $passwordColor;?>">
                    <span id="passwordSpan" style="color:red"><?php echo $passwordErrorMessage;?></span>
                </div>
            </div>

            <!--CONFIRM PASSWORD-->
            <div class="form-group">
             <span class="col-md-2 "></span>
             <div class="col-md-8">
                <input id="confirmPassword" name="confirmPassword" type="password" class="form-control" placeholder="password" style="border-color: <?php echo $passwordConfirmColor;?>">
                <span id="confirmPasswordSpan" style="color:red"><?php echo $passwordConfirmErrorMessage;?></span>
                <span id="passwordMismarch" style="color:red"><?php echo $passwordMisMach;?></span>
            </div>
        </div>
        <!--BUTTON -->
        <div class="form-group">
            <span class="col-md-2 "></span>

            <div class="col-md-8 text-center">
              <span id="passwordMissmarch" style="color:red"></span>
              <button type="submit" class="btn btn-primary btn-lg col-md-12" id="submitBtn"
               name="investorRegisterButton">Submit</button>
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
    <script src="../js/jquery-2.1.1.min.js"></script>   
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>  
    <script src="../js/parallax.min.js"></script>
    <script src="../js/wow.min.js"></script>
    <script src="../js/jquery.easing.min.js"></script>
    <script type="text/javascript" src="../js/fliplightbox.min.js"></script>
    <script src="../js/functions.js"></script>
    <!-- <script src="../js/ourjs.js"></script>-->
    
</body>
</html>