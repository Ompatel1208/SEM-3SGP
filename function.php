<?php
session_start();
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
    $address = $_POST['address'];
    $city = $_POST['city'];
    $area = $_POST['area'];
    $vehicleTypeId = $_POST['vehicleType'];
    $bookingDate = $_POST['bookingDate'];
    $price = $_POST['price'];
    $sql ="INSERT INTO `bookinglist`(`userId`, `address1`, `area`, `city`, `vehicletypeId`, `schedule`, `totalAmount`) 
    VALUES('".$userId."','".$address."','".$area."','".$city."','".$vehicleTypeId."','".$bookingDate."','".$price."')";
    $res = mysqli_query($con,$sql) or die("Error <br> $sql <br>".mysqli_error($con));
    if($res)
    {
        echo "<script> alert('Your Booking Successfully Completed'); </script>";
    }else{
        echo "<script> alert('Somethin went wrong'); </script>";
    }
echo "<script> location.href='booking.php'; </script>";

}

?>