<?php

//includes the user class
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/MeetYourInvestor/classes/user.php');

//function that lists all the users depending who is logged in to the system
function listUsers($roleid)
{
	//create an instance of the user class
	$user = new user;
	$result = $user->queryUsers($roleid);

	if ($result!=false) 
	{
		while ($row = mysqli_fetch_assoc($result)) 
		{
			echo "<div id=\"card1\">
				<div id=\"investorInfo\">
					<table>
						<tr>
							<td  class=\"tdtitle\">Name: </td>
							<td>".$row['firstName']."</td>
						</tr>
						<tr>
							<td  class=\"tdtitle\">Nationality: </td>
							<td>".$row['country']."</td>
						</tr>
						<tr>
						    <td  class=\"tdtitle\">Interest: </td>
							<td>Finance</td>
						</tr>
					</table>
				</div>
					<div id=\"pictb\">
						<td><img src=\"\" id=\"investorimg\"></td>
					</div>
			</div>";
		}
	}
}



//function that lists all the users depending who is logged in to the system
function getProfile($userid)
{
	//create an instance of the user class
	$user = new user;
	$result = $user->loadProfile($userid);

	if ($result!=false) 
	{
		while ($row = mysqli_fetch_assoc($result)) 
		{
			echo "<div class=\"form-group\">
						<label class=\"col-lg-3 control-label\">Username:</label>
						<div class=\"col-lg-8\">
							<input class=\"form-control\" value=\"".$row['username']."\" type=\"text\"
							 name=\"username\" >
						</div>
					</div>
					<div class=\"form-group\">
						<label class=\"col-lg-3 control-label\">First name:</label>
						<div class=\"col-lg-8\">
							<input class=\"form-control\" value=\"".$row['firstName']."\" type=\"text\"
							name=\"firstName\">
						</div>
					</div>
					<div class=\"form-group\">
						<label class=\"col-lg-3 control-label\">Last name:</label>
						<div class=\"col-lg-8\">
							<input class=\"form-control\" value=\"".$row['lastName']."\" type=\"text\"
							name=\"lastName\">
						</div>
					</div>
					<div class=\"form-group\">
						<label class=\"col-lg-3 control-label\">Nationality:</label>
						<div class=\"col-lg-8\">
							<input class=\"form-control\" value=\"".$row['country']."\" type=\"text\"
							name=\"nationality\">
						</div>
					</div>
					<div class=\"form-group\">
						<label class=\"col-lg-3 control-label\">Interested in:</label>
						<div class=\"col-lg-8\">
							<div class=\"ui-select\">
								<select id=\"user_time_zone\" class=\"form-control\">
									<option value=\"Hawaii\">Agriculture</option>
									<option value=\"Hawaii\">Health</option>
								</select>
							</div>
						</div>
					</div>

					<div class=\"form-group\">
						<label class=\"col-md-3 control-label\">Address:</label>
						<div class=\"col-md-8\">
							<input class=\"form-control\" value=\"".$row['address']."\" type=\"text\"
							name=\"address\">
						</div>
					</div>

					<div class=\"form-group\">
						<label class=\"col-md-3 control-label\">Email:</label>
						<div class=\"col-md-8\">
							<input class=\"form-control\" value=\"".$row['emailAddress']."\" type=\"email\"
							name=\"email\">
						</div>
					</div>

					<div class=\"form-group\">
						<label class=\"col-md-3 control-label\">Tel:</label>
						<div class=\"col-md-8\">
							<input class=\"form-control\" value=\"".$row['phoneNumber']."\" type=\"text\"
							name=\"phone\">
						</div>
					</div>

					<div class=\"form-group\">
						<label class=\"col-md-3 control-label\">Bio:</label>
						<div class=\"col-md-8\">
							<textarea class=\"form-control\" name=\"bio\">".$row['bio']."</textarea>
						</div>
					</div>";
		}
	}
}

//checks which button is clicked
if (isset($_POST['saveChanges'])) 
{
	$username=$_POST['username'];
	$phone=$_POST['phone'];
	$nationality=$_POST['nationality'];
	$firstName=$_POST['firstName'];
	$lastName=$_POST['lastName'];
	$email=$_POST['email'];
	$bio=$_POST['bio'];
	$address=$_POST['address'];

	//create an instance of the user class
	$user = new user;
	$user->saveChanges($username,$firstName,$lastName,$nationality,$address,$email,$phone,$bio,$_SESSION['userId']);
}
elseif (isset($_POST['saveImage']))
{
	//checks if a file is selected
	if (empty($_FILES['image']['name'])) 
	{
		//file input is empty
	}
	else
	{
		//image properties
		$name = $_FILES["image"]["name"];
		$size =$_FILES["image"]["size"];
		$type =$_FILES["image"]["type"];
		$error =$_FILES["image"]["error"];
		$tempName =$_FILES["image"]["tmp_name"];

		$image = addslashes(file_get_contents($tempName));
		$imageSize = getimagesize($tempName);

		if ($imageSize==false) 
		{
			//this is not an image
		}
		else
		{
			//insert image in database
			//create an instance of the user class
			$user = new user;
			$user->updateProfilePicture($image,$_SESSION['userId']);
		}
	}

}

?>