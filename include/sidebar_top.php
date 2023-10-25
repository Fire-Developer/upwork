<?php
$profile ='';
$name = ''; 
include("../connection.php");
if(isset($_SESSION['a_id'])){ 
  $id  =  $_SESSION['a_id'];
  $query ="SELECT * FROM administrator WHERE a_id = '$id'";
            $data       = mysqli_query($conn,$query) or die('query failed');
            $result     = mysqli_fetch_array($data);

            $profile  = $result['profile'];
            $name  = $result['name'];
}

?>
<!doctype html>
<html lang="en">
<head>
  <!-- =============== Bootstrap 5.2.3 CDN====================== -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <link rel="icon" href="../upload_images/bar-logo.PNG" type="image/bar-icon">
  </head>
  <header class="navbar navbar-light sticky-top flex-md-nowrap p-0 bg-dark">
  <a class="navbar-brand col-md-3 fs-5 col-lg-2 me-0 px-5  text-white" href="#"><img src="../upload_images/<?php echo $profile ;?>" width="40px" height="40px" class="rounded-circle"> <?php echo $name ?></a>
  <div class="navbar-nav">
    <div class="nav-item">
      <a class="btn me-2 btn-outline-light align-items-center rounded" href="../admin/logout.php">
          SignOut
      </a>
    </div>
  </div>
</header>