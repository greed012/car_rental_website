<?php
require_once "config.php";
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["user_loggedin"]) && $_SESSION["user_loggedin"] === true) {
  header("location: index.php");
  exit;
}

$user = $password = $email = "";
$username_err = $password_err = $email_err = $login_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty(trim($_POST["username"]))) {
    $username_err = "Please enter username.";
  } else {
    $user = trim($_POST["username"]);
  }

  // Check if password is empty
  if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter your password.";
  } else {
    $password = trim($_POST["password"]);
  }

  // Check if password is empty
  if (empty(trim($_POST["email"]))) {
    $email_err = "Please enter your email.";
  } else {
    $email = trim($_POST["email"]);
  }




  //to prevent from mysqli injection  
  $user = stripcslashes($user);
  $password = stripcslashes($password);
  $email = stripcslashes($email);
  $user = mysqli_real_escape_string($conn, $user);
  $password = mysqli_real_escape_string($conn, $password);
  $email = mysqli_real_escape_string($conn, $email);


  $sql = "INSERT INTO costumer_db (username,pass_word,email)
VALUES ('$user', '$password','$email')";

  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header("location: user_login.php");
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>HTML5 Login Form with validation Example</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="user_login_css.css">

</head>

<body>
  <!-- partial:index.partial.html -->
  <div id="login-form-wrap">
    <h2>User Registration</h2>
    <form id="login-form" method="POST">
      <p>
        <input type="text" id="username" name="username" placeholder="Username" required><i class="validation"><span></span><span></span></i>
      </p>
      <p>
        <input type="email" id="email" name="email" placeholder="Email Address" required><i class="validation"><span></span><span></span></i>
      </p>
      <input type="password" id="password" name="password" placeholder="Password" required><i class="validation"><span></span><span></span></i>
      </p>
      <p>
        <input type="submit" id="login" value="Login">
      </p>
    </form>
    <div id="create-account-wrap">
      <p>Already a member? <a href="user_login.php">Sign In</a>
      <p>
    </div>
    <!--create-account-wrap-->
  </div>
  <!--login-form-wrap-->
  <!-- partial -->

</body>

</html>