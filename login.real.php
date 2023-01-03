<?php
$servername = "localhost";
$username="root";
$password="";
$dbname="blood donation";
try{
$conn = mysqli_connect($servername, $username,$password,$dbname);

}catch(MySQLi_Sql_Exception $ex){
echo("error in connection");
}
if(isset($_POST['username'])){
$username= mysqli_real_escape_string($conn,$_POST ['username']);
$password= mysqli_real_escape_string($conn,$_POST ['password']);
$result = mysqli_query($conn,"SELECT * FROM registrationform WHERE username='$username' and password='$password'") or die(mysql_error());
$count = mysqli_num_rows($result);
if($count == 1) {


 header("location:filter.php");
 } else {
 echo   "Wrong Username or Password. Try again, ";
 echo "If You Dont Have An Account Please Register";
 }
}


?>
<html>
<head>
<meta charset="utf-8">
<title>Login form</title>
</head>
<body>
<body style="background-color:#E6E6FA">
<form action="" method="post">
<center>

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
<td>username:</td>
<td><input type="text" name="username" placeholder="enter your username"></td>
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
<a href="forgetpasswordtest.php">Forgot your password?</a>
<tr>
<td>password:</td>
<td><input type="password" name="password" value="admin"></td>
</tr>
<tr>
<td></td>
<td></td>
</tr>
<tr>
<td></td>
<td></td>
<tr>
<td></td>
<td><input type="submit" name="submit" value="login"></td>
</table>
</form>
</body>
</html>