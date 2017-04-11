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
  <?php require_once($_SERVER["DOCUMENT_ROOT"].'/MeetYourInvestor/layout/InvestorStartupHeader.php');?>
  <!--header ends-->

  <!--CONTAINER-->
  <div class="container-fluid">

    <!--row-->
    <div class="row">
      
      <!-- left side bar column-->
      <div class="col-md-2" id="lefSidebar">
        <ul id="lefSidebar-list" class="nav ">
          <li><a href="investors.php">Back to Investors</a></li><br>
        </ul>
      </div>

      <!--middle bar-->
      <div class="col-md-8" id="middle">
        <h2 style="text-align: center;  font-family:'Roboto'; ">My Favourite Investors</h2>
        <hr>

        <div id="cardrow">
          <!--card-->

          <a href="investorProfile.html">
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
                  <td>Alieu</td>
                </tr>
                <tr>
                  <td  class="tdtitle">Nationality: </td>
                  <td>Gambian</td>
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
                  <td>B.B. Wanjala</td>
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

          <!--card-->
          <div id="card2">

            <div id="investorInfo">
              <table>
                <tr>
                  <td  class="tdtitle">Name: </td>
                  <td>Gikonyo Wandawa</td>
                </tr>
                <tr>
                  <td  class="tdtitle">Nationality: </td>
                  <td>Tanzanian</td>
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
                  <td>Omondi Oiro</td>
                </tr>
                <tr>
                  <td  class="tdtitle">Nationality: </td>
                  <td>Kenyan</td>
                </tr>
                <tr>
                  <td  class="tdtitle">Interest: </td>
                  <td>Automotive Industry</td>
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
                <td>Adu Darkwa</td>
              </tr>
              <tr>
                <td  class="tdtitle">Nationality: </td>
                <td>Ghanaian</td>
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