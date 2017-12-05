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

<br><p>

<?php
$tid=$_POST["id"];
   $query1= 'SELECT teamid FROM Team';
   $check=2;
   $result = pg_query($query1);
 if (!$result) {
          die("database query failed.");
   }
 
     while ($row = pg_fetch_array($result)) {
        
         if ($row["teamid"] == $tid ){  
           $query = "DELETE FROM team WHERE teamid='$tid'";
           if (!pg_query($query)) 
        die("Error: insert failed-->" . pg_last_error($connection));
        echo "successfully deleted record";
        $check=1;
         }
     }
     pg_free_result($result);  
     
     if($check != 1 ) 
     echo"Team was not found in our database";
?>


<?php
   pg_close($connection);
?> 
</body>
</html>
