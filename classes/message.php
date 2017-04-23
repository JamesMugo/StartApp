
<?php
	//includes the datbase class
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/MeetYourInvestor/database/databaseConnectionClass.php');
	/**
	* 
	*/
	class message
	{
		
	//fucntion that sends an email to a selected user
	function sendMessage($senderEmail,$receiversEmail,$subject,$body)
	{
		$headers[] = "From: ".$senderEmail;
		$headers[] = 'MIME-Version: 1.0';
		$headers[] = 'Content-type: text/html; charset=iso-8857-1';

		if(mail($receiversEmail,$subject,$body,implode("\r\n", $headers)))
		{
			return true;
		}
		else
		{
			return false;
		}     
    }

		//function that lists all messages to the user
		function listMessages($userid)
		{
			$sql="SELECT *FROM message WHERE receiver_id='$userid';";

			//creates an instace of a database
			$database = new Dbconnection;
			$result= $database->queryDatabase($sql);

			if($result)
			{
				return $database->getResult();
			}
			else
			{
				return false;
			}
		}
	}
?>