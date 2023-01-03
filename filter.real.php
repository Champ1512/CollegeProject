<html>
<body>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<td> <br><a href="userprofile.php" class="button">View Profile</a> <td> <br> 

 <td> <br><a href="login.php" class="button">Logout</a> <br>
<td> <br><a href="userhistory.php" class="button">User History</a>
</body>
</html>
<html>
<head>
<title>List of Requests</title>
<center><u><font size="15px">
Blood Requests List: </font></br></u>

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
  <th>Options</th>
  <th>Donators</th>
  <th>Delete</th>
 </tr>

 <body style="background-color:#E6E6FA">
 <input type="text" name="area" placeholder="Area To Search">
 <form action="filter.php" method="post">
<input type="submit" name="search" value="Filter"><br><br></form>
<a href="submit request.php"><input type="submit" value="submit request">
</center>
</html>
 <?php
 //filter
 if(isset($_POST['search']))
{    
$search = $_POST['search'];

    // search in all table columns
    // using concat mysql function
    $queryfb = "SELECT * FROM `requests` WHERE CONCAT(area='beirut')";
	
    $search_result = filterTable($queryfb);
	
    
}
 else {
    $queryfb = "SELECT * FROM `requests`";
	$queryft = "SELECT * FROM `requests`";
    $search_result = filterTable($queryfb);
	
}
 


 function filterTable($queryfb)
{
$servername = "localhost";
$username="root";
$password="";
$dbname="blood donation";
  $conn = mysqli_connect($servername, $username,$password,$dbname);
 $filter_Result = mysqli_query($conn, $queryfb);
 
    
    return $filter_Result;

//filter
}
   
   while($row= mysqli_fetch_array($search_result)) {
    echo "<tr><td>" . $row["bloodtype"]. "</td><td>" . $row["area"] . "</td><td>"
. $row["hospitalname"]. "</td><td>". $row["contactnumber"] . "</td><td>". $row["numberofpackets"] . "</td><td><button>Donate</button>"."</td><td><span>0</span></td><td>";
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<html>

 <head>
 </head>
 <body>


  <span id='count'></span>
 <script>
 $button = document.querySelector('button');
 $span = document.querySelector('span');

 function increment(){
	 $span.innerHTML++;

 }
 $button.addEventListener('click',increment);
 </script>
 </body>
 </html>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 <html>
 <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  #alert_popover
  {
   display:block;
   position:absolute;
   bottom:10px;
   left:10px;
  }
  .wrapper {
    display: table;
    vertical-align: left;
    height: auto;
    width:100px;
  }
  .alert_default
  {
   color: #333333;
   background-color: #f2f2f2f2;
   border-color: #cccccc;
  }
  </style>
 </head>

 
 
 
 
 <script>
$(document).ready(function(){

 setInterval(function(){
  load_last_notification();
 }, 10000);

 function load_last_notification()
 {
  $.ajax({
   url:"filter.php",
   method:"POST",
   success:function(data)
   {
    $('.content').html(data);
   }
  })
 }

 $('#submitrequest').on('submit', function(event){
  event.preventDefault();
  if($('#subject').val() != '' && $('#comment').val() != '')
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"filter.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     $('#comment_form')[0].reset();
    }
   })
  }
  else
  {
   alert("Both Fields are Required");
  }
 });
});
</script>
<?php
//fetch.php;
$servername = "localhost";
$username="root";
$password="";
$dbname="blood donation";
$conn = mysqli_connect($servername, $username,$password,$dbname);
$queryn = "SELECT * FROM requests ORDER BY request_id DESC";
$resultn = mysqli_query($conn, $queryn);
$output = '';
while($row = mysqli_fetch_array($resultn))
{
 $output .= '
 <div class="alert alert_default">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 <p>New Request:</p>
  <p><strong>'.$row["bloodtype"].'</strong>
   <small><em>'.$row["area"].'</em></small>
  </p>
   <p><strong>'.$row["hospitalname"].'</strong>
    <small><em>'.$row["contactnumber"].'</em></small>
  </p>
 </div>
 ';
}
$update_query = "UPDATE requests SET request_id= 1 WHERE  request_id= 0";
mysqli_query($conn, $update_query);

echo $output;

?>