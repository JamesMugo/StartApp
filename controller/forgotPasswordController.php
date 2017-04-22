<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/MeetYourInvestor/classes/password.php');

if (isset($_POST['sendEmail'])) {
	
	$emailId = $_POST['email'];
	oldPassword($_SESSION['email']);

}

//reset password 
function oldPassword($email){

	$forPass = new forgotPassword;
	$result = $forPass->oldPassword($email);
	//var_dump($fPass -> oldPassword($_POST['email']));
}

?>