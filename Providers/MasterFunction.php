<?php

session_start();
date_default_timezone_set("Asia/Kolkata");
include '../config/config.php';
require '../sendemail.php';
if(isset($_SESSION['provider']))
{
    $useremail = $_SESSION['Email'];
} else 
{
    echo "<script> location.href='../login.php'; </script>";
}
/// Accept booking
if(isset($_GET['Accept']))
{
    $id = $_GET['Accept'];
    $sql = "UPDATE `bookinglist` SET `status`=1 WHERE id='$id'";
    $res = mysqli_query($con,$sql) or die("Error");
    if($res)
    {
        $sql = "SELECT u.email from bookinglist b inner join users u on u.id= b.userId WHERE b.id=$id";
        $res = mysqli_query($con,$sql) or die("Error");
        $row = mysqli_fetch_row($res);

        $message = "Your Booking is Confirmed.Please Reach at the alloted slot of time.You have to pay amount at service station, your booking number is $id";
        echo "<script> alert('Booking Is Confirm HAPPY WASHING!!'); </script>";
        SendBookingStatus($row[0],$message);
    }else{
        echo "<script> alert('Something went wrong..'); </script>";
    }
    echo "<script> location.href='bookingList.php'; </script>"; 
}

// cancle booking 
if(isset($_GET['cancelBook']))
{
    $id = $_GET['cancelBook'];
    $sql = "UPDATE `bookinglist` SET `status`=2 WHERE id='$id'";
    $res = mysqli_query($con,$sql) or die("Error");
    if($res)
    {
        $sql = "SELECT u.email from bookinglist b inner join users u on u.id= b.userId WHERE b.id=$id";
        $res = mysqli_query($con,$sql) or die("Error");
        $row = mysqli_fetch_row($res);

        $message = "your booking number is $id Appointment was cancelled due to some technical purpose, please book your appointment on another day,sorry for inconvenience";
        echo "<script> alert('Booking Is Cancel'); </script>";
        SendBookingStatus($row[0],$message);
    }else{
        echo "<script> alert('Something went wrong..'); </script>";
    }
    echo "<script> location.href='bookingList.php'; </script>"; 
}
?>