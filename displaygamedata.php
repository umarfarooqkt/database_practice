<?php
$query='SELECT * FROM Game';
  $result = pg_query($query);
  if (!$result) {
     die ("Database query failed!");
  }
 echo "Game data</br>";
  while ($row = pg_fetch_array($result)) {
     echo("<tr>");
     echo '<td class="text-left">' . $row["gameid"] . "</td>" . '<td class="text-left">' . $row["gamecity"] . "</td>" . '<td class="text-left">' . $row["gamedate"] ."</td>". '<td class="text-left">' . $row["headoff"] ."</tr>" ;
   }
  pg_free_result($result);
?>