function searchFunction() {
	  		//get user input value
	  		var name=document.getElementById("name").value;
	  		var nationality=document.getElementById("nationality").value;
	  		var interest=document.getElementById("interest").value;

  			var xhttp = new XMLHttpRequest();
  			xhttp.onreadystatechange = function() {
    			if (this.readyState == 4 && this.status == 200) {
            // alert("name: "+name+" nationality: "+nationality);
            console.log(this.responseText);
					document.getElementById("placeholder").innerHTML =this.responseText;
    			}
            			};
  				// xhttp.open("POST", 'searchcontroller.php?term='json_encode(array(name, nationality, interest)), true);
  				xhttp.open('GET', '../controller/searchcontroller.php?term1='+name, true);
          // +'&term2'=+nationality+'&term3'=+interest
          xhttp.send();
			}