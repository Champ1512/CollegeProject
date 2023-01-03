<html>
<head>
<title> Profile System</title>
</head>
<body>
<?php
session_start();
$servername = "localhost";
$username="root";
$password="";
$dbname="bddb";
try{
$conn = mysqli_connect($servername, $username,$password,$dbname);
echo("successful in connection /");
}catch(MySQLi_Sql_Exception $ex){
echo("error in connection");
}
function getUserData($user_id){
	$array=array();
	$q=mysqli_query($conn,"SELECT * FROM `registrationform` where `user_id`=".$user_id);
	while($r=mysqli_fetch_assoc($r)){
		$array['user_id']=$r['user_id'];
		$array['username']=$r['username'];
		$array['bloodtype']=$r['bloodtype'];
		$array['age']=$r['age'];
		$array['area']=$r['area'];
		$array['gender']=$r['gender'];
		$array['email']=$r['email'];
		$array['phonenumber']=$r['phonenumber'];
	}
	return $array;
}

?>
<?php
if(!isset($_session['username'])){
$userdata=getUserData(getuserId($_SESSION['username']));
}
	?>
	<?php
	echo $userdata['username']."  ".$userdata['bloodtype']."  ".$userdata['age']."  ".$userdata['area']."  ".$userdata['gender']."  ".$userdata['email']."  ".$userdata['phonenumber']."'s Profile"; ?>
	<?php
	function getuserId($username){
		$q=mysqli_query("SELECT `user_id` FORM `registrationform` WHERE `username`='".$username."'");
		while($r=mysqli_fetch_assoc($r)){
		return $r['user_id'];
	}
	}
	
	?>
	
	</body>
	
	</html>
	