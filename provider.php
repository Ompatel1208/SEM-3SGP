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
$userId = $_SESSION['userId'];
$sql = "SELECT * FROM provider where isactive=1";
$res = mysqli_query($con,$sql) or die("Error <br> $sql <br>".mysqli_error($con));
include 'Include/nav.php';
?>

<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0" style="background-image: url(Assets/img/carousel-bg-1.jpg);">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Booking</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Booking</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Page Header End -->
<!-- Service Start -->
<div class="container-xxl py-5">
        <div class="container">
        <h1 class="mb-5 text-center">Providers details</h1>
            <div class="row g-4">
<?php
            while($row = mysqli_fetch_row($res))
            {
                echo '<div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="d-flex py-5 px-4 bg-light">
                    <i class="fa fa-user fa-3x text-primary flex-shrink-0"></i>
                    <div class="ps-4">
                        <h5 class="mb-3">'.$row[1].'</h5>
                        <p>Address : '.$row[2].'</p>
                        <p>Mobile : '.$row[3].' , '.$row[4].'</p>
                        <p> Email : '.$row[5].'</p>
                        <a class="text-secondary border-bottom" href="booking.php?p='.$row[0].'">Book Appointment</a>
                    </div>
                </div>
            </div>';
            }
            // <div style="height:200px; width:200px;">
            // '.$row[8].'
            // </div>
?>
                
            </div>
        </div>
    </div>

<?php
include "Include/footer.php";
?>