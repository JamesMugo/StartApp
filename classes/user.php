<?php
//includes the datbase class
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/MeetYourInvestor/database/databaseConnectionClass.php');









/**
* 
*/
class user 
{
	//function that querys for users in the database
	function queryUsers($roleid)
	{
		//for admin
		if ($roleid==1) 
		{
			$sql="SELECT *FROM user WHERE userStatus='ACTIVE' AND role_id=3";
		}
		//for investor
		elseif ($roleid==2)
		{
			$sql="SELECT *FROM user WHERE userStatus='ACTIVE' AND role_id=3";
		}
		//for startup
		elseif ($roleid==3) 
		{
			$sql="SELECT *FROM user WHERE userStatus='ACTIVE' AND role_id=2";
		}

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