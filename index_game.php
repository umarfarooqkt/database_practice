<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Assignment3</title>
<style>
td {
    padding: 4px;
}
</style>
</head>
<body>
<?php
  include 'connectdb.php';
?> 

<h2>The Games data</h2>

<table>
<thead>
<tr>
<th class="text-left">Game ID</th>
<th class="text-left">Game City</th>
<th class="text-left">Game Date</th>
<th class="text-left">Head official</th>
</tr>
</thead>
<tbody class="table-hover">
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
</tbody>
</table>


<p>
<hr>
<p>
<h2>Update Game city</h2>
<form action="get_game_city.php" method="post">
Enter Game Id <input type="text" maxlength="2" pattern=".{2,2}"   required title="Only 2 characters accepted" size="2" name="id">
<input type="submit" value="Get Game">
</form>

<p>
<hr>
<p>
<h2>Get Game detail</h2>
<form action="get_game_details.php" method="post">
<?php
   include 'game_data.php';
?>
<input type="submit" value="Get Details">
</form>

<?php
   pg_close($connection);
?> 
</body>
</html>