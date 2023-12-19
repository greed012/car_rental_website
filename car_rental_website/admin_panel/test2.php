<?php

require_once "config.php"; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../style.css">

</head>
<body>
    
<!-- header section starts  -->

<header>

    <div id="menu-bar" class="fas fa-bars"></div>

    <a href="#" class="logo"><span>EZY </span> Rentals</a>

    <nav class="navbar">
        <a href="#home">Reset password</a>
        <a href="add_car.php">  Add Car</a>
        <a href="#shop">logout</a>
        <a href="#services">services</a>
        <a href="#gallery">gallery</a>
        <a href="#contact">contact</a>
        <a href="admin_panel/login.php">admin</a>
    </nav>
    <div class="icons">
        <i class="fas fa-search" id="search-btn"></i>
        <i class="fas fa-user" id="login-btn"></i>
    </div>

    <form action="" class="search-bar-container">
        <input type="search" id="search-bar" placeholder="search....">
        <label for="search-bar" class="fas fa-search"></label>
    </form>

</header>

<!-- header section ends -->



<section class="shop" id="shop">

    <h1 class="heading">
        <span>s</span>
        <span>h</span>
        <span>o</span>
        <span>p</span>
    </h1>


    <div class="box-container">
    <?php
        $query = "SELECT id,file__name,descr,actual_price,discounted_price,brand,colour from car_db ";
        $result = mysqli_query($conn, $query);
 
        while ($data = mysqli_fetch_assoc($result)) {
            
    ?>
    
    <div class="box">
    <img src="uploads/images/<?php echo $data['file__name']; ?>">
            <div class="content">
                <h3> <i class="fas fa-map-marker-alt"></i><?php echo $data['brand']; echo "(";echo $data['colour']; echo ")"?></h3>
                <p><?php echo $data['descr']; ?></p>
                <div class="stars"> 
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <div class="price"><?php echo $data['actual_price']; ?> <span><?php echo $data['discounted_price']; ?></span><p class="per_day">Per Day</p></div>
                <a href="edit_car.php? id=<?php echo $data['id']?>" class="btn">Edit</a>
                <a href="delete_car.php?id=<?php echo $data['id']?>" class="btn" style="background-color: #ff3333;">Delete</a>

            </div>
        </div>

       
 
    <?php
        }
    ?>

    </div>
</section>
