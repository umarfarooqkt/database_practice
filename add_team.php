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
<br>
<p>
<?php
   $tid = $_POST["team_id"];
   $teamName= $_POST["team_name"];
   $teamCity =$_POST["team_city"];
   $query1= 'SELECT teamid FROM Team';
   $result = pg_query($query1);
 if (!$result) {
          die("database query failed.");
   }
 
     while ($row = pg_fetch_array($result)) {
        
         if ($row["teamid"] == $tid ){  
          die("Team already exists or two teams can't have the same id ");
         }
     }
     pg_free_result($result);  

   $query = "INSERT INTO team VALUES('" . $tid. "','" . $teamCity . "','" . $teamName . "');";
   if (!pg_query($query)) {
        die("Error: insert failed-->" . pg_last_error($connection));
    }
   echo "Your Team was added!";
   pg_close($connection);
?>
</body>
</html>
