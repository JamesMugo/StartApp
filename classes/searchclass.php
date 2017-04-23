<?php 
/**
* This class is to create functions that will aid the searhing of users S
*@author Kwabena Adu-Darkwa
*@author Alieu Jallow
*@author James Mugo
*@author Phyllis Sitati
*/

require_once('../database/databaseConnectionClass.php');
// session_start(); 
global $res;
class SearchClass extends Dbconnection
{
	
	function __construct()
	{
	}

	/**
	*This function is used to search for both investors and startups
	*@param $name the name being searched for
	*@param $nation the name being searched for
	*@param $interest the name being searched for
	*@return results from the query
	*/
	function searchInvester($name, $nation, $interest)
	{	
		// global $res;
		$role=0;
		//if the user is either an investor or startup, it returns search
		//results for either of them
		if($_SESSION['roleId']==3 || $_SESSION['roleId']==2)
		{
			//Startups search for only investor
			if($_SESSION['roleId']==3)
			{
				$role='2';
			}
			//Investors search for only startups
			elseif($_SESSION['roleId']==2)
			{ 
				$role='3';
			}
			return $this->searchEitherRoles($name, $nation, $interest, $role);
		}
		//if it is an admin then it queries all users in the database
		elseif($_SESSION['roleId']==1)
			{ 
				return $this->searchAllRoles($name, $nation, $interest, $role);
			}
	}

/**
*This function is used to search favorites in the database
*@param $name the name being searched for
*@param $nation the name being searched for
*@param $interest the name being searched for
*@return results from the query
*/
function searchFavorite($name,$nation,$interest)
{
	// global $res;
		$role=0;
		//if the user is either an investor or startup, it returns search
		//results for either of them
		if($_SESSION['roleId']==3 || $_SESSION['roleId']==2)
		{
			//Startups search for only investor
			if($_SESSION['roleId']==3)
			{
				$role='2';
			}
			//Investors search for only startups
			elseif($_SESSION['roleId']==2)
			{ 
				$role='3';
			}
			return $this->searchfavoritesEither($name,$nation,$interest,$role,$_SESSION['userId']);
		}
		//if it is an admin then it queries all users in the database
		elseif($_SESSION['roleId']==1)
			{ 
				return $this->searchAllRoles($name, $nation, $interest, $role);
			}
}
	

	/**
	*This function is used to search either investors or startups
	*@param $name the name being searched for
	*@param $nation the name being searched for
	*@param $interest the name being searched for
	*@param $role of the user searching
	*@return results from the query
	*/
	function searchEitherRoles($name, $nation, $interest, $role)
	{
			//Get connection and query database
		$this->getConnection();
		//search by only country
		if(empty($name) && !empty($nation) && empty($interest))
		{
		$res=$this->safequery("SELECT `userId`, `role_id`, `interest`,`firstName`, `lastName`, `country`, `profilePicture` FROM `user` WHERE AND (userStatus='ACTIVE') AND (`role_Id`=$role) AND (`country` LIKE '%%%s%%')",$nation);
		}
		// search by only name
		elseif (!empty($name) && empty($nation)  && empty($interest)) {
			$res=$this->safequery("SELECT `userId`,`interest`, `role_id`, `firstName`, `lastName`, `country`, `profilePicture` FROM `user` WHERE (userStatus='ACTIVE') AND (`role_Id`=$role) AND ((`firstName` LIKE '%%%s%%') OR (`lastName` LIKE '%%%s%%'))",$name,$name);
		}
		//search by name and nation
		elseif (!empty($name) && !empty($nation)  && empty($interest)) {
			$res=$this->safequery("SELECT `userId`, `interest`,`role_id`, `firstName`, `lastName`, `country`, `profilePicture` FROM `user` WHERE (userStatus='ACTIVE') AND (`role_Id`=$role) AND (((`firstName` LIKE '%%%s%%') OR (`lastName` LIKE '%%%s%%')) OR (`country` LIKE '%%%s%%'))",$name,$name,$nation);
		}
		//search by only interest
		elseif(empty($name) && empty($nation) && !empty($interest))
		 $res=$this->safequery("SELECT `userId`, `role_id`, `firstName`, `lastName`, `country`, `profilePicture`,`interest` FROM `user` WHERE (userStatus='ACTIVE') AND `role_Id`=$role AND `interest`='%s'", $interest);

		//search by interest and name
		elseif (!empty($name) && empty($nation) && !empty($interest)) {
			$res=$this->safequery("SELECT `userId`, `role_id`, `interest`, `firstName`, `lastName`, `country`, `profilePicture` FROM `user` WHERE (userStatus='ACTIVE') AND (`role_Id`=$role) AND (((`firstName` LIKE '%%%s%%') OR (`lastName` LIKE '%%%s%%')) AND (`interest`='%s'))", $name,$name,$interest);
		}
		//search by interest and country
		elseif (empty($name) && !empty($nation) && !empty($interest)) {
			$res=$this->safequery("SELECT `userId`,`interest`, `firstName`, `lastName`, `country`, `profilePicture` FROM `user` WHERE  (userStatus='ACTIVE') AND  (`role_Id`=$role) AND ((`country` LIKE '%%%s%%') AND (`interest`='%s'))", $country, $interest);
		}
		//all three: name, interest, country
		elseif (!empty($name) && !empty($nation) && !empty($interest)) {
			$res=$this->safequery("SELECT `userId`, `firstName`, `lastName`, `country`, `profilePicture`,`interest` FROM `user` WHERE (userStatus='ACTIVE') AND  (`role_Id`=$role) AND (((`firstName` LIKE '%%%s%%') OR `(lastName` LIKE '%%%s%%')) AND (`country` LIKE '%%%s%%') AND (`interest`='%s'))", $name,$name,$country, $interest);
		}
		// return the results of the query
		if($res)
		{
			return $res;
		}
	}

