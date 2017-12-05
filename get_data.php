<?php
  $query='SELECT * FROM Team ORDER BY Teamname';
  $result = pg_query($query);
  if (!$result) {
     die ("Database query failed!");
  }
 echo "Here are the Teams</br>";
  while ($row = pg_fetch_array($result)) {
     echo("<tr>");
     echo '<td class="text-left">' . $row["teamid"] . "</td>" . '<td class="text-left">' . $row["teamname"] . "</td>" . '<td class="text-left">' . $row["teamcity"] ."</tr>" ;
   }
  pg_free_result($result);
?>
