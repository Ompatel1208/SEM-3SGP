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
if(isset($_GET['edit']))
{
    $id = $_GET['edit'];
    $sql ="SELECT * FROM `services` where `id`=$id";
    $res = mysqli_query($con,$sql) or die("error <br> $sql<br>".mysqli_error($con));
    $row = mysqli_fetch_row($res) or die("error");
    $name = $row[1];
    $Desc = $row[2];
    $status = $row[3];
}

include 'Include/head.php';
include 'Include/sidebar.php';
  
?>

<main>
  <div class="container-fluid px-4">

    <h1 class="mt-4">
      <?php echo isset($id) ? 'Edit ' : 'Add '; ?> Service
    </h1>
    <div class="card mb-4">
      <div class="container">
        <div class="row">
            <div class="col-8">
            <form class="row g-3" method="post" action="MasterFunction.php">
              <div class="col-12">
                <label for="inputAddress" class="form-label">Name</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="Service type" name="name"
                  required value="<?php echo isset($name) ? $name : ''; ?>">
              </div>
              <div class="col-12">
                <label for="inputAddress" class="form-label">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="desc"
                  rows="3"><?php echo isset($Desc) ? $Desc : ''; ?></textarea>
              </div>
              <div class="col-12">
                <label for="inputAddress2" class="form-label">Status</label>
                <input type="hidden" name="typeId" value="<?php echo isset($id) ? $id : ''; ?>">
                <select class="form-select" aria-label="Default select example" name="status" required>
                  <option value="1" <?php echo isset($status) && $status==1 ? 'selected' : '' ; ?> >Active</option>
                  <option value="0" <?php echo isset($status) && $status==0 ? 'selected' : '' ; ?>>Inactive</option>
                </select>
              </div>
              <div class="col-12">
                <input type="submit" class="btn btn-primary"
                  name="<?php echo isset($id) ? 'editService' : 'addService'; ?>" value="Submit" />
              </div>
            </form>
            </div>
            <div class="col-4">
                <img src="../Assets/img/auto-service-illustration_1284-20618.jpg" class="img-fluid" />
             </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php
include 'Include/footer.php';
?>