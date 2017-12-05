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
// this is the maples information
$query="SELECT * FROM official JOIN (SELECT officialid,
        COUNT(officialid) AS freq
        FROM(SELECT officialid FROM 
	reffing JOIN (SELECT gameid FROM 
	playing WHERE teamid='12') AS foo ON foo.gameid=reffing.gameid) AS doo
        GROUP BY officialid
        ORDER BY freq ) AS name ON official.officialid=name.officialid ORDER BY freq DESC";
  
  $result = pg_query($query);
  if (!$result) {
     die ("Database query failed!");
  }

$check=0;
while($row = pg_fetch_array($result)){
if($check > $row["freq"]){
break;
}
echo "<li>".$row["firstname"]." ".$row["lastname"];
$check=$row["freq"];
}

pg_free_result($result);
?>
<?php
   pg_close($connection);
?> 
</body>
</html>
