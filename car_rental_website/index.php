<?php
session_start();
// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["user_loggedin"]) && $_SESSION["user_loggedin"] === true) {
    require_once "config.php";?>
    
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
    <link rel="stylesheet" href="style.css">

</head>
<body>
    
<!-- header section starts  -->

<header>

    <div id="menu-bar" class="fas fa-bars"></div>

    <a href="index.php" class="logo"><span>EZY </span> Rentals</a>

    <nav class="navbar">
        <a href="index.php">home</a>
        <a href="#book">book</a>
        <a href="#shop">shop</a>
        <a href="#services">services</a>
        <a href="#gallery">gallery</a>
        <a href="#contact">contact</a>
        <a href="admin_panel/login.php">admin</a>
    </nav>
    <div class="icons">
        <i class="fas fa-search" id="search-btn"></i>
        <a href="#"><i class="fas fa-user" id="login-btn"></i></a>
       <p style="color:white;margin-left:40%;font-size:18px;font-weight:bold;"> <?php echo  $_SESSION['user_username']; ?></p></div>
       <a href="user_logout.php" style="color: white;font-size:15px;margin:0;padding:0">Logout</a>
    <form action="" class="search-bar-container">
        <input type="search" id="search-bar" placeholder="search....">
        <label for="search-bar" class="fas fa-search"></label>

        
    </form>

</header>

<!-- header section ends -->

S<!-- home section starts  -->

<section class="home" id="home">

     <div class="content">
        <h3>adventure is worthwhile</h3>
        <p>Life is a race, Drift now.</p>
        <a href="#discover" class="btn">discover more</a>
    </div>

    <div class="controls">
        <span class="vid-btn active" data-src="images/carvid1.mp4"></span>
        <span class="vid-btn" data-src="images/carvid2.mp4"></span>
        <span class="vid-btn" data-src="images/carvid3.mp4"></span>
        <span class="vid-btn" data-src="images/carvid4.mp4"></span>
        <span class="vid-btn" data-src="images/carvid5.mp4"></span>
    </div>

    <div class="video-container">
        <video src="images/carvid1.mp4" id="video-slider" loop autoplay muted></video>
    </div>

</section>

<!-- home section ends -->

<!-- gallery section starts  -->

<section class="gallery" id="gallery">

    <h1 class="heading">
        <span>g</span>
        <span>a</span>
        <span>l</span>
        <span>l</span>
        <span>e</span>
        <span>r</span>
        <span>y</span>
    </h1>

    <div class="box-container">

        <div class="box">
            <img src="images/c1.jpeg" alt="">
            <div class="content">
                <h3>Amazing Car</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                <a href="#" class="btn">see more</a>
            </div>
        </div>
        <div class="box">
            <img src="images/c2.jpg" alt="">
            <div class="content">
                <h3>Amazing Car</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                <a href="#" class="btn">see more</a>
            </div>
        </div>
        <div class="box">
            <img src="images/c3.jpg" alt="">
            <div class="content">
                <h3>Amazing Car</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                <a href="#" class="btn">see more</a>
            </div>
        </div>
        <div class="box">
            <img src="images/c4.jpg" alt="">
            <div class="content">
                <h3>Amazing Car</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                <a href="#" class="btn">see more</a>
            </div>
        </div>
        <div class="box">
            <img src="images/c5.jpg" alt="">
            <div class="content">
                <h3>Amazing Car</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                <a href="#" class="btn">see more</a>
            </div>
        </div>
        <div class="box">
            <img src="images/c6.jpg" alt="">
            <div class="content">
                <h3>Amazing Car</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                <a href="#" class="btn">see more</a>
            </div>
        </div>
        <div class="box">
            <img src="images/c7.jpg" alt="">
            <div class="content">
                <h3>Amazing Car</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                <a href="#" class="btn">see more</a>
            </div>
        </div>
        <div class="box">
            <img src="images/c8.jpg" alt="">
            <div class="content">
                <h3>Amazing Car</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                <a href="#" class="btn">see more</a>
            </div>
        </div>
        <div class="box">
            <img src="images/c9.jpg" alt="">
            <div class="content">
                <h3>Amazing Interior</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                <a href="#" class="btn">see more</a>
            </div>
        </div>

    </div>

</section>

<!-- gallery section ends -->

<!-- book section starts  -->

