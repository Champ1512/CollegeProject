<?php
$servername = "localhost";
$username="root";
$password="";
$dbname="bddb";
try{
$conn = mysqli_connect($servername, $username,$password,$dbname);
echo("successful in connection / <br>");
}catch(MySQLi_Sql_Exception $ex){
echo("error in connection");
}



?>
<html>
<head>
<title>List of Requests</title>
<center>
Blood Requests List: </br>
</center>
<style>
  table {
   border-collapse: collapse;
   width: 100%;
   color: #d96459;
   font-family: space;
   font-size: 25px;
   text-align: left;
     } 
  th {
   background-color: #d96459;
   color: white;
    }
  tr:nth-child(even) {background-color: #f2f2f2}
 </style>
</head>
<body>
 <table>
 <tr>
  <th>Bloodtype</th> 
  <th>Area</th> 
  <th>HospitalName</th>
  <th>ContactNumber</th>
  <th>NumberofPackets</th>
 </tr>
<?php
$conn = mysqli_connect($servername, $username,$password,$dbname);
$share=mysqli_query($conn, 'SELECT * FROM submitrequest');
$resulta=mysqli_query($conn,'SELECT * FROM submitrequest');

  while($row = $share->fetch_assoc()) {
 echo "<tr><td>" . $row["bloodtype"]. "</td><td>" . $row["area"] . "</td><td>"
. $row["hospitalname"]. "</td></tr>". $row["contactnumber"]. "</td><td>" . $row["numberofpackets"]. "</td><td>";
}


 echo "</table>";
if(isset($_POST['search']))
{    
$area = $_POST['area'];

    // search in all table columns
    // using concat mysql function
    $queryf = "SELECT * FROM `submitrequest` WHERE CONCAT(area='beirut')";
    $search_result = filterTable($queryf);
    
}
 else {
    $queryf = "SELECT * FROM `submitrequest`";
    $search_result = filterTable($queryf);
}
function filterTable($queryf)
{
$servername = "localhost";
$username="root";
$password="";
$dbname="bddb";
  $conn = mysqli_connect($servername, $username,$password,$dbname);
 $filter_Result = mysqli_query($conn, $queryf);
    
    return $filter_Result;

}
while($row = mysqli_fetch_array($search_result)){
	echo "<tr><td>" . $row["bloodtype"]. "</td><td>" . $row["area"] . "</td><td>"
. $row["hospitalname"]. "</td></tr>". $row["contactnumber"]. "</td><td>" . $row["numberofpackets"]. "</td><td>";
}
?>
<center>
<form action="requestdisplay.php" method="post">
            <input type="text" name="area" placeholder="Area To Search"><br><br>
			<input type="submit" name="search" value="Filter"><br><br></form>
<a href="submit request.php"><input type="submit" value="submit request">
</center>
<body style="background-color:#E6E6FA">
<td> <br><a href="userprofile.php" class="button">View Profile</a>
<td> <br><a href="login.php" class="button">Logout</a>
</body>
</html>