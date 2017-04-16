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

	//load user profile
	function loadProfile($userid)
	{
		$sql="SELECT username,firstName,lastName,emailAddress,phoneNumber,country,address,bio FROM user WHERE userId =
		'$userid';";

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

	//edit profile
	function saveChanges($username,$fname,$lname,$nationality,$address,$email,$tel,$bio,$id)
	{
		//sql
		$sql="UPDATE user SET username ='$username',firstName='$fname',lastName='$lname',emailAddress=
		'$email',phoneNumber='$tel',country='$nationality',address='$address',bio='$bio' WHERE userId='$id';";

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
}

//$user = new user;
//$user->saveChanges("arl","alieu","jallow","gambian","serekunsa","alieu.jallow@ashesi.edu.gh","002209954952","hwllow",6);
?>