<?php
$profile = $name = '';
if(!isset($_SESSION['username'])){
  echo "<script>window.location.href='../index.php';</script>";
}
include("../connection.php");
if(isset($_SESSION['id'])){
  $id  =  $_SESSION['id'];
  $query ="SELECT * FROM company_account WHERE buyer_id = '$id'";
            $data       = mysqli_query($conn,$query) or die('query failed');
            $result     = mysqli_fetch_array($data);

            $profile  = $result['img'];
            $name  = $result['name'];
}

?>
  <header class="navbar navbar-light sticky-top flex-md-nowrap p-0 bg-dark">
  <a class="navbar-brand col-md-3 fs-5 col-lg-2 me-0 px-2  text-white" href="#"> <img src="../upload_images/<?php echo $profile ;?>" width="40px" height="40px" class="rounded-circle"> <?php echo $name ?></a>
  <div class="navbar-nav">
    <div class="nav-item">
      <a class="btn me-1 btn-outline-light align-items-center rounded" href="../logout.php">
          SignOut
      </a>
    </div>
  </div>
</header>