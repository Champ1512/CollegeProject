main>
<h1> Reset your password</h1>
<form action="forgetpasswordtest.php"  method="post">
<input type= "text" name="email" placeholder="Enter your e-mail address...">
<button type="submit" name="reset-request-submit">Changing Password by User</button>
</form>
<?php
$currentDate=date("U");
$servername = "localhost";
$username="root";
$password="";
$dbname="blood donation";
try{
$conn = mysqli_connect($servername, $username,$password,$dbname);

}catch(MySQLi_Sql_Exception $ex){
echo("error in connection");
}
$email_check=mysqli_query ($conn,"SELECT * FROM users WHERE email='".$email."'");
$count=mysqli_num_rows($email_check);
if(isset($_GET["reset"])){
	if($_GET["reset"]=="success"){
		echo '<p class="signupsuccess">Check your e-mail!</p>';
	}
}
?>

</main>