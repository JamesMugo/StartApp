<?php

//includes the datbase class
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/MeetYourInvestor/database/databaseConnectionClass.php');
//global variables
$username=$phone=$password=$passwordConfirm=$country=$firstName=$lastName=$email=$message=$subject="";

//search from variables
$interest=$interestColor=$nationality=$nationalityColor=$name=$nameColor=$errorMessage="";

//error color
$usernameColor=$phoneColor=$passwordColor=$passwordConfirmColor=$countryColor=$firstNameColor=$lastNameColor=
$emailColor=$messageColor=$subjectColor="";

//error message variables
$usernameErrorMessage=$phoneErrorMessage=$passwordErrorMessage=$passwordConfirmErrorMessage=$countryErrorMessage=
$firstNameErrorMessage=$lastNameErrorMessage=$emailErrorMessage=$passwordMisMach=$messageErrorMessage=
$subjectErrorMessage="";

/********************************************************************************************
						THIS SECTION CHECKS WHICH BUTTON IS CLICKED
*********************************************************************************************/
//CHECKS WHICH BUTTON IS CLICKED
if (isset($_POST['startupRegisterButton'])) 
{
	validateRegisterForm("startup");
}
elseif (isset($_POST['investorRegisterButton']))
{
	validateRegisterForm("investor");
}
else if (isset($_POST['loginButton']))
{
	vlaidateLogin();
}
else if (isset($_POST['contactButton']))
{
	validateContactForm();
}
else if (isset($_POST['searchButton']))
{
	validateSearchForm();
}

/********************************************************************************************
						THIS SECTION VALIDATES THE CONTACT FORM
*********************************************************************************************/
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

//VALIDATING CONTACT FORM
function validateContactForm()
{
	 $messageValidation=validateMessage();
	 $subjectValidation=validateSubject();
	 $emailValidation=validateEmail();
	 $nameValidation=validateFirstName();

	 if($messageValidation & $subjectValidation & $emailValidation & $nameValidation)
	 {
	 	sendEmail();
	 }
}

//sends admin an email
function sendEmail()
{
	global $firstName,$email,$message,$subject;
	$adminEmail="alieu.jallow@ashesi.edu.gh";

	 //send email
 	 mail($adminEmail, $subject, $message, "From:" . $email);
}



/********************************************************************************************
						THIS SECTION VALIDATES THE LOGIN FORM 
*********************************************************************************************/
//VALIDATING THE LOGIN FORM
function vlaidateLogin()
{
	global $username,$usernameColor,$usernameErrorMessage,$password,$passwordColor,$passwordErrorMessage;
	$count=0;

	//VALIDATES THE USERNAME
	//checks if the username is set and not empty
	if (isset($_POST['username']) & !empty($_POST['username']))
    {
		$username=$_POST['username'];
		$usernameColor="green";
		$count++;
	}
	else
	{
		$usernameColor="red";
		$usernameErrorMessage="*username must be filled";
	}

	//VALIDATES THE PASSWORD
	//checks if the password is set and not empty
	if (isset($_POST['password']) & !empty($_POST['password']))
    {
		$password=$_POST['password'];
		$passwordColor="green";
		$count++;
	}
	else
	{
		$passwordColor="red";
		$passwordErrorMessage="*password must be filled";
	}

	if ($count==2)
    {
    	loginUser();
	}
}


//login in the user
function loginUser()
{
		//global variables
		global $passwordErrorMessage,$usernameErrorMessage,$usernameColor,$passwordColor,$username,$password;

		//creates a new instance of database
		$loginUser = new Dbconnection;
		$sql="SELECT * FROM user WHERE username ='$username'";

		$result = $loginUser->queryDatabase($sql);

		//checks if the query runs successfully
		if($result)
		{
			//returns a row of the result
			$row = $loginUser->getRow();

			//checks if the row is empty
			 if ($row==null )
			 {
			 		//incorrect username
			 		$usernameColor="red";
					$usernameErrorMessage ="Wrong username";
					$passwordColor="";
			 }
			 else
			 {
			 	//correct username //now verify the password
				 if(password_verify($password, $row['password'])) 
				 {
				 	//password is correct
				 	//creating sessions
				 	session_start();
				 	
				 	$_SESSION['userId'] = $row['userId'];
				 	$_SESSION['username'] = $row['username'];
				 	$_SESSION['roleId'] = $row['role_id'];
				 	$_SESSION['profilePicture'] = $row['profilePicture'];

				 	if($_SESSION['roleId']==3)
				 	{
					header("Location: ../pages/investors.php");
					}
					elseif($_SESSION['roleId']==2)
				 	{
					header("Location: ../pages/startup.php");
					}
					elseif($_SESSION['roleId']==1)
				 	{
					header("Location: ../pages/adminPage.php");
					}
				 }
				 else
				 {
				 	//incorrect passowrd
				 	$passwordColor="red";
					$passwordErrorMessage ="Wrong password";
				 }
			 }
		}	
}


