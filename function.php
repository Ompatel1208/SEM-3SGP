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

?>