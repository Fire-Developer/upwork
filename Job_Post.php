<?php
$page_title = 'Job_Post';
$alert = '';
$category='';
$categories='';
session_start();
include("connection.php"); 
include("include/Top_bar.php");    
if(isset($_SESSION['username'])){
    include("include/header2.php"); 
}else{
    echo "<script>window.location.href='index.php';</script>";
}  
if(isset($_POST['post'])){
      $title       = $_POST['title'];
      $discription = $_POST['job_discription']; 
      $file        = $_FILES['file']['name'];
      $tmp_name    = $_FILES['file']['tmp_name'];
      $path        = 'upload_images/'.$file ;
      move_uploaded_file($file , $path);
      $price       = $_POST['price'];   
      $username  = $_SESSION['username'];
      $cat        = $_POST['category']; 
      $query = "INSERT INTO `job_posts`(`title`, `job_discription`, `file`, `price`, `username`,`category`) 
      VALUES ('$title','$discription','$file','$price','$username','$cat')";
      $data = mysqli_query($conn, $query); 
      if($data){    
       
        $alert = "
        <div class='alert alert-success alert-dismissible fade show' >
            <strong>Congratulation!</strong>Job Is Successfully Uploaded.
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
$html = '';
    $query = "SELECT * FROM categories";
    $run   = mysqli_query($conn,$query)or die("Query unsuccessful");
    while($result = mysqli_fetch_array($run)){
            $cid  = $result['cat_id'];
            $cat  = $result['category'];
            $categories .='<option value="'.$cid.'">'.$cat.'</option>';
    }
?>
<div class="container-fluid pb-5">
    <div class="row mt-5">
        <div class="col-12 mt-5">
            <?php echo $alert ; ?>
        </div>
        <div class="col-md-4 col-sm-8 col-9 mx-auto mt-5">
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
        <div class="col-md-5 col-sm-9 col-9 mx-auto mt-5">
            <form action="" method="post" enctype="multipart/form-data">
            <span class="h6 mt-3 d-block">Give your project brief a title</span>
                <span class="d-block mb-3" style="font-size:15px !important; font-family: 'Roboto Slab', serif; font-weight: 400 !important; color:var(--text-color-)!important;">Keep it short and simple - this will help us match you to the right category.</span>
                <div class="form-control">
                    <input class="form-control" type="text" name="title" placeholder="Example: Create a Wordpress Website for my Company" id="floatingTextarea">
                </div>
                <span class="looking-bt">Some title examples</span></a></p>
                <span class="h6 mt-5 d-block">What are you looking to get done?</span>
                <span class="d-block mb-3" style="font-size:15px !important; font-family: 'Roboto Slab', serif; font-weight: 400 !important; color:var(--text-color-)!important;">This will help get your brief to the right talent. Specifics help here.</span>
                <div>
                    <textarea id="editor" height="40vh" name="job_discription"></textarea>
                </div>
                <span class="looking-bt">How to write a great description</span></a></p>
                <div class="mb-3 mt-4">
                    <label for="formFile" class="form-label">Add File (Optional)</label>
                    <input class="form-control" type="file" name="file" id="formFile">
                </div>
                <span class="h6 mt-5 d-block">What are you looking to get done?</span>
                    <select name="category" class="p-2">
                        <?php echo $categories;?>
                        <option selected>Choose Category</option>
                        <!-- <option value="Civil Engineering">Civil Engineering</option>
                        <option value="Online Teaching">WordPress</option>
                        <option value="Web Development">SEO</option>
                        <option value="Civil Engineering">Mechanical Engineering</option>
                        <option value="Online Teaching">Graphic Designer</option>
                        <option value="Web Development">Content Writer</option>
                        <option value="Civil Engineering">Digital Marketing</option>  -->
                    </select> 
                <div class="mb-3 mt-4"> 
                    <span>Budget</span> 
                    <input type="text" name="price" value="$" style="width:70px !important;">
                </div>
                <div class="mb-3 mt-4"> 
                    <input type="submit" name="post" class="btn btn-outline-dark" value="Post Now" style="width: 100px !important;"> 
                </div>
            </form>
        </div>
    </div>
</div> 
<?php include("include/footer.php");?>
<!-- <script src="../assets/ckeditor/ckeditor.js"></script> -->
<!-- <script>
        CKEDITOR.replace('blogs');
</script> -->