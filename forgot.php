<?php
session_start();
require("config/config.php");
require("config/password.php");
date_default_timezone_set("Asia/Kolkata");
if(isset($_POST['log']))
{
    $email=trim($_POST['aEmail']);   
    $bod=trim($_POST['bod']);;
    $str="select * from users where email='".$email."' and dob='".$bod."' and status=1";
    $res=mysqli_query($con,$str) or die("error <br>". $str.'<br>'. mysqli_error($con));
    if( 1==mysqli_affected_rows($con))
    {
        $row=mysqli_fetch_row($res);
        $id =$row['0'];
        $pass = password_generate(7);
        $sql = "UPDATE `users` SET `password`='".$pass."' WHERE `Id`=$id";
        $result = mysqli_query($con,$sql) or die("error <br>". $sql.'<br>'. mysqli_error($con));
         include("sendemail.php");
         $alertmsg=SendNewPassword($email,$pass);    
    }
    echo "<script> alert('Check your Mail for New password'); </script>";
    echo "<script> location.href='login.php'; </script>";  
      // Redirecting to RequesterProfile page on Correct Email and Pass
    exit;
}
include "Include/nav.php";
?>



<!-- Section: Design Block -->
<section class=" text-center text-lg-start">
    <style>
      .rounded-t-5 {
        border-top-left-radius: 0.5rem;
        border-top-right-radius: 0.5rem;
      }
  
      @media (min-width: 992px) {
        .rounded-tr-lg-0 {
          border-top-right-radius: 0;
        }
  
        .rounded-bl-lg-5 {
          border-bottom-left-radius: 0.5rem;
        }
      }
    </style>
    <div class="card mb-3">
      <div class="row g-0 d-flex align-items-center">
        <div class="col-lg-4 d-none d-lg-flex">
          <img src="Assets/img/about.jpg" alt="Trendy Pants and Shoes"
            class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
        </div>
        <div class="col-lg-8">
          <div class="card-body py-5 px-md-5">
          <h2 class="text-center">Account Recovery</h2>
            <form method="post">
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" id="aEmail" name="aEmail" class="form-control" placeholder="enter your email" />
                <label class="form-label" for="aEmail">Email address</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="date" id="bod" name="bod" class="form-control" placeholder="enter your birthdate"/>
                <label class="form-label" for="bod">Birth Date</label>
              </div>
  
              <!-- 2 column grid layout for inline styling -->
              
  
              <!-- Submit button -->
              <input type="submit" class="btn btn-primary btn-block mb-4" name="log" value="Submit"/>
              <div class="col">
                  <!-- Simple link -->
                  Create Account <a href="signup.php">Click here</a>
                </div>
              </div>
            </form>
  
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: Design Block -->

<?php
include "Include/footer.php";
if(isset($msg))
{
  ?> <script>
  swal("Error!", "<?php echo $msg ?>", "error");
  </script>
  <?php
}
if(isset($_GET['smsg']))
{
  ?> <script>
  swal("Success", "Your Account Created Successfully", "success");
  </script>
  <?php
}
?>