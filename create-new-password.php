<main>



		
		
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

	?>
      <form action="reset-password.php"    method="post">
   
		  <input type ="password" name="pwd" placeholder="Enter a new password..">
		  <input type ="password" name="pwd-repeat" placeholder="Repeat new password..">
		  <button type="submit"  name="reset-password-submit">Reset password </button>
		  </form>

        <?php	  
	   
	   
	
	
?>



</main>
