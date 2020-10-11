<?php
require_once "../database.php";
if (isset($_POST['device_id'])) {
    $device_id = $_POST["device_id"];
    $trial_start_date = $_POST["trial_start_date"];

    $result = mysqli_query($conn, "SELECT trial_start_date FROM core_trialinstance WHERE device_id='$device_id'");
    $value = mysqli_fetch_assoc($result);
    if ($value != null) {
        $time = strtotime($trial_start_date);
        $now = strtotime("now");
        $diff = $now - $time;
        if ($diff >= 86400) {
            $status = "Expired";
        } else if ($diff < 86400 and $diff >= 0) {
            $status = "In Trial";
        } else if ($diff < 0) {
            $status = "Expired";
        }
        $value_string = implode($value);
        $response = "trial_date_info,$value_string,$status";
        echo ($response);
    } else {
        $sql = "INSERT INTO core_trialinstance (device_id, trial_start_date) VALUES ('$device_id', '$trial_start_date')";
        mysqli_query($conn, $sql);
        echo "start new trial";
    }
} else {
    echo "Access denied";
}
