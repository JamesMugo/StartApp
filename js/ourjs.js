/*
*@author Alieu Jallow
*@version 1.0
*/
/********************************************************************************************
					THIS SECTION VALIDATES THE SEARCH FORM
*********************************************************************************************/
//VALIDATING THE SEARCH FORM
function validateSearchForm()
{
	
	var name = document.forms["searchForm"]["name"];
	var nationality = document.forms["searchForm"]["nationality"];
	var interest = document.forms["searchForm"]["interest"];

	var status=false; 


	//validating the name , nationality  and interest
	if (name.value == '' && nationality.value == '' && interest.value == '' ) 
	{
		name.style.border = "1px solid red";
		nationality.style.border = "1px solid red";
		interest.style.border = "1px solid red";
		document.getElementById('searhSpan').innerHTML='Fill atleast one';
		status=false; 
	}
	else
	{
		name.style.border = "1px solid green";
		nationality.style.border = "1px solid green";
		interest.style.border = "1px solid green";
		document.getElementById('searhSpan').innerHTML='';
		status=true; 
	}

	return status;
}

/********************************************************************************************
			THIS SECTION VALIDATES THE PASSWORD RECOVERY FORM
*********************************************************************************************/
function validateRecoveryForm()
{
	if(validateEmail("passwordRecoveryForm"))
	{
		return true;
	}
	return false;
}

/********************************************************************************************
			THIS SECTION VALIDATES THE EDIT PROFILE FORM
*********************************************************************************************/
function validateEditProfileForm()
{
	var lname = validateLastName("editProfileForm");
	var email= validateEmail("editProfileForm");
	var fname =validateFirstName("editProfileForm");
	var username =validateUsername("editProfileForm");
	var country = validateCountry("editProfileForm");
	var phone=validatePhone("editProfileForm");
	var bio = validateBio("editProfileForm");
	var address=validateAddress("editProfileForm");

	if (lname&email&fname&username&country&phone&address&bio)
	 {
	 	return true;
	 }
	return false;
}

//VALIDATING BIO
function validateBio(form)
{
	var bio= document.forms[form]["bio"];
	var span = document.getElementById('bioSpan');

  if (bio.value == "") 
  {
 	span.innerHTML = "*bio must be filled";
 	bio.style.border = "1px solid red";
 	return false; 
  }
  else
  {

  	bio.style.border = "1px solid green";
 	span.innerHTML = "";
 	return true; 
  }
}

//VALIDATING Address
function validateAddress(form)
{
	var address= document.forms[form]["address"];
	var span = document.getElementById('addressSpan');

  if (address.value == "") 
  {
 	span.innerHTML = "*address must be filled";
 	address.style.border = "1px solid red";
 	return false; 
  }
  else
  {

  	address.style.border = "1px solid green";
 	span.innerHTML = "";
 	return true; 
  }
}
/********************************************************************************************
	THIS SECTION VALIDATES THE CONTACT FORM  AND IT HAS ALL THE FUNCTIONS REQUIRED FOR THAT
*********************************************************************************************/

//VALIDATING MESSAGE
function validateMessage()
{
	var message= document.forms["contactForm"]["message"];
	var span = document.getElementById('messageSpan');

  if (message.value == "") 
  {
 	span.innerHTML = "*message must be filled";
 	message.style.border = "1px solid red";
 	return false; 
  }
  else
  {

  	message.style.border = "1px solid green";
 	span.innerHTML = "";
 	return true; 
  }
}

//VALIDATING SUBJECT
function validateSubject()
{
	var subject= document.forms["contactForm"]["subject"];
	var span = document.getElementById('subjectSpan');

  if (subject.value == "") 
  {
 	span.innerHTML = "*subject must be filled";
 	subject.style.border = "1px solid red";
 	return false; 
  }
  else
  {

  	subject.style.border = "1px solid green";
 	span.innerHTML = "";
 	return true; 
  }
}

//VALIDATING THE CONTACT FORM
function validateContactForm()
{
	
	var emailVlidation = validateEmail("contactForm");
	var nameValidation = validateFirstName("contactForm");
	var messageValidation = validateMessage();
	var subjectValidation = validateSubject();

	if (emailVlidation & nameValidation & messageValidation & subjectValidation) 
	{
		passwordEqual()
		return true;
	}
	return false;
}


