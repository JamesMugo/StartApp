<?php
//includes the datbase class
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/MeetYourInvestor/database/databaseConnectionClass.php');
/**
* 
*/
class favorite
{
	
	//add favorite
	function addFavorite($userid,$favoriteid)
	{
		//sql
		$sql="INSERT INTO favorite(user_id,favoriteId) VALUES ('$userid','$favoriteid');";

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

	//add favorite
	function removeFavorite($favoriteid)
	{
		//sql
		$sql=" DELETE FROM favorite WHERE favoriteId='$favoriteid';";

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


?>