	<?php 
	//call class
	require_once('../classes/searchclass.php');

	// if(isset($_SESSION))
	// {
	// 	//get stored sessions to variable
	// 	$user_id =$_SESSION['user_id'];
	// 	$prof_id = $_SESSION['profile_id'];
	// }

	// global $name=$_POST['term1'];
	// global $nat=$_POST['term2'];
	// global $intst=$_POST['term3'];
	$space="   ";



	function displaySearchResults($name,$nat,$ints)
	{
		global $result;
		$space="   ";
		if(isset($name)||isset($nat)||isset($ints))
		{
			$theSearch= new SearchClass();
			$result=$theSearch->searchInvester(trim($name),trim($nat),trim($ints));
			while($row=mysqli_fetch_assoc($result))
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