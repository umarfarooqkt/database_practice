<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Assignment3</title>
</head>
<body>
<?php
  include 'connectdb.php';
  $url = 'http://cs3319.gaul.csd.uwo.ca/ufaruq/assignment3/get_data_city.php';
  echo "<a href='$url'>back</a>";
?> 

<br><p>

<?php
$g=$_POST["gid"];
$c=$_POST["city"];

        $query = "UPDATE Game SET gamecity='$c' WHERE gameid='$g'";
        if (!pg_query($query)) 
        die("Error: insert failed-->" . pg_last_error($connection));
        echo "successfully updated city";
     
   
     
?>


<?php
   pg_close($connection);
?> 
</body>
</html>
