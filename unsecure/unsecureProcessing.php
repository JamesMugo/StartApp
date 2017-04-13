<?php

//global variables
$username=$phone=$password=$passwordConfirm=$country=$firstName=$lastName=$email="";

//error color
$usernameColor=$phoneColor=$passwordColor=$passwordConfirmColor=$countryColor=$firstNameColor=$lastNameColor=$emailColor="";

//error message variables
$usernameErrorMessage=$phoneErrorMessage=$passwordErrorMessage=$passwordConfirmErrorMessage=$countryErrorMessage=
$firstNameErrorMessage=$lastNameErrorMessage=$emailErrorMessage=$passwordMisMach="";

$dd="";
/********************************************************************************************
						THIS SECTION CHECKS WHICH BUTTON IS CLICKED
*********************************************************************************************/
//CHECKS WHICH BUTTON IS CLICKED
if (isset($_POST['registerButton'])) 
{
	validateRegisterForm();
}
else if (isset($_POST['loginButton']))
{
	# code...
}
else if (isset($_POST['contactButton']))
{
	# code...
}

/********************************************************************************************
						THIS SECTION VALIDATES THE CONTACT FORM
*********************************************************************************************/






/********************************************************************************************
						THIS SECTION VALIDATES THE LOGIN FORM 
*********************************************************************************************/






/********************************************************************************************
						THIS SECTION VALIDATES THE SEARCH FORM
*********************************************************************************************/





/********************************************************************************************
	THIS SECTION VALIDATES THE REGISTER FORM  AND IT HAS ALL THE FUNCTIONS REQUIRED FOR THAT
*********************************************************************************************/

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
			$firstNameErrorMessage="*first name must not contain numbers";
			return false;
		}
	}
	else
	{
		$firstNameColor="red";
		$firstNameErrorMessage="*first name must be filled";
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


//VALIDATING PASSWORD
function validatePassword()
{
	global $password,$passwordColor,$passwordErrorMessage;
	//cheks if the password is set and not empty
	if (isset($_POST['password']) & !empty($_POST['password'])) 
	{
		$password = $_POST['password'];

		//checks the length of the password
		if (strlen($password)>=6 & strlen($password)<13) 
		{
			//cheks if the password meets the pattern
			$pattern = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/";
			if (preg_match($pattern,$password)) 
			{
				$passwordColor = "green";
				return true;
			}
			else
			{
				$passwordColor = "red";
				$passwordErrorMessage = "*password must have atleast a number, symbol and an uppercase letter";
				return false;
			}

		}
		else
		{
			$passwordColor = "red";
			$passwordErrorMessage = "*password length shoud be between 6 and 12 characters";
			return false;
		}
	}
	else
	{
		$passwordColor = "red";
		$passwordErrorMessage = "*password must be filled";
		return false;
	}
}


//VALIDATING CONFIMR PASSWORD
function validateConfirmPassword()
{
	global $passwordConfirm,$passwordConfirmColor,$passwordConfirmErrorMessage;
	//cheks if the password is set and not empty
	if (isset($_POST['confirmPassword']) & !empty($_POST['confirmPassword'])) 
	{
		$passwordConfirm = $_POST['confirmPassword'];

		//checks the length of the password
		if (strlen($passwordConfirm)>=6 & strlen($passwordConfirm)<13) 
		{
			//cheks if the password meets the pattern
			$pattern = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/";
			if (preg_match($pattern,$passwordConfirm)) 
			{
				$passwordConfirmColor = "green";
				return true;
			}
			else
			{
				$passwordConfirmColor = "red";
				$passwordConfirmErrorMessage = "*password must have atleast a number, symbol and an uppercase letter";
				return false;
			}

		}
		else
		{
			$passwordConfirmColor = "red";
			$passwordConfirmErrorMessage = "*password length shoud be between 6 and 12 characters";
			return false;
		}
	}
	else
	{
		$passwordConfirmColor = "red";
		$passwordConfirmErrorMessage = "*password must be filled";
		return false;
	}
}


//CHECKING IF THE TWO PASSWORDS ARE EQUAL
function passwordEqual()
{
	global $password,$passwordConfirm,$passwordMisMach,$passwordConfirmColor,$passwordColor;

	$fPass = validatePassword();
	$sPass = validateConfirmPassword();

	if ($fPass & $sPass) 
	{
		//cheks if the password are equal
		if ($password==$passwordConfirm) 
		{
			//passoword are equal
			return true;
		}
		else
		{
			//passwords are not equal
			$passwordMisMach ="password did not match";
			$passwordConfirmColor = "red";
			$passwordColor = "red";
			return false;
		}
	}
	return false;
}

//VALIDATING THE REGISTER FORM
function validateRegisterForm()
{
	validateLastName();
	validateEmail();
	validateFirstName();
	passwordEqual();
	validateUsername();
	validateCountry();
	validatePhone();
 }

?>