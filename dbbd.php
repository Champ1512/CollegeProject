
<!doctype html>
<?php
$servername = "localhost";
$username="root";
$password="";
$dbname="bddb";
try{
$conn = mysqli_connect($servername, $username,$password,$dbname);
}catch(MySQLi_Sql_Exception $ex){
echo("error in connection");
}
if(isset($_POST['submit'])){

	$area= mysqli_real_escape_string($conn,$_POST[ 'area' ] );
	$age= mysqli_real_escape_string($conn,$_POST[ 'age' ] );
	$bloodtype = mysqli_real_escape_string($conn,$_POST[ 'bloodtype' ]);
	$phonenumber=mysqli_real_escape_string($conn,$_POST[ 'phonenumber' ]);
	$email=mysqli_real_escape_string($conn,$_POST[ 'email' ]);
	$username = mysqli_real_escape_string($conn,$_POST[ 'username' ]);
	$gender=mysqli_real_escape_string ($conn,$_POST[ 'gender' ]);

	$password = $_POST[ 'password' ];
	$register_query = "INSERT INTO `registrationform`(`area`,`age`,`gender`,`bloodtype`, `phonenumber`, `email`, `username`, `password`) VALUES ('$area','$age','$gender','$bloodtype','$phonenumber','$email','$username','$password')";
	try{
		$register_result = mysqli_query($conn, $register_query);
		if($register_result){
			if(mysqli_affected_rows($conn)>0){
				echo("registration successful");
			}else{
				echo("error in registration");
			}
		}
	}catch(Exception $ex){
		echo("error".$ex->getMessage());
	}
}
 
?>
<html>
<head>
<meta charset="utf-8">
<title>Registration form</title>
</head>
 
<body>
<body style="background-color:#E6E6FA">
<form action="" method="post">
<table align="center">
<tr>
<td></td>
<td></td>
</tr>
<tr>
<td></td>
<td></td>
</tr>
<tr>
<td></td>
<td></td>
</tr>
<tr>
<td>Enter Area</td>
<td><input type="text" name="area" placeholder="enter your area"></td>
</tr>
<tr>
<td>Enter Your Age</td>
<td><input type="text" name="age" placeholder="enter your age"></td>
</tr>
<tr>
<td>Enter Your Blood type</td>
<td><input type="text" name="bloodtype" placeholder="enter your blood type"></td>
</tr>
<tr>
<td>phone number:</td>
<td><input type="tel" name="phonenumber" placeholder="enter your phone number"></td>
</tr>
<tr>
<td></td>
<td></td>
</tr>
<tr>
<td></td>
<td></td>
</tr>
<tr>
<td></td>
<td></td>
</tr>
<tr>
 <td>Gender</td>
 
 
<td><input type="radio" name="gender" value="Male">Male</td>
</tr>
<tr>
<td></td>
<td><input type="radio" name="gender" value="female">Female</td>
</tr>
<tr>
<td></td>
<td><input type="radio" name="gender" value="others">others</td>
</tr>
<tr>
<td>Enter a Email:</td>
<td><input type="email" name="email" placeholder="example@example.com"></td>
 
</tr>
<tr>
<td></td>
<td></td>
</tr>
<tr>
<td></td>
<td></td>
</tr>
<tr>
<td></td>
<td></td>
</tr>
 
<tr>
<td>Enter a Username *:</td>
<td><input type="text" name="username" placeholder="enter your username" required></td>
</tr>
<tr>
<td></td>
<td></td>
</tr>
<tr>
<td></td>
<td></td>
</tr>
<tr>
<td></td>
<td></td>
</tr>
 
<tr>
<td>Enter a Password:</td>
<td><input type="password" name="password" value="admin"></td>
</tr>
<tr>
<td></td>
<td></td>
</tr>
<tr>
<td></td>
<td></td>
</tr>
 
<tr>
<td></td>
<td><input type="submit" name="submit" value="SignUp"></td>
</tr>
<tr>
<td></td>
<td><tr>
<td></td>
<a href="login.php">
<td> <br><a href="login.php" class="button">Click Here If You Already Have an Account</a>
</tr>
<a href="login.php">
</table>

</body>
</html>