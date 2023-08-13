<?php

// Assuming you have established the database connection
$con = mysqli_connect("localhost", "root", "", "scworker");

if ($con) {
    if (!empty($_POST['phone'])) {
        $phone = $_POST['phone'];

        // Update OT_Request to 1 for the given phone number
        $updateQuery = "UPDATE workers SET OT_Request = 0 WHERE phone = '$phone'";
        $result = mysqli_query($con, $updateQuery);

        if ($result) {
            $response = array("status" => "success", "message" => "Overtime requested successfully");
        } else {
            $response = array("status" => "failed", "message" => "Error updating OT_Request");
        }
    } else {
        $response = array("status" => "failed", "message" => "Phone number not found");
    }
} else {
    $response = array("status" => "failed", "message" => "Database connection failed");
}

echo json_encode($response);


