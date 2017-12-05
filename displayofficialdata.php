<?php 
$query='SELECT * FROM Official ORDER BY lastname';
  $result = pg_query($query);
  if (!$result) {
     die ("Database query failed!");
  }
  while ($row = pg_fetch_array($result)) {
     echo("<tr>");
     echo '<td class="text-left">' . $row["officialid"] . "</td>" . '<td class="text-left">' . $row["firstname"] . "</td>" . '<td class="text-left">' . $row["lastname"] ."</td>". '<td class="text-left">' . $row["offcity"] ."</td>"."</tr>" ;  
 }
  pg_free_result($result);
?>