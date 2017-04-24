<?php
/**logout functionality
* @author Phyllis Sitati
**/

//start session
session_start();

//destroy session
session_destroy();


//redirect
header("Location: ../index.php");

?>