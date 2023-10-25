<?php
session_start();
$page_title = 'manage_jobs';
if(!isset($_SESSION['id']) && !isset($_SESSION['username'])){ 
    echo "<script>window.location.href='../index.php';</script>";  
}
include('../connection.php');
include('../include/Top_bar.php'); 
include('../include/sidbar_top.php');
include('../include/offcanvas.php');
$html = "";
$serial = 0;
if(isset($_SESSION['username'])){
  $user = $_SESSION['username'];
$query = "SELECT * FROM  job_posts WHERE username = '".$user."'";
$run   = mysqli_query($conn,$query);
while($value = mysqli_fetch_array($run)){
    $serial = $serial + 1; 
    $pid = $value['p_id'];
    $title = $value['title'];
    $disc  = $value['job_discription'];
    // $blog_img   = $value['blog_img'];
    $category   = $value['category'];
    // $author_id  = $value['author_id'];
    $publish_date  = $value['publish_date'];
    $p_date = date('d-m-Y', strtotime($publish_date)); 
    //fetch category from cat table
    $query1 = "SELECT * FROM  categories WHERE cat_id = '".$category."'";
    $run1   = mysqli_query($conn,$query1);
    $value1 = mysqli_fetch_array($run1);
    $cat    =  $value1['category'];
   $html .='<tr>
     <td>'.$serial.'</td>
     <td>'.$title.'</td>
     <td>'.$disc.'</td>
     <td>'.$cat.'</td> 
     <td>'.$p_date.'</td>
     <td>
          <a href="update_job.php?upd_job='.$pid.'" class=" me-2 btn btn-sm  btn-success">Update
      </td>
      <td>
      <a href="delete.php?del_job='.$pid.'" class="btn btn-sm  btn-danger">Delete
      </td>

    </tr>';
 }
}
?>

<main class="col-md-8 ms-sm-10 col-lg-10 mx-sm-auto">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="mx-auto" style="color: green !important; font-weight: 700; ">Manage Jobs</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2 mb-2">

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
 
          <a href="../Job_Post.php" class="btn btn-sm btn-danger"style="text-decoration:none;">Add Job</a>
        </div>
      </div>
      </div>
        <div class="table-responsive mt-5 mb-5">
          <div class="" style="height:60vh;">
              <table class="table" id="data_list">      
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Title</th>
                  <th scope="col">Discription</th>
                  <th scope="col">Category</th> 
                  <th scope="col">Publish</th>
                  <th scope="col" colspan="2" class="text-center">Action</th>
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
      </div>
  </div>
    
