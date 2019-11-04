<?php
    session_start();
    $answer1 = $_POST['question-1-answers'];
    $answer2 = $_POST['question-2-answers'];
    $answer3 = $_POST['question-3-answers'];

    $totalGames = 0;
    $totalPoints = 0;
    $wins = 0;

    if ($answer1 == "A") { $totalPoints++; }
    if ($answer2 == "A") { $totalPoints++; }
    if ($answer3 == "A") { $totalPoints++; }

//Update Profile or Leaderboard for correct answers
    echo "<div id='results'>$totalPoints</div>";

    if ($totalPoints > 0)
    $totalGames++;

    if ($totalPoints == 3)
    $wins++;
//Update Profile and Leaderboard for Games
    echo"<div id='games'>$totalGames</div>";

require('db.php');
?>

<?php
require('dbconfig.php');

$user = $_SESSION['loggedInUser'];
echo $user['username'];
$sql = "UPDATE game
SET points = $totalPoints + points, games = games + $totalGames, wins = $wins+wins WHERE username = " .
"'" . $user['username'] . "'";

if (mysqli_query($conn, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " .mysqli_error($conn);
}

mysqli_close($conn);

 ?>
