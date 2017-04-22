<?php
//includes the user class
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/MeetYourInvestor/classes/user.php');

function viewUserProfile($userid)
{
		//create an instance of the user class
	$user = new user;
	$result = $user->loadProfile($userid);
	$space="   ";
	if ($result!=false) 
	{
		while ($row = mysqli_fetch_assoc($result)) 
		{
			if (empty($row['profilePicture']))
			{
					echo "<div class=\"panel-heading\">
						<h3 class=\"panel-title\">".$row['firstName'].$space.$row['lastName']."</h3>
					</div>
					<div class=\"panel-body\">
					<form action=\"\" method=\"post\">
						<div class=\"row\">
							<div class=\"col-md-3 col-lg-3 \" align=\"center\"> <img src=\"../img/placeholder.png\" 
								class=\"img-circle img-responsive\">
							 </div>

							<div class=\" col-md-9 col-lg-9 \"> 
								<table class=\"table table-user-information\">
									<tbody>
										<tr>
											<td>First Name:</td>
											<td>".$row['firstName']."</td>
										</tr>
										<tr>
											<td>Last Name:</td>
											<td>".$row['lastName']."</td>
										</tr>
										<tr>
											<td>Nationality:</td>
											<td>".$row['country']."</td>
										</tr>

										<tr>
											<tr>
												<td>Interested in </td>
												<td>Entrepreneurship</td>
											</tr>
											<tr>
												<td>Home Address</td>
												<td>".$row['address']."</td>
											</tr>
											<tr>
												<td>Email</td>
												<td>".$row['emailAddress']."</td>
											</tr>
											<tr>
												<td>Phone Number</td>
												<td>".$row['phoneNumber']."</td>
											</tr>
											<tr>
												<td>Bio</td>
												<td><textarea readonly class=\"form-control\">".$row['bio']."</textarea></td>
											</tr>
											</td>   
										</tr>
									</tbody>
								</table>
							</div>

						</div>
						</div>
							<button class=\" btn btn-primary form-control\" name=\"sendMessage\" value=\"".$userid."\">Send Message</button>
						</form>
					</div>";
			}
			else
			{
					echo "<div class=\"panel-heading\">
						<h3 class=\"panel-title\">".$row['firstName'].$space.$row['lastName']."</h3>
					</div>
					<div class=\"panel-body\">
					<form action=\"\" method=\"post\">
						<div class=\"row\">
							<div class=\"col-md-3 col-lg-3 \" align=\"center\"> <img src=\"http://localhost/MeetYourInvestor/controller/getImage.php?id=".$userid."\" 
								class=\"img-circle img-responsive\">
							 </div>

							<div class=\" col-md-9 col-lg-9 \"> 
								<table class=\"table table-user-information\">
									<tbody>
										<tr>
											<td>First Name:</td>
											<td>".$row['firstName']."</td>
										</tr>
										<tr>
											<td>Last Name:</td>
											<td>".$row['lastName']."</td>
										</tr>
										<tr>
											<td>Nationality:</td>
											<td>".$row['country']."</td>
										</tr>

										<tr>
											<tr>
												<td>Interested in </td>
												<td>Entrepreneurship</td>
											</tr>
											<tr>
												<td>Home Address</td>
												<td>".$row['address']."</td>
											</tr>
											<tr>
												<td>Email</td>
												<td>".$row['emailAddress']."</td>
											</tr>
											<tr>
												<td>Phone Number</td>
												<td>".$row['phoneNumber']."</td>
											</tr>
											<tr>
												<td>Bio</td>
												<td><textarea readonly class=\"form-control\">".$row['bio']."</textarea></td>
											</tr>
											</td>   
										</tr>
									</tbody>
								</table>
							</div>

						</div>
							<button class=\" btn btn-primary form-control\" name=\"sendMessage\" value=\"".$userid."\">Send Message</button>
						</form>
				</div>";
		    }	
		}
	}
}

//checks if the sendmessage button is clicked
if (isset($_POST['sendMessage']))
{
	$userid = $_POST['sendMessage'];
	header('location: ../pages/messages.php?id='.$userid);
}
?>