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
$sql = "SELECT * FROM users where Id='$userId'";
$res = mysqli_query($con,$sql) or die("Error <br> $sql <br>".mysqli_error($con));
$row = mysqli_fetch_row($res);
$userName = $row['1']." ".$row['2'];
$page="booking";
if(isset($_GET['p']))
{
    $provider = $_GET['p'];
    $sql = "SELECT * FROM provider WHERE Id =$provider";
    $res = mysqli_query($con,$sql) or die("Error");
    $row= mysqli_fetch_row($res);

}else{
    echo "<script> location.href='provider.php'; </script>";
}
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
        <form class="row g-3" method="post" action="function.php">
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail4" readonly value="<?php echo $Email ; ?>">
                <input type="hidden" name="userId" value="<?php echo $userId; ?>"/>
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Name</label>
                <input type="text" class="form-control" id="inputPassword4" readonly value="<?php echo $userName; ?>">
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">provider Name</label>
                <input type="hidden" name="provider" value="<?php echo $provider;?>">
                <input type="text" class="form-control" id="inputPassword4" readonly value="<?php echo $row[1]; ?>">
            </div>
            <div class="col-md-6">
                <label for="inputState" class="form-label">Vehicle Type</label>
                <select id="vehicleType" class="form-select" name="vehicleType" required>
                    <option selected>Choose...</option>
                    <?php
                $sql = "SELECT * FROM vehicle_list where status=1 AND delete_flag=0";
                $res = mysqli_query($con,$sql) or die("Error <br> $sql <br>".mysqli_error($con));
                while($row = mysqli_fetch_row($res))
                {
                    echo "<option value='".$row[0]."'>".$row[1]."</option>";
                }
                ?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="inputState" class="form-label">Select Service</label>
                <select id="serviceType" class="form-select" name="service" required>
                    <option selected>Choose...</option>   
                </select>
            </div>
            <div class="col-md-6">
                <label for="inputZip" class="form-label">Schedule Date</label>
                <input type="datetime-local" class="form-control" id="inputZip" name="bookingDate" required min="<?php echo date('Y-m-d H:i'); ?>">
            </div>
            <div class="col-md-6">
            <label for="inputZip" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price" required readonly>
            </div>
            <div class="col-12">
                <input type="submit" class="btn btn-primary" name="newBook" value="Book" />
            </div>
        </form>
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

    <!-- Template Javascript -->
    <script src="Assets/js/main.js"></script>

    <script>
    $(document).ready(function(){
        $('#serviceType').on('change',function(){
           
            var serviceType = $(this).val();
            if(serviceType){
              $.ajax({
                url: "Ajex.php",
                method: "POST",
                data: { serviceType:serviceType },
                success: function(html) {
                  $('#price').val(html);                
                }
                });
            }else{
                $('#price').val('00');  
            }
        });
    });

    $(document).ready(function(){
        $('#vehicleType').on('change',function(){
            var vehicelId = $(this).val();
            if(vehicelId){
              $.ajax({
                url: "Ajex.php",
                method: "POST",
                data: { vehicelId:vehicelId },
                success: function(html) {
                  
                  $('#serviceType').html(html);
                  $('#price').val('');
                
                }
                });
            }else{
                $('#serviceType').html('<option value="">No Service avaiable for this vehicle</option>');
            
            }
        });
    });

</script>
</body>

</html>