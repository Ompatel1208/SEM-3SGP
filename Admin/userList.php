  <?php
  session_start();
  include '../config/config.php';
  session_start();
  if(isset($_SESSION['Admin']))
  {
      $useremail = $_SESSION['Email'];
  } else 
  {
      echo "<script> location.href='../login.php'; </script>";
  }

  if(isset($_GET['del']))
  {
    $del_id=$_GET['del'];
    $sql="delete from users where id=$del_id";
    $res=mysqli_query($con,$sql) or die ("not deleted");
    if($res)
    {
        echo "<script> alert('Owner Successfully Deleted ....!'); </script>";
        echo "<script> location.href='userList.php'; </script>";  
    }
  }
  include 'Include/head.php';
  include 'Include/sidebar.php';
  ?>
            
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">User List</h1>
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
                                            <th>Email</th>
                                            <th>BirthDate</th>
                                            <th>City</th>
                                            <th>Mobile</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>BirthDate</th>
                                            <th>City</th>
                                            <th>Mobile</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
$str="select * from users where status=1 and role=1 order by id desc";
$res=mysqli_query($con,$str) or die("error <br>". $sql.'<br>'. mysqli_error($con));
$i=1;
while($row = mysqli_fetch_row($res))
{
    echo '<tr>';
    echo '<td>'.$i.'</td>';
    echo '<td>'.ucfirst($row[1]).' '.ucfirst($row[2]).'</td>';
    echo '<td>'.$row[3].'</td>';
    echo '<td>'.$row[5].'</td>';
    echo '<td>'.ucfirst($row[6]).'</td>';
    echo '<td>'.$row[7].'</td>';
    echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to Delete User');\" href='userList.php?del=".$row[0]."'><i class='fa fa-trash-alt text-danger h4'></i></a></td>";
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
