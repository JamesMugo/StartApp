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

  <?php require_once($_SERVER["DOCUMENT_ROOT"].'/MeetYourInvestor/mainHeader.php');?>

  <div class="login-card">
    <h1>Reset Password</h1><br>
  <form method="post" name="resetForm" onsubmit="return validateLoginForm()" action="">
    <input type="email" name="email" placeholder="email" style="border-color: <?php //echo $usernameColor;?>"
    value="<?php //echo $username;?>">
    <input type="password" name="password" placeholder="new password" style="border-color: <?php //echo $usernameColor;?>"
    value="<?php //echo $username;?>">
    <input type="password" name="password" placeholder="confirm password" style="border-color: <?php //echo $usernameColor;?>"
    value="<?php //echo $username;?>">
    <span id="usernameSpan" style="color:red;"><?php //echo $usernameErrorMessage;?></span>
    <input type="submit" name="resetButton" class="login login-submit" value="Reset">
  </form>
</div>

      <!--footer begins-->
      <?php require_once($_SERVER["DOCUMENT_ROOT"].'/MeetYourInvestor/layout/mainFooter.php');?>
      <!--footer ends-->

      <!--<script src="../js/ourjs.js"></script>-->
</body>

</html>