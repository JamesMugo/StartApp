<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/MeetYourInvestor/classes/user.php');

$password=$passwordColor=$passwordErrorMessage=$passwordMisMach="";
$newPassword=$newPasswordColor=$newPasswordErrorMessage=$passSuccess="";
$confirmPassword=$confirmPasswordColor=$confirmPasswordErrorMessage="";


//email validation variables
$email=$emailColor=$emailErrorMessage="";

//message validation variables
$message=$messageColor=$messageErrorMessage="";

//subject validation variables
$subject=$subjectColor=$subjectErrorMessage="";

//VALIDATING PASSWORD
function validatePass($name)
{
	global $password,$passwordColor,$passwordErrorMessage;
	global $newPassword,$newPasswordColor,$newPasswordErrorMessage;
	global $confirmPassword,$confirmPasswordColor,$confirmPasswordErrorMessage;
	//cheks if the password is set and not empty
	if (isset($_POST[$name]) & !empty($_POST[$name])) 
	{
		$password = $_POST[$name];

		//checks the length of the password
		if (strlen($password)>=6 & strlen($password)<13) 
		{
			//cheks if the password meets the pattern
			$pattern = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/";
			if (preg_match($pattern,$password)) 
			{
				if ($name=="currentPassword" )
				{
					$passwordColor = "green";
				}
				elseif ($name=="newPassword") 
				{
					$newPasswordColor = "green";
				}
				elseif ($name=="confirmPassword")
				{
					$confirmPasswordColor = "green";
				}
				return true;
			}
			else
			{
				if ($name=="currentPassword" )
				{
					$passwordColor = "red";
					$passwordErrorMessage = "*password must have atleast a number, symbol and an uppercase letter";
				}
				elseif ($name=="newPassword") 
				{
					$newPasswordColor = "red";
					$newPasswordErrorMessage = "*password must have atleast a number, symbol and an uppercase letter";
				}
				elseif ($name=="confirmPassword")
				{
					$confirmPasswordColor = "red";
					$confirmPasswordErrorMessage = "*password must have atleast a number, symbol and an uppercase letter";
				}
				return false;
			}

		}
		else
		{
			if ($name=="currentPassword" )
			{
				$passwordColor = "red";
				$passwordErrorMessage = "*password length shoud be between 6 and 12 characters";
			}
			elseif ($name=="newPassword") 
			{
				$newPasswordColor = "red";
				$newPasswordErrorMessage = "*password length shoud be between 6 and 12 characters";
			}
			elseif ($name=="confirmPassword")
			{
				$confirmPasswordColor = "red";
				$confirmPasswordErrorMessage = "*password length shoud be between 6 and 12 characters";
			}
			return false;
		}
	}
	else
	{
		if ($name=="currentPassword" )
		{
			$passwordColor = "red";
			$passwordErrorMessage = "*password must be filled";
		}
		elseif ($name=="newPassword") 
		{
			$newPasswordColor = "red";
			$newPasswordErrorMessage = "*password must be filled";
		}
		elseif ($name=="confirmPassword")
		{
			$confirmPasswordColor = "red";
			$confirmPasswordErrorMessage = "*password must be filled";
		}
		return false;
	}
}

if (isset($_POST['changePasswordButton']))
{
	
	//validate the passwords
	$currentPasswordValidation=validatePass("currentPassword");
	$newPasswordValidation=validatePass("newPassword");
	$confirmPasswordValidation=validatePass("confirmPassword");

	if ($currentPasswordValidation & $newPasswordValidation & $confirmPasswordValidation)
	{
		//grabs the form details
		$currentPassword=$_POST['currentPassword'];
		$newPassword=$_POST['newPassword'];
		$confirmPassword=$_POST['confirmPassword'];

		//checks if the two password are equal
		if ($newPassword==$confirmPassword) 
		{
			//gets the user password
			$userpassword=getUserPassword($_SESSION['userId']);

				//check if the password matches
			if(password_verify($currentPassword, $userpassword))
			{
					//hash the new password
				$newPassword = password_hash($newPassword, PASSWORD_DEFAULT);

					//change the password
				if(changePassword($_SESSION['userId'],$newPassword))
				{
					$passSuccess="password successfully changed";
				}
				else
				{
					$passwordMisMach="error in changing password";
				}
			}		
			else
			{
				$passwordErrorMessage="wrong password";
			}
		}
		else
		{
			$passwordMisMach="*The two passwords are not equal";
		}	
	}
}
elseif (isset($_POST['sendEmail']))
{
	//validates the email
	if(validateEmail())
	{
		//send the email
		
	}
}

//function that helps to change user password
function changePassword($userId,$newpass)
{	$user = new user;
	$result = $user->changePassword($userId,$newpass);
	if ($result)
	{
		return true;
	}
	return false;
}

//function that gets the user password
function getUserPassword($userId)
{
	$user = new user;
	$result = $user->getUserPassword($userId);
	if ($result== false)
	{
		return false;
	}
	else
	{
		//checks if the result is not null
		if ($result!= null)
		{
			//get the password
			$row=mysqli_fetch_assoc($result);
			return $row['password'];
		}
		else
		{
			return null;
		}
	}
}

//VALIDATING EMAIL
function validateEmail()
{
	global $email,$emailColor,$emailErrorMessage;
	
	//checks if the email is set and not empty
	if (isset($_POST['email']) & !empty($_POST['email'])) 
	{
		$email= $_POST['email'];

		//checks if the email meets the pattern
		$pattern = "/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/";

		if (preg_match($pattern,$email)) 
		{
			$emailColor = "green";
			return true;
		}
		else
		{
			$emailColor = "red";
			$emailErrorMessage = "*invalid email";
			return false;
		}
	}
	else
	{
		$emailColor = "red";
		$emailErrorMessage = "*email must be filled";
		return false;
	}
}

//VALIDATING SUBJECT
function validateSubject()
{
	global $subject,$subjectColor,$subjectErrorMessage;
	//checks if the message box is empty
	if (isset($_POST['subject']) & !empty($_POST['subject'])) 
	{
		$subject=$_POST['subject'];
		$subjectColor="green";
		return true;

	}else
	{
		$subjectColor="red";
		$subjectErrorMessage="*subject must be filled";
		return false;
	}
}

//VALIDATING MESSAGE
function validateMessage()
{
	global $message,$messageColor,$messageErrorMessage;
	//checks if the message box is empty
	if (isset($_POST['message']) & !empty($_POST['message'])) 
	{
		$message=$_POST['message'];
		$messageColor="green";
		return true;

	}else
	{
		$messageColor="red";
		$messageErrorMessage="*message must be filled";
		return false;
	}
}

?>