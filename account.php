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
$db=mysql_connect('localhost', 'username', 'password');
if(!$db) 
{
	print "Error- Could not connect to MYSQL";
	exit;
}
$er=mysql_select_db("username");
if(!$er)
{
	print "Error- Could not select the yourUserName database";
	exit;
}
$table_exists=mysql_query('user');
if(!$table_exists){
	print "Error- data table doesn't exist";
	exit;
}
print "<h3>$user information</h3><hr /><br />";
$result=mysql_query("select * from  user where username='$user' ");
$row=mysql_fetch_array($result);

print("<form action='account_update.php' method='post'>
Password: <input type='password' name='password' id='password' />
<br/>
Confirm: <input type='password' name='confirm' id='confirm' /> <br/><br/>
Email: <input type='text' name='email' id='email' value='$row[email]' /><br/>     
Address: <input type='text' name='address'  id='address' size='30' value='$row[address]'/> <br/><hr />
<input type='submit' value='Update' name='submit' />
<input type='reset' value='Reset' name='reset' />   
</form>");
}
?>
</body>
</html>
