<?php
//includes the user class
//require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/MeetYourInvestor/unsecure/unsecureProcessing.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/MeetYourInvestor/classes/user.php');
//require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/MeetYourInvestor/unsecure/unsecureProcessing.php');
$sizeError=$generalError="";

//function that lists all the users depending who is logged in to the system
function listUsers($roleid)
{
	// echo "Role: ".$roleid;
	//create an instance of the user class
	$user = new user;
	$result = $user->queryUsers($roleid);

	global $usertype;
	global $userRow;
	global $myroleid;
	$myroleid=$roleid;
	$space="   ";
	// $userRow='';
	
	
	// $userRow='Admin';
	if ($result!=false) 
	{
		while ($row = mysqli_fetch_assoc($result)) 
		{
		//This is to specify the roles
			if($row['role_id']==1)
			{
				$usertype='Administrator';
			}
			elseif($row['role_id']==2)
			{
				$usertype='Investor';
			}
			elseif($row['role_id']==3)
			{
				$usertype='Startup';
			}

		    if($myroleid==1)
			{
				$userRow=$usertype;
			}
			else{
				$userRow='';
			}

			//Profile displays for investor or startup
			if($myroleid==2 || $myroleid==3)
			{
				if (empty($row['profilePicture']))
				{
					//Displays of users with pictures
					userWithPic($row['userId'],$row['firstName'],$row['lastName'],$row['country'],$row['interestName'],$userRow);
				}
				//Displays of users without pictures
				else if(!empty($row['profilePicture']))
				{
					userWithNoPic($row['userId'],$row['firstName'],$row['lastName'],$row['country'],$row['interestName'],$userRow);
					
				}
			}
			//profile Displays for Admin
			elseif($myroleid==1)
			{
				if (empty($row['profilePicture']))
				{
					//Displays of users with pictures
					userWithPicAdmin($row['userId'],$row['firstName'],$row['lastName'],$row['country'],$row['interestName'],$userRow);
				}
				//Displays of users without pictures
				else if(!empty($row['profilePicture']))
				{
					userWithNoPicAdmin($row['userId'],$row['firstName'],$row['lastName'],$row['country'],$row['interestName'],$userRow);
					
				}
			}
		}
	}
}

function userWithNoPicAdmin($userid,$fname,$lname,$count,$intst,$userHeadr)
{
	$space="   ";
	echo "<div id=\"card1\" class=\"panel panel-primary\">
			<form action=\"\" method=\"post\">
				<div id=\"investorInfo\">
					<table>
						<tr>
							<td style=\"font-size: 150%\">".$userHeadr."</td>
						</tr>
						<tr>
							<td  class=\"tdtitle\">Name: </td>
							<td>".$fname.$space.$lname."</td>
						</tr>
						<tr>
							<td  class=\"tdtitle\">Nationality: </td>         
							<td>".$count."</td>
						</tr>
						<tr>
						    <td  class=\"tdtitle\">Interest: </td>
							<td>".$intst."</td>
						</tr>
					</table>
				</div>
					<div id=\"pictb\">
						<td><img src=\"../controller/getImage.php?id=".$userid."\" class=\"investorimg\">
						</td>
					</div>
					 <button name=\"viewProfile\" value=\"".$userid."\"  type=\"submit\" class=\"btn btn-primary btn-sm\" id=\"viewProfile\">view profile</button>
					 <button name=\"blockUser\" value=\"".$userid."\"  type=\"submit\" class=\"btn btn-primary btn-sm\" id=\"blockUser\">Block User</button>
					 </form>
			</div>";
}

function userWithPicAdmin($userid,$fname,$lname,$count,$intst,$userHeadr)
{
	$space="   ";
	echo "<div id=\"card1\" class=\"panel panel-primary\">
				<form action=\"\" method=\"post\">
				<div id=\"investorInfo\">
					<table>
						<tr>
							<td style=\"font-size: 150%\">".$userHeadr."</td>
						</tr>
						<tr>
							<td  class=\"tdtitle\">Name: </td>
							<td>".$fname.$space.$lname."</td>
						</tr>
						<tr>
							<td  class=\"tdtitle\">Nationality: </td>         
							<td>".$count."</td>
						</tr>
						<tr>
						    <td  class=\"tdtitle\">Interest: </td>
							<td>".$intst."</td>
						</tr>
					</table>
				</div>
					<div id=\"pictb\">
						<td><img src=\"../img/placeholder.png\" class=\"investorimg\"></td>
					</div>
					 <button name=\"viewProfile\" value=\"".$userid."\"  type=\"submit\" class=\"btn btn-primary btn-sm\" id=\"viewProfile\">view profile</button>
					 <button name=\"blockUser\" value=\"".$userid."\"  type=\"submit\" class=\"btn btn-primary btn-sm\" id=\"blockUser\">Block User</button>
					 </form>
			</div>";
}

