<?php
//includes the user class
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/MeetYourInvestor/classes/user.php');

if (isset($_GET['id'])) 

{
	$id= mysql_real_escape_string($_GET['id']);
	$user = new user;

	$result = $user->retrieveProfilePicture($id);

	if ($result == false) 
	{
		//error
	}
	else
	{
		while ( $row = mysqli_fetch_assoc($result)) 
		{
			$imageData = $row['profilePicture'];
		}
		header("content-type: image/jpeg");
		echo $imageData;
	}
}
else
{
	echo "error";
}

?>