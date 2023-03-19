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
                    <a href="manageProvider.php" class="float-end btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Create New Vehicle Type"> <i class="fas fa-plus"></i></a>
                        <h1 class="mt-4">Provider</h1>
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
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Mobile1</th>
                                            <th>Mobile2</th>
                                            <th>Email</th>
                                            <th>GST</th> 
                                            <th>status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Id</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Mobile1</th>
                                            <th>Mobile2</th>
                                            <th>Email</th>
                                            <th>GST</th>
                                            <th>status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
$str="SELECT * FROM `provider`";
$res=mysqli_query($con,$str) or die("error <br>". $sql.'<br>'. mysqli_error($con));
$i=1;
// echo implode(" ,", mysqli_fetch_row($res)); 
while($row = mysqli_fetch_row($res))
{
    echo '<tr>';
    echo '<td>'.$i.'</td>';
    echo '<td>'.$row[1].'</td>';
    echo '<td>'.$row[2].'</td>';
    echo '<td>'.$row[3].'</td>';
    echo '<td>'.$row[4].'</td>';
    echo '<td>'.$row[5].'</td>';
    echo '<td>'.$row[7].'</td>';
    if($row[9]==1)
    {
        echo '<td><span class="badge bg-success">Active</span></td>';
    }else{
        echo '<td><span class="badge bg-danger">Inactive</span></td>';
    }
    echo "<td><a href='manageProvider.php?id=".$row[0]."'><i class='fa fa-pen text-dark h4'></i></a>&nbsp;&nbsp; &nbsp;<a onClick=\"javascript: return confirm('Are you sure you want to Delete Provider');\" href='MasterFunction.php?providerDel=".$row[0]."'><i class='fa fa-trash-alt text-danger h4'></i></a></td>";
    echo '</tr>';
    $i = $i + 1;
}
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
