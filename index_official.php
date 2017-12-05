<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Assignment3</title>
</head>
<body>
<?php
  include 'connectdb.php';
?> 

<h2>The Officials are</h2>

<h3>Ordered last name </h3>
<table class="table-fill">
<thead>
<tr>
<th class="text-left">Official ID</th>
<th class="text-left">Official first name</th>
<th class="text-left">Official last name</th>
<th class="text-left">Home city</th>
</tr>
</thead>
<tbody class="table-hover">
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
</tbody>
</table>

<?php
   pg_close($connection);
?>
</body>
</html>