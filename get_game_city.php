<?php
  include 'connectdb.php';
  $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
  
 echo "<a href='$url'>back</a>"."<p>";

  $gid=$_POST["id"];
  $query="SELECT * FROM Game";
  $check=1;
  $result = pg_query($query);
  if (!$result) {
     die ("Database query failed! game not found");
  }

 while($row = pg_fetch_array($result)){
	if($row["gameid"] == $gid){    
 	echo "Current Game city is " . $row["gamecity"];
        $check=2;
   } 
  }
if($check==1){
die ("There's not game matching this game Id");
}
  pg_free_result($result);

echo "<p>"."<hr>"."<p>"."<h3>Please Enter The New City</h3>".'<form action="change_game_city.php" method="post">';
echo 'Enter New City<input type="text" maxlength="15" pattern=".{0,15}"   required title="Cant have more than 15 characters" size="15" name="city">';
echo "<input type='hidden' name='gid' value='$gid'>".'<input type="submit" value="Update">'."</form>";
?>

<?php
   pg_close($connection);
?> 
