<?php
/**
* class that executes administrator functionalities
*An admin can add an interest,deactivate a user, 
*view all the users i.e investors and startups
*@author Phyllis Sitati
**/
require_once("../database/databaseConnectionClass.php");
class AdministratorFunctionality extends Dbconnection{
	//Constructor
	function __construct(){}
	/***
	*function that adds an interest
	*/
	function addInterest($interest){
      //An insert query
		$addInterest="INSERT INTO interest(interestName) VALUES('$interest')";					
		$output = $this->queryDatabase($addInterest);
		if($output==true){
			echo "<br>New Interest has been added";
		}
	}
	//Delete Interest
	function deleteInterest($interestId){
		$delete ="DELETE FROM interest WHERE interestId=$interestId";
		$output = $this->queryDatabase($delete);
		if($output==true){
			echo "<br>Interest deleted";
		}

	}
	/***
	*function that deactivates a user 
	*/
	function deactivateUser($user_id){
		//an update query statement
		$deactivateQuery="UPDATE user set userStatus='INACTIVE' WHERE userId=$user_id";
		$result = $this->queryDatabase($deactivateQuery);
		if($result==true){
			return true;
		}
		else{
			return false;
		}
	}
	/***
	*function that deactivates a user 
	*/
	function activateUser($user_id){
		//an update query statement
		$deactivateQuery="UPDATE user set userStatus='ACTIVE' WHERE userId=$user_id";
		$result = $this->queryDatabase($deactivateQuery);
		if($result==true){
			return true;
		}
		else{
			return false;
		}
	}
	/***
	*function that allows administrator 
	*to view all users
	*@return bool
	*/
	function viewAllUsers(){
		
		/*Things to view
		*username, firstName, lastName,profilePicture,role_id*/
		//Query that selects all investors and startups
		$qry ="SELECT * FROM user where userStatus='ACTIVE' AND (role_id = 2 OR role_id=3)";
		
		//Execute query

		$output =$this->queryDatabase($qry);

		if($output==true){
			//$row =$this->getRow();
			//echo $row["username"];
			return $this->getResult();
		}
		else{
			return false;
		}
			
			
		}
		/**
	* Function that displays blocked users
	*/
	function blockeduser()
	{
		$sql="SELECT * FROM user WHERE userStatus='INACTIVE'";
		//creates an instace of a database
		//$database = new Dbconnection;
		$result= $this->queryDatabase($sql);

		if($result)
		{
			return $this->getResult();
		}
		else
		{
			return false;
		}
	}
	}


//$users = new AdministratorFunctionality;
//var_dump($users->viewAllUsers());
//var_dump($users->deactivateUser(14));
//var_dump($users->addInterest("Finance"));
//var_dump($users->deleteInterest(5));
?>