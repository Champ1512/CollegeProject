<? php

if(isset($_POST["reset-password-submit"])){
	
$selector=$_POST["selector"];
$validator=$_POST["validator"];	
$password=$_POST["pwd"];	
$passwordRepeat=$_POST["pwd-repeat"];		

if(empty($password) || empty($$passwordRepeat)){
	header("Location:dbbd.php?newpwd=empty");
	exit();
}else if ($password != $passwordRepeat){
	header ("Location:dbbd.php?newpwd=pwdnotsame");
	exit();
}
$currentDate=date("U");
$servername = "localhost";
$username="root";
$password="";
$dbname="bddb";
try{
$conn = mysqli_connect($servername, $username,$password,$dbname);

}catch(MySQLi_Sql_Exception $ex){
echo("error in connection");
}

$sql="SELECT * FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires >=";

$stmt=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql)){
	echo "there was an error!";
	exit();
}else{
	mysqli_stmt_bind_param($stmt,"s",$userEmail);
	mysqli_stmt_execute($stmt);
	$result=mysqli_stmt_get_result($stmt);
	if (!$row= mysqli_fetch_assoc($result)){
		
		echo "you need to re-submit your reset request.";
		exit();
	}else{
		 
		 $tokenBin=hex2bin($validator);
		 $tokenCheck=password_verify($tokenBin,$row["pwdResetToken"];
		 if($tokenCheck === false){
			 echo "you need to re-submit your reset request.";
			 exit();
		 }elseif($tokenCheck === true){
			 $tokenEmail=$row['pwdResetEmail'];
			 $sql="SELECT * FROM registrationform WHERE email=?;";
			 $stmt=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql)){
	echo "there was an error!";
	exit();
}else{
	mysqli_stmt_bind_param($stmt,"s",$tokenEmail);
	mysqli_stmt_execute($stmt);
	$result=mysqli_stmt_get_result($stmt);
	if (!$row= mysqli_fetch_assoc($result)){
		echo "there was an error!";
	
		exit();
	}else{
	
$sql="UPDATE registrationform SET pwdUsers=? WHERE email=? ";
$stmt=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql)){
	echo "there was an error!";
	exit();
}else{
	$newPwdHash = password_hash($password, PASSWORD_DEFAULT);
	mysqli_stmt_bind_param($stmt,"ss",$newPwdHash,$tokenEmail);
	mysqli_stmt_execute($stmt);



	
	}
	
	
		
	}
	
}

}else{
	header("Location:index.php");
}