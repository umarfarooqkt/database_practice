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

<p><hr><p>
<table class="table-fill">
<thead>
<tr>
<th class="text-left">Maple leaf</th>
<th class="text-left">Score</th>
<th class="text-left">Opposing team</th>
<th class="text-left">Home city</th>
<th class="text-left">Score</th>
</tr>
</thead>
<tbody class="table-hover">
<?php
// this is the maples information
$query="SELECT Team.teamid,teamname,teamcity,score,gameid FROM
	Team JOIN (SELECT teamid,score,Playing.gameid FROM 
	Playing JOIN (SELECT gameid FROM
 	Playing WHERE teamid='12') as foo ON Playing.gameid=foo.gameid) as doo 
	ON Team.teamid=doo.teamid WHERE Team.teamid='12' ORDER BY gameid";
  
  $result = pg_query($query);
  if (!$result) {
     die ("Database query failed!");
  }

// these are the teams that played against the maple leaves 
$query2="SELECT Team.teamid,teamname,teamcity,score,gameid FROM
	Team JOIN (SELECT teamid,score,Playing.gameid FROM 
	Playing JOIN (SELECT gameid FROM
 	Playing WHERE teamid='12') as foo ON Playing.gameid=foo.gameid) as doo 
	ON Team.teamid=doo.teamid WHERE NOT Team.teamid='12' ORDER BY gameid";
  
  $result2 = pg_query($query2);
  if (!$result2) {
     die ("Database query failed!");
  }

while($row = pg_fetch_array($result)){
$row2 = pg_fetch_array($result2);
echo "<tr>"."<td>".$row["teamname"]."</td>"."<td>".$row["score"]."</td>"."<td>".$row2["teamname"]."</td>"."<td>".$row2["teamcity"]."</td>"."<td>".$row2["score"]."</td>"."</tr>";
}


pg_free_result($result);
pg_free_result($result2);

?>
</tbody>
</table>


SELECT       officialid,
             COUNT(officialid) AS value_occurrence 
    FROM      (select officialid from reffing join (select gameid from playing where teamid='12') as foo on foo.gameid=reffing.gameid) as doo
    GROUP BY officialid
    ORDER BY value_occurrence DESC
    LIMIT    1;



 select * from official join (SELECT officialid,
             COUNT(officialid) AS freq
    FROM(select officialid from reffing join (select gameid from playing where teamid='12') as foo on foo.gameid=reffing.gameid) as doo
    GROUP BY officialid
    ORDER BY freq ) as name on official.officialid=name.officialid order by freq desc;


SELECT Team.teamid,teamname,teamcity,score,gameid FROM Team JOIN (SELECT teamid,score,Playing.gameid FROM Playing JOIN (SELECT gameid FROM Playing WHERE teamid='12') as foo ON Playing.gameid=foo.gameid) as doo ON Team.teamid=doo.teamid WHERE Team.teamid='12' ORDER BY gameid;


<?php
   pg_close($connection);
?> 
</body>
</html>







select * from official o, (select officialid from reffing r,(select a.gameid from playing a,(select * from playing where teamid='12') as foo where foo.score < a.score and not a.teamid ='12' and foo.gameid=a.gameid) as doo where doo.gameid=r.gameid) as coo where coo.officialid=o.officialid;


/// look at this query for game of the lost game
 select a.gameid from playing a,(select * from playing where teamid='12') as foo where foo.score < a.score and not a.teamid ='12' and foo.gameid=a.gameid;



SELECT       officialid,
             COUNT(officialid) AS value_occurrence 
    FROM     ( select * from official o, (select officialid from reffing r,(select a.gameid from playing a,(select * from playing where teamid='12') as foo where foo.score < a.score and not a.teamid ='12' and foo.gameid=a.gameid) as doo where doo.gameid=r.gameid) as coo where coo.officialid=o.officialid) as z
    GROUP BY officialid
    ORDER BY value_occurrence DESC;
