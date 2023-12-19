<?php
require_once "config.php";
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}


//to prevent from mysqli injection  
function protect($data)
{
    $data = stripslashes($data);
    $data = mysqli_real_escape_string($GLOBALS['conn'], $data);
    return $data;
}

$id = $_GET['id'];
$sql = "SELECT id,brand, colour, discounted_price, actual_price, descr,  file__name FROM car_db WHERE id='$id'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty(trim($_POST["brand"]))) {
        $brand_err = "Please enter brand name.";
    } else {
        $brand = trim($_POST["brand"]);
        $brand = protect($brand);
    }

    if (empty(trim($_POST["colour"]))) {
        $colour_err = "Please enter colour name.";
    } else {
        $colour = trim($_POST["colour"]);
        $colour = protect($colour);
    }

    if (empty(trim($_POST["d_price"]))) {
        $d_price_err = "Please enter discounted price";
    } else {
        $d_price = trim($_POST["d_price"]);
        $d_price = protect($d_price);
    }

    if (empty(trim($_POST["a_price"]))) {
        $a_price_err = "Please enter actual price";
    } else {
        $a_price = trim($_POST["a_price"]);
        $a_price = protect($a_price);
    }

    if (empty(trim($_POST["desc"]))) {
        $desc_err = "Please enter description";
    } else {
        $descr = trim($_POST["desc"]);
        $descr = protect($descr);
    }

    //image_handling

    if (isset($_FILES['image'])) {
        $errors = array();
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $exp = explode('.', $_FILES['image']['name']);
        $file_ext = strtolower(end($exp));

        $extensions = array("jpeg", "jpg", "png", "");
        if (empty($file_name)) {
            $file_name = $row['file__name'];
        }
        $file_name = protect($file_name);
        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        }

        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 5 MB';
        }


        // Get all the submitted data from the form

        if (empty(trim($_POST["brand"])) || empty(trim($_POST["colour"])) || empty(trim($_POST["d_price"])) || empty(trim($_POST["a_price"])) || empty(trim($_POST["desc"]))) {
            echo "The fields are empty";
        } else {
            // Database entry add a car database

            $sql = "UPDATE car_db  SET brand ='$brand' , colour = '$colour', discounted_price = '$d_price', actual_price='$a_price', descr = '$descr',  file__name = '$file_name' where id=$id";

            if (empty($errors) == true) {
                move_uploaded_file($file_tmp, "uploads/images/" . $file_name);
            }

            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully";

                //redirect to dashboard
                header("location: dashboard.php");
            }
        }
    }
}
mysqli_close($conn);


?>
<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

    <?php require '../header.php'; ?>
    <br><br><br><br><br><br>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        * {
            box-sizing: border-box;
            font-size: 1.5rem;
        }

        input[type=text],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: vertical;
        }

        input[type=number] {
            height: 2rem;
        }

        input[type=submit] {
            background-color: #04AA6D;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }

        .form_body {
            width: 70%;
            margin-left: 20%;

        }

        input[name=desc] {
            height: 12rem;
        }
    </style>
    <h1 align="center" style="font-size: 1.9rem;">Edit a new car</h1>

    <div class="container">
        <form method="post" class="form_body" enctype="multipart/form-data">
            <label for="brand">Enter the car brand name</label>
            <input name="brand" id="brand" type="text" value="<?php echo $row['brand'] ?>">


            <label for="colour">Enter the car colour</label>
            <input name="colour" id="colour" type="text" value="<?php echo $row['colour'] ?>">


            <label for="d_price">Enter the discounted car price per day</label>
            <input name="d_price" id="d_price" type="number" style="height: 3rem; border:solid" value="<?php echo $row['discounted_price'] ?>">


            <label for="a_price">Enter the actual price per day</label>
            <input name="a_price" id="a_price" type="number" style="height: 3rem; border:solid" value="<?php echo $row['actual_price'] ?>"> <br><br>


            <label for="desc">Enter the description</label>
            <input name="desc" id="desc" type="text" value="<?php echo $row['descr'] ?>">


            <label for="image">Upload a picture</label>
            <input type="file" name="image" id="image" onchange="loadFile(event)" />

            <?php
            echo "<p id='demo'></p><p><img id='output' width='200'/></p>";
            ?>


            <?php
            if (!isset($_FILES['image']['name'])) {
                $img = $row['file__name']; ?>
            <?php echo "Current image <br><img src= 'uploads/images/$img'";
                echo "width='200'><br><br>";
            } ?>


            <input type="submit" value="submit">
        </form>
    </div>

    <script>
        var loadFile = function(event) {
            var image = document.getElementById('output');
            image.src = URL.createObjectURL(event.target.files[0]);
            document.getElementById("demo").innerHTML = 'New photo';
        };
    </script>

</body>

</html>