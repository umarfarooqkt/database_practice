<?php
  $query='SELECT * FROM Game';
  $result = pg_query($query);
  if (!$result) {
     die ("Database query failed!");
  }
  echo "Which game's details do you want </br>";
  while ($row = pg_fetch_array($result)) {
     echo '<input type="radio" name="game" value="';
     echo $row["gameid"];
     echo '">' . $row["gameid"] ."<br>";
   }
  pg_free_result($result);
?>