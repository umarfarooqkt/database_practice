<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Assignment3</title>
</head>
<body>
<?php
  include 'connectdb.php';
?> 

<h2>Coming to you Live this friday the 13</h2>

<h3>The curse of the Maple!!!</h3>

<p><hr><p>
<form action="curse_info.php" method="post">
  <input type="radio" name="answer" value="score"> leafs games statistics<br>
  <input type="radio" name="answer" value="officiated">official who has officiated the most Leafs games<br>
  <input type="radio" name="answer" value="losses">official who had officiated the most Leaf losses<br>
  <input type="radio" name="answer" value="wins">official who has officiated the most Leaf wins<br>
<input type="submit" value="get Info">
</form>


<p><hr><p>

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



<?php
   pg_close($connection);
?> 
</body>
</html>
