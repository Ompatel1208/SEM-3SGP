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
$userId = $_SESSION['userId'];
$sql = "SELECT  p.Name, b.schedule,v.name,   s.serviceName, b.totalAmount,b.status  FROM `bookinglist` b INNER JOIN services s on b.	serviceId = s.id INNER JOIN vehicle_list v on v.id=b.vehicletypeId INNER JOIN provider p on p.Id = b.providerId WHERE userId='$userId'";
$res = mysqli_query($con,$sql) or die("Error <br> $sql <br>".mysqli_error($con));

$page="booking";

include 'Include/nav.php';
?>

<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0" style="background-image: url(Assets/img/carousel-bg-1.jpg);">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center">
            <h1 class="display-3 text-white mb-3 animated slideInDown">My Booking</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">My Booking</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Page Header End -->
<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
    <h1 class="mb-5 text-center">My Booking details</h1>
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Provider Name</th>
                <th>Schedule Date</th>
                <th>Vehicle</th>
                <th>Service</th>
                <th>Price</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
while($row = mysqli_fetch_row($res))
{
   
    $status = ($row[5]==0)? 'Pending' : (($row[5]==1)? 'Confirm' :'Cancel') ;
    echo '<tr>
    <td>'.$row[0].'</td>
    <td>'.$row[1].'</td>
    <td>'.$row[2].'</td>
    <td>'.$row[3].'</td>
    <td>'.$row[4].'</td>
    <td>'.$status.'</td>
</tr>';
}
?>
            
    </table>
    </div>
</div>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-light mb-4">Address</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>government polytechnic gandhinagar</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+91 7990442235</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>starkoapplications@gmail.com</p>
                   
                </div>
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-light mb-4">Opening Hours</h4>
                    <h6 class="text-light">Monday - Friday:</h6>
                    <p class="mb-4">09.00 AM - 09.00 PM</p>
                    <h6 class="text-light">Saturday - Sunday:</h6>
                    <p class="mb-0">09.00 AM - 12.00 PM</p>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-light mb-4">Services</h4>
                    <a class="btn btn-link" href="">Diagnostic Test</a>
                    <a class="btn btn-link" href="">Engine Servicing</a>
                    <a class="btn btn-link" href="">Tires Replacement</a>
                    <a class="btn btn-link" href="">Oil Changing</a>
                    <a class="btn btn-link" href="">Vacuam Cleaning</a>
                </div>
             
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Site Name</a>, All Right Reserved.

                      
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="">Home</a>
                            <a href="">Cookies</a>
                            <a href="">Help</a>
                            <a href="">FQAs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="Assets/lib/wow/wow.min.js"></script>
    <script src="Assets/lib/easing/easing.min.js"></script>
    <script src="Assets/lib/waypoints/waypoints.min.js"></script>
    <script src="Assets/lib/counterup/counterup.min.js"></script>
    <script src="Assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="Assets/lib/tempusdominus/js/moment.min.js"></script>
    <script src="Assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="Assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <!-- Template Javascript -->
    <script src="Assets/js/main.js"></script>

    <script>
    $(document).ready(function () {
    $('#example').DataTable();
});

</script>
</body>

</html>