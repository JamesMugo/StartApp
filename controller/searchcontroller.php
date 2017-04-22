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

				if (empty($row['profilePicture']))
				{
					echo "<div id=\"card1\" class=\"panel panel-primary\">
					<form action=\"\" method=\"get\">
					<div id=\"investorInfo\">
						<table>
							<tr>
								<td style=\"font-size: 150%\">".$userRow."</td>
							</tr>
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
								<td>".$row['interestName']."</td>
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
			else if(!empty($row['profilePicture']))
			{
				echo "<div id=\"card1\" class=\"panel panel-primary\">
				<form action=\"\" method=\"post\">
					<div id=\"investorInfo\">
						<table>
							<tr>
								<td style=\"font-size: 150%\">".$userRow."</td>
							</tr>
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
								<td>".$row['interestName']."</td>
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

 // function displayWithNoPicture()
 {
 	
 }
	 ?>
	    <!-- <script>
		  	function searchFunction() {
		  		//get user input value
		  		var name=document.getElementById("name").value;
		  		var nationality=document.getElementById("nationality").value;
		  		var interest=document.getElementById("interest").value;

	  			var xhttp = new XMLHttpRequest();
	  			xhttp.onreadystatechange = function() {
	    			if (this.readyState == 4 && this.status == 200) {
						document.getElementById("placeholder").innerHTML =this.responseText;
	    			}
	  			};
	  				xhttp.open("GET", 'searchcontroller.php?term='array(name,nationality,interest), true);
	  				xhttp.send();
				}
		</script> -->