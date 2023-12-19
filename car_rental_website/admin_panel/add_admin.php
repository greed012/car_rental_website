<?php
session_start();
require_once "config.php";
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}


$user = $password = $man= "";
$username_err = $password_err = $error = "";
 
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
    if (empty(trim($_POST["user"])) || empty(trim($_POST["password"])) == 1) {
        echo "The fields are empty";
            } else {
                
        $sql = "SELECT id,username,encry_pass FROM admin_user WHERE username='$user'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) >= 1) {
            $error = "The username already exists";
        } else {
            // Database entry add a new admin user
            $sql = "INSERT INTO admin_user (username, encry_pass) VALUES ('$user', '$password')";

            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully";
                //redirect to dashboard
                header("location: dashboard.php");
            }
        }
    }

    mysqli_close($conn);
}

?>

</html>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Car rental</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="login_style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div id="login-form-wrap">
  <h2>New admin</h2>
  <form id="login-form" method="post">
    <p>
    Enter new admin username: <br><input type="text" name="user" id="user" required><i class="validation"><span></span><span></span></i>
    </p><?php echo "$username_err" ?>
    <p>
    Enter admin password: <br><input type="password" name="password" id="password" required><span></span><span></span></i>
    </p><?php echo "$password_err" ?>
    <p>
    <input type="submit" name="login" id="login" value="Create">
    </p>
  </form>
</div><!--login-form-wrap-->
<!-- partial -->
  
</body>
</html>