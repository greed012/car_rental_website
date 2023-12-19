<?php

$id=$_SESSION["id"];

?>



<link rel="stylesheet" href="../style.css">

<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

<!-- font awesome cdn link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


<!-- header section starts  -->

<header>

    <div id="menu-bar" class="fas fa-bars"></div>

    <a href="dashboard.php" class="logo"><span>EZY </span> Rentals</a>

    <nav class="navbar">
        <a href="reset-password.php?id=<?php echo $id ?>">Reset password</a>
        <a href="add_admin.php"> Add Admin</a> 
        <a href="add_car.php"> Add Car</a>
        <a href="Order_list.php">Order List</a>
   
        <a href="logout.php">logout</a>
    </nav>
    <div class="icons">
        <i class="fas fa-user" id="login-btn">&nbsp;&nbsp;<?php echo $_SESSION['username']?></i>
    </div>

</header>


<!-- header section ends -->