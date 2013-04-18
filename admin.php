<?php
session_start();
if(!$_SESSION['status']){
  header( "Location:login.php" );
	exit; 
} 
$user=$_SESSION['username'];
$password=$_SESSION['password'];
?>

<?php
if($user!="admin"){
	print("<h3>Sorry! Access denied-- you don't have authority.</h3>");
	exit;
}
if($password!="admin"){
	print("<h3>Sorry! Access denied-- you don't have authority.</h3>");
	exit;
}
?>

<form action='administrator_handle.php' method='post'>
Username:<input type='text' name='username'/>  <br/> 
Password: <input type='password' name='password' id='password' />
<input type='submit' value='Add User' name='submit' />
</form>
<hr/><br/>
<form action='administrator_handle.php' method='post'>
Username:<input type='text' name='username'/>  
<input type='submit' value='Delete User' name='submit' />
<input type='submit' value='Clear User History' name='submit' />
</form>

</body>
</html>
