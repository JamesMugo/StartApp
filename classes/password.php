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
			$to = $email;
			$subject = "Pass Reset";
			$txt = "Before link<a href=\"https:\/\/www.meetyourinvestor.000webhostapp.com/resetPass.php\/\">Click here to reset your password</a> After link ";

			$headers[] = "From: meetyourinvestor@gmail.com";
			$headers[] = "CC: jamohmugo@gmail.com";
			$headers[] = 'MIME-Version: 1.0';
			$headers[] = 'Content-type: text/html; charset=iso-8857-1';

			if(mail($to,$subject,$txt,implode("\r\n", $headers))){

				echo "email sent successfully";
			}
			else{
				echo "message not sent";
			}    			
		}else{
			//return an error
			echo "Email Address doesn't exist";
			return false;
		}
	}
}

//$forPass = new forgotPassword;
//var_dump($forPass -> oldPassword('jamohmugo@gmail.com'));

?>