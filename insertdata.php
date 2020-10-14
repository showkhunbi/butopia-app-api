<?php
require_once "database.php";

$name = $_POST['name'];
$contact = $_POST['contact'];
$dob = $_POST['dob'];


$sql="INSERT INTO user_details (name, contact, dob) VALUES ('$name', '$contact','$dob')";
if (mysqli_query($conn,$sql)) {
echo "Values have been inserted successfully";
} else {
	echo "Values have not been inserted";
}

?>