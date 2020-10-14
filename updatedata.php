<?php
require_once "database.php";

$name = $_POST['name'];
$contact = $_POST['contact'];
$dob = $_POST['dob'];

$sql="UPDATE user_details SET contact= '$contact', dob='$dob' WHERE name='$name'";
if (mysqli_query($conn,$sql)) {
echo "Values have been updated successfully";
} else {
	echo "Values have not been updated";
}

?>

