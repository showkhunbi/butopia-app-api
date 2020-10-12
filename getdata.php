<?php
require_once "database.php";
$name = $_POST['name'];

if ($name != ""){
	$result = mysqli_query($conn,"SELECT name,contact,dob FROM user_details WHERE name='$name'");
	$row = mysqli_fetch_assoc($result);

	if($row){
		$json_r=json_encode($row);
		echo ($json_r);
	} else {
		echo "Object does not exist";
	}
} else {
	echo "Enter a valid Email";
}

 mysqli_close($conn);
?>