 <?php
  require_once "config.php";
  session_start();

  // Check if the user is already logged in, if yes then redirect him to welcome page
  if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: dashboard.php");
    exit;
  }

  $user = $password = "";
  $username_err = $password_err = $login_err = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["user"]))) {
      $username_err = "Please enter username.";
    } else {
      $user = trim($_POST["user"]);
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


    $sql = "SELECT id,username,encry_pass FROM admin_user WHERE username='$user' and encry_pass='$password'";

    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
      // output data of each row
      // Store data in session variables
      $_SESSION["loggedin"] = true;
      while ($row = mysqli_fetch_assoc($result)) {
        $_SESSION["id"] = $row["id"];
        $_SESSION["username"] = $row["username"];
      }
      // Redirect user to welcome page
      header("location: dashboard.php");
      // Redirect user to welcome page
    } else {
      // Password is not valid, display a generic error message
      $login_err = "Invalid username or password.<br><br>";
    }
  }

  mysqli_close($conn);

  ?>

</html>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>HTML5 Login Form with validation Example</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="login_style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div id="login-form-wrap">
  <h2>Admin Login</h2>
  <form id="login-form" method="post">
    <p>
    <?php echo "$login_err"; ?>
    Enter your username: <br><input type="text" name="user" id="user" required><i class="validation"><span></span><span></span></i>
    </p>
    <p>
    Enter your password: <br><input type="password" name="password" id="password" required><span></span><span></span></i>
    </p>
    <p>
    <input type="submit" name="login" id="login" value="Login">
    </p>
  </form>
</div><!--login-form-wrap-->
<!-- partial -->
  
</body>
</html>

