<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/MeetYourInvestor/classes/search.php');


//list search results
function listSearchResults($roleid,$interest,$nationality,$name)
{
	$search = new search;
	$result = $search->getSearchResult($roleid,$interest,$nationality,$name);
	$space= "  ";
	if($result)
	{
		//gets the number of results
		
		//print results
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
							<td>".$row['interest']."</td>
						</tr>
					</table>
				</div>
					<div id=\"pictb\">
						<td><img src=\"../img/placeholder.png\" class=\"investorimg\"></td>
					</div>
					 <button name=\"viewProfile\" value=\"".$row['userId']."\"  type=\"submit\" class=\"btn btn-primary btn-sm\" id=\"viewProfile\">view profile</button>
					 <button name=\"addFavorite\" value=\"".$row['userId']."\"  type=\"submit\" class=\"btn btn-primary btn-sm\" id=\"addFavorite\">Add To Favorite</button>
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
							<td>".$row['interest']."</td>
						</tr>
					</table>
				</div>
					<div id=\"pictb\">
						<td><img src=\"../controller/getImage.php?id=".$row['userId']."\" class=\"investorimg\">
						</td>
					</div>
					 <button name=\"viewProfile\" value=\"".$row['userId']."\"  type=\"submit\" class=\"btn btn-primary btn-sm\" id=\"viewProfile\">view profile</button>
					 <button name=\"addFavorite\" value=\"".$row['userId']."\"  type=\"submit\" class=\"btn btn-primary btn-sm\" id=\"addFavorite\">Add To Favorite</button>
					 </form>
			</div>";

		}	
	}
  }
}

	
if (isset($_POST['searchButton']))
{
	$interest=$_POST['interest'];
	$name=$_POST['name'];
	$nationality=$_POST['nationality'];

	if(empty($interest) & empty($name) & empty($nationality))
	{
		//do nothing
	}
	else
	{
		listSearchResults($_SESSION['roleId'],$interest,$nationality,$name);
	}
}


?>