	/**
	*This function is used to search both investors and startups at the same time 
	*@param $name the name being searched for
	*@param $nation the name being searched for
	*@param $interest the name being searched for
	*@param $role of the user searching
	*@return results from the query
	*/
	function searchAllRoles($name, $nation, $interest)
	{
			//Get connection and query database
		$this->getConnection();
		//search by only country
		if(empty($name) && !empty($nation) && $interest='placeholder')
		{
		$res=$this->safequery("SELECT `userId`,`userStatus`,`role_id`, `firstName`, `lastName`, `country`, `profilePicture`,`interest` FROM `user` WHERE (userStatus='ACTIVE') AND (`country` LIKE '%%%s%%')",$nation);
		}
		// search by only name
		elseif (!empty($name) && empty($nation)  && $interest='placeholder') {
			$res=$this->safequery("SELECT `userId`,`userStatus`,`role_id`, `firstName`, `lastName`, `country`, `profilePicture`,`interest` FROM `user`WHERE (userStatus='ACTIVE') AND ((`firstName` LIKE '%%%s%%') OR (`lastName` LIKE '%%%s%%'))",$name,$name);
		}
		//search by name and nation
		elseif (!empty($name) && !empty($nation)  && $interest='placeholder') {
			$res=$this->safequery("SELECT `userId`, `userStatus`,`role_id`,`firstName`, `lastName`, `country`, `profilePicture`,`interest` FROM `user` WHERE (userStatus='ACTIVE') AND (((`firstName` LIKE '%%%s%%') OR (`lastName` LIKE '%%%s%%')) OR (`country` LIKE '%%%s%%'))",$name,$name,$nation);
		}
		//search by only interest
		elseif(empty($name) && empty($nation) && $interest!='placeholder')
		 $res=$this->safequery("SELECT `userId`,`userStatus`,`role_id`, `firstName`, `lastName`, `country`, `profilePicture`,`interest` FROM `user` WHERE (userStatus='ACTIVE') AND (`interest_id`='%s')", $interest);
		
		//search by interest and name
		elseif (!empty($name) && empty($nation) && $interest!='placeholder') {
			$res=$this->safequery("SELECT `userId`,`userStatus`,`role_id`, `firstName`, `lastName`, `country`, `profilePicture`,`interest` FROM `user` WHERE (userStatus='ACTIVE') AND (((`firstName` LIKE '%%%s%%') OR (`lastName` LIKE '%%%s%%')) AND (`interest`='%s'))", $name,$name,$interest);
		}
		//search by interest and country
		elseif (empty($name) && !empty($nation) && $interest!='placeholder') {
			$res=$this->safequery("SELECT `userId`,`userStatus`,`role_id`, `firstName`, `lastName`, `country`, `profilePicture`,`interest` FROM `user` WHERE (userStatus='ACTIVE') AND ((`country` LIKE '%%%s%%') AND (`interest`='%s'))", $country, $interest);
		}
		//all three: name, interest, country
		elseif (!empty($name) && !empty($nation) && $interest!='placeholder') {
			$res=$this->safequery("SELECT `userId`,`userStatus`,`role_id`, `firstName`, `lastName`, `country`, `profilePicture`,`interest` FROM `user` WHERE (userStatus='ACTIVE') AND (((`firstName` LIKE '%%%s%%') OR `(lastName` LIKE '%%%s%%')) AND (`country` LIKE '%%%s%%') AND (`interest`='%s'))", $name,$name,$country, $interest);
		}
		// return the results of the query
		if($res)
		{
			return $res;
		}
	}


