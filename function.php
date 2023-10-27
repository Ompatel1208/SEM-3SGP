<?php
session_start();
date_default_timezone_set("Asia/Kolkata");
if(isset($_SESSION['user']))
{
    $Email = $_SESSION['Email'];
} else 
{
    echo "<script> location.href='login.php'; </script>";
}
require 'config/config.php';


if(isset($_POST['newBook']))
{
    $userId = $_POST['userId'];
    $vehicleTypeId = $_POST['vehicleType'];
    $bookingDate = $_POST['bookingDate'];
    $price = $_POST['price'];
    $provider = $_POST['provider'];
    $service = $_POST['service'];
   $sql ="INSERT INTO `bookinglist`(`userId`, `serviceId`, `providerId`, `vehicletypeId`, `schedule`, `totalAmount`) VALUES ('".$userId."','".$service."','".$provider."','".$vehicleTypeId."','".$bookingDate."','".$price."')";
    $res = mysqli_query($con,$sql) or die("Error <br> $sql <br>".mysqli_error($con));
    if($res)
    {
        echo "<script> alert('Your Appointment is submitted successfully, please wait for confirmation'); </script>";
    }else{
        echo "<script> alert('Somethin went wrong'); </script>";
    }
echo "<script> location.href='index.php'; </script>";

}


if(isset($_POST['feed']))
{

    $subject = $_POST['subject'];
    $message = $_POST['message'] ;
    $userId = $_SESSION['userId'];
    $sql ="INSERT INTO `feedback`(`userId`, `message`, `subject`) VALUES ('".$userId."','".$message."','".$subject."')";
    $res = mysqli_query($con,$sql) or die("Error");
    if($res)
    {
        echo "<script> alert('Thank you for your valuable feedback !'); </script>";
    }
    else{
        echo "<script> alert('Somethin went wrong'); </script>";
    }
    echo "<script> location.href='index.php'; </script>";

}


// change password
if(isset($_POST['changePass']))
{
    $userId = $_POST['userId'];
    $oldPassword = md5($_POST['password']);
    $newPassword = md5($_POST['newPass']);
    $sql = "SELECT * FROM users where Id='$userId' AND password='$oldPassword'";
    $res = mysqli_query($con,$sql) or die("Error");
    if(1 == mysqli_affected_rows($con))
    {
        $sql = "UPDATE `users` set `password`='$newPassword' WHERE `Id`='$userId'";
        $res = mysqli_query($con,$sql) or die("Error");
        if($res)
        {  
            echo "<script> alert('Password change successfully '); </script>";

        }else{
            echo "<script> alert('Something went wrong'); </script>";
        }
    }else{
        echo "<script> alert('Current Password invalid'); </script>";
    }
    echo "<script> location.href='changepass.php'; </script>";

}




?>