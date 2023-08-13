<?php

// Assuming you have established the database connection
$con = mysqli_connect("localhost", "root", "", "scworker");

if ($con) {
    if (!empty($_POST['phone'])) {
        $phone = $_POST['phone'];

        // Check the OT_Request status for the given phone number
        $query = "SELECT OT_Request FROM workers WHERE phone = '$phone'";
        $result = mysqli_query($con, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $otRequestStatus = $row['OT_Request'];

            $response = array("status" => "success", "message" => "status fetched","ot_request_status" => $otRequestStatus);
        } else {
            $response = array("status" => "failed", "message" => "Error fetching OT_Request");
        }
    } else {
        $response = array("status" => "failed", "message" => "Phone number not provided");
    }
} else {
    $response = array("status" => "failed", "message" => "Database connection failed");
}

echo json_encode($response);

