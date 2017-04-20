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
			$role=2;
		}
		//Investors search for only startups
		elseif($_SESSION['roleId']==2)
		{ 
			$role=3;
		}
		
		//Get connection and query database
		$this->getConnection();
		if(empty($name) && !empty($nation))
		{
		$res=$this->safequery("SELECT * FROM `user` WHERE `role_Id`=$role AND `country` LIKE '%%%s%%'",$nation);
		}
		elseif (!empty($name) && empty($nation)) {
			$res=$this->safequery("SELECT * FROM `user` WHERE (`role_Id`=$role) AND (`firstName` OR `lastName` LIKE '%%%s%%')",$name);
		}
		elseif (!empty($name) && !empty($nation)) {
			$res=$this->safequery("SELECT * FROM `user` WHERE (`role_Id`=$role) AND ((`firstName` OR `lastName` LIKE '%%%s%%') OR (`country` LIKE '%%%s%%'))",$name,$nation);
		}
		// $res=$this->safequery("SELECT * FROM `user` WHERE `user`.`role_Id`=2 AND (`user`.`firstName` OR `user`.`lastName` LIKE '%%%s%%') OR `user`.`country` LIKE '%%%s%%'", $name,$nation);

		if($res)
		{
			return $res;
		}
	}
}



 ?>