<?php
session_start();
if(!$_SESSION['status']){
  header( "Location:login.php" );
	exit; 
} 
$user=$_SESSION['username'];
?>

<?php
import_request_variables('p', 'p_');
$db=mysql_connect('localhost', 'drju0211', 'jlm1059');
if(!$db) 
{
	print "Error- Could not connect to MYSQL";
	exit;
}
$er=mysql_select_db("drju0211");
if(!$er)
{
	print "Error- Could not select the  database";
	exit;
}
if($p_username=='admin'){
	print("Error--You can't add or delete administrator");
	exit;
}
switch($_POST['submit']){
	case 'Clear User History':
		if( empty($_POST['username'])){
			print("<h3>Error--you have to enter username </h3>");
			exit;
		}
		$table_exists=mysql_query('history');
		if(!$table_exists){
			print "Error- history table doesn't exist";
			exit;
		}
		$result=mysql_query("select * from  history where username='$p_username' ");
		$num=mysql_num_rows($result);
		if($num>0 ){
			mysql_query("delete from  history where username='$p_username' ");
			print("<h3>User <i>$p_username</i> history is deleted</h3>");
		}else
			print("<h3>Error--Couldn't find User <i>$p_username</i> history</h3>");
		break;

	case 'Delete User':
		if( empty($_POST['username'])){
			print("<h3>Error--you have to enter username </h3>");
			exit;
		}
		$table_exists=mysql_query('user');
		if(!$table_exists){
			print "Error- user table doesn't exist";
			exit;	
		}
		$result=mysql_query("select * from  user where username='$p_username' ");
		$num=mysql_num_rows($result);
		if($num>0 ){
			mysql_query("delete from  user where username='$p_username' ");
			print("<h3>User <i>$p_username</i> is deleted</h3>");
		}else
			print("<h3>Error--Couldn't find User <i>$p_username</i></h3>");	
			
		$table_exists=mysql_query('history');
		if($table_exists){
			$result=mysql_query("select * from  history where username='$p_username' ");
			$num=mysql_num_rows($result);
			if($num>0 )
				mysql_query("delete from  history where username='$p_username' ");
		}
		break;

	case 'Add User':
		if( empty($_POST['username']) || (empty($_POST['password']))){
			print("<h3>Error--you have to enter username and password</h3>");
			exit;
		}
		$table_exists=mysql_query('user');
		if(!$table_exists){
			print "Error- user table doesn't exist";
			exit;	
		}
		$result=mysql_query("select * from  user where username='$p_username' ");
		$num=mysql_num_rows($result);
		if($num>0 ){
			print "Error- user $p_username already exist";
			exit;		
		}
		mysql_query("insert into user values('$p_username', '$p_password',null,null,null,null)");
		print("<h3>User <i>$p_username</i>  is added</h3>");
		break;
	
}
?>
<p> <br /><hr /><a href="admin.php">
		<i>back </i></a> </p>

</body>
</html>
