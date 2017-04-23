<?php
//includes the datbase class
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/MeetYourInvestor/database/databaseConnectionClass.php');

/**
* 
*/
class search
{
	
	//function to return search results
	function getSearchResult($roleid,$interest,$nationality,$name)
	{
		$sql="";

		if ($roleid==2)
		{ 
			//searches for startups by name
		  if (empty($interest) & empty($nationality) & !empty($name)) 
		  {
			//write your query
			$sql="SELECT *FROM user WHERE userStatus='ACTIVE' AND  (firstName Like'%$name%' OR lastName Like'%$name%') AND role_id=3";
		  }
		  //searches for startups by interest
		  elseif (!empty($interest) & empty($nationality) & empty($name))
		  {
		  	//write your query
			$sql="SELECT *FROM user WHERE userStatus='ACTIVE' AND interest Like'%$interest%' AND role_id=3";
		  }
		  //searches for startups by nationality
		  elseif (empty($interest) & !empty($nationality) & empty($name))
		  {
		  	//write your query
			$sql="SELECT *FROM user WHERE userStatus='ACTIVE' AND country Like'%$nationality%' AND role_id=3";
		  }
		   //searches for startups by nationality and name
		  elseif (empty($interest) & !empty($nationality) & !empty($name))
		  {

		  	$sql="SELECT *FROM user WHERE userStatus='ACTIVE' AND country Like'%$nationality%' AND (firstName Like'%$name%' OR lastName Like'%$name%') AND role_id=3";
		  }
		  //searches for startups by interest and name
		  elseif (!empty($interest) & empty($nationality) & !empty($name))
		  {
		  	$sql="SELECT *FROM user WHERE userStatus='ACTIVE' AND interest Like'%$interest%' AND (firstName Like'%$name%' OR lastName Like'%$name%') AND role_id=3";
		  }
		  //searches for startups by interest and name and nationality
		  elseif (!empty($interest) & !empty($nationality) & !empty($name))
		  {
		  	$sql="SELECT *FROM user WHERE userStatus='ACTIVE' AND interest Like'%$interest%' AND (firstName Like'%$name%' OR lastName Like'%$name%') AND country Like'%$nationality%' AND role_id=3";
		  }
		  //searches for startups by interest and nationality
		  elseif(!empty($interest) & !empty($nationality) & empty($name))
		  {
		  	$sql="SELECT *FROM user WHERE userStatus='ACTIVE' AND country Like'%$nationality%' AND interest Like'%$interest%' AND role_id=3";
		  }
			
		}
		elseif ($roleid==3)
		{
			
			//searches for startups by name
		  if (empty($interest) & empty($nationality) & !empty($name)) 
		  {
			//write your query
			$sql="SELECT *FROM user WHERE userStatus='ACTIVE' AND  (firstName Like'%$name%' OR lastName Like'%$name%') AND role_id=2";
		  }
		  //searches for startups by interest
		  elseif (!empty($interest) & empty($nationality) & empty($name))
		  {
		  	//write your query
			$sql="SELECT *FROM user WHERE userStatus='ACTIVE' AND interest Like'%$interest%' AND role_id=2";
		  }
		  //searches for startups by nationality
		  elseif (empty($interest) & !empty($nationality) & empty($name))
		  {
		  	//write your query
			$sql="SELECT *FROM user WHERE userStatus='ACTIVE' AND country Like'%$nationality%' AND role_id=2";
		  }
		   //searches for startups by nationality and name
		  elseif (empty($interest) & !empty($nationality) & !empty($name))
		  {

		  	$sql="SELECT *FROM user WHERE userStatus='ACTIVE' AND country Like'%$nationality%' AND (firstName Like'%$name%' OR lastName Like'%$name%') AND role_id=2";
		  }
		  //searches for startups by interest and name
		  elseif (!empty($interest) & empty($nationality) & !empty($name))
		  {
		  	$sql="SELECT *FROM user WHERE userStatus='ACTIVE' AND interest Like'%$interest%' AND (firstName Like'%$name%' OR lastName Like'%$name%') AND role_id=2";
		  }
		  //searches for startups by interest and name and nationality
		  elseif (!empty($interest) & !empty($nationality) & !empty($name))
		  {
		  	$sql="SELECT *FROM user WHERE userStatus='ACTIVE' AND interest Like'%$interest%' AND (firstName Like'%$name%' OR lastName Like'%$name%') AND country Like'%$nationality%' AND role_id=2";
		  }
		  //searches for startups by interest and nationality
		  elseif(!empty($interest) & !empty($nationality) & empty($name))
		  {
		  	$sql="SELECT *FROM user WHERE userStatus='ACTIVE' AND country Like'%$nationality%' AND interest Like'%$interest%' AND role_id=2";
		  }
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