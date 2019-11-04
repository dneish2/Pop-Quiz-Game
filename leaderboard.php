<?php
//leaderboard.php
require('header.php');
require('navbar.php');
require('auth.php');
require('dbconfig.php');
//SOON
//require('db.php')
 ?>

 <!DOCTYPE html>

 <h1 id="Leaderboard-Welcome">The Current Leaderboard Stats Are</h1>

 <table border="1">
 <tr>
   <th>Players</th>
   <th>Games Played</th>
   <th>Points</th>
   <th>Winner</th>
 </tr>

 <tr>

<?php

$result = mysqli_query($conn, "SELECT username, points, games FROM game ORDER by points DESC");
$rank = 1;

if (mysqli_num_rows($result) > 0 ) {
  while ($row = mysqli_fetch_assoc($result))
  {
    echo '<tr>';
    echo ("<td>" . $row['username'] . "</td>");
    echo ("<td>" . $row['games'] . "</td>");
    echo ("<td>" . $row['points'] . "</td>");
    if ($rank==1)
    {
      echo "<td>👑</td>";
    }
    else if ($row['points'] == end($row))
    {
      echo "<td>💩</td>";
    }
      else
    {
      echo "<td></td>";
    }
      echo  '</tr>';
      echo "";
          $rank++;
  }


}
else {
  echo "nhgyn";
}




 //</tr>

?>

 </table>



<?php
require('footer.php')
 ?>
