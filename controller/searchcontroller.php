	<?php 
	//call class
	require_once('../classes/searchclass.php');
	// session_start();

	// if(isset($_SESSION))
	// {
	// 	//get stored sessions to variable
	// 	$user_id =$_SESSION['user_id'];
	// 	$prof_id = $_SESSION['profile_id'];
	// }

 // if(isset($_GET['term1']) || isset($_GET['term2'])|| ($_GET['term3']!='placeholder'))
	//  {
	//  	global $name,$nat,$intst;
	//  	$name=$_GET['term1'];
	// 	$nat='';
	// 	// $_GET['term2'];
	// 	$intst='';
	// 	// $_GET['term3'];
	// 	displaySearchResults($name,$nat,$intst);
	//  }


	function displaySearchResults($name,$nat,$ints)
	{
		global $result;
		global $usertype;
		global $userRow;
		$myroleid=$_SESSION['roleId'];
		$space="   ";
		if(isset($name)||isset($nat)||isset($ints))
		{
			$theSearch= new SearchClass();
			$result=$theSearch->searchInvester(trim($name),trim($nat),trim($ints));
			while($row=mysqli_fetch_assoc($result))
			{
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
					userWithPic2($row['userId'],$row['firstName'],$row['lastName'],$row['country'],$row['interestName'],$userRow);
				}
				//Displays of users without pictures
				else if(!empty($row['profilePicture']))
				{
					userWithNoPic2($row['userId'],$row['firstName'],$row['lastName'],$row['country'],$row['interestName'],$userRow);
					
				}
			}
			//profile Displays for Admin
			elseif($myroleid==1)
			{
				if (empty($row['profilePicture']))
				{
					//Displays of users with pictures
					userWithNoPicAdmin2($row['userId'],$row['firstName'],$row['lastName'],$row['country'],$row['interestName'],$userRow);
				}
				//Displays of users without pictures
				else if(!empty($row['profilePicture']))
				{
					userWithPicAdmin2($row['userId'],$row['firstName'],$row['lastName'],$row['country'],$row['interestName'],$userRow);
					
					}
				}
			}
		}
	}

function userWithNoPicAdmin2($userid,$fname,$lname,$count,$intst,$userHeadr)
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

function userWithPicAdmin2($userid,$fname,$lname,$count,$intst,$userHeadr)
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

function userWithPic2($userid,$fname,$lname,$count,$intst,$userHeadr)
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

function userWithNoPic2($userid,$fname,$lname,$count,$intst,$userHeadr)
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

function displayFavoriteSearch($name,$nat,$ints)
{
	if(isset($name)||isset($nat)||isset($ints))
		{
			$theSearch= new SearchClass();
			$result=$theSearch->searchFavorite(trim($name),trim($nat),trim($ints));
			while($row=mysqli_fetch_assoc($result))
			{
				//Profile displays for investor or startup
			if($myroleid==2 || $myroleid==3)
			{
				if (empty($row['profilePicture']))
				{
					//Displays of users with pictures
					userWithPic2($row['userId'],$row['firstName'],$row['lastName'],$row['country'],$row['interestName'],$userRow);
				}
				//Displays of users without pictures
				else if(!empty($row['profilePicture']))
				{
					userWithNoPic2($row['userId'],$row['firstName'],$row['lastName'],$row['country'],$row['interestName'],$userRow);
					
				}
			}
			//profile Displays for Admin
			elseif($myroleid==1)
			{
				if (empty($row['profilePicture']))
				{
					//Displays of users with pictures
					userWithPicAdmin2($row['userId'],$row['firstName'],$row['lastName'],$row['country'],$row['interestName'],$userRow);
				}
				//Displays of users without pictures
				else if(!empty($row['profilePicture']))
				{
					userWithNoPicAdmin2($row['userId'],$row['firstName'],$row['lastName'],$row['country'],$row['interestName'],$userRow);
					
					}
				}
			}
		}
}

