
<?php
	//includes the datbase class
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/MeetYourInvestor/database/databaseConnectionClass.php');







	/**
	* 
	*/
	class message
	{
		
		//function that sends message to a user
		function sendMessage($sendersid,$receiversid,$subject,$message)
		{
			$sql="INSERT INTO message(subject,body,sender_id,receiver_id) VALUES('$subject','$message','$sendersid','$receiversid');";

			//creates an instace of a database
			$database = new Dbconnection;
			$result= $database->queryDatabase($sql);

			if($result)
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