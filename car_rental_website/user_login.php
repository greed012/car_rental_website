<?php
  require_once "config.php";
  session_start();

  $user = $password = "";
  $username_err = $password_err = $login_err = "";

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

    //to prevent from mysqli injection  
    $user = stripcslashes($user);
    $password = stripcslashes($password);
    $user = mysqli_real_escape_string($conn, $user);
    $password = mysqli_real_escape_string($conn, $password);


    $sql = "SELECT id,username, pass_word FROM costumer_db WHERE username='$user' and pass_word='$password'";

    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
      // output data of each row
      // Store data in session variables
      $_SESSION["user_loggedin"] = true;
      while ($row = mysqli_fetch_assoc($result)) {
        $_SESSION["user_id"] = $row["id"];
        $_SESSION["user_username"] = $row["username"];
      }
      // Redirect user to welcome page
      header("location: index.php");
      // Redirect user to welcome page
    } else {
      // Password is not valid, display a generic error message
      $login_err = "Invalid username or password.<br><br>";
    }
  }

  mysqli_close($conn);

  ?>
  <!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>HTML5 Login Form with validation Example</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="user_login_css.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div id="login-form-wrap" method='POST'>
  <h2>User Login</h2>
  <form id="login-form" method="POST">
    <p>
    <input type="text" id="username" name="username" placeholder="Username" required><i class="validation"><span></span><span></span></i>
    </p>
    <p>
    <input type="password" id="password" name="password" placeholder="Password" required><i class="validation"><span></span><span></span></i>
    </p>
    
    <p>
    <input type="submit" id="login" value="Login">
    </p>
  </form>
  <div id="create-account-wrap">
    <p>Not a member? <a href="user_registration.php">Create Account</a><p>
    <p>Admin? <a href="admin_panel/login.php">Login as admin</a><p>
  </div><!--create-account-wrap-->
</div><!--login-form-wrap-->
<!-- partial -->
  
</body>
</html>
