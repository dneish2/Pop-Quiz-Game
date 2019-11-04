<?php
session_start();
require('dbconfig.php');
require('db.php');

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $user = $_SESSION['loggedInUser'];
  $sql = mysqli_query($conn, "DELETE FROM user WHERE username='loggedInUser'");

  if (mysqli_query($conn, $sql))
  {
    echo "You've Been Deleted, if you want to continue playing, make a new account";
    session_destroy();
      header('Location: login.php');
  }
  else {
    die("Mission Report...We have to dig deeper");
  }
  mysqli_close($conn);
}
 ?>
