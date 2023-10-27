<?php
session_start();
require("config/config.php");
if(isset($_POST['log']))
{
  
    $email=trim($_POST['aEmail']);
    $pass=md5(trim($_POST['aPassword']));
   

    $str="select * from users where email='".$email."' and password='".$pass."' and status=1";

    $res=mysqli_query($con,$str) or die("error <br>". $sql.'<br>'. mysqli_error($con));
    if( 1==mysqli_affected_rows($con))
    {
     
      $_SESSION['Email'] = $email;  
      $row=mysqli_fetch_row($res);
      $_SESSION['userId']=$row['0'];
      $_SESSION['IsLogin'] = true;
      
      if($row['8']==2)
      {
        $_SESSION['Admin'] = true;
        echo "<script> location.href='Admin/index.php'; </script>";
      }else if($row['8']==3)
      {
        $_SESSION['provider'] = true;
        echo "<script> location.href='Providers/index.php'; </script>";
      }
      else{
        $_SESSION['user'] = true;
        echo "<script> location.href='index.php'; </script>";
      }
      // Redirecting to RequesterProfile page on Correct Email and Pass
     
      exit;
    } else {
      $msg ="Invalid Username or password";
    }
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
          <h2 class="text-center">Login  </h2>
            <form method="post">
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" id="aEmail" name="aEmail" class="form-control" />
                <label class="form-label" for="aEmail">Email address</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" id="aPassword" name="aPassword" class="form-control" />
                <label class="form-label" for="aPassword">Password</label>
              </div>
  
              <!-- 2 column grid layout for inline styling -->
              <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                  <!-- Checkbox -->
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                    <label class="form-check-label" for="form2Example31"> Remember me </label>
                  </div>
                </div>
  
                <div class="col">
                  <!-- Simple link -->
                  <a href="forgot.php">Forgot password?</a>
                </div>
              </div>
  
              <!-- Submit button -->
              <input type="submit" class="btn btn-primary btn-block mb-4" name="log" value="Sign in"/>
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