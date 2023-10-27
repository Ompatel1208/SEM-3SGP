<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Karz-Spa - Car Repair HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@600;700&family=Ubuntu:wght@400;500&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="Assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="Assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="Assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="Assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="Assets/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


   


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-car me-3"></i>Karz-Spa</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php" class="nav-item nav-link <?php if($page=="home"){ echo "active";} ?> ">Home</a>
                <a href="about.php" class="nav-item nav-link <?php if($page=="about"){ echo "active";} ?>">About</a>
                <a href="service.php" class="nav-item nav-link <?php if($page=="service"){ echo "active";} ?>">Services</a>
                <!-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu fade-up m-0">
                        <a href="booking.html" class="dropdown-item">Booking</a>
                        <a href="team.html" class="dropdown-item">Technicians</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="404.html" class="dropdown-item">404 Page</a>
                    </div>
                </div> -->
                <a href="contact.php" class="nav-item nav-link  <?php if($page=="contact"){ echo "active";} ?>">Contact</a>
               <?php if(isset($_SESSION['IsLogin']) && $_SESSION['IsLogin']==true)
            { ?>
                <a href="provider.php" class="nav-item nav-link  <?php if($page=="booking"){ echo "active";} ?>">Booking</a>
                <a href="mybooking.php" class="nav-item nav-link  <?php if($page=="mybooking"){ echo "active";} ?>"> My Booking</a>
               
                <a href="feedback.php" class="nav-item nav-link  <?php if($page=="feedback"){ echo "active";} ?>">Feedback</a>
                <a href="changepass.php" class="nav-item nav-link  <?php if($page=="password"){ echo "active";} ?>"> Change Password</a>
            <?php } ?>
            </div>
            <?php
            if(isset($_SESSION['IsLogin']) && $_SESSION['IsLogin']==true)
            {
                echo '<a href="logout.php" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Logout</a>';
            }else{
                echo '<a href="login.php" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Login<i class="fa fa-arrow-right ms-3"></i></a>';
            }
            ?>
            
        </div>
    </nav>
    <!-- Navbar End -->