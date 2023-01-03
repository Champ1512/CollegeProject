
<?php
error_reporting(E_PARSE |E_ERROR);
//check for a form submission

$servername = "localhost";
$uusername="root";
$password="";
$dbname="bddb";
try{
$conn = mysqli_connect($servername, $uusername,$password,$dbname);
}catch(MySQLi_Sql_Exception $ex){
echo("error in connection");
}

if(isset($_GET['username'])){
	$username = mysqli_real_escape_string($conn,$_GET['username']);
}
$userquery =mysqli_query($conn,"SELECT * FROM `registrationform` WHERE `username`='$username'");


while($row=mysqli_fetch_assoc($userquery)){
	    $user_id=$row['user_id'];
		$username=$row['username'];
		$bloodtype=$row['bloodtype'];
		$age=$row['age'];
		$area=$row['area'];
        $gender=$row['gender'];
		$email=$row['email'];
		$phonenumber=$row['phonenumber'];
}

?>
<form action="userprofile.php" method="GET">
<table>
<tr> <td>Username:</td><td><input type="text" id="username" name="username" placeholder="Enter Username"></td></tr>
<tr> <td><input type="submit" value="view profile" name="submit"></td></tr>
<h2>  <?php echo $username; ?>User profile:</h2></br>
<table>
<tr><td>User_id:</td><td><?php echo $user_id; ?></td><tr>
<tr><td>Username:</td><td><?php echo $username; ?></td><tr>
<tr><td>BloodType:</td><td><?php echo $bloodtype; ?></td><tr>
<tr><td>Age:</td><td><?php echo $age; ?></td><tr>
<tr><td>Area:</td><td><?php echo $area; ?></td><tr>
<tr><td>Email:</td><td><?php echo $email; ?></td><tr>
<tr><td>Gender:</td><td><?php echo $gender; ?></td><tr>
<tr><td>Phone Number:</td><td><?php echo $phonenumber; ?></td><tr>


<body style="background-color:#E6E6FA">
</body>
</html>