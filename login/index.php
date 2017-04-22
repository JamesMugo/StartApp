<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Log-in</title>
  <!--css links begins-->
  <?php require_once($_SERVER["DOCUMENT_ROOT"].'/MeetYourInvestor/layout/cssLinks.php');?>
  <!--csslinks ends-->
  <link rel="stylesheet" href="../css/style1.css" media="screen" type="text/css" />
</head>

<body>

  <?php
   include('../unsecure/unsecureProcessing.php');
  ?>  
  <!--header begins-->
  <?php require_once($_SERVER["DOCUMENT_ROOT"].'/MeetYourInvestor/layout/mainHeader.php');?>
  <!--header ends-->

  <div class="login-card">
    <h1 style="color: blue:">Log-in</h1><br>
  <form method="post" name="loginForm" onsubmit="return validateLoginForm()" action="">
    <input type="text" name="username" placeholder="Username" style="border-color: <?php echo $usernameColor;?>"
    value="<?php echo $username;?>">
    <span id="usernameSpan" style="color:red;"><?php echo $usernameErrorMessage;?></span>
    <input type="password" name="password" placeholder="Password" style="border-color: <?php echo $passwordColor;?>">
    <span id="passwordSpan" style="color:red;"><?php echo $passwordErrorMessage;?></span>
    <input type="submit" name="loginButton" class="login login-submit" value="login">
  </form>

  <div class="login-help">
    <a href="../index.php#signup">Register</a> • <a href="../pages/forgetPassword.php">Forgot Password</a>
  </div>
</div>

      <!--footer begins-->
      <?php require_once($_SERVER["DOCUMENT_ROOT"].'/MeetYourInvestor/layout/mainFooter.php');?>
      <!--footer ends-->

      <!--<script src="../js/ourjs.js"></script>-->
</body>

</html>