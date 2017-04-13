<?php

//global variables
$username=$phone=$password=$passwordConfirm=$country=$firstName=$lastName=$email="";

//error color
$usernameColor=$phoneColor=$passwordColor=$passwordConfirmColor=$countryColor=$firstNameColor=$lastNameColor=$emailColor="";

//error message variables
$usernameErrorMessage=$phoneErrorMessage=$passwordErrorMessage=$passwordConfirmErrorMessage=$countryErrorMessage=
$firstNameErrorMessage=$lastNameErrorMessage=$emailErrorMessage="";


//CHECKS WHICH BUTTON IS CLICKED
if (isset($_POST['registerButton'])) 
{
	//validateRegisterForm();
	validatingUsername();
	validateCountry();
}
else if (isset($_POST['loginButton']))
{
	# code...
}
else if (isset($_POST['contactButton']))
{
	# code...
}

//VALIDATING USERNAME
function validatingUsername()
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

	if (isset($_POST['phone']) & !empty($_POST['phone'])) 
	{
		$phone = $_POST['phone'];
		//checking for the length of the phone number
	if(strlen($phone)<=13 && strlen($phone)>= 4)
	{
		//checks if the phone number  meets the pattern
		$pattern = "/^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\./0-9]*$/";

		if(preg_match($pattern,$phone))
		 {
			$phoneColor = "green";
			return true;
		}
		else
		{
			$phoneColor = "red";
			$phoneErrorMessage= "*invalid phone number";
			return false; 
		}
	}
	else
	{
		$phoneColor = "red";
		$phoneErrorMessage= "phone number has to be between 13 and 4 digits";
		return false;
	}
		
	}
	else
	{
		$phoneColor = "red";
		$phoneErrorMessage= "*phone must be filled";
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

	if (isset($_POST['fname']) & !empty($_POST['fname'])) 
	{
		 $firstName = $_POST['fname'];

	  	 $pattern = "/^[a-zA-Z]+$/";

	  	if (preg_match($pattern, $firstName)) 
	  	{
	  		$firstNameColor = "green";
	 		return true; 
	  	}
	  	else
	  	{
	  		$firstNameColor = "red";
	  		$firstNameErrorMessage = "*invalid First name";
	 		return false; 
	  	}
	 }
	else
	{
		$firstNameColor = "red";
	  	$firstNameErrorMessage = "*First name must filled";
	 	return false; 
	}
}

//VALIDATING LAST NAME
function validateLastName()
{
	global $lastName,$lastNameColor,$lastNameErrorMessage;

	if (isset($_POST['lname']) & !empty($_POST['lname'])) 
	{
		 $lastName = $_POST['lname'];

	  	 $pattern = "/^[a-zA-Z]+$/";

	  	if (preg_match($pattern, $lastName)) 
	  	{
	  		$lastNameColor = "green";
	 		return true; 
	  	}
	  	else
	  	{
	  		$lastNameColor = "red";
	  		$lastNameErrorMessage = "*invalid Last name";
	 		return false; 
	  	}
	 }
	else
	{
		$lastNameColor = "red";
	  	$lastNameErrorMessage = "*Last name must filled";
	 	return false; 
	}

}

//VALIDATING EMAIL
function validateEmail()
{
	global $email,$emailColor,$emailErrorMessage;

   if (isset($_POST['email']) & !empty($_POST['email'])) 
    {
 		  $email= $_POST['email'];
	  	  $pattern = "/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/";

	  	if (preg_match($pattern, $email)) 
	  	{
	  		$emailColor = "green";
	 		return true; 
	  	}
	  	else
	  	{
	  		$emailColor = "red";
	 		$emailErrorMessage= "*invalid email";
	 		return false; 
	  	}

    }
     else
    {
 		$emailColor = "red";
	 	$emailErrorMessage= "*email must be filled";
	 	return false; 
    }
}

//VALIDATING PASSWORD
function validatePassword()
{
   global $password,$passwordColor,$passwordErrorMessage;
   if (isset($_POST['password']) & !empty($_POST['password'])) 
   {

  	$password = $_POST['password'];

  	//checks the length of the password
  	if (strlen($password)>=6 & strlen($password)<13)
  	{

  		//if the password meets the length, check for an Uppercase letter, symbol, nummber, 
  		$pattern = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/";
  		if(preg_match($pattern,$password))
  		{
  			$passwordColor= "green";
  			return true; 
  		}
  		else
  		{
  			$passwordColor= "red";
  			$passwordErrorMessage = "*password must have atleast a number, symbol and an uppercase letter";
  			return false; 
  		}
  	}
  	else
  	{
  		$passwordColor= "red";
  		$passwordErrorMessage = "*password length shoud be between 6 and 12 characters";
  		return false; 
  	}
   }
   else
  {
  	$passwordColor= "red";
  	$passwordErrorMessage = "*password must be filled";
  	return false; 
  }
}


//VALIDATING CONFIRM PASSWORD
function validateConfirmPassword()
{
   global $passwordConfirm,$passwordConfirmColor,$passwordConfirmErrorMessage;

   if (isset($_POST['confirmPassword']) & !empty($_POST['confirmPassword'])) 
   {

  	$passwordConfirm= $_POST['confirmPassword'];

  	//checks the length of the password
  	if (strlen($passwordConfirm)>=6 & strlen($passwordConfirm)<13)
  	{

  		//if the password meets the length, check for an Uppercase letter, symbol, nummber, 
  		$pattern = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/";
  		if(preg_match($pattern,$passwordConfirm))
  		{
  			$passwordConfirmColor= "green";
  			return true; 
  		}
  		else
  		{
  			$passwordConfirmColor= "red";
  			$passwordConfirmErrorMessage = "*password must have atleast a number, symbol and an uppercase letter";
  			return false; 
  		}
  	}
  	else
  	{
  		$passwordConfirmColor= "red";
  		$passwordConfirmErrorMessage = "*password length shoud be between 6 and 12 characters";
  		return false; 
  	}
   }
   else
  {
  	$passwordConfirmColor= "red";
  	$passwordConfirmErrorMessage = "*password must be filled";
  	return false; 
  }
}


  //CHECKING IF THE TWO PASSWORDS ARE EQUAL
function passwordEqual()
{
	global $password,$passwordConfirm,
	//checks if the two passwords march
	$fPass = validatePassword();
	$sPass = validateConfirmPassword()

	if ($fPass & $sPass)
	 {
	 	//checks if the two passwords match
	 	if ($password==$passwordConfirm) 
	 	{
	 		return true;
	 	}
	 }
	 return false;
}

//VALIDATING THE REGISTER FORM
function validateRegisterForm()
{
	$lname = validateLastName();
	$email= validateEmail();
	$fname =validateFirstName();
	$password =passwordEqual();
	$username =validateUsername();
	$country = validateCountry();
	$phone=validatePhone();

	if ($lname&$email&$fname&$password&$username&$country&$phone)
	 {
	 	return true;
	 }
	return false;
 }


?>