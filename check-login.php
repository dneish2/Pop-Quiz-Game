<?php
// check-login.php
// 1. Get the user from the DB
// 2. Check their password
// 3. redirect to profile
require('db.php');
$users = runSafeQuery(
  "SELECT * FROM user WHERE username = ?",
  ['s', $_POST['loguser']]
);
$user = reset($users);
if ($user['password'] == md5($_POST['logpass'])) {
  session_start();
  $_SESSION['loggedInUser'] = $user;
  $_SESSION["authenticated"] = 'true';
  header('Location: index.php');
  header('Location: play.php');
  header('Location: profile.php');
  header('Location: leaderboard.php');
} else {
  echo "Login failed";
  header('Location: login.php');
}
