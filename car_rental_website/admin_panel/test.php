<?php

require_once "config.php";
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $exp=explode('.',$_FILES['image']['name']);
      $file_ext=strtolower(end($exp));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"uploads/images/".$file_name);
          // Get all the submitted data from the form
   
   $sql = "INSERT INTO images(file_name) VALUES ('$file_name')";

   // Execute query
         mysqli_query($conn, $sql);
         echo "Success";
      }else{
         print_r($errors);
      }
   }

  
 
 
?>
<html>
   <body>
      
      <form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="image" />
         <input type="submit"/>
      </form>
      
      <div id="display-image">
    <?php
        $query = "SELECT file_name from images ";
        $result = mysqli_query($conn, $query);
 
        while ($data = mysqli_fetch_assoc($result)) {
    ?>
        <img src="uploads/images/<?php echo $data['file_name']; ?>">
 
    <?php
        }
    ?>
    </div>


   </body>
</html>