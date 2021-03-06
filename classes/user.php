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
			$sql="SELECT *FROM user WHERE userStatus='ACTIVE' AND (role_id=3 OR role_id=2)";
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
		$sql="SELECT username,firstName,lastName,emailAddress,phoneNumber,country,address,bio,profilePicture FROM user WHERE userId ='$userid';";

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
	function saveChanges($username,$fname,$lname,$nationality,$address,$email,$tel,$bio,$id,$interest)
	{
		//sql
		$sql="UPDATE user SET username ='$username',firstName='$fname',lastName='$lname',emailAddress=
		'$email',phoneNumber='$tel',country='$nationality',address='$address',bio='$bio',interest ='$interest' WHERE userId='$id';";

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

	//update profile picture
	function updateProfilePicture($profilePic,$id)
	{
		//sql
		$sql="UPDATE user SET profilePicture ='$profilePic' WHERE userId='$id';";

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

	//update profile picture
	function retrieveProfilePicture($id)
	{
		//sql
		$sql="SELECT profilePicture from user WHERE userId='$id';";

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

	//update profile picture
	function getFavorite($userid)
	{
		//sql
		$sql="SELECT * FROM user WHERE userId IN( SELECT favoriteId FROM favorite WHERE user_id = $userid);";

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

	//change password
	function changePassword($userId,$newpass)
	{
		//sql
		$sql="UPDATE user SET password ='$newpass' WHERE userId='$userId';";

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

	//change password
	function getUserPassword($userId)
	{
		//sql
		$sql="SELECT password FROM user WHERE userId='$userId';";

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

	//change password
	function getUserEmail($userId)
	{
		//sql
		$sql="SELECT emailAddress FROM user WHERE userId='$userId';";

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
function sendEmail($senderEmail,$subject,$body)
{
	$adminEmail= "alieujallow93@gmail.com";
	$headers[] = "From: ".$senderEmail;
	//$headers[] = "CC: jamohmugo@gmail.com";
	$headers[] = 'MIME-Version: 1.0';
	$headers[] = 'Content-type: text/html; charset=iso-8857-1';

	if(mail($adminEmail,$subject,$body,implode("\r\n", $headers)))
	{
		return true;
	}
	else
	{
		return false;
	}     
}
}

/*$user=new user;
var_dump($user->getUserPassword(700000));*/
?>