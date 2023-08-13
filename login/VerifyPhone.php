<?php
if(!empty($_POST['phone'])) {
    $phone = $_POST['phone'];
    $result = array();
    $con = mysqli_connect("localhost", "root", "", "scworker");

    if ($con) {
        $sql = "select * from workers where phone = '".$phone."'";
        $res = mysqli_query($con, $sql);
        if(mysqli_num_rows($res)!=0){
            $row = mysqli_fetch_assoc($res);
            if($phone == $row['phone']){
                try{
                    $otp= random_int(100000,999999);
                }catch (Exception $e) {
                    $otp =rand(100000,999999);
                }
                $sqlUpdate = "update workers set reset_password_otp = '".$otp."' where phone = '".$phone."'";
                if (mysqli_query($con,$sqlUpdate)){
                    $result = array("status" =>"success","message"=>"OTP generated,Your OTP is $otp",
                        "phone"=>$row['phone'], "reset_password_otp"=>$otp);
                }else $result = array ("status" => "failed","message"=>"OTP was not generated");
            } else $result = array("status"=> "failed","message"=>"This Phone number is not registered");
        }else $result = array("status"=> "failed", "message"=> "This Phone number is not registered");
    }else $result = array("status"=> "failed","message"=> "Database connection failed");
}else $result = array("status" => "failed","message"=> "Please input phone number");
echo json_encode($result, JSON_PRETTY_PRINT);