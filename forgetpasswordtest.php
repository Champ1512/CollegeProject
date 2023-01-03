<html>
<head>
</head>
<body>
<form action="" method="POST">
Your Email:<br  /><input type="text" name="email" size="30" /><br />
<input type="submit" name="submit" value="Order New Password" />
</form>
<body style="background-color:#E6E6FA">

<?php
error_reporting(E_PARSE |E_ERROR);

$email= $_POST['email'];
$submit= $_POST['submit'];
//connect to db
$servername = "localhost";
$username="root";
$password="";
$dbname="bddb";
try{
$conn = mysqli_connect($servername, $username,$password,$dbname);

}catch(MySQLi_Sql_Exception $ex){
echo("error in connection");
}
if($submit){
	$email_check=mysqli_query ($conn,"SELECT * FROM registrationform WHERE email='".$email."'");
	$count=mysqli_num_rows($email_check);
	if ($count != 0 ){
		//generate a new password
		$random= rand(72891,92729);
		$new_password=$random;
		//create a copy of the new password
		$email_password= $new_password;
		//encrypt
		$new_password=md5($new_password);
		//update the db
		mysqli_query ($conn,"UPDATE registrationform SET password='".$new_password."' WHERE email='".$email."'");
		//send password to the user_error
		$subject = "login information";
		$message = "your password have been changed to $email_password";
		$from= "From: userblooddonation@gmail.com";
		
		mail($email,$subject,$message,$from);
		echo "your new password have been sent to you by email.";
	}
	else{
		echo "this email does not exist.";
	}
}

?>