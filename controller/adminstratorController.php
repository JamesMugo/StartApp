<?php
/**
*controller for the administratorFunctionality class
*@author Phyllis Sitati
*/
require_once("../classes/adminstrator.php");
require_once("userController.php");
require_once("../database/databaseConnectionClass.php");
//require_once("../controller/blockedUsersController.php");

/**A function that displays 
* all users
**/

 	
 function displayAllUsers(){
 	//Instance of the administratorFunctionality class
 	$admin = new AdministratorFunctionality;
 	$output =$admin->viewAllUsers();
 	
 	if($output!=false){
 		//Fetch the users
 		//$result =$dbInstance->getResult(); 
 		//echo $result;
 		while($rows= mysqli_fetch_assoc($output)){
 			      //role
 			$userRow="";
					if($rows['role_id']==2){
                       $userRow="Investor";
                    }
                    else if($rows['role_id']==3){
                       $userRow="StartUp";
                   }
 			
 			if (empty($rows['profilePicture'])/*&& $rows['role_id']==2*/)
				{
					//displaying user with pictures
					//$interest = getInterest($rows['interest_id']);
				displayOneUser1($rows['userId'],$rows['firstName'],$rows['lastName'],$rows['country'],$rows['interest'],$userRow);
			}
				//Displays of users without pictures
				else if(!empty($rows['profilePicture'])/*&& $rows['role_id']==3*/)
				{
					//Getting the interest
					//$interest = getInterest($rows['interest_id']);
					displayOneUser2($rows['userId'],$rows['firstName'],$rows['lastName'],$rows['country'],$rows['interest'],$userRow);
					
				}
 		}
 	}
 }
//displayAllUsers();
 //Function that displays blocked users
function displayBlocked(){
	//Instance of the BlockedUser class
 	$admin = new AdministratorFunctionality;
 	$output =$admin->blockeduser();
 	if($output!=false){
        while($rows=mysqli_fetch_assoc($output)){
          
        	//Role
        	$userRow="";
					if($rows['role_id']==2){
                       $userRow="Investor";
                    }
                    else if($rows['role_id']==3){
                       $userRow="StartUp";
                   }

        	if(empty($rows['profilePicture'])){
        		//displaying user with pictures
					//$interest = getInterest($rows['interest_id']);
        		displayBlocked1($rows['userId'],$rows['firstName'],$rows['lastName'],$rows['country'],$rows['interest'],$userRow);
        	}
        	else if(!empty($rows['profilePicture'])){
        		//displaying user with pictures
					//$interest = getInterest($rows['interest_id']);
        		displayBlocked2($rows['userId'],$rows['firstName'],$rows['lastName'],$rows['country'],$rows['interest'],$userRow);
        	}

        }
 	}
}

 
 /* a function that displays a user with a profile picture*/
 function displayOneUser1($userid,$fname,$lname,$count,$intst,$userHeadr){
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
					 
					 <button name=\"blockUser\" value=\"".$userid."\"  type=\"submit\" class=\"btn btn-primary btn-sm\" id=\"deactivate\">Deactivate User</button>
					 </form>
			</div>";
 }
 /* a function that displays a user without a profile picture*/
 function displayOneUser2($userid,$fname,$lname,$count,$intst,$userHeadr){
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
					 
					 <button name=\"blockUser\" value=\"".$userid."\"  type=\"submit\" class=\"btn btn-primary btn-sm\" id=\"deactivate\">Deactivate User</button>
					 </form>
			</div>";
 }
 //Function displays blocked users with profile pictures
function displayBlocked1($userid,$fname,$lname,$count,$intst,$userHeadr){
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
					 
					 <button name=\"unblockuser\" value=\"".$userid."\"  type=\"submit\" class=\"btn btn-primary btn-sm\" id=\"activate\">Activate User</button>
					 </form>
			</div>";
}
//Function displays blocked users without profile pictures
function displayBlocked2($userid,$fname,$lname,$count,$intst,$userHeadr){
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
					 
					  <button name=\"unblockuser\" value=\"".$userid."\"  type=\"submit\" class=\"btn btn-primary btn-sm\" id=\"activate\">Activate User</button>
					 </form>
					
			</div>";
}
 //A function to get the user Interest
 function getInterest($interest_id){
 	$dbInstance = new Dbconnection;
 	$qry="SELECT interestName From interest WHERE interestId=$interest_id";
 	$result=$dbInstance->queryDatabase($qry);
 	if($result==true){
 		$output=$dbInstance->getRow();
 		//echo $output['interestName'];
 		return $output['interestName'];
 	}

 }
 //Function that deactivates a user
 function deactivateUser($user_id){
 	//Instance of the administratorFunctionality class
 	$mydmin = new AdministratorFunctionality;
 	$mydmin->deactivateUser($user_id);
 }
 //Function that activates a user
 function activateUser($user_id){
 	//Instance of the administratorFunctionality class
 	$mydmin = new AdministratorFunctionality;
 	$mydmin->activateUser($user_id);
 }
 if(isset($_POST["blockUser"])){
 	$id = $_POST['blockUser'];
	deactivateUser($id);
 }
 if(isset($_POST["unblockuser"])){
 	$id = $_POST['unblockuser'];
	activateUser($id);
 }
//var_dump($admin->viewAllUsers());
//var_dump($admin->deactivateUser(16));
//var_dump($admin->addInterest("Industry Development"));
//var_dump($admin->deleteInterest(5));
//getInterest(2);


?>