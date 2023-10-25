<?php
session_start();
$page_title = 'dashboard';
if(!isset($_SESSION['a_id']) && !isset($_SESSION['a_name'])){
  echo "<script>window.location.href='Administrator_login.php';</script>"; 
}
include('../include/sidebar_top.php');
include('../include/offcanvas1.php');
include('../include/Top_bar.php');
?>

<main class="col-md-8 ms-sm-11 col-lg-10 mx-auto">
      <div class="justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom" >
        <h1 style="text-align:center !important; color:green !important; font-weight: 700;" >Dashboard</h1>
      </div>
      <div class="row" style="min-height:65vh;">
      




      
    </div>
</main>
