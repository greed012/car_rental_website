<?php
require_once "config.php";
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

require '../header.php';


?>


<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<br><br><br>
<br><br><br>
<table>
  <tr>
    <th>User_id</th>
    <th>Car_model</th>
    <th>Arrival_date</th>
    <th>Return_date</th>
    <th>Email</th>
    <th>Phone number</th>
  </tr>

  
<?php
        $query = "SELECT user_id,car_model,arrival_date,return_date ,phone_number,email_address from booking_db";
        $result = mysqli_query($conn, $query);
 
        while ($data = mysqli_fetch_assoc($result)) {
    ?>
  <tr>
    <td><?php echo $data['user_id'];?></td>
    <td><?php echo $data['car_model'];?></td>
    <td><?php echo $data['arrival_date'];?></td>
    <td><?php echo $data['return_date'];?></td>
    <td><?php echo $data['email_address'];?></td>
    <td><?php echo $data['phone_number'];?></td>
  </tr>

  <?php } ?>
</table>

</body>
</html>

