<?php
session_start();
$con = mysql_connect("localhost","drju0211","jlm1059");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
if (mysql_select_db("drju0211",$con))
  {
  echo "Database selected";
  };
$sql = "CREATE TABLE cart
(
cart varchar(20)primary key,
product varchar(30) not null
)";
$cart= array();
if(isset($HTTP_SESSION_VARS['cart'])){
 $cart = explode(';', $HTTP_SESSION_VARS['cart']);
}
else{
 $HTTP_SESSION_VARS['cart'] = '';
}
array session_get_cookie_params ( void )
setcookie("$user", time()+5400);

function addItem($product){
 $global $cart;
 $found = 0;
 foreach($cart as $product){
  if($product == $product){$found = 1;}
 }
 if(!$found){
  $cart[] = '$product';
  $HTTP_SESSION_VARS['cart'] = implode(';', $cart);
  return true;
 }
 return false;
}

function removeItem($product){
 global $cart;
 $newcart = array();
 $found = 0;
 foreach($cart as $product){
  if($cart != $product){
   $newcart[] = $product;
  }
  else{
   $found = 1;
  }
 }
 if($found){
  $HTTP_SESSION_VARS['cart'] = implode(';', $newcart);
  return true;
 }
 return false;
}
 $totalitems = count($cart);
 
 ?>
 
 <html>
 <body>
 
 <h2>Cart is empty</h2>
 
 </body>
 </html>
 
