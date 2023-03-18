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
                    <a href="createService.php" class="float-end btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Create New Vehicle Type"> <i class="fas fa-plus"></i></a>
                        <h1 class="mt-4">Service List</h1>
                       
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
						<th>Description</th>
                        <th> Status </th>
						<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Id</th>
						
						<th>Name</th>
						<th>Description</th>
                        <th> Status </th>
						<th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
$str="SELECT * from `services`";
$res=mysqli_query($con,$str) or die("error <br>". $sql.'<br>'. mysqli_error($con));
$i=1;
while($row = mysqli_fetch_row($res))
{
   
    echo '<tr>';
    echo '<td>'.$i.'</td>';  
    echo '<td>'.$row['1'].'</td>';
    echo '<td>'.$row['2'].'</td>';
    if($row['3']==1)
    {
        echo '<td><span class="badge bg-success">Active</span></td>';
    }else{
        echo '<td><span class="badge bg-danger">Inactive</span></td>';
    }
    echo "<td><a href='createService.php?edit=".$row[0]."'><i class='fa fa-pen text-dark h4'></i></a>&nbsp;&nbsp; &nbsp;<a onClick=\"javascript: return confirm('Are you sure you want to Delete Service');\" href='MasterFunction.php?delserverice=".$row[0]."'><i class='fa fa-trash-alt text-danger h4'></i></a></td>";
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