	/**
	*This function is used to search for favorites, either startup or investor at a go
	*@param $name the name being searched for
	*@param $nation the name being searched for
	*@param $interest the name being searched for
	*@param $role of the user searching
	*@return results from the query
	*/
function searchfavoritesEither($name, $nation, $interest,$role,$myuserid)
	{
		global $favList;
		echo $favList;
		//splits the array
		$favIds=implode(",", $favList); 
		//Get connection and query database
		$this->getConnection();
		//search by only country
		if(empty($name) && !empty($nation) && empty($interest))
		{
		$res=$this->safequery("SELECT `userId`, `role_id`, `firstName`, `lastName`, `country`, `profilePicture`,`interest` FROM `user`,`interest` WHERE (`interest`.`interestId` = `user`.`interest_id`) AND (userStatus='ACTIVE') AND (`role_Id`=$role) AND (`country` LIKE '%%%s%%') AND (`user`.`userId` IN '%s')",$nation,$favIds);
		}
		// search by only name
		elseif (!empty($name) && empty($nation)  && empty($interest)) {
			$res=$this->safequery("SELECT `userId`, `role_id`, `firstName`, `lastName`, `country`, `profilePicture`,`interestName` FROM `user`,`interest` WHERE (`interest`.`interestId` = `user`.`interest_id`) AND (userStatus='ACTIVE') AND (`role_Id`=$role) AND ((`firstName` LIKE '%%%s%%') OR (`lastName` LIKE '%%%s%%')) AND ( `user`.`userId` IN '%s')",$name,$name,$favIds);
		}
		//search by name and nation
		elseif (!empty($name) && !empty($nation)  && empty($interest)) {
			$res=$this->safequery("SELECT `userId`, `role_id`, `firstName`, `lastName`, `country`, `profilePicture`,`interestName` FROM `user`,`interest` WHERE (`interest`.`interestId` = `user`.`interest_id`) AND (userStatus='ACTIVE') AND (`role_Id`=$role) AND (((`firstName` LIKE '%%%s%%') OR (`lastName` LIKE '%%%s%%')) OR (`country` LIKE '%%%s%%')) AND ( `user`.`userId` IN '%s')",$name,$name,$nation,$favIds);
		}
		//search by only interest
		elseif(empty($name) && empty($nation) && !empty($interest))
		 $res=$this->safequery("SELECT `userId`, `role_id`, `firstName`, `lastName`, `country`, `profilePicture`,`interestName` FROM `user`,`interest` WHERE (`interest`.`interestId` = `user`.`interest_id`) AND (userStatus='ACTIVE') AND (`role_Id`=$role) AND (`interest_id`='%s') AND ( `user`.`userId` IN '%s')", $interest,$favIds);

		//search by interest and name
		elseif (!empty($name) && empty($nation) && !empty($interest)) {
			$res=$this->safequery("SELECT `userId`, `role_id`,  `firstName`, `lastName`, `country`, `profilePicture`,`interestName` FROM `user` WHERE (userStatus='ACTIVE') AND (`role_Id`=$role) AND (((`firstName` LIKE '%%%s%%') OR (`lastName` LIKE '%%%s%%')) AND (`interest`='%s'))", $name,$name,$interest,$favIds);
		}
		//search by interest and country
		elseif (empty($name) && !empty($nation) && !empty($interest)) {
			$res=$this->safequery("SELECT `userId`, `firstName`, `lastName`, `country`, `profilePicture`,`interestName` FROM `user`,`interest` WHERE (`interest`.`interestId` = `user`.`interest_id`) AND (userStatus='ACTIVE') AND  (`role_Id`=$role) AND ((`country` LIKE '%%%s%%') AND (`interest_id`='%s')) AND ( `user`.`userId` IN '%s')", $country, $interest,$favIds);
		}
		//all three: name, interest, country
		elseif (!empty($name) && !empty($nation) && !empty($interest)) {
			$res=$this->safequery("SELECT `userId`, `firstName`, `lastName`, `country`, `profilePicture`,`interestName` FROM `user`,`interest` WHERE (`interest`.`interestId` = `user`.`interest_id`) AND (userStatus='ACTIVE') AND  (`role_Id`=$role) AND (((`firstName` LIKE '%%%s%%') OR `(lastName` LIKE '%%%s%%')) AND (`country` LIKE '%%%s%%') AND (`interest_id`='%s')) AND (`user`.`userId` IN '%s')", $name,$name,$country, $interest,$favIds);
		}
		// return the results of the query
		if($res)
		{
			return $res;
		}
	}

}



 ?>