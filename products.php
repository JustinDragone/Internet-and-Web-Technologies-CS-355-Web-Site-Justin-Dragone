<?php
$con = mysql_connect("localhost","drju0211","jlm1059");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
if (mysql_select_db("drju0211",$con))
  {
  echo "Database selected";
  };
 
$sql = "CREATE TABLE games
(
gamename varchar(20)primary key,
gamesystem varchar(15) not null
)";

mysql_query($sql,$con);

mysql_query("INSERT INTO games (gamename, gamesystem)
VALUES ('Uncharted 3', 'PS3')");

mysql_query("INSERT INTO games (gamename, gamesystem)
VALUES ('Infamous 2', 'PS3')");

mysql_query("INSERT INTO games (gamename, gamesystem)
VALUES ('Halo Reach', 'Xbox 360')");

mysql_query("INSERT INTO games (gamename, gamesystem)
VALUES ('Gears of War 3', 'Xbox 360')");

mysql_query("INSERT INTO games (gamename, gamesystem)
VALUES ('Zelda: Skyward Sword', 'Wii')");

mysql_query("INSERT INTO games (gamename, gamesystem)
VALUES ('New Super Mario Bro. Wii', 'Wii')");

mysql_close($con);

?> 

<html>
<body>

<h2>Xbox 360 games</h2>
<img border="0" src="http://xbox360media.ign.com/xbox360/image/article/106/1068688/HaloReach_FOB_9_1265927074.jpg" alt="Halo" width="220" height="220" />
<p>Prequel to the Halo franchise Halo Reach shows the story of spartans before Master Chief.</p>
<p>$60</p>
<form method="cart" action="cart.php">
   <label>Add to cart</label>
    <input id="button" type="submit" name="Add to cart"></input>

<br />
<img border="0" src="http://www.dynos.es/img/juego-xbox-360-gears-of-war-3__GEARSOFWAR3.jpg" alt="Gears" width="220" height="220" />
<p>The epic conclusion to the Gears franchise.</p>
<p>$60</p>
<form method="cart" action="cart.php">
   <label>Add to cart</label>
    <input id="button" type="submit" name="Add to cart"></input>
  
<br />
<h2>Playstation 3 games</h2>
<img border="0" src="http://www.elpe.pt/images/fprod/jogos/ps3/uncharted%203.jpg" alt="Uncharted" width="220" height="220" />
<p>The story of Nathan Drake continues in this epic adventure through the deserts in search of lost treasure.</p>
<p>$60</p>
<form method="cart" action="cart.php">
   <label>Add to cart</label>
    <input id="button" type="submit" name="Add to cart"></input>

<br />
<img border="0" src="http://17woo.tgbusdata.cn/month_1105/11052913559de9d99664ec17c6.jpg" alt="Infamous" width="220" height="220" />
<p>You take control of a superhero with electrical powers to fight crime and save the city. </p>
<p>$60</p>
<form method="cart" action="cart.php">
   <label>Add to cart</label>
    <input id="button" type="submit" name="Add to cart"></input>

<br />
<h2>Nintendo Wii</h2>
<img border="0" src="http://upload.wikimedia.org/wikipedia/en/9/99/Legend_of_Zelda_Skyward_Sword_boxart.png" alt="Zelda" width="220" height="220" />
<p>The adventure of Link continues with his next adventure on Wii.</p>
<p>$50</p>
<form method="cart" action="cart.php">
   <label>Add to cart</label>
    <input id="button" type="submit" name="Add to cart"></input>

<br />
<img border="0" src="http://www.revistagamer.com/wp-content/uploads/2009/09/NewSuperMarioBrosWii1.jpg" alt="Mario" width="220" height="220" />
<p>Mario return in a revisted classic.</p>
<p>$50</p>
<form method="cart" action="cart.php">
   <label>Add to cart</label>
    <input id="button" type="submit" name="Add to cart"></input>
</form>   
</body>
</html>


