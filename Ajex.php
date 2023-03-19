<?php
require("config/config.php");
date_default_timezone_set("Asia/Kolkata");
if(isset($_POST["vehicelId"]))
{
  $vehicelId=$_POST['vehicelId'];
  $sql = "SELECT * FROM `services` where id in (SELECT DISTINCT `service_Id` FROM `price_list` WHERE `vehicle_Id`=$vehicelId)";
  $res=mysqli_query($con,$sql) or die("not Found <br>".$sql."<br>".mysqli_error($con));
  if(0==mysqli_affected_rows($con))
  {
   echo " <option value=''>Service Not avaible for this vehicle </option> ";
  }
  else{
    echo "<option selected>Choose...</option>";
    while($row=mysqli_fetch_row($res))
    {
       echo" <option value=".$row[0].">".$row[1]."</option> ";
    }
  }

}

if(isset($_POST['serviceType']))
{
    $serviceType = $_POST['serviceType'];
    $sql = "SELECT price  FROM `price_list` Where service_Id=$serviceType";
    $res = mysqli_query($con,$sql) or die("Error");
    $row = mysqli_fetch_row($res);
    echo $row[0];
}
?>