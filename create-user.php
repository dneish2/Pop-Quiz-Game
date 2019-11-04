<?php
//create-user.php
// 1. Check that the passwords are the xhprof_sample_disable
// 2. Create a user
// 3. Redirect to login
if ($pass != $cpass) {
  header('Location: signup.php');
}
require('db.php');
$hashedPassword = md5($pass);
runSafeQuery(
  "INSERT INTO user (username, password, email, alias)
    VALUES (?,?,?,?)
  ",
  [
    "ssss",
    $name,
    $hashedPassword,
    $email,
    $alias
  //  'https://statics.sportskeeda.com/editor/2018/10/42081-15405387755616-800.jpg' // TODO FIX THIS
  ]
);

runSafeQuery(
  "INSERT INTO game (username)
  VALUES (?)
  ",
  [
    "s",
    $name
  ]
);
header('Location: login.php');
