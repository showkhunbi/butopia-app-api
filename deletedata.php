<?php
require_once "database.php";

$name = $_POST['name'];

$sql="DELETE FROM user_details WHERE name='$name'";
if (mysqli_query($conn,$sql)) {
echo "Values have been deleted successfully";
} else {
	echo "Values have not been deleted";
}

?>
