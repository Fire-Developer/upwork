<?php 
include("connection.php");
if(isset($_SESSION['username'])){
   $user = $_SESSION['username'];
   $query = "SELECT * FROM company_account WHERE username = '".$user."' ";
   $data = mysqli_query($conn, $query);
   while($row = mysqli_fetch_array($data)){
    $profile = $row['img'];
    $name = $row['name'];
   }
}else{
  echo "<script>window.location.href='../index.php';</script>";
}
?>
<div class="action">
  <div class="profile">
  <img src="upload_images/<?php echo $profile ;?>" class="profile-img" onclick="menuToggle();" alt="">
</div>
  <div class="menu">
      <h4><img src="upload_images/<?php echo $profile ;?>" class="sub-profile-img me-2 mb-3" alt="" style="border: 2px solid rgb(4, 249, 4) !important;">Hi! <?php echo $name ;?><span class="d-block">Web Developer</span><br><span class=" text-light border py-2 px-3 rounded" style="margin-left: -30px !important;"><?php echo $role ;?></span></h4>
      <ul class="prolink">
        <li><a href="#" class=" text-light<?php  echo ($page_title =='')? 'active text-col" ':''; ?>" ><i class="fa-solid fa-house me-2 i-con"></i>Profile</a></li>
        <li><a href="#" class="text-light<?php  echo ($page_title =='')? 'active text-col" ':''; ?>"><i class="fa-solid fa-earth-asia me-2 i-con"></i>Edit Profile</a></li>
        <li><a href="Job_bank.php" class="text-light <?php  echo ($page_title =='Get_Jobs')? 'active text-col" ':''; ?>"><i class="fa-solid fa-earth-asia me-1 i-con"></i>Get jobs</a></li>
        <!-- <li><a href="Job_Post.php" class="text-light <?php  echo ($page_title =='')? 'active text-col" ':''; ?>"><i class="fa-solid fa-business-time me-2 i-con"></i>Manage</a></li> 
        <li><a href="Manage_Post.php" class=" text-light<?php  echo ($page_title =='')? 'active text-col" ':''; ?>"><i class="fa-solid fa-business-time me-2 i-con"></i>Manage Posts</a></li> -->
        <li><a href="logout.php" class="text-light <?php  echo ($page_title =='Logout')? 'active text-col" ':''; ?>"><i class="bi bi-box-arrow-left me-2 i-con"></i>Logout</a></li> 
      </ul>
  </div>
</div> 
 




      
 
    
