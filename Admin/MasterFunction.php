<?php
session_start();
include '../config/config.php';
if(isset($_SESSION['Admin']))
{
    $useremail = $_SESSION['Email'];
} else 
{
    echo "<script> location.href='../login.php'; </script>";
}

// create vehicles 
if(isset($_POST['addVehicleType']))
{
    $name = trim($_POST['name']);
    $status =$_POST['status'];
    $isDeleted = 0;
    $sql = "SELECT * FROM `vehicle_list` where `name`='$name' AND `delete_flag`=0" ;
    $res = mysqli_query($con,$sql) or die("Error <br> $sql <br>".mysqli_error($con));
    if(0 == mysqli_affected_rows($con))
    {
        $sql ="INSERT INTO `vehicle_list`(`name`, `status`, `delete_flag`) VALUES ('".$name."','".$status."','".$isDeleted."')";
        $res = mysqli_query($con,$sql) or die("Error <br> $sql <br>".mysqli_error($con));    
        echo "<script> alert('vehicle type Successfully added ....!'); </script>";
       
    }else{
        echo "<script> alert('Vehicle type already available'); </script>";
    }
    echo "<script> location.href='vehicleList.php'; </script>";  
}

// edit 
if(isset($_POST['editVehicleType']))
{
    $name = trim($_POST['name']);
    $status =$_POST['status'];
    $id=$_POST['typeId'];
    $sql = "UPDATE `vehicle_list` set  `name`='$name',`status`='$status' where `id`='$id'";
    $res = mysqli_query($con,$sql) or die("Error <br> $sql <br>".mysqli_error($con));
    if(mysqli_affected_rows($con))
    {
        echo "<script> alert('Vehicle type updated successfully.'); </script>";
    }else{
        echo "<script> alert('Somthing went wrong..'); </script>";
    }
   echo "<script> location.href='vehicleList.php'; </script>";  
}

// delete vehicle type
if(isset($_GET['del']))
  {
    $del_id=$_GET['del'];
    $sql="UPDATE `vehicle_list` set `delete_flag`=1 where id=$del_id";
    $res=mysqli_query($con,$sql) or die ("not deleted");
    if($res)
    {
        echo "<script> alert('vehicle type Successfully Deleted ....!'); </script>";
    }else{
        echo "<script> alert('Somthing went wrong..');</script>";
    }
    echo "<script> location.href='vehicleList.php'; </script>";  
  }



// delserverice
if(isset($_GET['delserverice']))
  {
    $del_id=$_GET['delserverice'];
    $sql="DELETE FROM `services` where id=$del_id";
    $res=mysqli_query($con,$sql) or die ("not deleted");
    if($res)
    {
        echo "<script> alert('services Successfully Deleted ....!'); </script>";
    }else{
        echo "<script>  alert('Somthing went wrong..'); </script> ";
    }
    echo "<script> location.href='ServicesList.php'; </script>";  
  }

//addService
if(isset($_POST['addService']))
{
    $name = trim($_POST['name']);
    $status =$_POST['status'];
    $desc = $_POST['desc'];
    $sql = "SELECT * FROM `services` where `serviceName`='$name'";
    $res = mysqli_query($con,$sql) or die("Error <br> $sql <br>".mysqli_error($con));
    if(0 == mysqli_affected_rows($con))
    {
        $sql ="INSERT INTO `services`(`serviceName`, `description`, `isActive`) VALUES ('".$name."','".$desc."','".$status."')";
        $res = mysqli_query($con,$sql) or die("Error <br> $sql <br>".mysqli_error($con));    
        echo "<script> alert('Service Successfully added ....!'); </script>";
    }else{
        echo "<script> alert('Service already available'); </script>";
    }
    echo "<script> location.href='ServicesList.php'; </script>";  
}

//
if(isset($_POST['editService']))
{
    $name = trim($_POST['name']);
    $status =$_POST['status'];
    echo $status;
    $desc = $_POST['desc'];
    $id=$_POST['typeId'];
    $sql = "UPDATE `services` set `serviceName`='$name',`isActive`='$status',`description`='$desc' where `id`='$id'";
    $res = mysqli_query($con,$sql) or die("Error <br> $sql <br>".mysqli_error($con));
    if(mysqli_affected_rows($con))
    {
        echo "<script> alert('Vehicle type updated successfully.'); </script>";
    }else{
        echo "<script> alert('Somthing went wrong..'); </script>";
        echo mysqli_affected_rows($con);
        die("error");
    }
   echo "<script> location.href='ServicesList.php'; </script>";  
}

// pricedel delete price
if(isset($_GET['pricedel']))
{
    $id = $_GET['pricedel'];
    $SQL = "DELETE FROM price_list where id='$id'";
    $res=mysqli_query($con,$sql) or die ("not deleted");
    if($res)
    {
        echo "<script> alert('Price Successfully Deleted ....!'); </script>";
    }else{
        echo "<script> alert('Somthing went wrong..'); </script>";
    }
    echo "<script> location.href='PriceList.php'; </script>"; 

}

// add price
if(isset($_POST['addPrice']))
{
    $serviceId = $_POST['service'];
    $vehicleId = $_POST['vehicle'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    $sql = "SELECT * FROM `price_list` WHERE `service_Id`='$serviceId' AND `vehicle_Id`='$vehicleId'";
    $res = mysqli_query($con,$sql) or  die("Error <br> $sql <br>".mysqli_error($con));
    if(0==mysqli_num_rows($res))
    {

    $sql = "INSERT INTO `price_list`(`service_Id`, `vehicle_Id`, `price`, `status`) VALUES('$serviceId','$vehicleId','$price','$status') ";
    $res = mysqli_query($con,$sql) or die("Error <br> $sql <br>".mysqli_error($con));
    if($res)
    {
        echo "<script> alert('Price Successfully Added ....!'); </script>";
    }else{
        echo "<script> alert('Somthing went wrong..'); </script>";
    }
}else{
    echo "<script> alert('Already Price Added For this service and vehicle'); </script>";
}
    echo "<script> location.href='PriceList.php'; </script>"; 
}

if(isset($_POST['editPrice']))
{
    $serviceId = $_POST['service'];
    $vehicleId = $_POST['vehicle'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $priceId= $_POST['priceId'];
    $sql = "UPDATE `price_list` SET `price`='$price' , `status`='$status' where `Id`='$priceId'";
    $res=mysqli_query($con,$sql) or die ("not Updated");
    if($res)
    {
        echo "<script> alert('Price Successfully Updated ....!'); </script>";
    }else{
        echo "<script> alert('Somthing went wrong..'); </script>";
    }
    echo "<script> location.href='PriceList.php'; </script>"; 
}
?>