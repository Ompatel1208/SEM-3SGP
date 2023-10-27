<?php
session_start();
date_default_timezone_set("Asia/Kolkata");
require("config/config.php");
$temp="";
if(isset($_POST['log']))
{
  $email=trim($_POST['email']);
  $pass=trim($_POST['password']);
  $hash = md5($pass);
  $fname= strtolower(trim($_POST['fname']));
  $bod=trim($_POST['bod']);;
  $mobile=trim($_POST['mobile']);
  $city=strtolower(trim($_POST['city']));
  $lname=strtolower(trim($_POST['lname']));
  $sql="select * from users where email='".$email."' and status = 1";
  $res=mysqli_query($con,$sql) or die("error not fatch email");
       if(0==mysqli_num_rows($res))
        {
            $otp=rand(100000,999999);
            $sql1="INSERT INTO `users`(`fname`, `lname`, `email`, `password`, `dob`, `city`, `mobile`) VALUES('".$fname."','".$lname."','".$email."','".$hash."','".$bod."','".$city."','".$mobile."')";       
            $res = mysqli_query($con, $sql1) or die("error not insert into user<br>".$sql1."<br>".mysqli_error($con));
            $userId=mysqli_insert_id($con);
            $_SESSION['userId']=$userId;
           
            $sql1="INSERT INTO `otp`(`otp`, `created_at`, `userId`) VALUES('".$otp."','".date("Y-m-d H:i:s")."','".$userId."')";
            $res=mysqli_query($con,$sql1) or die("error<br>".$sql1."<br>".mysqli_error($con));
            $id=mysqli_insert_id($con);
            if(!empty($id))
            {
              $temp=1;
            }
            $_SESSION['otp_id']=$id;
            $_SESSION['email']=$email;
            include("sendemail.php");
            $alertmsg=send_otp($email,$otp);

        }else{
          $msg='Email id is Already Registred ';
        } 
}
if(isset($_POST['verify']))
    {
        $id=$_SESSION['otp_id'];
        $user_otp=$_POST['opt'];
        $sql="select * from otp where otp_id=".$id." AND isActive != 1 AND NOW() <=DATE_ADD(created_at, INTERVAL 15 MINUTE)";
        $res=mysqli_query($con,$sql) or die("not fetch <br> ".$sql."<br>".mysqli_error($con));
        $count= mysqli_num_rows($res);
        if(!empty($count))
        {
            $row=mysqli_fetch_row($res);
            $email=$_SESSION['email'];
            $userId=$_SESSION['userId'];
            if($row[1]==$user_otp)
            {
              $sql= "UPDATE users set status=1 WHERE  id=$userId";
              $res=mysqli_query($con,$sql) or die("not update".mysqli_error($con));
             
              $temp=2;
              $passmsg='registered Successfully';
              $sql = "DELETE FROM otp WHERE otp_id=$id";
              mysqli_query($con,$sql) or die("OTP is Not Deleted ....");
            }
            else
            {
              $otpmsg= 'otp is not correct ';
              die( $otpmsg);
              $temp=1;
            }
        }
        else{
          $otpmsg= 'otp is not correct';
          die( $otpmsg);
          $temp=1;
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
        <img src="Assets/img/pexels-avinash-patel-445399-683x1024.jpg" alt="Trendy Pants and Shoes"
          class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
      </div>
      <div class="col-lg-8">
        <div class="card-body py-5 px-md-5">

          <?php
if($temp==1)
{ 
  ?>
          <h2 class="text-center">OTP Verification</h2>
          <form method="post">
            <div class="form-outline mb-4">
              <input type="tel" placeholder="OTP" name="opt" required pattern="[0-9]{6}"
                title="Onle Six Digits can  allowed" class="form-control" />
              <label class="form-label" for="First">One Time password</label>
            </div>
            <input type="submit" class="btn btn-primary btn-block mb-4" name="verify" value="Verify" />
          </form>
          <?php
}else if($temp == 2)
{
  
    echo "<script> location.href='login.php?smsg=true'; </script>";
}
else{
?>
          <h2 class="text-center">Registration</h2>
          <form method="post">
            <!-- First Name input -->
            <div class="form-outline mb-4">
              <input type="text" id="First" placeholder="First Name " name="fname" required pattern="[a-zA-Z\s]{2,}"
                title="only characters are allowed" class="form-control" />
              <label class="form-label" for="First">First Name</label>
            </div>

            <!-- Last Name input -->
            <div class="form-outline mb-4">
              <input type="text" id="Last" placeholder="Last Name " name="lname" required pattern="[a-zA-Z\s]{2,}"
                title="only characters are allowed" class="form-control" />
              <label class="form-label" for="Last">Last Name</label>
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" id="email" placeholder="Email" name="email" required class="form-control" />
              <label class="form-label" for="email">Email address</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="password" id="form2Example2" name="password" class="form-control" />
              <label class="form-label" for="form2Example2">Password</label>
            </div>

            <!-- Birth Date input -->
            <div class="form-outline mb-4">
              <input type="date" id="bod" placeholder="Birth Date" name="bod" required class="form-control" />
              <label class="form-label" for="forbodm2Example2">Birth Date</label>
            </div>

            <!-- City input -->
            <div class="form-outline mb-4">
              <input type="text" id="city" placeholder="Your City " name="city" required pattern="[a-zA-Z]{2,}"
                title="only characters are allowed" class="form-control" />
              <label class="form-label" for="city">City</label>
            </div>

            <!-- Mobile input -->
            <div class="form-outline mb-4">
              <input type="tel" id="Mobile" class="form-control" placeholder="Mobile Number " name="mobile" required
                pattern="[0-9]{10}" title="only Number can allowed and 10 digit" />
              <label class="form-label" for="Mobile">Mobile</label>
            </div>
            <!-- Submit button -->
            <input type="submit" class="btn btn-primary btn-block mb-4" name="log" value="Sign in" />
            <div class="col">
              <!-- Simple link -->
              Already registered <a href="login.php">login here</a>
            </div>
        </div>
        </form> <?php } ?>
      </div>
    </div>
  </div>
  </div>
</section>
<!-- Section: Design Block -->

<?php
include "Include/footer.php";
if(isset($otpmsg))
{
  ?>
  <script>
 swal("Error!", "<?php echo $msg ?>", "error");
  </script>
  <?php
}
if(isset($passmsg))
{
  ?>
  <script>
 swal("Success!", "<?php echo $passmsg ?>", "success");
  </script>
  <?php
}
?>