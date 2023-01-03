<?php
//database
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
	
                $bloodtype=mysqli_real_escape_string($conn,$_POST['bloodtype']);
                $hospitalname=mysqli_real_escape_string($conn,$_POST['hospitalname']);
                $area=mysqli_real_escape_string($conn,$_POST['area']);
                $contactnumber=mysqli_real_escape_string($conn,$_POST['contactnumber']);
                $numberofpackets=mysqli_real_escape_string($conn,$_POST['numberofpackets']);
				
$submit_query="INSERT INTO `submitrequest`(`bloodtype`,`hospitalname`,`area`,`contactnumber`,`numberofpackets`) VALUES ('$bloodtype','$hospitalname','$area','$contactnumber','$numberofpackets')";


try{
$submit_result = mysqli_query($conn, $submit_query);
if($submit_result){
if(mysqli_affected_rows($conn)>0){
echo(" request have been successfully submited");
}else{
echo("error in submission");
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
<title>submition form</title>
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
<td>Blood Type</td>
<td><input type="text" name="bloodtype" placeholder="enter your blood type"></td>
</tr>
<tr>
<td>Area</td>
<td><input type="text" name="area" placeholder="enter your area"></td>
</tr>
<tr>
<td>Hospital Name:</td>
<td><input type="text" name="hospitalname" placeholder="enter your hospital name"></td>
</tr>
<tr>
<td>ContactNumber</td>
<td><input type="text" name="contactnumber" placeholder="enter your contact number"></td>
</tr>
<tr>
<td>Number Of Packets:</td>
<td><input type="tel" name="numberofpackets" placeholder="enter numberofpackets"></td>
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
<td></td>
<td><a href="filter.php"><input type="submit" name="submit" value="Submit"></td>
</tr>
<tr>
<td></td>
<td><tr>
<td></td>
<td>
</tr>
</table>
</form>
</body>
</html>