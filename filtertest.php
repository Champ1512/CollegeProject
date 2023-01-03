<!DOCTYPE html>
<html>
<head>
 <title>Table with database</title>
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
  <th>Hospital Name</th>
  <th>ContactNumber</th>
  <th>NumberOfPackets</th>

  
 </tr>
 <?php
 $servername = "localhost";
$username="root";
$password="";
$dbname="bddb";
  $conn = mysqli_connect($servername, $username,$password,$dbname);
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  } 
  $sql = "SELECT bloodtype, area, hospitalname, contactnumber, numberofpackets FROM submitrequest";
  $resulta = $conn->query($sql);
  if ($resulta->num_rows > 0) {
   // output data of each row
   while($row= $resulta->fetch_assoc()) {
    echo "<tr><td>" . $row["bloodtype"]. "</td><td>" . $row["area"] . "</td><td>"
. $row["hospitalname"]. "</td><td>". $row["contactnumber"] . "</td><td>". $row["numberofpackets"] . "</td><td>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>

</table>
</body>
</html>