<?php
$id=$_SESSION["user_id"];

?>

    

<link rel="stylesheet" href="../style.css">

<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

<!-- font awesome cdn link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


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
        <i class="fas fa-user" id="login-btn">&nbsp;&nbsp;<?php echo $_SESSION['user_username']?></i>
    </div>

</header>


<!-- header section ends -->