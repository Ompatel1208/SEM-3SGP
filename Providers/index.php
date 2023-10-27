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
?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                        <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Pending Appointment</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="bookingList.php?complete=0">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Completed Booking</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="bookingList.php?complete=1">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Cancel Bookings</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="bookingList.php?complete=2">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Bookings</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="bookingList.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                User List
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                    <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>BirthDate</th>
                                            <th>City</th>
                                            <th>Mobile</th>
                                        </tr>
                                    </thead>
                                  
                                    <tbody>
                                        <?php
$str="select * from users where status=1 and role=1 order by id desc limit 15";
$res=mysqli_query($con,$str) or die("error <br>". $sql.'<br>'. mysqli_error($con));
$i=1;
while($row = mysqli_fetch_row($res))
{
    echo '<tr>';
    echo '<td>'.$i.'</td>';
    echo '<td>'.ucfirst($row[1]).' '.ucfirst($row[2]).'</td>';
    echo '<td>'.$row[3].'</td>';
    echo '<td>'.$row[5].'</td>';
    echo '<td>'.ucfirst($row[6]).'</td>';
    echo '<td>'.$row[7].'</td>';
    echo '</tr>';
    $i = $i + 1;
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