<section class="book" id="book">

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

        <div class="image">
            <img src="images/tesla.jpg" alt="" height="570px">
        </div>

        <form action="">
            <div class="inputBox">
                <h3>Model Name</h3>
                <input type="text" placeholder="Car Model">
            </div>
            <div class="inputBox">
                <h3>Number</h3>
                <input type="number" placeholder="Your Phone Number">
            </div>
            <div class="inputBox">
                <h3>arrival date</h3>
                <input type="date">
            </div>
            <div class="inputBox">
                <h3>return date</h3>
                <input type="date">
            </div>
            <div class="inputBox">
                <h3>Email Adress</h3>
                <input type="text" placeholder="Enter Your E-mail">
            </div>
            <input type="submit" class="btn" value="book now">
        </form>

    </div>

</section>

<!-- book section ends -->

<!-- services section starts  -->

<section class="services" id="services">

    <h1 class="heading">
        <span>s</span>
        <span>e</span>
        <span>r</span>
        <span>v</span>
        <span>i</span>
        <span>c</span>
        <span>e</span>
        <span>s</span>
    </h1>

    <div class="box-container">

        <div class="box">
            <i class="fas fa-car"></i>
            <h3>Cars</h3>
            <p>We hace all the cars you can think of in our inventory. All top grade and certified authetic cars are available.</p>
        </div>
        <div class="box">
            <i class="fas fa-hammer"></i>
            <h3>Repair & Maintenance</h3>
            <p>Repairing and Maintaing your car is free of cost for the 1st year and in the remaining years you shall receive a hefty discount.</p>
        </div>
        <div class="box">
            <i class="fas fa-bullhorn"></i>
            <h3>safety guide</h3>
            <p>We offer safety mechanism within the car to prevent and protect you from crashes. All of which has been verified before hand by out top engineers.</p>
        </div>
        <div class="box">
            <i class="fas fa-globe-asia"></i>
            <h3>around the world</h3>
            <p>We have Branches all over the world for the ease of purchase and service & maintenance.</p>
        </div>
        <div class="box">
            <i class="fas fa-money-bill"></i>
            <h3>Affortable Prices</h3>
            <p>Get deals so cheap you think that it is a scam. We offer the best deals by having affliate with the companies themselves.</p>
        </div>
        <div class="box">
            <i class="fas fa-certificate"></i>
            <h3>certification</h3>
            <p>Authentic Products that have from the manufacturers, so you can be assured that out products are genuine. </p>
        </div>

    </div>

</section>

<!-- services section ends -->

<!-- packages section starts  -->

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
    <img src="admin_panel/uploads/images/<?php echo $data['file__name']; ?>">
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
                <a href="book.php?id=<?php echo $data['id']?>" class="btn">Book now</a>
            </div>
        </div>

       
 
    <?php
        }
    ?>

    </div>
</section>

<!-- services section ends -->


<!-- contact section starts  -->

<section class="contact" id="contact">
    
    <h1 class="heading">
        <span>c</span>
        <span>o</span>
        <span>n</span>
        <span>t</span>
        <span>a</span>
        <span>c</span>
        <span>t</span>
    </h1>

    <div class="row">

        <div class="image">
            <img src="images/drift.jpg" alt="">
        </div>

        <form action="">
            <div class="inputBox">
                <input type="text" placeholder="name">
                <input type="email" placeholder="email">
            </div>
            <div class="inputBox">
                <input type="number" placeholder="number">
                <input type="text" placeholder="subject">
            </div>
            <textarea placeholder="message" name="" id="" cols="30" rows="10"></textarea>
            <input type="submit" class="btn" value="send message">
        </form>

    </div>
    
</section>

<!-- contact section ends -->

<!-- footer section  -->

<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>about us</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda quas magni pariatur est accusantium voluptas enim nemo facilis sit debitis.</p>
        </div>
        <div class="box">
            <h3>branch locations</h3>
            <a href="#">Australia</a>
            <a href="#">USA</a>
            <a href="#">japan</a>
            <a href="#">france</a>
        </div>
        <div class="box">
            <h3>quick links</h3>
            <a href="#">home</a>
            <a href="#">book</a>
            <a href="#">packages</a>
            <a href="#">services</a>
            <a href="#">gallery</a>
            <a href="#">contact</a>
        </div>
        <div class="box">
            <h3>follow us</h3>
            <a href="#">facebook</a>
            <a href="#">instagram</a>
            <a href="#">twitter</a>
            <a href="#">linkedin</a>
        </div>

    </div>

    <h1 class="credit"> created by <span>Ezy Rentals </span> | all rights reserved! </h1>

</section>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="script.js"></script>

</body>
</html><?php 
}else{
    header("location: user_login.php");

}
?>   

