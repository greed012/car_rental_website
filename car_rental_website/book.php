<?php

session_start();
require "header2.php";
$id = $_GET['id'];
if (isset($_SESSION["user_loggedin"]) && $_SESSION["user_loggedin"] === true) {
    require_once "config.php"; ?>



    <?php
    require_once "config.php";


    //to prevent from mysqli injection  
    function protect($data)
    {
        $data = stripslashes($data);
        $data = mysqli_real_escape_string($GLOBALS['conn'], $data);
        return $data;
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty(trim($_POST["brand"]))) {
            $brand_err = "Please enter brand name.";
        } else {
            $brand = trim($_POST["brand"]);
            $brand = protect($brand);
        }

        if (empty(trim($_POST["phone"]))) {
            $phone_err = "Please enter phone";
        } else {
            $phone = trim($_POST["phone"]);
            $phone = protect($phone);
        }

        if (empty(trim($_POST["arrival_date"]))) {
            $arrival_err = "Please enter arrival date";
        } else {
            $arrival_date= trim($_POST["arrival_date"]);
            $arrival_date= protect($arrival_date);
        }

        
        if (empty(trim($_POST["return_date"]))) {
            $return_err = "Please enter return date";
        } else {
            $return_date= trim($_POST["return_date"]);
            $return_date= protect($return_date);
        }
        if (empty(trim($_POST["email"]))) {
            $email= "Please enter return date";
        } else {
            $email= trim($_POST["email"]);
            $email= protect($email);
        }
    }
 // Get all the submitted data from the form

 if (empty(trim($_POST["brand"])) || empty(trim($_POST["phone"])) || empty(trim($_POST["arrival_date"])) || empty(trim($_POST["return_date"])) || empty(trim($_POST["email"]))) {
    echo "The fields are empty";
} else {
    $user_id = $_SESSION['user_id'];
    // Database entry add a car database
    $sql = "INSERT INTO booking_db (user_id,car_model,phone_number, arrival_date, return_date, email_address) VALUES ('$user_id','$brand','$phone','$arrival_date','$return_date', '$email')";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        
        //redirect to dashboard
        header("location: index.php");

    

            }
        } 

    ?>
    <!-- book section starts  -->
    <link rel="stylesheet" href="style.css">
    <section class="book" id="book">
        <br><br>
        <h1 class="heading">
            <span>b</span>
            <span>o</span>
            <span>o</span>
            <span>k</span>
            <span class="space"></span>
            <span>n</span>
            <span>o</span>
            <span>w</span>
        </h1>

        <div class="row">
            <?php
            $query = "SELECT id,file__name,descr,actual_price,discounted_price,brand,colour from car_db WHERE id='$id'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            ?>



            <div class="image">
                <img src="admin_panel/uploads/images/<?php echo $row['file__name'] ?>" alt="" height="570px">
            </div>

            <form action="" method="POST">
                <div class="inputBox">
                    <h3>Model Name</h3>
                    <input type="text" readonly="readonly" name="brand" placeholder="Car Model" value="<?php echo $row['brand'] ?>">
                </div>
                <div class="inputBox">
                    <h3>Number</h3>
                    <input type="number" placeholder="Your Phone Number" name="phone">
                </div>
                <div class="inputBox">
                    <h3>arrival date</h3>
                    <input type="date" name="arrival_date">
                </div>
                <div class="inputBox">
                    <h3>return date</h3>
                    <input type="date" name="return_date">
                </div>
                <div class="inputBox">
                    <h3>Email Adress</h3>
                    <input type="text" name="email" placeholder="Enter Your E-mail">
                </div>
                <input type="submit" class="btn" value="book now">
            </form>

        </div>


    <?php
} else {
    header("location: user_login.php");
}
    ?>