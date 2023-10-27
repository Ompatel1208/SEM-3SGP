<?php
session_start();
date_default_timezone_set("Asia/Kolkata");
if(isset($_SESSION['user']))
{
    $Email = $_SESSION['Email'];
    $userId= $_SESSION['userId'];
} else 
{
    echo "<script> location.href='login.php'; </script>";
}
$page="password";
include 'Include/nav.php';
?>
<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0" style="background-image: url(Assets/img/carousel-bg-1.jpg);">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Change Password</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Change Password</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Page Header End -->
<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <h1 class="text-center">Change Password</h1>
        <form class="row g-3" method="post" action="function.php">
            <div class="col-md-12">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail4" readonly value="<?php echo $Email ; ?>">
                <input type="hidden" name="userId" value="<?php echo $userId; ?>"/>
            </div>
            <div class="col-md-12">
                <label for="inputPassword4" class="form-label">Current Password</label>
                <input type="text" class="form-control" id="inputPassword4" name="password" required>
            </div>
            <div class="col-md-12">
                <label for="inputPassword4" class="form-label">New Password</label>
                <input type="text" class="form-control" id="inputPassword4" name="newPass" required>
            </div>
            
            <div class="col-12">
                <input type="submit" class="btn btn-primary" name="changePass" value="Change Password" />
            </div>
        </form>
    </div>
</div>


<?php
include "Include/footer.php";
?>