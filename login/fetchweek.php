<?php
error_reporting(E_ALL);
if (!empty($_POST['phone'])) {
    $phone = $_POST['phone'];
    $result = array();
    $con = mysqli_connect("localhost", "root", "", "scworker");
    if ($con) {
        $query = "SELECT * FROM time_in_records WHERE worker_phone = '$phone' ORDER BY time_in DESC";
        $res = mysqli_query($con, $query);

        while ($row = mysqli_fetch_assoc($res)) {
            $result[] = array(
                "time_in" => $row['time_in'],
                "time_out" => $row['time_out'],
                "total_working_time" => $row['total_working_time']
            );
        }
        if (!empty($result)) {
            $result = array("status" => "success", "message" => "Log records fetched successfully", "data" => $result);
        } else {
            $result = array("status" => "failed", "message" => "No log records found for the specified phone number");
        }
    } else {
        $result = array("status" => "failed", "message" => "Database connection failed");
    }
} else {
    $result = array("status" => "failed", "message" => "Can't find worker's phone number");
}

echo json_encode($result, JSON_PRETTY_PRINT);
?>
