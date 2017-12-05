<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Assignment3</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
  include 'connectdb.php';
?> 
<h1> Hello welcome to my assignment </h1>
<h2>The Teams are</h2>

<h3>Ordered by Team name </h3>
<form action="http://cs3319.gaul.csd.uwo.ca/ufaruq/assignment3/index.php">
    <input type="submit" value="Order by team name" />
</form>
<table >
<thead>
<tr>
<th class="text-left">Team ID</th>
<th class="text-left">Team Name</th>
<th class="text-left">Team City</th>
</tr>
</thead>
<tbody class="table-hover">
<?php
// this query orders team data using the teams home city
   $query='SELECT * FROM Team ORDER BY Teamcity';
// this is where we actually query the sql statement
  $result = pg_query($query);
// the if statement checks if the query failed and kills the process to display the message with in the die statement
  if (!$result) {
     die ("Database query failed!");
  }
// using echo to output the info directly to php 
 echo "Here are the Teams</br>";
// this while statement goes through the result of the query array by array until the end and displays the required fields from the array 
  while ($row = pg_fetch_array($result)) {
     echo("<tr>");
     echo '<td class="text-left">' . $row["teamid"] . "</td>" . '<td class="text-left">' . $row["teamname"] . "</td>" . '<td class="text-left">' . $row["teamcity"] ."</tr>" ;   }
  pg_free_result($result); // free the variable result which has the data base query
?>
</tbody>
</table>




<p>
<hr>
<p>
<h2> ADD A NEW TEAM:</h2>
<form action="add_team.php" method="post">
New Team's ID: <input type="text" maxlength="2" pattern=".{2,2}"   required title="Only 2 characters accepted" size="2" name="team_id"><br>
New Team's Name: <input type="text" name="team_name"><br>
New Team's City: <input type="text" name="team_city"><br>
<input type="submit" value="Add Team">
</form>

<p>
<hr>
<p>
<h2>DELETE A TEAM</h2>
<form action="delete_team.php" method="post">
Enter Team Id <input type="text" maxlength="2" pattern=".{2,2}"   required title="Only 2 characters accepted" size="2" name="id">
<input type="submit" value="Delete">
</form>

<p>
<hr>
<p>

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
  include 'displaygamedata.php';

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
<input type="submit" class="offset" value="Get Details">
</form>


<p>
<hr>
<p>

<h2>The Officials are</h2>

<h3>Ordered last name </h3>
<table >
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
 include 'displayofficialdata.php';

?>
</tbody>
</table>

<p>
<hr>
<p>

<h2>Coming to you Live this friday the 13</h2>

<h3>The curse of the Maple!!!</h3>


<form action="leaf_score.php" method="post">
 
<input type="submit" value="get score">
</form>

<form action="most_officiated.php" method="post">
 
<input type="submit" value="most officiated">
</form>

<form action="most_loses.php" method="post">
 
<input type="submit" value="loses">
</form>

<form action="most_wins.php" method="post">
 
<input type="submit" value="wins">
</form>


<p>
<hr>
<p>



<?php
   pg_close($connection);
?>
</body>
</html>