/********************************************************************************************
				THIS SECTION VALIDATES THE CHANGE PASSWORD FORM
*********************************************************************************************/
function validatechangePasswordForm()
{
	var currentPassword = validatePassword("changePasswordForm","currentPassword","currentPasswordSpan");
	var equal = passwordEqual("changePasswordForm","newPassword","confirmPassword","newPasswordSpan","confirmPasswordSpan");
	if (currentPassword & equal)
	 {
	 	return true;
	 }
	 return false;
}

/********************************************************************************************
						THIS SECTION VALIDATES THE LOGIN FORM
*********************************************************************************************/

//VALIDATING THE LOGIN FORM
function validateLoginForm()
{
	var username = document.forms["loginForm"]["username"];
	var password = document.forms["loginForm"]["password"];

	var usernameSpan = document.getElementById('usernameSpan');
	var passwordSpan = document.getElementById('passwordSpan');
	var count =0;

	//validating the username
  if (username.value == "") 
  {
 	usernameSpan.innerHTML = "*username must be filled";
 	username.style.border = "1px solid red";
  }
  else
  {
  	 username.style.border = "1px solid green";
 	 usernameSpan.innerHTML = "";
  	 count++;
  }

  //validating the passowrd
  if (password.value == "") 
  {
 	passwordSpan.innerHTML = "*password must be filled";
 	password.style.border = "1px solid red";
  }
  else
  {
  	 password.style.border = "1px solid green";
 	 passwordSpan.innerHTML = "";
 	 count++;
  }
  
  if (count==2) 
  {
  	return true;
  }
  return false;
}


/********************************************************************************************
	THIS SECTION VALIDATES THE REGISTER FORM  AND IT HAS ALL THE FUNCTIONS REQUIRED FOR THAT
*********************************************************************************************/

 //VALIDATING USERNAME
function validateUsername(form)
{
	var username = document.forms[form]["username"];
	var span = document.getElementById('usernameSpan');

  if (username.value == "") 
  {
 	span.innerHTML = "*username must be filled";
 	username.style.border = "1px solid red";
 	return false; 
  }
  else
  {

  	//checks if the username does not contain numbers or symbols 
  	var pattern = new RegExp("^[a-zA-Z]+$");

  	if (pattern.test(username.value)) 
  	{
  		username.style.border = "1px solid green";
 		span.innerHTML = "";
 		return true; 
  	}
  	else
  	{
  		span.innerHTML = "*username must not contain numbers or symbols";
 		username.style.border = "1px solid red";
 		return false; 
  	}
  }
}

//VERIFY PHONE NUMBER
 function phoneVerify(phone)
 {
 	  var pattern = /^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\./0-9]*$/;

 	  if(phone.match(pattern))
 	  {
 		    return true;
 	  }
 	  else
 	  {
 		    return false;
 	  }
 }
 
//VALIDATE PHONE
function validatePhone(form)
{
	var phone = document.forms[form]["phone"];
	var span = document.getElementById('phoneSpan');

	if (phone.value == "") 
	{
		phone.style.border = "1px solid red";
		span.innerHTML = "invalid";
		status=false; 
	 }
	else
	{
	//checking for the length of the phone number
	if(phone.value.length<=13 && phone.value.length >= 4)
	{

		//checks if the phone number  meets the pattern
		if(phoneVerify(phone.value))
		 {
			span.innerHTML = "";
			phone.style.border = "1px solid green";
			return true;
		}
		else
		{
			phone.style.border = "1px solid red";
			span.innerHTML = "sfsfsd";
			status=false; 
		}
	}
	else
	{
		phone.style.border = "1px solid red";
		span.innerHTML = "asfsf";
		status=false; 
	}
  }
}

//VALIDATE COUNTRY
function validateCountry(form)
{
	var country = document.forms[form]["country"];
	var span = document.getElementById('countrySpan');

	if (country.value == "") 
	{
		country.style.border = "1px solid red";
		span.innerHTML = "country should be filled";
		status=false; 
	}
	else
	  {
		country.style.border = "1px solid green";
		span.innerHTML = "";
		return true;
	  }

}

//VALIDATING FIRST NAME
function validateFirstName(form)
{
	var firstName = document.forms[form]["fname"];
	var span = document.getElementById('firstNameSpan');
	if (firstName.value == "") 
	{
		 span.innerHTML = "*Fist name must be filled";
		 firstName.style.border = "1px solid red";
		 return false; 
	 }
	else
	{
		//if not empty do the folling 
	  	var pattern = new RegExp("^[a-zA-Z]+$");

	  	if (pattern.test(firstName.value)) 
	  	{
	  		firstName.style.border = "1px solid green";
	 		span.innerHTML = "";
	 		return true; 
	  	}
	  	else
	  	{
	  		span.innerHTML = "*First name must not contain numbers or symbols";
	 		username.style.border = "1px solid red";
	 		return false; 
	  	}
	}
}

