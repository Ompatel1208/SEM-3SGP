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
include 'Include/head.php';
include 'Include/sidebar.php';
  
?>

<main>
  <div class="container-fluid px-4">

    <h1 class="mt-4">Add  Price
    </h1>
    <div class="card mb-4">
      <div class="container">
        <div class="row">
          <div class="col-8">
            <form class="row g-3" method="post" action="MasterFunction.php">
              <div class="col-12">
                <label for="inputAddress" class="form-label">Service Name</label>
                <select class="form-select" aria-label="Default select example" name="service" required>
                    <option>Select</option>
                <?php
                    $sql = "SELECT * FROM services";
                    $res = mysqli_query($con,$sql) or die("Error <br> $sql <br>".mysqli_error($con));
                    while($row = mysqli_fetch_row($res))
                    {
                        echo "<option value='$row[0]'>$row[1]</option>";
                    }
                ?>
</select>   
              </div>
              <div class="col-12">
                <label for="inputAddress" class="form-label">Vehicle</label>
                <select class="form-select" aria-label="Default select example" name="vehicle" required>
                    <option>Select</option>
                    <?php
                    $sql = "SELECT * FROM vehicle_list";
                    $res = mysqli_query($con,$sql) or die("Error <br> $sql <br>".mysqli_error($con));
                    while($row = mysqli_fetch_row($res))
                    {
                        echo "<option value='$row[0]'>$row[1]</option>";
                    }
                ?>
                </select>
              </div>
              <div class="col-12">
              <label for="inputAddress" class="form-label">Price</label>
              <input type="number" class="form-control" id="inputAddress" placeholder="price" name="price"
                  required >
                </div>
              <div class="col-12">
                <label for="inputAddress2" class="form-label">Status</label>
                <select class="form-select" aria-label="Default select example" name="status" required>
                  <option value="1" selected >Active</option>
                  <option value="0" >Inactive</option>
                </select>
              </div>
              <div class="col-12">
                <input type="submit" class="btn btn-primary"
                  name="addPrice" value="Submit" />
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