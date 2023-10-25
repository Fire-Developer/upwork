<?php
include('../connection.php');
 
if(isset($_GET['del_ap'])){
    $id = $_GET['del_ap'];
  }
$sql = "DELETE FROM apply WHERE ap_id= '$id'";
$run = mysqli_query($conn,$sql);
if($run){
    header('location:manage_applicant.php');
}else{
    echo "<font color='red'>Failed to delete record";
}

?>