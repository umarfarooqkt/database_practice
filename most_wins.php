<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Assignment3</title>
</head>
<body>
<?php
  include 'connectdb.php';
  $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
  echo "<a href='$url'>back</a>";
?> 
<?php
	
// this is the query for officials with the most WINS
$query="SELECT officialid,z.firstname,z.lastname,
             COUNT(officialid) AS value_occurrence
        FROM     ( SELECT o.officialid,firstname,lastname 
	FROM official o, (SELECT officialid 
	FROM reffing r,(SELECT a.gameid FROM playing a,(
	SELECT * FROM playing WHERE teamid='12') AS foo 
	WHERE foo.score > a.score AND NOT a.teamid ='12' AND foo.gameid=a.gameid) AS doo 
	WHERE doo.gameid=r.gameid) AS coo 
	WHERE coo.officialid=o.officialid) AS z
    	GROUP BY officialid,z.firstname,z.lastname
    	ORDER BY value_occurrence DESC";
  
  $result = pg_query($query);
  if (!$result) {
     die ("Database query failed!");
  }
// this check makes sure that all of the officials with the same top occurence be displayed
$check=0;
while($row = pg_fetch_array($result)){
if($check > $row["value_occurrence"]){
break; // well this makes sure to break when freq is lower
}
echo "<li>".$row["firstname"]." ".$row["lastname"];
$check=$row["value_occurrence"];
}

pg_free_result($result);
?>
<?php
   pg_close($connection);
?> 
</body>
</html>