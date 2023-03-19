<?php
  session_start();
  include '../config/config.php';
  if(isset($_SESSION['Admin']))
  {
      $useremail = $_SESSION['Email'];
  } else 
  {
      echo "<script> location.href='../login.php'; </script>";
  }


  include 'Include/head.php';
  include 'Include/sidebar.php';
  ?>
            
                <main>
                    <div class="container-fluid px-4">
                    <a href="manageprice.php" class="float-end btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Create New Vehicle Type"> <i class="fas fa-plus"></i></a>
                        <h1 class="mt-4">Service Price</h1>
                        <!-- <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol> -->
                        <div class="card mb-4">
                            <!-- <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                User List
                            </div> -->
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                    <tr>
                                            <th>Id</th>
                                            <th>Vehicle Type</th>
                                            <th>Service Name</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Id</th>
                                            <th>Vehicle Type</th>
                                            <th>Service Name</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
$str="select p.price,p.status,s.serviceName,v.name,p.Id from price_list p inner join services s on s.id = p.service_Id inner join vehicle_list v on v.id= p.vehicle_Id";
$res=mysqli_query($con,$str) or die("error <br>". $sql.'<br>'. mysqli_error($con));
$i=1;
// echo implode(" ,", mysqli_fetch_row($res)); 
while($row = mysqli_fetch_row($res))
{
    echo '<tr>';
    echo '<td>'.$i.'</td>';
    echo '<td>'.$row[3].'</td>';
    echo '<td>'.$row[2].'</td>';
    echo '<td>'.$row[0].'</td>';
    if($row[1]=='1')
    {
        echo '<td><span class="badge bg-success">Active</span></td>';
    }else{
        echo '<td><span class="badge bg-danger">Inactive</span></td>';
    }
    echo "<td><a href='editPrice.php?editPrice=".$row[4]."'><i class='fa fa-pen text-dark h4'></i></a>&nbsp;&nbsp; &nbsp;<a onClick=\"javascript: return confirm('Are you sure you want to Delete User');\" href='MasterFunction.php?pricedel=".$row[4]."'><i class='fa fa-trash-alt text-danger h4'></i></a></td>";
    echo '</tr>';
    $i = $i + 1;
}
// editPrice.php
?>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
<?php

include 'Include/footer.php';
?>
