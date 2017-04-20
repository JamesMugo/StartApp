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
    <h1 style="color: blue">Forgotten-Password</h1><br>
  <form method="post" name="loginForm" onsubmit="return validateLoginForm()" action="">
    <input type="email" name="email" placeholder="enter email  to reset" style="border-color: <?php //echo $usernameColor;?>"
    value="<?php //echo $username;?>">
    <span id="usernameSpan" style="color:red;"><?php //echo $usernameErrorMessage;?></span>
    <input type="submit" name="loginButton" class="login login-submit" value="Send">
  </form>
</div>

      <!--footer begins-->
      <?php require_once($_SERVER["DOCUMENT_ROOT"].'/MeetYourInvestor/layout/mainFooter.php');?>
      <!--footer ends-->

      <!--<script src="../js/ourjs.js"></script>-->
</body>

</html>