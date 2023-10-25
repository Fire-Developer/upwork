<?php
session_start();
$page_title = 'Manage_users'; 
  if(!isset($_SESSION['a_id']) && !isset($_SESSION['a_name'])){
    echo "<script>window.location.href='Administrator_login.php';</script>"; 
  } 
include('../connection.php');
include('../include/sidebar_top.php');
include('../include/offcanvas1.php');
$html = "";
$serial = 0;
$query = "SELECT * FROM  company_account";
$run   = mysqli_query($conn,$query);
while($value = mysqli_fetch_array($run)){
    $serial = $serial + 1; 
    $sid = $value['buyer_id'];
    // $status = $value['status'];
    // $check = 'success';
    // if($status == 'Active'){
    //   $shop_status = '<a href="update.php?userid='.$sid.'&status=In-Active"><span class="badge bg-success p-2" style="width:60px;">Active</span></a>';
    // }else{
    //   $shop_status = '<a href="update.php?userid='.$sid.'&status=Active"><span class="badge bg-danger p-2" style="width:60px;">Deactive</span></a>';
    // }
   $html .='<tr>
     <td>'.$serial.'</td>
     <td>'.$value['name'].'</td>
     <td>'.$value['username'].'</td>
     <td>'.$value['email'].'</td>
     <td>'.$value['role'].'</td>   
     <td><img src="../upload_images/'.$value['img'].'" width="50" height="40px"></td> 
     <td>
          <a href="edit_user.php?edit_id='.$value['buyer_id'].'" class="btn me-1 btn-sm btn-success">Update
      </td>
      <td>
          <a href="delete_user.php?del_user='.$value['buyer_id'].'" class="btn btn-sm btn-danger">Delete
      </td>
    </tr>';
}
?>

<main class="col-md-10 ms-sm-12 col-lg-10 mx-sm-auto">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="">Manage Users</h1>

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

        
      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
          <a href="../buyer_register.php" class="btn btn-sm btn-outline-secondary"style="text-decoration:none;">Add users</a>
        </div>
      </div>
      </div>
        <div class="table-responsive">
          <div class="" style="height:60vh;">
              <table class="table">      
              <thead>
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">Name</th>
                  <th scope="col">UserName</th>
                  <th scope="col">Email</th>
                  <th scope="col">gender</th>
                  <th scope="col">Profile</th>
                  <th scope="col">Status</th>
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
    
  <script>
  setTimeout(function() {
  let alert = document.querySelector(".alert");
  alert.remove();
  }, 3000);

</script>