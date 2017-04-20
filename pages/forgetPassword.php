<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>forgot password</title>
  <!--css links begins-->
  <?php require_once($_SERVER["DOCUMENT_ROOT"].'/MeetYourInvestor/layout/cssLinks.php');?>
  <!--csslinks ends-->
  <link rel="stylesheet" href="../css/style1.css" media="screen" type="text/css" />
</head>

<body>

  <?php
   require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/MeetYourInvestor/settings/validations.php');
  ?>  
  <!--header begins-->
  <?php require_once($_SERVER["DOCUMENT_ROOT"].'/MeetYourInvestor/layout/mainHeader.php');?>
  <!--header ends-->

  <div class="login-card">
    <h1>Log-in</h1><br>
  <form method="post" name="passwordRecoveryForm" onsubmit="return validateRecoveryForm()" action="">
    <input type="email" name="email" placeholder="email" style="border-color: <?php echo $emailColor;?>">
    <span id="emailSpan" style="color:red;"><?php echo $emailErrorMessage;?></span>
    <input type="submit" name="sendEmail" class="login login-submit" value="Send">
  </form>
</div>

      <!--footer begins-->
      <?php require_once($_SERVER["DOCUMENT_ROOT"].'/MeetYourInvestor/layout/mainFooter.php');?>
      <!--footer ends-->

      <!--<script src="../js/ourjs.js"></script>-->
</body>

</html>