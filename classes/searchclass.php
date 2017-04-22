<?php 
/**
* 
*/

require_once('../database/databaseConnectionClass.php');
session_start();
class SearchClass extends Dbconnection
{
	
	function __construct()
	{
	}

	function searchInvester($name, $nation, $interest)
	{	global $res;
		global $role;
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

	function searchEitherRoles($name, $nation, $interest, $role)
	{
			//Get connection and query database
		$this->getConnection();
		//search by only country
		if(empty($name) && !empty($nation) && $interest='placeholder')
		{
		$res=$this->safequery("SELECT `userId`, `firstName`, `lastName`, `country`, `profilePicture`,`interestName` FROM `user`,`interest` WHERE  (`interest`.`interestId` = `user`.`interest_id`) AND (userStatus='ACTIVE') AND (`role_Id`=$role) AND (`country` LIKE '%%%s%%')",$nation);
		}
		// search by only name
		elseif (!empty($name) && empty($nation)  && $interest='placeholder') {
			$res=$this->safequery("SELECT `userId`, `firstName`, `lastName`, `country`, `profilePicture`,`interestName` FROM `user`,`interest` WHERE (`interest`.`interestId` = `user`.`interest_id`) AND (userStatus='ACTIVE') AND (`role_Id`=$role) AND ((`firstName` LIKE '%%%s%%') OR (`lastName` LIKE '%%%s%%'))",$name,$name);
		}
		//search by name and nation
		elseif (!empty($name) && !empty($nation)  && $interest='placeholder') {
			$res=$this->safequery("SELECT `userId`, `firstName`, `lastName`, `country`, `profilePicture`,`interestName` FROM `user`,`interest` WHERE (`interest`.`interestId` = `user`.`interest_id`) AND (userStatus='ACTIVE') AND (`role_Id`=$role) AND (((`firstName` LIKE '%%%s%%') OR (`lastName` LIKE '%%%s%%')) OR (`country` LIKE '%%%s%%'))",$name,$name,$nation);
		}
		//search by only interest
		elseif(empty($name) && empty($nation) && $interest!='placeholder')
		 $res=$this->safequery("SELECT `userId`, `firstName`, `lastName`, `country`, `profilePicture`,`interestName` FROM `user`,`interest` WHERE (`interest`.`interestId` = `user`.`interest_id`) AND (userStatus='ACTIVE') AND `role_Id`=$role AND `interest_id`='%s'", $interest);
		//search by interest and name
		elseif (!empty($name) && empty($nation) && $interest!='placeholder') {
			$res=$this->safequery("SELECT `userId`, `firstName`, `lastName`, `country`, `profilePicture`,`interestName` FROM `user`,`interest` WHERE (`interest`.`interestId` = `user`.`interest_id`) AND (userStatus='ACTIVE') AND (`role_Id`=$role) AND (((`firstName` LIKE '%%%s%%') OR (`lastName` LIKE '%%%s%%')) AND (`interest_id`='%s'))", $name,$name,$interest);
		}
		//search by interest and country
		elseif (empty($name) && !empty($nation) && $interest!='placeholder') {
			$res=$this->safequery("SELECT `userId`, `firstName`, `lastName`, `country`, `profilePicture`,`interestName` FROM `user`,`interest` WHERE (`interest`.`interestId` = `user`.`interest_id`) AND (userStatus='ACTIVE') AND  (`role_Id`=$role) AND ((`country` LIKE '%%%s%%') AND (`interest_id`='%s'))", $country, $interest);
		}
		//all three: name, interest, country
		elseif (condition) {
			$res=$this->safequery("SELECT `userId`, `firstName`, `lastName`, `country`, `profilePicture`,`interestName` FROM `user`,`interest` WHERE (`interest`.`interestId` = `user`.`interest_id`) AND (userStatus='ACTIVE') AND  (`role_Id`=$role) AND (((`firstName` LIKE '%%%s%%') OR `(lastName` LIKE '%%%s%%')) AND (`country` LIKE '%%%s%%') AND (`interest_id`='%s'))", $name,$name,$country, $interest);
		}
		// return the results of the query
		if($res)
		{
			return $res;
		}
	}

	function searchAllRoles($name, $nation, $interest)
	{
			//Get connection and query database
		$this->getConnection();
		//search by only country
		if(empty($name) && !empty($nation) && $interest='placeholder')
		{
		$res=$this->safequery("SELECT `userId`, `firstName`, `lastName`, `country`, `profilePicture`,`interestName` FROM `user`,`interest` WHERE  (`interest`.`interestId` = `user`.`interest_id`) AND (userStatus='ACTIVE') AND (`country` LIKE '%%%s%%')",$nation);
		}
		// search by only name
		elseif (!empty($name) && empty($nation)  && $interest='placeholder') {
			$res=$this->safequery("SELECT `userId`, `firstName`, `lastName`, `country`, `profilePicture`,`interestName` FROM `user`,`interest` WHERE (`interest`.`interestId` = `user`.`interest_id`) AND (userStatus='ACTIVE') AND ((`firstName` LIKE '%%%s%%') OR (`lastName` LIKE '%%%s%%'))",$name,$name);
		}
		//search by name and nation
		elseif (!empty($name) && !empty($nation)  && $interest='placeholder') {
			$res=$this->safequery("SELECT `userId`, `firstName`, `lastName`, `country`, `profilePicture`,`interestName` FROM `user`,`interest` WHERE (`interest`.`interestId` = `user`.`interest_id`) AND (userStatus='ACTIVE') AND (((`firstName` LIKE '%%%s%%') OR (`lastName` LIKE '%%%s%%')) OR (`country` LIKE '%%%s%%'))",$name,$name,$nation);
		}
		//search by only interest
		elseif(empty($name) && empty($nation) && $interest!='placeholder')
		 $res=$this->safequery("SELECT `userId`, `firstName`, `lastName`, `country`, `profilePicture`,`interestName` FROM `user`,`interest` WHERE (`interest`.`interestId` = `user`.`interest_id`) AND (userStatus='ACTIVE') AND (`interest_id`='%s')", $interest);
		//search by interest and name
		elseif (!empty($name) && empty($nation) && $interest!='placeholder') {
			$res=$this->safequery("SELECT `userId`, `firstName`, `lastName`, `country`, `profilePicture`,`interestName` FROM `user`,`interest` WHERE (`interest`.`interestId` = `user`.`interest_id`) AND (userStatus='ACTIVE') AND (((`firstName` LIKE '%%%s%%') OR (`lastName` LIKE '%%%s%%')) AND (`interest_id`='%s'))", $name,$name,$interest);
		}
		//search by interest and country
		elseif (empty($name) && !empty($nation) && $interest!='placeholder') {
			$res=$this->safequery("SELECT `userId`, `firstName`, `lastName`, `country`, `profilePicture`,`interestName` FROM `user`,`interest` WHERE (`interest`.`interestId` = `user`.`interest_id`) AND (userStatus='ACTIVE') AND ((`country` LIKE '%%%s%%') AND (`interest_id`='%s'))", $country, $interest);
		}
		//all three: name, interest, country
		elseif (condition) {
			$res=$this->safequery("SELECT `userId`, `firstName`, `lastName`, `country`, `profilePicture`,`interestName` FROM `user`,`interest` WHERE (`interest`.`interestId` = `user`.`interest_id`) AND (userStatus='ACTIVE') AND (((`firstName` LIKE '%%%s%%') OR `(lastName` LIKE '%%%s%%')) AND (`country` LIKE '%%%s%%') AND (`interest_id`='%s'))", $name,$name,$country, $interest);
		}
		// return the results of the query
		if($res)
		{
			return $res;
		}
	}

}



 ?>