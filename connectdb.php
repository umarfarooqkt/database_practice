<?php
$dbhost = "dbserver";
$dbuser= "ufaruq";
$dbpass = "xZTd2m7Bjv";
$dbname = "ufaruqassign3";
$connection = pg_connect("host=$dbhost dbname=$dbname user=$dbuser password=$dbpass");
echo "<p>attempting to connect</p>";
if (!$connection) {
     echo "Database Connection Failed" ;
   }
?>


