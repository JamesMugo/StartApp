<?php
 //define("URL", "http://localhost/MeetYourInvestor")
require_once($_SERVER["DOCUMENT_ROOT"].'/MeetYourInvestor/settings/initialization.php');
?>

<header class="header dark-bg">
            <!--logo start-->
            <a href="<?php echo URL;?>/pages/investors.php" class="logo"><span>MYI</span></a>
            <!--logo end-->

            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                            <?php
                                if (isset($_SESSION['profilePicture']) & empty($_SESSION['profilePicture']))
                                {
                                    echo"<img src=\"../img/placeholder.png\" width=\"40\" height=\"40\">";
                                }
                                else
                                {
                                    echo "<img src=\"http://localhost/MeetYourInvestor/controller/getImage.php?id=". 
                                    $_SESSION['userId']."\" width=\"40\" height=\"40\">";
                                }
                             ?>
                            </span>
                            <span class="username">
                             <?php
                                echo $_SESSION['username'];
                              ?>
                             </span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="<?php echo URL;?>/pages/startupEditProfile.php"><i class="icon_profile"></i> My Profile</a>
                            </li>
                            <li class="eborder-top">
                                <a href="<?php echo URL;?>/pages/settings.php"><i class="icon_profile"></i>settings</a>
                            </li>
                            <li>
                                <a href="<?php echo URL;?>/login/logout.php"><i class="icon_key_alt"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>      
      <!--header end-->