function userWithPic($userid,$fname,$lname,$count,$intst,$userHeadr)
{
	$space="   ";
	echo "<div id=\"card1\" class=\"panel panel-primary\">
				<form action=\"\" method=\"post\">
				<div id=\"investorInfo\">
					<table>
						<tr>
							<td style=\"font-size: 150%\">".$userHeadr."</td>
						</tr>
						<tr>
							<td  class=\"tdtitle\">Name: </td>
							<td>".$fname.$space.$lname."</td>
						</tr>
						<tr>
							<td  class=\"tdtitle\">Nationality: </td>         
							<td>".$count."</td>
						</tr>
						<tr>
						    <td  class=\"tdtitle\">Interest: </td>
							<td>".$intst."</td>
						</tr>
					</table>
				</div>
					<div id=\"pictb\">
						<td><img src=\"../img/placeholder.png\" class=\"investorimg\"></td>
					</div>
					 <button name=\"viewProfile\" value=\"".$userid."\"  type=\"submit\" class=\"btn btn-primary btn-sm\" id=\"viewProfile\">view profile</button>
					 <button name=\"addFavorite\" value=\"".$userid."\"  type=\"submit\" class=\"btn btn-primary btn-sm\" id=\"addFavorite\">Add To Favorite</button>
					 </form>
			</div>";
}

function userWithNoPic($userid,$fname,$lname,$count,$intst,$userHeadr)
{
	$space="   ";
	echo "<div id=\"card1\" class=\"panel panel-primary\">
			<form action=\"\" method=\"post\">
				<div id=\"investorInfo\">
					<table>
						<tr>
							<td style=\"font-size: 150%\">".$userHeadr."</td>
						</tr>
						<tr>
							<td  class=\"tdtitle\">Name: </td>
							<td>".$fname.$space.$lname."</td>
						</tr>
						<tr>
							<td  class=\"tdtitle\">Nationality: </td>         
							<td>".$count."</td>
						</tr>
						<tr>
						    <td  class=\"tdtitle\">Interest: </td>
							<td>".$intst."</td>
						</tr>
					</table>
				</div>
					<div id=\"pictb\">
						<td><img src=\"../controller/getImage.php?id=".$userid."\" class=\"investorimg\">
						</td>
					</div>
					 <button name=\"viewProfile\" value=\"".$userid."\"  type=\"submit\" class=\"btn btn-primary btn-sm\" id=\"viewProfile\">view profile</button>
					 <button name=\"addFavorite\" value=\"".$userid."\"  type=\"submit\" class=\"btn btn-primary btn-sm\" id=\"addFavorite\">Add To Favorite</button>
					 </form>
			</div>";
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
	//$email=$_POST['email'];
	$bio=$_POST['bio'];
	$address=$_POST['address'];

	//validateEmail();

	//create an instance of the user class
	$user = new user;
	$user->saveChanges($username,$firstName,$lastName,$nationality,$address,$email,$phone,$bio,$_SESSION['userId']);
}
elseif (isset($_POST['saveImage']))
{
	//checks if a file is selected
	if (empty($_FILES['image']['name'])) 
	{
		$generalError="please select an Image";
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
			$generalError="This is not an image";
		}
		else
		{
			$count=0;
			//check if the image meets the size of 1000 kb
			if ($size>1000000) 
			{
				$sizeError="sorry,your file is too large";
			}
			else
			{
				$count++;
			}

			//cheks if the file is meets the standard 
			if($type != "image/jpg" && $type != "image/png" && $type != "image/jpeg"&& $type != "image/gif" )
		    {
		    	$generalError="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			}
			else
			{
				$count++;
			}

			//checks if the picture meets all the requirements
			if ($count==2)
		    {
				//create an instance of the user class
				$user = new user;

				//insert image in database
				$user->updateProfilePicture($image,$_SESSION['userId']);

				//destroys the session
				unset($_SESSION['profilePicture']);
			}
		}
	}
}
elseif (isset($_POST['viewProfile'])) 
{
	$userId = $_POST['viewProfile'];

	header("Location: investorProfile.php?id=".$userId);
}


function listFavorites($userid)
{
	//create an instance of the user class
	$user = new user;
	$result = $user->getFavorite($userid);
	$space="   ";
	if ($result!=false) 
	{
		while ($row = mysqli_fetch_assoc($result)) 
		{
			if (empty($row['profilePicture']))
			{
				echo "<div id=\"card1\" class=\"panel panel-primary\">
				<form action=\"\" method=\"post\">
				<div id=\"investorInfo\">
					<table>
						<tr>
							<td  class=\"tdtitle\">Name: </td>
							<td>".$row['firstName'].$space.$row['lastName']."</td>
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
						<td><img src=\"../img/placeholder.png\" class=\"investorimg\"></td>
					</div>
					 <button name=\"viewProfile\" value=\"".$row['userId']."\"  type=\"submit\" class=\"btn btn-primary btn-sm\" id=\"viewProfile\">view profile</button>
					 <button name=\"removeFavorite\" value=\"".$row['userId']."\"  type=\"submit\" class=\"btn btn-primary btn-sm\" id=\"addFavorite\">Remove From Favorite</button>
					 </form>
			</div>";
		}
		else
		{
			echo "<div id=\"card1\" class=\"panel panel-primary\">
			<form action=\"\" method=\"post\">
				<div id=\"investorInfo\">
					<table>
						<tr>
							<td  class=\"tdtitle\">Name: </td>
							<td>".$row['firstName'].$space.$row['lastName']."</td>
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
						<td><img src=\"../controller/getImage.php?id=".$row['userId']."\" class=\"investorimg\">
						</td>
					</div>
					 <button name=\"viewProfile\" value=\"".$row['userId']."\"  type=\"submit\" class=\"btn btn-primary btn-sm\" id=\"viewProfile\">view profile</button>
					 <button name=\"removeFavorite\" value=\"".$row['userId']."\"  type=\"submit\" class=\"btn btn-primary btn-sm\" id=\"addFavorite\">Remove From Favorite</button>
					 </form>
			</div>";

		}	
	}
  }
}

// var_dump(getUserPassword(8));
?>