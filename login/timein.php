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

            // Check worker's assigned shift
            $shift = $row['shift'];

            // Get the current time
            $current_time = time();

            $shift_start_times = array(
                '07:00 - 16:00' => '07:00',
                '08:00 - 17:00' => '08:00',
                '16:00 - 01:00' => '16:00',
                '0:00 - 09:00' => '00:00',
                '08:00 - 20:00' => '08:00',
                '20:00 - 08:00' => '20:00'
            );

            if (array_key_exists($shift, $shift_start_times)) {
                $shift_start_time = $shift_start_times[$shift];
                $current_hour = date('H', $current_time);
                $shift_start_hour = date('H', strtotime($shift_start_time));

                // Check if current time is after or equal to shift start time
                if ($current_hour >= $shift_start_hour) {
                    // Check if the worker is not already working today
                    if ($row['is_working'] == 0) {
                        // Insert the time-in into the time_in_records table and set is_working to 1
                        $insertQuery = "INSERT INTO time_in_records (worker_phone, time_in, time_out, total_working_time)
                                       VALUES ('$phone', NOW(), NULL, NULL)";
                        mysqli_query($con, $insertQuery);

                        // Update is_working status in the workers table
                        $updateWorkerQuery = "UPDATE workers SET is_working = 1 WHERE phone = '$phone'";
                        mysqli_query($con, $updateWorkerQuery);
                        $result = array("status" => "success", "message" => "Timed in Successfully, Have a blessed day ahead!");
                    } else {
                        $result = array("status" => "failed", "message" => "You have already timed in for today.");
                    }
                } else {
                    $result = array("status" => "failed", "message" => "Time-in not allowed outside assigned shift");
                }
            } else {
                $result = array("status" => "failed", "message" => "No shift assigned yet!");
            }
        } else {
            $result = array("status" => "failed", "message" => "Unauthorized access!");
        }
    } else {
        $result = array("status" => "failed", "message" => "Database connection failed");
    }
} else {
    $result = array("status" => "failed", "message" => "All fields are required");
}

echo json_encode($result, JSON_PRETTY_PRINT);

