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
                     <h1 class="mt-4">Feedback</h1>
                       
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
						<th>Subject</th>
                        <th> Message </th>
						
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Id</th>
						
						<th>Name</th>
						<th>Subject</th>
                        <th> Message </th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
$sql="SELECT f.id ,f.message, f.subject,u.fname,u.lname FROM `feedback` f inner join users u on u.Id=f.userId";
$res=mysqli_query($con,$sql) or die("error <br>". $sql.'<br>'. mysqli_error($con));
$i=1;
while($row = mysqli_fetch_row($res))
{
   
    echo '<tr>';
    echo '<td>'.$i.'</td>';  
    echo '<td>'.$row['3'].' '.$row['4'].'</td>';
    echo '<td>'.$row['2'].'</td>';
    echo '<td>'.$row['1'].'</td>';
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
