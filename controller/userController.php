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










?>