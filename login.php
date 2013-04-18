<?php
session_start();
if(isset($_POST['submit'])){
  if( empty($_POST['username']) || (empty($_POST['password']))){
	
	$_SESSION['status'] = false;
	}
	$n=$_POST['username'];
	$p=$_POST['password'];

	$db=mysql_connect('localhost', 'drju0211', 'jlm1059');
	if(!$db) 
	{
		print "Error- Could not connect to MYSQL";
		exit;
	}
	$er=mysql_select_db("yourUserName");
	if(!$er)
	{
		if(!mysql_create_db("drju0211")){
			print "Error- Could not create database";
			exit;
		} 
	}
	$table_exists=mysql_query('user');
	if(!$table_exists){
		print("Error--no user data table");
		exit;
	}
	$query="select * from user where username='$n'  and password='$p' ";
	$result=mysql_query($query);
	$num=mysql_num_rows($result);
	if($num>0 ){

		//put in session vars
		
		$_SESSION['status'] = true;
		$_SESSION['username'] = $n;
		$_SESSION['password'] = $p;
		$_SESSION['history'] = NULL;
		
		
		 header("location: http://".$_SERVER['HTTP_HOST'].
			 dirname($_SERVER['PHP_SELF']). "/login.php");
         exit();
	}else{
		$_SESSION['status'] = false;
		
	}
}
?>

<?php
if(!$_SESSION['status']){
	print("<h3>log in failed, please try again</h3><br/><hr/><br/>");
}
?> 
<p><form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	User name: <input type="text" name="username" id="username" /> 
	</p><br/>
	<p>
	Password: <input type="password" name="password" id="password" />   
	<input type="submit" value="Log in" name="submit" />
	</form> </p>
</div></div>
</body>
</html>
