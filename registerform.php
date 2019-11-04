<?php
// variables
$nameErr = $passErr = $cpassErr = $aliasErr = $emailErr = "";
$name = $pass = $cpass =$email = $alias = $email = "";

//$con = mysqli_connect("localhost","root","") or die("Unable to connect");
//mysqli_select_db($con, 'popdb');

// check if we're using post
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  //CHECK IF THE NAME IS EMPTY
  if (empty($_POST["name"]))
{
  $nameErr = "Name is required ";
}
else
{
  $name=sanitize_data($_POST["name"]);
  // check if name only contains letters and whitespace
  if (!preg_match("/^[a-zA-Z]*$/",$name))
  {
    $nameErr = "Only letters and white space allowed";
  }
}

// Check if the password is saved, not empty, and sanitize_data
if (empty($_POST["pass"]))
{
  $passErr = "Your password is empty";
}
else
{
  $pass = sanitize_data($_POST["pass"]);
  $pass = $_POST['pass'];
  if (strlen($_POST["pass"]) < '8')
  {
    $passErr = "Your Password Must Contain At Least 8 Characters!";
  }
}

if (empty($_POST["cpass"]))
{
  $cpassErr = "Your confirmed password is empty";
}
else
{
  $cpass = sanitize_data($_POST["cpass"]);
  if ($pass != $cpass)
  {
    $cpassErr = "There is an error with your confirmed password";
  }
}

if (empty($_POST["email"]))
{
  $emailErr = "Email is required";
}
else
{
  $email = sanitize_data($_POST["email"]);
  // check if e-mail address is well-formed
  if (!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
    $emailErr = "Invalid email format";
  }
}


if (empty($_POST["alias"]))
{
  $aliasErr = "An alias is required ";
}
else
{
  $alias=sanitize_data($_POST["alias"]);
  // check if name only contains letters and whitespace
  if (!preg_match("/^[a-zA-Z]*$/",$alias))
  {
    $aliasErr = "Only letters and white space allowed";
  }
}
}
else
{
  die("Damn....");
}

if (!empty($nameErr) || !empty($passErr) || !empty($cpassErr) || !empty($aliasErr) || !empty($emailErr))
{
  echo($nameErr ."\n");
  echo($passErr ."\n");
  echo($cpassErr ."\n");
  echo($aliasErr ."\n");
  echo($emailErr ."\n");
}

//this functions takes in the input data and makes it safe to put into our database
function sanitize_data($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

 ?>

<?php
require('create-user.php');
 ?>
