<?php
//include database class
require_once($_SERVER["DOCUMENT_ROOT"].'/MeetYourInvestor/database/databaseConnectionClass.php');

/**
* 
*/
class forgotPassword
{
	
	function oldPassword($email)
	{
		//check whether the email exists 
		$sql = "SELECT emailAddress FROM user WHERE emailAddress = '$email'"; 

		//creates an instace of a database
		//$db = new Dbconnection;

		//$result= $db->query($sql);	

		$conn = mysqli_connect("localhost","id1433787_meetyi","myi@2018","id1433787_myi");

		if (!$conn) {
			die("Error ".mysqli_error($conns));
		}
		$result = mysqli_query($conn,$sql);
		if(mysqli_num_rows($result) == 1)
		{
			$subject = "Pass Reset";
			$txt = "To reset your password, <a href=\"https:\/\/www.meetyourinvestor.000webhostapp.com/resetPass.php\/\">Click on this link. </a> Thank you for putting your trust on us"; 

			$headers[] = "From: meetyourinvestor@gmail.com";
			$headers[] = "CC: jamohmugo@gmail.com";
			$headers[] = 'MIME-Version: 1.0';
			$headers[] = 'Content-type: text/html; charset=iso-8859-1';

			if(mail($email,$subject,$txt,implode("\r\n", $headers))){

				return true;
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

	function resetPassword()
	{
		$email = "";
		$pass = "Vero#20";
		$uPass = password_hash($pass, PASSWORD_DEFAULT);

		$sql = "UPDATE user SET password = '$uPass' WHERE emailAddress = 'veronicananjala1@gmail.com'";

		$db = new Dbconnection;

		$result = $db->queryDatabase($sql);

		if(!$result)
		{
			echo "password not updated";
			return false;
		}
		else{
			echo "password updated";
			return true;
		}

	}
}

// $forPass = new forgotPassword;
// var_dump($forPass->resetPassword());

?>