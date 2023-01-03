<?php

if (isset($_POST["reset-request"])){
	$selector = bin2hex(random_bytes(8));
	$token =random_bytes(32);
	$url ="http://localhost/blood.php/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);
	$expires = date("U") + 1800;
	
	
$servername = "localhost";
$username="root";
$password="";
$dbname="bddb";
try{
$conn = mysqli_connect($servername, $username,$password,$dbname);
}catch(MySQLi_Sql_Exception $ex){
echo("error in connection");
}
$userEmail=$_POST["email"];
$sql="DELETE FROM pwdReset WHERE pwdResetEmail=?";
$stmt=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql)){
	echo "there was an error!";
	exit();
}else{
	mysqli_stmt_bind_param($stmt,"s",$userEmail);
	mysqli_stmt_execute($stmt);
	
}
	$sql="INSERT INTO pwdReset (pwdResetEmail,pwdResetSelector,pwdResetToken,pwdResetExpires) VALUES (?,?,?,?);";
	if(!mysqli_stmt_prepare($stmt,$sql)){
	echo "there was an error!";
	exit();
}else{
	$hashedToken=password_hash($token,PASSWORD_DEFAULT);
	mysqli_stmt_bind_param($stmt,"ssss",$userEmail,$selector,$hashedToken,$expires);
	mysqli_stmt_execute($stmt);
	
}

mysqli_stmt_close($stmt);
mysqli_close($conn);


$to=$userEmail;
$subject='reset your password for Blood Donation';
$message='<p>We received a password reset request . the link to reset password is below .If you did not make this request,you can ignore this email</p> ';
$message .= '<p> Here is your password reset link:</br>';
$message .= '<a href="' . $url . '">' . $url .'</a></p>';

$headers="From: BloodDonation <useBloodDonation@gmail.com\r\n";
$headers .= "Reply-to:useBloodDonation@gmail.com\r\n";
$headers .= "Content-type:text/html\r\n";

mail($to,$subject,$message,$headers);

header("Location:reset-password.php?reset=sucess");

}else{
	header("Location:index.php");
}