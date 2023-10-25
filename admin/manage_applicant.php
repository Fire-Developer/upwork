<?php
$page_title = 'manage_applicant';
session_start();
if(!isset($_SESSION['id']) && !isset($_SESSION['username'])){
  
    echo "<script>window.location.href='../index.php';</script>"; 
   
}
include('../connection.php');
include('../include/Top_bar.php');
include('../include/sidbar_top.php');
include('../include/offcanvas.php');
$html = "";
$serial = 0; 
$author = '';
$author2 = '';
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $status = $_GET['status'];
  $query = "UPDATE apply SET status = '".$status."' WHERE ap_id ='".$id."'";
  $run = mysqli_query($conn, $query);
} 
         
  $query = "SELECT * FROM  apply";
  $run  = mysqli_query($conn,$query);
  while($value = mysqli_fetch_array($run)){
    $serial = $serial + 1; 
    $id = $value['ap_id'];
    $status = $value['status'];
    $author = $value['author'];
    // $check = 'success';
    if($status == "Accept"){
      $btn = '<a class="btn btn-sm btn-success" href="manage_applicant.php?id='.$id.'&status=Pendding">Accept</a>';
    }
    else{
      $btn = '<a class="btn btn-sm btn-danger" href="manage_applicant.php?id='.$id.'&status=Accept">Pendding</a>';
    } 
   
      $html .='<tr>
      <td>'.$serial.'</td>
      <td>'.$value['username'].'</td> 
      <td>'.$value['job_discription'].'</td>
      <td>'.$value['price'].'</td> 
      <td>'.$btn.'</td> 
        <td> 
            <a href="delete_applicant.php?del_ap='.$id.'" class="btn btn-sm btn-danger">Delete
        </td>
      </tr>';
 
}
?>
<main class="col-md-8 ms-sm-11 col-lg-10 mx-auto">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="mx-auto" style="color: green !important; font-weight: 700; ">Manage Proposals</h1>
</div>
          
        <div class="table-responsive">
          <div class="" style="height:60vh;">
              <table class="table">      
              <thead>
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">Name</th> 
                  <th scope="col">Proposal</th> 
                  <th scope="col">Budget</th>
                  <th scope="col">Action</th>
                  <th scope="col">Dismiss</th>
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
      </div>  
</main>
    
    