//VALIDATING LAST NAME
function validateLastName(form)
{
	var lastName = document.forms[form]["lname"];
	var span = document.getElementById('lastNameSpan');

	if (lastName.value == "") 
	{
		span.innerHTML = "*Last name must be filled";
		lastName.style.border = "1px solid red";
		return false; 
	 }
	else
	{
		//if not empty do the folling 
	  	var pattern = new RegExp("^[a-zA-Z]+$");

	  	if (pattern.test(lastName.value)) 
	  	{
	  		lastName.style.border = "1px solid green";
	 		span.innerHTML = "";
	 		return true; 
	  	}
	  	else
	  	{
	  		span.innerHTML = "*last name name must not contain numbers or symbols";
	 		lastName.style.border = "1px solid red";
	 		return false; 
	  	}
	}

}

//VALIDATING EMAIL
function validateEmail(form)
{
	var email = document.forms[form]["email"];
	var span = document.getElementById("emailSpan");

   if (email.value == "") 
    {
 		  span.innerHTML = "*Email must be filled";
 	      email.style.border = "1px solid red";
 	      return false; 
    }
     else
    {
 		//if not empty do the folling 
	  	var pattern = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

	  	if (pattern.test(email.value)) 
	  	{
	  		email.style.border = "1px solid green";
	 		span.innerHTML = "";
	 		return true; 
	  	}
	  	else
	  	{
	  		span.innerHTML = "*invalid email address";
	 		email.style.border = "1px solid red";
	 		return false; 
	  	}
    }
}

//VALIDATING PASSWORD
function validatePassword(form,pas,span)
{
	var password = document.forms[form][pas];
	var span = document.getElementById(span);
   if (password.value == "") 
   {
  	span.innerHTML = "*password must be filled";
  	password.style.border = "1px solid red";
  	return false; 
   }
   else
  {

  	//if password is not empty do the following
  	//checks the length of the password
  	if (password.value.length>=6 & password.value.length<13)
  	{

  		//if the password meets the length, check for an Uppercase letter, symbol, nummber, 
  		var pattern = new RegExp("^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$");
  		if(pattern.test(password.value))
  		{
  			span.innerHTML = "";
  			password.style.border = "1px solid green";
  			return true; 
  		}
  		else
  		{

  			span.innerHTML = "*password must have atleast a number, symbol and an uppercase letter";
  			password.style.border = "1px solid red";
  			return false; 
  		}
  	}
  	else
  	{
  		span.innerHTML = "*password length shoud be between 6 and 12 characters";
  		password.style.border = "1px solid red";
  		return false; 
  	}

   }
}

  //CHECKING IF THE TWO PASSWORDS ARE EQUAL
function passwordEqual(form,newpass,confirmpass,newpasspan,confrmpasapan)
{
	var password = document.forms[form][newpass].value;
	var confirmPassword = document.forms[form][confirmpass].value;
	var passwordMismach = document.getElementById("passwordMismarch");

	//checks if the two passwords march
	var fPass = validatePassword(form,newpass,newpasspan);
	var sPass = validatePassword(form,confirmpass,confrmpasapan);

	if (fPass&sPass)
	 {
	 	//checks if the two passwords match
	 	if (confirmPassword==password) 
	 	{
	 		passwordMismach.innerHTML="";
	 		return true;
	 	}
	 	else
	 	{
	 		passwordMismach.innerHTML="password did not match";
	 		document.forms[form][newpass].value="";
	 		document.forms[form][confirmpass].value="";
	 	}
	 }
	 else
	 {
	 	passwordMismach.innerHTML="";
	 }
	 return false;
}

//VALIDATING THE REGISTER FORM
function validateRegisterForm()
{
	var lname = validateLastName();
	var email= validateEmail("registerForm");
	var fname =validateFirstName("registerForm");
	var password =passwordEqual();
	var username =validateUsername();
	var country = validateCountry();
	var phone=validatePhone();

	if (lname&email&fname&password&username&country&phone)
	 {
	 	return true;
	 }
	return false;
 }