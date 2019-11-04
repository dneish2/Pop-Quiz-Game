<?php
// login.php
//
require('header.php');
require('navbar.php');
require('dbconfig.php');
 ?>

 <!DOCTYPE html>

   <body>

   <form action="check-login.php" method="post" id="formlog">
   <div>
   Username:<br>
   <input name="loguser" type="text" ><br>
   Password:<br>
   <input name="logpass" type="password">
   </div>
   <input name="btn_log" type="submit" id="btnlog" value="Login" /><br>
   <input type="button" onclick="location.href='signup.php';" value="Register" />
</form>


  </body>




 <?php
 require('footer.php');
  ?>
