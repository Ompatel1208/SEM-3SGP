<?php
session_start();
$page="feedback";
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
<form method="post" action="function.php">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly value="<?php echo $_SESSION['Email']; ?>">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Subject</label>
    <input type="text" class="form-control" name="subject" id="exampleInputPassword1" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Message</label>
    <textarea class="form-control" name="message" placeholder="Leave a comment here" id="floatingTextarea" required rows="4"></textarea>
  </div>
  
  <button type="submit" class="btn btn-primary" name="feed">Submit</button>
</form>
</div>
</div>
<?php
include "Include/footer.php";
?>