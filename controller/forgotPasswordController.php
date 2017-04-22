<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/MeetYourInvestor/classes/password.php');

if (isset($_POST['sendEmail'])) {
	
	$emailId = $_POST['email'];
	RPassword($emailId);
	$password = $_POST['password'];
	passReset($password);
}

//reset password 
function RPassword($email){

	$forPass = new forgotPassword;
	$result = $forPass->oldPassword($email);
	if($result){
		echo "email sent successfully";
	}
	else{
		echo "email not sent";
	}
	//var_dump($fPass -> oldPassword($_POST['email']));
}

function passReset($pass){
	$forPass = new forgotPassword;
	$result = $forPass->resetPassword($pass);
    if($result){
    	echo "password reset successful. You can now login using the new password.";
    }
    else{
    	echo "password change failed";
    }

    //var_dump($forPass->resetPassword());
}

?>