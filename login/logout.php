<?php
if (!empty($_POST['phone']) && !empty($_POST['apiKey'])) {
$phone = $_POST['phone'];
$apiKey = $_POST['apiKey'];
$result = array();
$con = mysqli_connect("localhost", "root", "", "scworker");
if ($con) {
$sql = "SELECT * FROM workers WHERE phone = '$phone' AND apiKey = '$apiKey'";
$res = mysqli_query($con, $sql);
if (mysqli_num_rows($res) != 0) {
$row = mysqli_fetch_assoc($res);

// Update the is_working field to 0
$sqlUpdate = "UPDATE workers SET apiKey = '', is_working = 0 WHERE phone = '$phone'";
if (mysqli_query($con, $sqlUpdate)) {
echo "success";
} else {
echo "Logout failed";
}
} else {
echo "Unauthorised to access";
}
} else {
echo "Database connection failed";
}
} else {
echo "All fields are required";
}
