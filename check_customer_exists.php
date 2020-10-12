<?php
require_once "../database.php";
if (isset($_POST['email'])) {
    $email = $_POST["email"];

    if ($email != "" && strpos($email, "@")) {
        $result = mysqli_query($conn, "SELECT email FROM core_customer WHERE email='$email'");
        $value = mysqli_fetch_assoc($result);
        if ($value != null) {
            if ($value["email"] == $email) {
                echo "customer exists";
            } else {
                echo "customer does not exist";
            }
        } else {
            echo "customer does not exist";
        }
    } else {
        echo "Email is Invalid";
    }
} else {
    echo "Access denied";
}
