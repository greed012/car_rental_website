<?php
// Initialize the session
session_start();
// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$new_password = $confirm_password = $old_password ="";
$new_password_err = $confirm_password_err = $old_password_err= "";

$param_id = $_SESSION["id"];
// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate new password
    if (empty(trim($_POST["new_password"]))) {
        $new_password_err = "Please enter the new password.";
    } elseif (strlen(trim($_POST["new_password"])) < 6) {
        $new_password_err = "Password must have atleast 6 characters.";
    } else {
        $new_password = trim($_POST["new_password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm the password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($new_password_err) && ($new_password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before updating the database

    if (empty($new_password_err) && empty($confirm_password_err)) {
        // Prepare an update statement
        $sql = "UPDATE admin_user SET encry_pass = '$new_password' WHERE id =$param_id";
        if (mysqli_query($conn, $sql)) {
            echo "Record updated successfully";
            session_destroy();
            header("location: login.php");
            exit();
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }

    // Close connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
<style>
        body {
            font: 25px sans-serif;
        }

        .wrapper {
            margin-left: 10%;
            width: 80%;
            padding: 20px;
        }
    </style>
</head>

<body>
<?php require '../header.php'; ?>
<br><br><br>
    <div class="wrapper">
        <h2>Reset Password</h2>
        <p>Please fill out this form to reset your password.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <div class="form-group">
                
                <label>New Password</label><?php echo (!empty($new_password_err)) ? 'is-invalid' : ''; ?><br>
                <input type="password" name="new_password" style="width:70%;height:4rem;border: solid;margin-bottom:0.7rem;margin-top:0.7rem;"  value="<?php echo $new_password; ?>">
                <span class="invalid-feedback"><?php echo $new_password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label><?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?><br>
                <input type="password" name="confirm_password" style="width:70%;height:4rem;border: solid;margin-bottom:0.7rem;margin-top:0.7rem;" >
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <a class="btn btn-link ml-2" href="dashboard.php">Cancel</a>
            </div>
        </form>
    </div>
</body>

</html>