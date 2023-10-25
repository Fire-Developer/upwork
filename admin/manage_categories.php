<?php
session_start();
$page_title = 'manage_categories';
if(!isset($_SESSION['a_id']) && !isset($_SESSION['a_name'])){
  echo "<script>window.location.href='Administrator_login.php';</script>"; 
}
include('../connection.php');
include('../include/Top_bar.php'); 
include('../include/sidebar_top.php');
include('../include/offcanvas1.php');
$html = "";
$serial = 0;
$query = "SELECT * FROM  categories";
$run   = mysqli_query($conn,$query);
while($value = mysqli_fetch_array($run)){
    $serial = $serial + 1; 
    $cid = $value['cat_id'];
    $category = $value['category'];
   $html .='<tr>
     <td>'.$serial.'</td>
     <td>'.$value['category'].'</td>
     <td>
          <a href="edit_category.php?edit_cat='.$cid.'" class="btn btn-sm btn-success" >Update
          <a href="delete_category.php?del_cat='.$cid.'" class="btn btn-sm ms-2 btn-danger">Delete
      </td>
    </tr>';
}
?>

<main class="col-md-8 ms-sm-10 col-lg-10 mx-sm-auto">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="mx-auto" style="color: green !important; font-weight: 700; ">Manage Categories</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2 mb-1">

        <!-- update session start here -->
        <?php

        if(isset($_SESSION['msgs'])){
          $msg  = $_SESSION['msgs'];
        ?>
        <div class="alert <?php echo $_SESSION['msgs_type']; ?>" style="position:absolute; top:60px;right:5px;">
          <?php echo $msg;?>
        </div>
        <?php
        unset($_SESSION['msgs']);
        }
        ?>  
          <a href="add_category.php" class="btn-sm btn-danger"style="text-decoration:none;">Add Category</a>
        </div>
      </div>
      </div>
        <div class="table-responsive">
          <div class="" style="height:60vh;">
              <table class="table text-center">      
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                      echo $html;
                  ?> 
                </tbody>
              </table>
          </div>
        </div> 
        </main>
       
    
