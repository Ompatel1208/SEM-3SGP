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
$sql = "SELECT * FROM users where Id='$userId'";
$res = mysqli_query($con,$sql) or die("Error <br> $sql <br>".mysqli_error($con));
$row = mysqli_fetch_row($res);
$userName = $row['1']." ".$row['2'];
$page="booking";
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
            <div class="col-12">
                <label for="inputAddress" class="form-label">Address</label>
                <input type="text" class="form-control" id="inputAddress" name="address" placeholder="1234 Main St">
            </div>
            <div class="col-md-6">
                <label for="inputAddress2" class="form-label">Area</label>
                <input type="text" class="form-control" id="inputAddress2" name="area" placeholder="Apartment, studio, or floor">
            </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label">City</label>
                <input type="text" class="form-control" id="inputCity" name="city">
            </div>
            <div class="col-md-6">
                <label for="inputState" class="form-label">Vehicle Type</label>
                <select id="inputState" class="form-select" name="vehicleType">
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
                <label for="inputZip" class="form-label">Schedule Date</label>
                <input type="date" class="form-control" id="inputZip" name="bookingDate" required>
            </div>
            <div class="col-md-6">
            <label for="inputZip" class="form-label">Price</label>
                <input type="number" class="form-control" id="inputZip" name="price">
            </div>
            <div class="col-12">
                <input type="submit" class="btn btn-primary" name="newBook" value="Book" />
            </div>
        </form>
    </div>
</div>

<?php
include "Include/footer.php";
?>