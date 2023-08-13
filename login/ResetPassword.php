<?php
if(!empty($_POST['otp']) && !empty($_POST['phone']) && !empty($_POST['new-password'])) {
    $otp = $_POST['otp'];
    $phone = $_POST['phone'];
    $new_password = password_hash($_POST['new-password'],PASSWORD_DEFAULT) ;
    $con = mysqli_connect("localhost", "root", "", "scworker");

    if ($con) {
        $sql = "update workers set password ='".$new_password."' , reset_password_otp = '' where phone = '".$phone."' and reset_password_otp = '".$otp."'";
        if(mysqli_query($con,$sql)){
            if(mysqli_affected_rows($con)){
                echo "success";
            }else echo "reset password failed";
        } else echo "Incorrect OTP or phone number not registered";
    }else echo "Database connection failed";
}else echo "All fields are required";


