<?php
session_start();
if(isset($_SESSION['provider']))
{
    $useremail = $_SESSION['Email'];
} else 
{
    echo "<script> location.href='../login.php'; </script>";
}
  include '../config/config.php';
  include 'Include/head.php';
  include 'Include/sidebar.php';
$sql1 = "SELECT * FROM `provider` WHERE email='$useremail'";
$res = mysqli_query($con,$sql1) or die("Error");
$row = mysqli_fetch_row($res);
$providerId = $row[0];
$sql ="";
if(isset($_GET['complete']))
{
    $status=$_GET['complete'];
    $sql = "SELECT  p.Name, b.schedule,v.name,s.serviceName, b.totalAmount,b.status,u.fname,u.lname,b.id  FROM `bookinglist` b INNER JOIN services s on b.	serviceId = s.id INNER JOIN vehicle_list v on v.id=b.vehicletypeId INNER JOIN provider p on p.Id = b.providerId INNER JOIN users u on u.id= b.userId WHERE b.status='$status' AND b.providerId='$providerId'";
}else{
    $sql = "SELECT  p.Name, b.schedule,v.name,s.serviceName, b.totalAmount,b.status,u.fname,u.lname,b.id  FROM `bookinglist` b INNER JOIN services s on b.	serviceId = s.id INNER JOIN vehicle_list v on v.id=b.vehicletypeId INNER JOIN provider p on p.Id = b.providerId INNER JOIN users u on u.id= b.userId WHERE b.providerId='$providerId'";

}
$res = mysqli_query($con,$sql) or die("Error <br> $sql <br>".mysqli_error($con));
  ?>      
                <main>
                    <div class="container-fluid px-4">
                    <!-- <a href="createvehicle.php" class="float-end btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Create New Vehicle Type"> <i class="fas fa-plus"></i></a> -->
                        <h1 class="mt-4">Bookings</h1>
                       
                        <!-- <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol> -->
                        <div class="card mb-4">
                            <!-- <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                User List
                            </div> -->
                            <div class="card-body">
                                <table id="datatablesSimple">
                                  
                                    <thead>
            <tr>
                <th>User Name</th>
                <th>Provider Name</th>
                <th>Schedule Date</th>
                <th>Vehicle</th>
                <th>Service</th>
                <th>Price</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
while($row = mysqli_fetch_row($res))
{
    $status = ($row[5]==0)? 'Pending' : (($row[5]==1)? 'Confirm' :'Cancel') ;
    echo '<tr>
    <td>'.$row[6].' '.$row[7].'</td>
    <td>'.$row[0].'</td>
    <td>'.$row[1].'</td>
    <td>'.$row[2].'</td>
    <td>'.$row[3].'</td>
    <td>'.$row[4].'</td>
    <td>'.$status.'</td>';
    if($row[5]==0)
    {
        echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to Confirm Booking');\" href='MasterFunction.php?Accept=".$row[8]."'><i class='fas fa-check'></i></a> &nbsp; <a onClick=\"javascript: return confirm('Are you sure you want to Reject Booking');\" href='MasterFunction.php?cancelBook=".$row[8]."'><i class='fas fa-times text-danger'></i></a></td>";
    }else{
        echo "<td></td>";
    }
  
echo "</tr>";
}
?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>

<?php

include 'Include/footer.php';
?>
