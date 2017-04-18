<?php
session_start();

//verify user user login
function checkUserLogin()
{
		//check for login and permission
	if (isset($_SESSION['userId']) && !empty($_SESSION['userId']))
	{
		//user valid
		//check for user permission
		//header("Location: login/");
	}
	else
	{
		//user not valid
		header("Location: ../login/");
	}
}


//get current page
//get previous page

//ob start for headers
//call layout base on permission
//other functions

?>