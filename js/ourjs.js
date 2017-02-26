
//VALIDATING THE SIGN IN FORM
function validateSigninForm()
{
	var username = document.forms["signInForm"]["username"];
	var password = document.forms["signInForm"]["password"];

	var status=false; 


	//validating the username
	if (username.value == '') 
	{
		username.style.border = "1px solid red";
 		status=false; 
	}
	else
	{
 		username.style.border = "";
 		status=true; 
	}

	//validating the password
	if (password.value == '') 
	{
		password.style.border = "1px solid red";
 		status=false; 
	}
	else
	{
 		password.style.border = "";
	}

	return status;
}


//VALIDATING THE CONTACT FORM
function validateContactForm()
{
	var name = document.forms["contactForm"]["name"];
	var email = document.forms["contactForm"]["email"];
	var subject = document.forms["contactForm"]["subject"];
	var message = document.forms["contactForm"]["message"];


	status=false; 

	//validating the name
	if (name.value == '') 
	{
		name.style.border = "1px solid red";
 		status=false; 
	}
	else
	{
 		startUpName.style.border = "";
 		status=true; 
	}

	return status;
}

//VALIDATING THE REGISTER FORMS
function validateRegisterForm(){

	var startUpName = document.forms["signUpStartUpForm"]["name"];
	var startUpUsername = document.forms["signUpStartUpForm"]["username"];
	var startUpEmail = document.forms["signUpStartUpForm"]["email"];
	var startUpCountry = document.forms["signUpStartUpForm"]["country"];
	var startUpPassword = document.forms["signUpStartUpForm"]["password"];
	var startUpConfirmPassword = document.forms["signUpStartUpForm"]["passwordConfirm"];
	var startUpPhone = document.forms["signUpStartUpForm"]["phone"];

	var status=false; 

    //validating name
  if (startUpName.value == "") 
  {
 	startUpName.style.border = "1px solid red";
 	document.getElementById('startUpNameSpan').innerHTML = "<img src='./img/xx.png'>";
 	status=false; 
  }
  else
 {
 	document.getElementById('startUpNameSpan').innerHTML = "<img src='./img/checked.png'>";
 	startUpName.style.border = "";
 	status=true; 
  }

   //validating username
   if (startUpUsername.value == "") 
   {
  	startUpUsername.style.border = "1px solid red";
  	document.getElementById('startUpUsernameSpan').innerHTML = "<img src='./img/xx.png'>";
  	status=false; 
   }
   else
  {
  	document.getElementById('startUpUsernameSpan').innerHTML = "<img src='./img/checked.png'>";
  	startUpUsername.style.border = "";
  	status=true; 
   }

//validating email
if (startUpEmail.value == "") 
{
	 startUpEmail.style.border = "1px solid red";
	document.getElementById('startUpEmailSpan').innerHTML = "<img src='./img/xx.png'>";
	status=false; 
 }
else
{
	 document.getElementById('startUpEmailSpan').innerHTML = "<img src='./img/checked.png'>";
	startUpEmail.style.border = "";
}

//validating phone
if (startUpPhone.value == "") 
{
	startUpPhone.style.border = "1px solid red";
	document.getElementById('startUpPhoneSpan').innerHTML = "<img src='./img/xx.png'>";
	status=false; 
 }
else
{
	//checking for the length of the phone number
	if(startUpPhone.value.length<=13 && startUpPhone.value.length >= 4)
	{

		//checks if the phone number  meets the pattern
		if(phoneVerify(startUpPhone.value))
		 {
			 document.getElementById('startUpPhoneSpan').innerHTML = "<img src='./img/checked.png'>";
			startUpPhone.style.border = "";
			document.getElementById('passwordMissmarch').innerHTML = "";
		}
		else
		{
			startUpPhone.style.border = "1px solid red";
			document.getElementById('startUpPhoneSpan').innerHTML = "<img src='./img/xx.png'>";
			document.getElementById('passwordMissmarch').innerHTML = "The mobile number you provided is Invalid";
			status=false; 
		   }
	}
	else
	{
		startUpPhone.style.border = "1px solid red";
		document.getElementById('startUpPhoneSpan').innerHTML = "<img src='./img/xx.png'>";
		document.getElementById('passwordMissmarch').innerHTML = "The mobile number you provided is Invalid";
		status=false; 
	}
}


 //validating country
 if (startUpCountry.value == "") 
 {
 	startUpCountry.style.border = "1px solid red";
 	document.getElementById('startUpcountrySpan').innerHTML = "<img src='./img/xx.png'>";
 	status=false; 
 }
  else
   {
 	     startUpCountry.style.border = "";
 	document.getElementById('startUpcountrySpan').innerHTML = "<img src='./img/checked.png'>";
   }

   //validating password
   if (startUpPassword.value == "") 
    {
 	      startUpPassword.style.border = "1px solid red";
 	      document.getElementById('startUpPasswordSpan').innerHTML = "<img src='./img/xx.png'>";
 	      status=false; 
    }
     else
    {
 	     document.getElementById('startUpPasswordSpan').innerHTML = "<img src='./img/checked.png'>";
 	     startUpPassword.style.border = "";
    }

 	//validating confirm password
 	  if (startUpConfirmPassword.value == "") 
 	   {
 		      startUpConfirmPassword.style.border = "1px solid red";
 		      document.getElementById('startUpConfirmPasswordSpan').innerHTML = "<img src='./img/xx.png'>";
 		      status=false; 
 	   }
 	    else
 	   {
 		     document.getElementById('startUpConfirmPasswordSpan').innerHTML = "<img src='./img/checked.png'>";
 		     startUpConfirmPassword.style.border = "";
 	   }


 	//checking if the two passwords provided match
 	if (startUpConfirmPassword.value!='' && startUpPassword.value!='') 
 	{

 		if (startUpConfirmPassword.value ==  startUpPassword.value) 
 		{
 			status =true;
 		}
 		else
 		{
 			 document.getElementById('startUpConfirmPasswordSpan').innerHTML = "<img src='./img/xx.png'>";
 			document.getElementById('startUpPasswordSpan').innerHTML = "<img src='./img/xx.png'>";
 			startUpPassword.style.border = "1px solid red";
 			startUpConfirmPassword.style.border = "1px solid red";
 			document.getElementById('passwordMissmarch').innerHTML = "The password you provided did not match";

 			status =false;
 		}
 	}
 	else
 	{
 		status =false;
 	}
 	   return status;
 }


 //validate phone number
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



