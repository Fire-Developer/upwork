<?php
include('../connection.php');
 
if(isset($_GET['del_user'])){
    $sid = $_GET['del_user'];
  }
$sql = "DELETE FROM company_account WHERE buyer_id= '$sid'";
$run = mysqli_query($conn,$sql);
if($run){
    header('Location:manage_users.php');
}else{
    echo "<font color='red'>Failed to delete record";
}

?>