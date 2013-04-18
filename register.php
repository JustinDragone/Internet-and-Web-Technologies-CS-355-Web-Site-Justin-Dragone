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
	if(!mysql_create_db("username")){
		print "Error- Could not create database";
		exit;
	} 
}
$table_exists=mysql_query('user');
if(!$table_exists){
	mysql_query('create table user(username varchar(20) primary key, 
	password varchar(20) not null , 
	email varchar(30), 
	address varchar(60))');
}
if($p_username==NULL){
	print(" Error--some content you must fill before you submit, please go back to fill again<br />");
	exit;
}
$result=mysql_query("select * from  user where username='$p_username'");
$row_num=mysql_num_rows($result);
if($row_num){
	print "Error- This user name $p_username already exist, please go back to fill again";
	exit;
}
if(($p_password==NULL)||($p_confirm==NULL)){
	print(" Error--some content you must fill before you submit, please go back to fill again<br />");
	exit;
}
else if($p_password!=$p_confirm){
	print(" Error--confirm password wrong, please go back to fill again<br />");
	exit;
}
$p_query = "insert into user 
values('$p_username', '$p_password', '$p_email', '$p_address')";
trim($p_query);
$p_query=stripslashes($p_query);
$result=mysql_query($p_query);

print( "<h3>User <i>$p_username</i>: provide the following information to register:
("<form action='account.php' method='post'>
Username: <input type='username' name='username' id='username' value='$row[username]' />
<br />
Password: <input type='password' name='password' id='password'  />
<br/>
Confirm: <input type='password' name='confirm' id='confirm' /> 
<br />
Email: <input type='text' name='email' id='email' value='$row[email]' /><br/>     
Address: <input type='text' name='address'  id='address' size='30' value='$row[address]'/> <br/><hr />
<input type='submit' value='submit' name='submit' />
</form>");
}

?>
