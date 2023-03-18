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

if(isset($_GET['editPrice']))
{
    $priceId = $_GET['editPrice'];
    $sql = "SELECT * FROM price_list where Id='$priceId'";
    $res = mysqli_query($con,$sql) or die("Error <br> $sql  <br>".mysqli_error($con));
    $row = mysqli_fetch_row($res);
    $serviceId = $row[1];
    $vehicleId = $row[2];
    $price = $row[3];
    $status = $row[4];
}
else{
    echo "<script> location.href='PriceList.php'; </script>";
}
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
                <select class="form-select" aria-label="Default select example" name="service" required readonly>
                    <option>Select</option>
                <?php
                    $sql = "SELECT * FROM services";
                    $res = mysqli_query($con,$sql) or die("Error <br> $sql <br>".mysqli_error($con));
                    while($row = mysqli_fetch_row($res))
                    {
                        if($serviceId==$row[0])
                        {
                            echo "<option value='$row[0]' selected>$row[1]</option>";
                        }else{
                            echo "<option value='$row[0]'>$row[1]</option>";
                        }
                        
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
                        if($vehicleId == $row[0])
                        {
                            echo "<option value='$row[0]' selected>$row[1]</option>";
                        }else{
                            echo "<option value='$row[0]'>$row[1]</option>";
                        }
                       
                    }
                ?>
                </select>
              </div>
              <div class="col-12">
              <label for="inputAddress" class="form-label">Price</label>
              <input type="hidden" name="priceId" value="<?php echo $priceId; ?>">
              <input type="number" class="form-control" id="inputAddress" placeholder="price" name="price"
                  required  value="<?php echo $price; ?>">
                </div>
              <div class="col-12">
                <label for="inputAddress2" class="form-label">Status</label>
                <select class="form-select" aria-label="Default select example" name="status" required>
                  <option value="1" <?php echo $status==1 ? 'selected' : '' ?> >Active</option>
                  <option value="0" <?php echo $status==0 ? 'selected' : '' ?>>Inactive</option>
                </select>
              </div>
              <div class="col-12">
                <input type="submit" class="btn btn-primary"
                  name="editPrice" value="Submit" />
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