/********************************************************************************************
						THIS SECTION VALIDATES THE SEARCH FORM
*********************************************************************************************/

//VALIDATING THE SEARCH FORM
function validateSearchForm()
{
	global $interest,$interestColor,$nationality,$nationalityColor,$name,$nameColor,$errorMessage;

	//checks if the interest, name, and nationality is set
	if (($_GET['interest']!='placeholder') & isset($_GET['name']) & isset($_GET['nationality']))
    {
    	//checks if all the fields are empty
    	if (empty($_GET['nationality']) & empty($_GET['interest']) & empty($_GET['name']))
        {
    		$interestColor="red";
    		$nameColor="red";
    		$nationalityColor="red";
    		$errorMessage="*fill at least one";
    		return false;
    	}
    	else
    	{
    		$interest=$_GET['interest'];
    		$name=$_GET['name'];
    		$nationality=$_GET['nationality'];
    		return true;
    	}
	}
}


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
	//cheks if the 	password is set and not empty
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
function validateRegisterForm($name)
{
	global $usernameErrorMessage,$usernameColor,$test;

	$lastNameValidation = validateLastName();
	$emailValidation = validateEmail();
	$firstNameValidation = validateFirstName();
	$passwordValidation = passwordEqual();
	$usernameValidation = validateUsername();
	$countryValidation = validateCountry();
	$phoneValidation = validatePhone();

	if ($lastNameValidation & $emailValidation & $firstNameValidation & $passwordValidation & $usernameValidation & 
		$countryValidation & $phoneValidation)
    {
		//checks if the username exists
		if (checkusername($name))
	    {
			//$test="check usename returns true";
		}
		else
		{
			//user name exists
			$usernameErrorMessage="*username exists";
			$usernameColor="red";
		}
	}
 }


 //registers the user
function registerNewUser($name)
{
	global $username,$phone,$password,$country,$firstName,$lastName,$email;
	/*$firstName=$_POST['fname'];
	$lastName=$_POST['lname'];
	$username=$_POST['username'];  
	$email=$_POST['email'];
	$password=$_POST['password'];
	$phone=$_POST['phone'];
	$country=$_POST['country'];*/

	//hash the password
	$password=password_hash($password, PASSWORD_DEFAULT);

	//creates a new instance of database
	$registerUser = new Dbconnection;

	if($name=="investor")
	{
		$sql = "INSERT INTO
		 user(username,password,firstName,lastName,emailAddress,phoneNumber,country,userStatus,role_id) 
		VALUES ('$username','$password','$firstName','$lastName','$email','$phone','$country','ACTIVE','2');";
	}
	elseif ($name=="startup")
    {
		$sql = "INSERT INTO
		 user(username,password,firstName,lastName,emailAddress,phoneNumber,country,userStatus,role_id) 
		VALUES ('$username','$password','$firstName','$lastName','$email','$phone','$country','ACTIVE','3');";
	}

	$result = $registerUser->queryDatabase($sql);

	if ($result)
	{
		header("Location: ../login/");
	}
	else
	{
		$test="error";
	}		
}

//load all interest into  
 function loadallinterest() 
 {  
 	$myDb = new Dbconnection;
	$sql="SELECT interestId, interestName FROM interest";
	$myDb->queryDatabase($sql);
	while($row=$myDb->getRow())
	{
		echo "<option value=".$row['interestId'].">".$row['interestName']."</option>";
	}
 } 

//checks if the user name exists
function checkusername($name)
{
	global $username;

	//sql
	$sql="SELECT *FROM user WHERE username='$username';";
	$checkUser = new Dbconnection;
	$checkUser->queryDatabase($sql);
	$result= $checkUser->getRow();

	if ($result==null)
	{
		registerNewUser($name);
		return true;
	}
	else
	{
		//echo "username exists";
		return false;
	}
}

?>