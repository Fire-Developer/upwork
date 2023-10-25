<?php
include('../connection.php');
 
if(isset($_GET['del_job'])){
    $sid = $_GET['del_job'];
  }
$sql = "DELETE FROM job_posts WHERE p_id= '$sid'";
$run = mysqli_query($conn,$sql);
if($run){
    header('location:manage_jobs.php');
}else{
    echo "<font color='red'>Failed to delete record";
}

?>