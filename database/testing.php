<?php 

// function adn($arr)
// 	{
// 		$theTypes="";
// 		foreach ($arr as $var) 
// 		{
// 			$myT=gettype($var);
// 			$theTypes=$theTypes . $myT[0];
// 		}
// 		echo $theTypes; 
// 	}

// function fdon($params)
// 	{
// 		foreaach($params as $par)
// 		{
// 			$sum+=$par;
// 		}
// 		echo $sum;
// 	}

// 	$aName = array(3.52321,'ads',4,'das');
	$nm=array("Kwabby","Koom","kmkm","fdss","mk@gmail.ccom","M",2,1,"ACTIVE");
	// 'ds','sa','sda','sd','msak@gmail.ccom','M',2,1,'ACTIVE'
	// adn(array('Kwabby','Koom','kmkm','fdss','mk@gmail.ccom','M',2,1,'ACTIVE'));
	// echo "'".implode("','", $nm)."'";
	// $aName = array(1,2,1,21,2);
	// // $func='fdon';
	// fdon(...$aName);
 	
	$username='Mmansa';
	$myPass='ooml';
	$firstname='kkmas';
	$lastname='olaks';
	$email='nms@mail.com';
	$gender='M';
	$major=2;
	$per=1;
	$status='ACTIVE';
	$hn=array($username,$myPass,$firstname,$lastname,$email,$gender,$major,$per,$status);
	$a=array_slice($hn, 0);
	echo ...$a;
 	// $ms=[2,'ad',8,'8'];
 	// echo $ms[0];
 	// echo $ms[2];
 	// echo $ms[3];
 ?>
