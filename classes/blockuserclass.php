<?php 

function blockuser($userid)
	{
		$sql="UPDATE user SET userStatus='INACTIVE' WHERE userId= $userid";
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

// function listBlockedUser($userid)
// {
	
// }

 ?>