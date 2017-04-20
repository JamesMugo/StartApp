<?php 
// require_once('dbClass.php');
require_once('databaseConnectionClass.php');

// $mycon= new DbClass;
// $mycon->createCon();
// $username='Mmansa';
// $myPass='ooml';
// $firstname='kkmas';
// $lastname='olaks';
// $email='nms@mail.com';
// $gender='M';
// $major=2;
// $per=1;
// $status='ACTIVE';
// $mycon->myprepare("INSERT INTO allcourses(coursecode,coursename,courseyear) VALUES(?,?,?)", 'ECH12','Physics',2019);


// require_once('../database/databaseConnectionClass.php');

$mycon= new Dbconnection;
$mycon->getConnection();
$m=$mycon->safequery("SELECT * FROM `user` WHERE (`role_Id`=2) AND ((`firstName` OR `lastName` LIKE '%%%s%%') OR (`country` LIKE '%%%s%%'))",'a','a');
// "SELECT * FROM `user` WHERE (`role_Id`=$role) AND ((`firstName` OR `lastName` LIKE '%%%s%%') OR (`country` LIKE '%%%s%%'))"
// correct: SELECT firstName, lastName, role_id, emailAddress FROM `user` WHERE (`user`.`role_Id`=2) AND (`firstName` OR `lastName` LIKE '%a%')
// $m=$mycon->safequery("SELECT * from user WHERE emailAddress LIKE '%%%s%%'","alieujallow93@gmail.com");
if($m)
{
	while ($row=mysqli_fetch_assoc($m)) {
		echo $row['firstName'].$row['lastName'].$row['country'].$row['userId'].'<br>';
	}
}
// $sql="SELECT * from user";
// $m=$mycon->queryDatabase($sql);
// $mycon->getRow();
// while ($row=$mycon->getRow()) {
// 	var_dump($row['emailAddress']);
// }


// $mycon->executequery($sql)





 ?>