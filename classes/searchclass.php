<?php 
/**
* 
*/

require_once('../database/databaseConnectionClass.php');
class SearchClass extends Dbconnection
{
	
	function __construct()
	{
	}

	function searchInvester($name, $nation, $interest)
	{	global $res;
		global $role;
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
		//Admin searches for all
		elseif($_SESSION['roleId']==1)
		{ 
			// $role=3||2;
		}
		
		//Get connection and query database
		$this->getConnection();
		//search by only country
		if(empty($name) && !empty($nation) && $interest='placeholder')
		{
		$res=$this->safequery("SELECT * FROM `user` WHERE `role_Id`=$role AND `country` LIKE '%%%s%%'",$nation);
		}
		// search by only name
		elseif (!empty($name) && empty($nation)  && $interest='placeholder') {
			$res=$this->safequery("SELECT * FROM `user` WHERE (`role_Id`=$role) AND (`firstName` OR `lastName` LIKE '%%%s%%')",$name);
		}
		//search by name and nation
		elseif (!empty($name) && !empty($nation)  && $interest='placeholder') {
			$res=$this->safequery("SELECT * FROM `user` WHERE (`role_Id`=$role) AND ((`firstName` OR `lastName` LIKE '%%%s%%') OR (`country` LIKE '%%%s%%'))",$name,$nation);
		}
		//search by only interest
		elseif(empty($name) && empty($nation) && $interest!='placeholder')
		 $res=$this->safequery("SELECT * FROM `user` WHERE `role_Id`=$role AND `interest_id`='%s'", $interest);
		//search by interest and name
		elseif (!empty($name) && empty($nation) && $interest!='placeholder') {
			$res=$this->safequery("SELECT * FROM `user` WHERE (`role_Id`=$role) AND ((`firstName` OR `lastName` LIKE '%%%s%%') AND (`interest_id`='%s'))", $name, $interest);
		}
		//search by interest and country
		elseif (empty($name) && !empty($nation) && $interest!='placeholder') {
			$res=$this->safequery("SELECT * FROM `user` WHERE (`role_Id`=$role) AND ((`country` LIKE '%%%s%%') AND (`interest_id`='%s'))", $country, $interest);
		}
		//all three: name, interest, country
		elseif (condition) {
			$res=$this->safequery("SELECT * FROM `user` WHERE (`role_Id`=$role) AND ((`firstName` OR `lastName` LIKE '%%%s%%') AND (`country` LIKE '%%%s%%') AND (`interest_id`='%s'))", $name, $country, $interest);
		}

		if($res)
		{
			return $res;
		}
	}

}



 ?>