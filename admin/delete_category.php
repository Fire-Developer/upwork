<?php
include('../connection.php');
 
if(isset($_GET['del_cat'])){
    $cid = $_GET['del_cat'];
  }
$sql = "DELETE FROM categories WHERE cat_id= '$cid'";
$run = mysqli_query($conn,$sql);
if($run){
    header('location:manage_categories.php');
}else{
    echo "<font color='red'>Failed to delete record";
}

?>