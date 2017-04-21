<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/MeetYourInvestor/classes/message.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/MeetYourInvestor/classes/user.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/MeetYourInvestor/settings/validations.php');




//confirmation message.
$confirmationMessage="";

//checks if the send message button is clicked
if (isset($_POST['sendEmailToUser'])) 
{
	$receiversId=$_GET['id'];

	$subjectValidation=validateSubject();
	$messageValidation=validateMessage();

	if ($subjectValidation & $messageValidation)
	{
		//get receivers email
		$receiverEmail=getUserEmail($receiversId);
		//get sender's email
		$senderEmail=getUserEmail($_SESSION['userId']);

		if ($receiverEmail!=false & $senderEmail!=false) 
		{
			if(sendMessage($senderEmail,$receiverEmail,$subject,$message))
			{
				$confirmationMessage="Email Successfully Sent.";
			}
		}
	}
}

//function that sends the message
function sendMessage($senderEmail,$receiversEmail,$subject,$body)
{
	$message= new message;
	if ($message->sendMessage($senderEmail,$receiversEmail,$subject,$body)) 
	{
		return true;
	}
	return false;
}

//function that gets the user email
function getUserEmail($userId)
{
	$user = new user;
	$result = $user->getUserEmail($userId);

	if($result!=false)
	{
		//check if the result is not null and return the email
		if ($result!=null)
		{
			$row = mysqli_fetch_assoc($result);
			return $row['emailAddress'];
		}
	}
	return false;
}
?>