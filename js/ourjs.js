// function validateContactForm()
// {

//   var name = document.forms["contactForm"]["name"].value;
//   var email = document.forms["contactForm"]["email"].value;
//   var phone = document.forms["contactForm"]["phone"].value;
//   var subject = document.forms["contactForm"]["subject"].value;
//   var message = document.forms["contactForm"]["message"].value;
//   var status=false; 

//    //validating name
//    if (name == "") 
//    {
//       document.getElementById('name').style.border = "1px solid red";
//       document.getElementById('nameSpan').innerHTML = "<img src='../images/xx.png'>";
//       status=false; 
//    }
//    else
//    {
//      document.getElementById('nameSpan').innerHTML = "<img src='../images/checked.png'>";
//      document.getElementById('name').style.border = "";
//      status=true; 
//    }

//    //validating email
//   if (email == "") 
//    {
//       document.getElementById('email').style.border = "1px solid red";
//       document.getElementById('emailSpan').innerHTML = "<img src='../images/xx.png'>";
//       status=false; 
//    }
//   else
//    {
//      document.getElementById('emailSpan').innerHTML = "<img src='../images/checked.png'>";
//      document.getElementById('email').style.border = "";
//    }

//   //validating phone
//   if (phone == "") 
//    {
//       document.getElementById('phone').style.border = "1px solid red";
//       document.getElementById('phoneSpan').innerHTML = "<img src='../images/xx.png'>";
//       status=false; 
//    }
//    else
//    {
//      if(phoneVerify(phone))
//      {
//         document.getElementById('phoneSpan').innerHTML = "<img src='../images/checked.png'>";
//         document.getElementById('phone').style.border = "";
//      }
//      else
//      {
//         document.getElementById('phone').style.border = "1px solid red";
//         document.getElementById('phoneSpan').innerHTML = "<img src='../images/xx.png'> Invalid number";
//         status=false; 
//      }
//    }

//   //validating message
//   if (message == "") 
//    {
//       document.getElementById('message').style.border = "1px solid red";
//       document.getElementById('messageSpan').innerHTML = "<img src='../images/xx.png'>";
//       status=false; 
//    }
//     else
//    {
//      document.getElementById('messageSpan').innerHTML = "<img src='../images/checked.png'>";
//      document.getElementById('message').style.border = "";
//    }

//    return status;
// }

// //validate phone number
// function phoneVerify(phone)
// {
//   var pattern = /^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\./0-9]*$/;

//   if(phone.match(pattern))
//   {
//     return true;
//   }
//   else
//   {
//     return false;
//   }

// }
/* CONTACT PAGE VALIDATION ENDS*/


var firstpass = document.getElementById("psw1a");
var secpass= document.getElementById("psw1b");
var warn=document.getElementById("warn");

function validPass(){

	if (firstpass!=secpass) {
	warn.innerHTML="passwords to not match";
	}
}