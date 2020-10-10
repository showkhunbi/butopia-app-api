<?php
require_once "../database.php";
if (isset($_POST['email'])) {
    $email = $_POST["email"];
    $device_id = $_POST["device_id"];

    if ($email != "" && strpos($email, "@")) {
        $result = mysqli_query($conn, "SELECT * FROM core_customer WHERE email='$email'");
        $value = mysqli_fetch_assoc($result);
        //print_r($value);
        if ($value != null) {
            if ($device_id != "") {
                if (!in_array($device_id, explode(",", $value["device"]))) {
                    if ($value["number_of_devices"] > $value["number_of_registered_devices"]) {
                        $add_new_device = $value["device"] . "$device_id, ";
                        $new_registered_devices = $value["number_of_registered_devices"] + 1;

                        $sql = "UPDATE core_customer SET device= '$add_new_device', number_of_registered_devices='$new_registered_devices' WHERE email='$email'";

                        if (mysqli_query($conn, $sql)) {
                            echo "New device registered";
                        } else {
                            echo "Registration failed, try again";
                        }
                    } else {
                        echo "redirect to payment";
                    }
                } else {
                    echo "customer confirmed";
                }
            } else {
                echo "Invalid device id";
            }
        } else {
            echo "customer does not exist";
        }
    } else {
        echo "Email is invalid";
    }
}else{
	echo "Access denied";
}
