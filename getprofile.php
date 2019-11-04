<?php
require('dbconfig.php');

 ?>

 <?php


 $user = $_SESSION['loggedInUser'];
 $sql = "SELECT * FROM game
 WHERE username = " . "'"  . $user['username']  . "'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  //output data fo each row
  $row = mysqli_Fetch_assoc($result);
}
else {
  echo "Houston, we've got a problem...";
}
mysqli_close($conn);


  ?>
