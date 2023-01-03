<html>
 <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  #alert_popover
  {
   display:block;
   position:relative;
   top:10px;
   left:5px;
   bottom:10px;
   left:10px;
  }
  .wrapper {
    display: table-cell;
    vertical-align: bottom;
    height: auto;
    width:200px;
  }
  .alert_default
  {
   color: #333333;
   background-color: #f2f2f2f2;
   border-color: #cccccc;
  }
  </style>
 </head>
 <meta charset="utf-8">
<title>submition form</title>
</head>
 
<body>
<meta http-equiv="refresh" content="10">
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
<td>Blood Type:</td>
<td><input type="text" name="bloodtype" placeholder="enter your blood type"></td>
</tr>
<tr>
<td>Area:</td>
<td><input type="text" name="area" placeholder="enter your area"></td> 
</tr>
<tr>
<td>Hospital Name:</td>
<td><input type="text" name="hospitalname" placeholder="enter your hospital name"></td>
</tr>
<tr>
<td>Phone Number:</td>
<td><input type="text" name="phonenumber" placeholder="enter your contact number"></td>
</tr>
<tr>
<td>Units:</td>
<td><input type="tel" name="units" placeholder="enter numberofpackets"></td>
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
<td><a href="display.real.php"><input type="submit" name="submit" value="Submit"></td>
</tr>
<tr>
<td></td>
<td><tr>
<td></td>
<td>
</tr>
</table>
</form>
 <body>
 

<script>
$(document).ready(function(){

 setInterval(function(){
  load_last_notification();
 }, 10000);

 function load_last_notification()
 {
  $.ajax({
   url:"display.real.php",
   method:"POST",
   success:function(data)
   {
    $('.content').html(data);
   }
  })
 }

 $('#requests').on('submit', function(event){
  event.preventDefault();
  if($('#subject').val() != '' && $('#comment').val() != '')
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"display.real.php",
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
<header="display.real.php">
<?php
//fetch.php;
$servername = "localhost";
$username="root";
$password="";
$dbname="blooddonation";
$conn = mysqli_connect($servername, $username,$password,$dbname);
$queryn = "SELECT * FROM requests ORDER BY request_id DESC";
$resultn = mysqli_query($conn, $queryn);
$output = '';
while($row = mysqli_fetch_array($resultn))
{
 $output .= '
 <div class="alert alert_default">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <p><strong>'.$row["bloodtype"].'</strong>
   <small><em>'.$row["area"].'</em></small>
  </p>
   <p><strong>'.$row["hospitalname"].'</strong>
   <small><em>'.$row["phonenumber"].'</em></small>
  </p>
 </div>
 ';
}
$update_query = "UPDATE requests SET request_id= 1 WHERE  request_id= 0";
mysqli_query($conn, $update_query);

echo $output;

?>
