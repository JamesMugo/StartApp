<?php
//include database class
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/MeetYourInvestor/database/databaseConnectionClass.php');

/**
* 
*/
class forgotPassword
{
	
	function oldPassword($email)
	{
		//check whether the email exists 
		$sql = "SELECT password FROM user WHERE emailAddress = '$email'"; 

		//creates an instace of a database
		$db = new Dbconnection;
		$result= $db->queryDatabase($sql);

		if($result)
		{
			//send an email to the user with the old password 
			$this->sendEmail($email);			
		}else{
			//return an error
			echo "Email Address doesn't exist";
			return false;
		}
	}

	function newPassword($newPass)
	{

	}

	function sendEmail($email){
		// the message
		$to = $email;
		$subject = "Pass Reset";
		$txt = "Click here to reset your password";
		$headers = "From: meetyourinvestor@gmail.com" . "\r\n" .
			"CC: jamohmugo@gmail.com";

		if(mail($to,$subject,$txt,$headers)){
			echo "email sent successfully";
		}
		else{
			echo "message not sent";
		}
	}

}

$fPass = new forgotPassword;
var_dump($fPass -> oldPassword('ezekielsebastine@gmail.com'));
?>