<?php
if (!empty($_POST['phone'])) {
    $phone = $_POST['phone'];
    $result = array();
    $con = mysqli_connect("localhost", "root", "", "scworker");
    if ($con) {
        $sql = "SELECT * FROM workers WHERE phone = '$phone'";
        $res = mysqli_query($con, $sql);
        if (mysqli_num_rows($res) != 0) {
            $row = mysqli_fetch_assoc($res);

            // Check if worker is currently working
            if ($row['is_working'] == 1) {
                // Update the time-out in the time_in_records table
                $updateQuery = "UPDATE time_in_records SET time_out = NOW() WHERE worker_phone = '$phone' AND time_out IS NULL";
                mysqli_query($con, $updateQuery);

                // Calculate total working time and update the time_in_records table
                $updateTotalTimeQuery = "UPDATE time_in_records SET total_working_time = TIMEDIFF(time_out, time_in) WHERE worker_phone = '$phone' AND time_out IS NOT NULL";
                mysqli_query($con, $updateTotalTimeQuery);

                // Update is_working status in the workers table
                $updateWorkerQuery = "UPDATE workers SET is_working = 0 WHERE phone = '$phone'";
                mysqli_query($con, $updateWorkerQuery);
                 $result = array("status" => "success",
                        "message" => "Timed out Successfully, Thank you for your work!",);
                    } else {$result = array("status" => "failed", "message" => "You have haven't timed in for today.");}
            }  else {$result = array("status" => "failed", "message" => "Invalid worker phone number");}
    } else {$result = array("status" => "failed", "message" => "Database connection failed");}
} else {$result = array("status" => "failed", "message" => "Phone number is required.");}
echo json_encode($result, JSON_PRETTY_PRINT);
