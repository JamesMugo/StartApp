<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Startups</title>

  <!-- Custom styles -->
    <link href="../css/css/style.css" rel="stylesheet">

  <!--css links begins-->
    <?php require_once($_SERVER["DOCUMENT_ROOT"].'/MeetYourInvestor/layout/cssLinks.php');?>
    <!--csslinks ends-->

</head>
<body>

 <!--header begins-->
  <?php
     require_once($_SERVER["DOCUMENT_ROOT"].'/MeetYourInvestor/layout/InvestorStartupHeader.php');
     $user="";
    if($_SESSION['roleId']==2)
    {
      $user="Startups";
    }
    elseif($_SESSION['roleId']==3)
    {
      $user="Investors";
    }
  ?>
  <!--header ends-->

  <!--CONTAINER-->
  <div class="container-fluid">

    <!--row-->
    <div class="row">
      
      <!-- left side bar column-->
      <div class="col-md-2" id="lefSidebar">
        <ul id="lefSidebar-list" class="nav ">
          <li><a href="users.php">Back to <?php echo $user;?></a></li><br>
        </ul>
      </div>

      <!--middle bar-->
      <div class="col-md-8" id="middle">
        <h2 style="text-align: center;  font-family:'Roboto'; ">My Favourite <?php echo $user;?></h2>
        <hr>
          <!--card-->
          <?php
            require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/MeetYourInvestor/controller/userController.php');
            require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/MeetYourInvestor/controller/favoriteController.php');
            listFavorites($_SESSION['userId']);
          ?>
    
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
  <script src="contactform/contactform.js"></script>
</body>
</html>