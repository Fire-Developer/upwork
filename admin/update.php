<?php

include('../connection.php');
 
////---------uPDATE Query status////////////////////////////
// if(isset($_GET['apid'])){
//     $sid = $_GET['apid'];
//   }
//   $query = "UPDATE apply SET WHERE ap_id = '".$sid."'";
//   $run = mysqli_query($conn, $query);
//   if($run){
//     header('Location:manage_applicant.php');
//   }

////---------uPDATE Query status////////////////////////////
if(isset($_GET['userid'])){
    $id = $_GET['userid'];
    $status = $_GET['status'];
  $query = "UPDATE company_account SET status='".$status."' WHERE buyer_id = '".$id."'";
  $run = mysqli_query($conn, $query);
  if($run){
    header('location:manage_users.php');
  }
}


?>

?>