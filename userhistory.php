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
$sqlh="SELECT * FROM registrationform INNER JOIN submitrequest " ;
$result=mysqli_query($conn,$sqlh);
?>
<!DOCTYPE html>  
 <html>  
  
      <head>  
           
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
	   <body style="background-color:#E6E6FA">
           <br />  
           <div class="container" style="width:500px;">  
              <u>  <h3 align="">User History:</h3><br /></u>                 
                <div class="table-responsive">  
                     <table class="table table-striped">  
                          <tr>  
                               <th>Request Number</th>  
                               <th>User Id</th>
                               <th>Username</th>					   
                          </tr>  
                          <?php  
                          if(mysqli_num_rows($result) > 0)  
                          {  
                               while($row = mysqli_fetch_array($result))  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $row["request_id"];?></td>  
                               <td><?php echo $row["user_id"]; ?></td>  
							   <td><?php echo $row["username"];?></td> 
                          </tr>  
                          <?php  
                               }  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
           <br />  
      </body>  
 </html>  