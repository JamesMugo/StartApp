<?php
$password=$passwordColor=$passwordErrorMessage=$passwordMisMach="";
$newPassword=$newPasswordColor=$newPasswordErrorMessage=$passSuccess="";
$confirmPassword=$confirmPasswordColor=$confirmPasswordErrorMessage="";


//email validation variables
$email=$emailColor=$emailErrorMessage="";

//message validation variables
$message=$messageColor=$messageErrorMessage="";

//subject validation variables
$subject=$subjectColor=$subjectErrorMessage="";

//first name validation variables
$firstName=$firstNameColor=$firstNameErrorMessage="";

//last name validation variables
$lastName=$lastNameColor=$lastNameErrorMessage="";

//country validation variables
$country=$countryColor=$countryErrorMessage="";

//phone validation variables
$phone=$phoneColor=$phoneErrorMessage="";

//username validation variables
$username=$usernameColor=$usernameErrorMessage="";

//bio validation variables
$bio=$bioColor=$bioErrorMessage="";

//address validation variables
$address=$addressColor=$addressErrorMessage="";

require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/MeetYourInvestor/classes/user.php');
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

//VALIDATING USERNAME
function validateUsername()
{
	global $username,$usernameColor,$usernameErrorMessage;
	if (isset($_POST['username']) & !empty($_POST['username']))
    {
    	$username = $_POST['username'];

 		//checks if the username does not contain numbers or symbols 
  		$pattern = "/^[a-zA-Z]+$/";
  		if (preg_match($pattern,$username))
  	    {
  			$usernameColor= "green";
  			return true;
  		}
  		else
  		{
  			$usernameColor= "red";
  			$usernameErrorMessage= "invalid username";
  			return false;
  		}
		
	}
	else
	{
		$usernameColor= "red";
  		$usernameErrorMessage= "username must be filled";
  		return false;
	}
}

//VALIDATE PHONE
function validatePhone()
{
	global $phone,$phoneColor,$phoneErrorMessage;

	//checks if the phone is set and not empty
	if (isset($_POST['phone']) & !empty($_POST['phone']))
	{
		$phone = $_POST['phone'];

		//checks if the phone meets the length requirement
		if (strlen($phone)>=4 & strlen($phone)<=13)
		{
			//checks if the phone meets the required pattern
			$pattern = "/^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\.\/0-9]*$/";

			if (preg_match($pattern,$phone))
			{
				$phoneColor = "green";
				return true;
			}
			else
			{
				$phoneColor = "red";
				$phoneErrorMessage = "*invalid phone number";
				return false;
			}
		}
		else
		{
			$phoneColor = "red";
			$phoneErrorMessage = "*phone number has to be between 4 and 13 digits";
			return false;
		}

	}
	else
	{
		$phoneColor = "red";
		$phoneErrorMessage = "*phone must be filled";
		return false;
	}
}

//VALIDATING COUNTRY
function validateCountry()
{
	global $country,$countryColor,$countryErrorMessage;

	if (isset($_POST['country']) & !empty($_POST['country']))
    {
		$country=$_POST['country'];
		$countryColor="green";
		return true;
	}
	else
	{
		$countryColor="red";
		$countryErrorMessage ="*country must be filled";
		return false;
	}
}

//VALIDATING FIRST NAME
function validateFirstName()
{
	global $firstName,$firstNameColor,$firstNameErrorMessage;
	//checks if the first name is not empty
	if (isset($_POST['fname']) & !empty($_POST['fname'])) 
	{
		$firstName = $_POST['fname'];

		//checks if the username meets the patter
		$pattern = "/^[a-zA-Z]+$/";
		if (preg_match($pattern,$firstName)) 
		{
			$firstNameColor="green";
			return true;
		}
		else
		{
			$firstNameColor="red";
			$firstNameErrorMessage="*name must not contain numbers";
			return false;
		}
	}
	else
	{
		$firstNameColor="red";
		$firstNameErrorMessage="*name must be filled";
		return false;
	}
}

//VALIDATING LAST NAME
function validateLastName()
{
	global $lastName,$lastNameColor,$lastNameErrorMessage;
	//checks if the first name is not empty
	if (isset($_POST['lname']) & !empty($_POST['lname'])) 
	{
		$lastName = $_POST['lname'];

		//checks if the username meets the patter
		$pattern = "/^[a-zA-Z]+$/";
		if (preg_match($pattern,$lastName)) 
		{
			$lastNameColor="green";
			return true;
		}
		else
		{
			$lastNameColor="red";
			$lastNameErrorMessage="*last name must not contain numbers";
			return false;
		}
	}
	else
	{
		$lastNameColor="red";
		$lastNameErrorMessage="*last name must be filled";
		return false;
	}
}

//validating bio
function validateBio()
{
	global $bio,$bioColor,$bioErrorMessage;
	//checks if the message box is empty
	if (isset($_POST['bio']) & !empty($_POST['bio'])) 
	{
		$bio=$_POST['bio'];
		$bioColor="green";
		return true;

	}else
	{
		$bioColor="red";
		$bioErrorMessage="*bio must be filled";
		return false;
	}
}

//validating address
function validateAddress()
{
	global $address,$addressColor,$addressErrorMessage;
	//checks if the message box is empty
	if (isset($_POST['address']) & !empty($_POST['address'])) 
	{
		$address=$_POST['address'];
		$addressColor="green";
		return true;

	}else
	{
		$addresseColor="red";
		$addressErrorMessage="*address must be filled";
		return false;
	}
}
?>