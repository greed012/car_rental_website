<?php
    require_once "config.php";
    $id = $_GET['id'];
    echo $id;
	$sql = "DELETE FROM car_db WHERE id='$id' ";

if (mysqli_query($conn, $sql)) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}
      // Redirect user to welcome page
      header("location: test2.php");

mysqli_close($conn);
?>