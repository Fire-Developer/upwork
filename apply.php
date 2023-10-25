<?php
$page_title = 'Get_Jobs';
$alert='';
session_start();
include("connection.php"); 
include("include/Top_bar.php"); 
if(isset($_SESSION['username'])){
    include("include/header2.php"); 
}else{
    echo "<script>window.location.href='index.php';</script>";
}
   
$query = "SELECT * FROM  apply";
$run   = mysqli_query($conn,$query);
$value = mysqli_fetch_array($run); 
$username = $value['username'];
if(isset($_POST['apply'])){   
      $discription = $_POST['job_discription']; 
      $resume        = $_FILES['resume']['name'];
      $tmp_name    = $_FILES['resume']['tmp_name'];
      $path        = 'upload_images/'.$resume ;
      move_uploaded_file($resume , $path);
      $price       = $_POST['price'];   
      $username  = $_SESSION['username'];  
      if($username == $_SESSION['username']){ 
       $alert = "
        <div class='alert alert-success alert-dismissible fade show' >
            <strong>ERROR!</strong>You Have Already Applied For This Job.
            <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
        </div> 
        ";
        // echo "<script>window.location.href='single_post.php';</script>";
    }else{
        
      $query = "INSERT INTO `apply`(`job_discription`, `resume`, `price`, `username`) 
      VALUES ('$discription','$resume','$price','$username')";
      $data = mysqli_query($conn, $query); 
      if($data){    
        $alert = "
        <div class='alert alert-success alert-dismissible fade show' >
            <strong>Congratulation!</strong>Applied Successfully .
            <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
        </div>
        ";
      } else{
        $alert = "
        <div class='alert alert-success alert-dismissible fade show' >
            <strong>ERROR!</strong>Insertion Error.
            <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
        </div>
        ";
      }
    } 
}  
 
?>
<div class="container-fluid" >
    <div class="row mt-5">
        <div class="col-12 mt-5">
            <?php echo $alert;?>
        </div>
        <div class="col-md-4 col-sm-8 col-9 mx-auto">
            <span style="font-weight: 700; font-size: 43px !important; font-family: 'Noto Serif', serif !important;">
               Let the matching begin...
            </span>
            <p style="font-size:16px !important; font-family: 'Roboto Slab', serif; font-weight: 400 !important; color:var(--text-color-)!important;">Forget the old rules. You can have the best people.
            Right now. Right here.</p>
            <p><span class="looking me-2"><a href="#" style="color: green !important;"><span class="looking-bt"></span>
            <span class="looking-bt">How does this matching thing work?</span></a></p>
            <div class="col-12 mb-3">
                <img src="upload_images/lap1.gif" class="100-w img-fluid d-block" alt="">
            </div>
        </div>
        <div class="col-md-5 col-sm-9 col-9 mx-auto ">
            <form action="" method="post" enctype="multipart/form-data">  
                <span class="h6 mt-5">Additional Details?</span> &#160;cover Letter
                <span class="d-block mb-3" style="font-size:15px !important; font-family: 'Roboto Slab', serif; font-weight: 400 !important; color:var(--text-color-)!important;">This will help get your brief to the right talent. Specifics help here.</span>
                <div class="col-12">
                    <textarea id="editor" name="job_discription" style="height: 30vh !important; width: 100% !important;"></textarea>
                </div>
                <span class="looking-bt">How to write a great Proposal</span></a></p>
                <div class="mb-3 mt-4 col-12">
                    <label for="formFile" class="form-label">Enter Your Resume</label>
                    <input class="form-control" type="file" name="resume" id="formFile">
                </div>
                <div class="mb-3 mt-4 col-12"> 
                    <span class="">Your Estimated Budget</span> 
                    <input type="text" name="price" value="$" style="width:70px !important;">
                </div>
                <div class="mb-3 mt-4 col-12"> 
                    <input type="submit" name="apply" class="btn btn-outline-success" value="Apply Now" style="width: 100px !important;"> 
                </div>
            </form>
        </div>
    </div>
</div> 
<?php include("include/footer.php");?>
<!-- <script src="../assets/ckeditor/ckeditor.js"></script>  -->
<!-- <script>
        CKEDITOR.replace('editor');
</script> -->