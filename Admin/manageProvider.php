<?php
session_start();
if(isset($_SESSION['Admin']))
{
    $useremail = $_SESSION['Email'];
} else 
{
    echo "<script> location.href='../login.php'; </script>";
}
  include '../config/config.php';

  if(isset($_GET['id']))
  {
    $id = $_GET['id'];
    $sql ="SELECT * FROM `provider` where `id`=$id";
    $res = mysqli_query($con,$sql) or die("error <br> $sql<br>".mysqli_error($con));
    $row = mysqli_fetch_row($res) or die("error");
    $name = $row[1];
    $status = $row[9];
    $address = $row[2];
    $mobile1 = $row[3];
    $mobile2 = $row[4];
    $email = $row[5];
    $gst = $row[7];
    $map = $row[8];
    $pass = $row[6];
  }

  include 'Include/head.php';
  include 'Include/sidebar.php';
  ?>
<main>
  <div class="container-fluid px-4">

    <h1 class="mt-4"><?php echo isset($id) ? 'Edit ' : 'Add '; ?> Provider</h1>
    <div class="card mb-4">
      <div class="container">
        <div class="row">
          <div class="col-12">
          <form class="row g-3" method="post" action="MasterFunction.php">
          <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Name</label>
    <input type="text" class="form-control" id="inputEmail4" required name="name" value="<?php echo isset($name) ? $name : ''; ?>">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">GST</label>
    <input type="text" class="form-control" id="inputPassword4" name="gst" value="<?php echo isset($gst) ? $gst : ''; ?>" required>
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control" id="inputEmail4" name="email" value="<?php echo isset($gst) ? $gst : ''; ?>" required readonly>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Password</label>
    <input type="password" class="form-control" id="inputPassword4" name="pass" <?php echo isset($pass) ? '' : 'required'; ?>>
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Address</label>
    <input type="text" class="form-control" id="inputAddress" name="address" value="<?php echo isset($address) ? $address : ''; ?>" required>
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Mobile 1</label>
    <input type="text" class="form-control" id="inputEmail4" name="mobile1" value="<?php echo isset($mobile1) ? $mobile1 : ''; ?>" required>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Mobile 2</label>
    <input type="text" class="form-control" id="inputPassword4" name="mobile2" value="<?php echo isset($mobile2) ? $mobile2 : ''; ?>" required>
  </div>
  <!-- <div class="col-md-6">
    <label for="inputCity" class="form-label">Map URL</label>
    <input type="text" class="form-control" id="inputCity" name="url" value="<?php echo isset($map) ? $map : ''; ?>" required>
  </div> -->
  <div class="col-md-6">
  <label for="inputAddress2" class="form-label">Status</label>
                <input type="hidden" name="providerId" value="<?php echo isset($id) ? $id : ''; ?>">
                <select class="form-select" aria-label="Default select example" name="status" required>                
                  <option value="1" <?php echo isset($status) && $status==1 ? 'selected' : ''; ?> >Active</option>
                  <option value="0" <?php echo isset($status) && $status==0 ? 'selected' : ''; ?>>Inactive</option>          
                </select>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary" name="<?php echo isset($id) ?'editProvider' : 'addProvider'; ?>">Save</button>
  </div>
</form>
          </div>
        

        </div>
      </div>
      <div class="card-body">
       
      </div>
    </div>
  </div>
</main>
<?php

include 'Include/footer.php';
?>