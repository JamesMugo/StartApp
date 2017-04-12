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
  <!--header begins-->
  <?php require_once($_SERVER["DOCUMENT_ROOT"].'/MeetYourInvestor/layout/mainHeader.php');?>
  <!--header ends-->

  <div class="login-card">
    <h1>Log-in</h1><br>
  <form method="post" name="loginForm" onsubmit="return validateLoginForm()" action="">
    <input type="text" name="username" placeholder="Username">
    <span id="usernameSpan" style="color:red;"></span>
    <input type="password" name="password" placeholder="Password">
    <span id="passwordSpan" style="color:red;"></span>
    <input type="submit" name="login" class="login login-submit" value="login">
  </form>

  <div class="login-help">
    <a href="index.html#signup">Register</a> • <a href="#">Forgot Password</a>
  </div>
</div>

      <!--footer begins-->
      <?php require_once($_SERVER["DOCUMENT_ROOT"].'/MeetYourInvestor/layout/mainFooter.php');?>
      <!--footer ends-->

      <script src="../js/ourjs.js"></script>
</body>

</html>