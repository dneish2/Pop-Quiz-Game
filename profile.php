<?php
// profile.php
require('header.php');
require('navbar.php');
require('auth.php');
require('getprofile.php');
 ?>

 <section id="profile-content">
  <h1 id="profile-welcome">Welcome To Your Profile</h1>

<img src="https://www.chestnut-tree-house.org.uk/wp-content/uploads/2016/08/Mystery-person-e1470402666366.png" alt="Avatar" class="avatar">

<h1> <?php $user = $_SESSION['loggedInUser'];
echo $user['username']; ?>'s Statistics ... <h1>


  <table border="1">
  <tr>
    <th>Wins</th>
    <th>Games Played</th>
    <th>Points</th>
    <th>Rank</th>
  </tr>
  <tr>

    <td><?php echo $row['wins'] ?></td>
    <td><?php echo $row['games'] ?></td>
    <td><?php echo $row['points'] ?></td>
    <td>Rookie</td>
  </tr>

</table>
</section>

<form action="delete-user.php" method="post" id="deletelog" target="_blank">

<input type="submit" id="username_delete" class ="username_delete"  value="Delete Account / Hide Leaderboard" />
</form>

 <?php
 // profile.php
 require('footer.php');
  ?>
