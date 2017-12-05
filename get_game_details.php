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
  $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
  echo "<a href='$url'>back</a>";
?> 

<h2>Game details</h2>

<table style="width:20%">
<thead>
<tr>
<th class="text-left">Game City</th>
<th class="text-left">Game Date</th>
<th class="text-left">Team name</th>
<th class="text-left">Team City</th>
<th class="text-left">Score</th>
</tr>
</thead>
<tbody class="table-hover">
<?php
$gid=$_POST["game"];
$query="SELECT gamecity,gamedate,headoff FROM Game WHERE gameid='$gid'";
  $result = pg_query($query);
  if (!$result) {
     die ("Database query failed!");
  }
$row = pg_fetch_array($result);
$headofficial=$row["headoff"];
echo("<tr>");
echo "<td>".$row["gamecity"]."</td>"."<td>".$row["gamedate"]."</td>";
pg_free_result($result);

$query1="SELECT teamname,teamcity,score FROM (SELECT * FROM Team JOIN Playing ON Team.teamid=Playing.teamid WHERE gameid='$gid') AS Foo ";
  $result1 = pg_query($query1);
  if (!$result1) {
     die ("Database query failed!");
  }


$row1 = pg_fetch_array($result1);
$row1_2 = pg_fetch_array($result1);
if($row1["score"] > $row1_2["score"]){
echo '<td bgcolor="#00FF00">' . $row1["teamname"] . "</td>" . "<td>" . $row1["teamcity"] . "</td>" . "<td>" . $row1["score"] . "</td>"."</tr>"."<tr>";
echo "<td>"."</td>"."<td>"."</td>"."<td>" . $row1_2["teamname"] . "</td>" . "<td>" . $row1_2["teamcity"] . "</td>" . "<td>" . $row1_2["score"] . "</td>"."</tr>";
}
else{
echo "<td>" . $row1["teamname"] . "</td>" . "<td>" . $row1["teamcity"] . "</td>" . "<td>" . $row1["score"] . "</td>"."</tr>"."<tr>";
echo "<td>"."</td>"."<td>"."</td>".'<td bgcolor="#00FF00">' . $row1_2["teamname"] . "</td>" . "<td>" . $row1_2["teamcity"] . "</td>" . "<td>" . $row1_2["score"] . "</td>"."</tr>";
}

pg_free_result($result1);
echo "</tbody>"."</table>";

$query2="SELECT * FROM Official JOIN Reffing ON Reffing.officialid=Official.officialid WHERE gameid='$gid' ORDER BY lastname";
$result2 = pg_query($query2);
  if (!$result2) {
     die ("Database query failed!");
  }
echo"<p>"."<h3>"."Officials of the game"."</h3>".'<table style="width:20%">';
while($row2=pg_fetch_array($result2)){
if($row2["officialid"] == $headofficial)
echo '<tr bgcolor="#00FF00">'."<td>". $row2["firstname"]."</td>"."<td>".$row2["lastname"]."</td>"."</tr>";
else
echo "<tr>"."<td>". $row2["firstname"]."</td>"."<td>".$row2["lastname"]."</td>"."</tr>";
}
echo"</table>";
pg_free_result($result2);

?>


<?php
   pg_close($connection);
?> 
</body>
</html>