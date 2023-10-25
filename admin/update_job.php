<?php 
session_start(); 
$page_title = 'manage_jobs';
$cat = $html ='';
$categories = '';
$category   = '';
// session_unset();
include("../connection.php"); 
include("../include/Top_bar.php");   
include("../include/sidebar.php");     
if(isset($_GET['upd_job'])){
    $id = $_GET['upd_job'];
  }
$query = "SELECT * FROM  job_posts WHERE p_id = '".$id."'";
$run   = mysqli_query($conn,$query);
while($value = mysqli_fetch_array($run)){ 
    $pid = $value['p_id'];
    $title = $value['title'];
    $disc1  = $value['job_discription'];
    // $blog_img   = $value['blog_img'];
    $price = $value['price'];
    $category   = $value['category']; 
    //fetch category from cat table
    $query2 = "SELECT * FROM  categories";
    $run2   = mysqli_query($conn,$query2);
    while($value2 = mysqli_fetch_array($run2)){
        $cid  = $value2['cat_id'];
        $cat  = $value2['category'];
        $html.='<option value="'.$cid.'">'.$cat.'</option>';
    }
} 


if(isset($_POST['post'])){
    $title       = $_POST['title'];
    $discription = $_POST['job_discription'];  
    $price       = $_POST['price'];   
    $username  = $_SESSION['username'];
    $category        = $_POST['category']; 

    $query = "UPDATE job_posts SET (`title`, `job_discription`,`price`,`category`)
    VALUES ('$title','$discription','$price','$category')";
    $data = mysqli_query($conn, $query); 
    if($data){    
        header("Location:manage_jobs.php");
        if($data){
            echo"
            <div class='alert alert-success alert-dismissible fade show' >
                <strong class='text-center'>Congratulation!</strong>Job Is Successfully Updated.
                <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
            </div>
            " ;
        }
    } else{
      echo "
      <div class='alert alert-success alert-dismissible fade show' >
          <strong class='text-center'>ERROR!</strong>Updation Error.
          <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
      </div>
      ";
    }
}
    
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3" >
        <div class="row">
        <h1 class="pb-3" style="color: green; font-weight: 700; border-bottom: 1px solid rgba(0,0,0,0.25);">Update Job</h1>
           <div class="col-md-4 col-sm-8 col-9 mx-auto mt-5">
            <span style="font-weight: 700; font-size: 43px !important; font-family: 'Noto Serif', serif !important;">
               Let the matching begin...
            </span>
            <p style="font-size:16px !important; font-family: 'Roboto Slab', serif; font-weight: 400 !important; color:var(--text-color-)!important;">Forget the old rules. You can have the best people.
            Right now. Right here.</p>
            <p><span class="looking me-2"><a href="#" style="color: green !important;"><span class="looking-bt"></span>
            <span class="looking-bt">How does this matching thing work?</span></a></p>
            <div class="col-12 mb-3">
                <img src="../upload_images/lap1.gif" class="100-w img-fluid d-block" alt="">
            </div>
        </div>
        <div class="col-md-5 col-sm-9 col-9 mx-auto mt-5">
            <form action="" method="post" enctype="multipart/form-data">
            <span class="h6 mt-3 d-block">Give your project brief a title</span>
                <span class="d-block mb-3" style="font-size:15px !important; font-family: 'Roboto Slab', serif; font-weight: 400 !important; color:var(--text-color-)!important;">Keep it short and simple - this will help us match you to the right category.</span>
                <div class="form-control">
                    <input class="form-control" type="text" value="<?php echo $title;?>" name="title" placeholder="Example: Create a Wordpress Website for my Company" id="floatingTextarea">
                </div>
                <span class="looking-bt">Some title examples</span></a></p>
                <span class="h6 mt-5 d-block">What are you looking to get done?</span>
                <span class="d-block mb-3" style="font-size:15px !important; font-family: 'Roboto Slab', serif; font-weight: 400 !important; color:var(--text-color-)!important;">This will help get your brief to the right talent. Specifics help here.</span>
                <div>
                    <textarea id="editor" name="job_discription"><?php echo $disc1;?></textarea>
                </div>
                <span class="looking-bt">How to write a great description</span></a></p>
                <!-- <div class="mb-3 mt-4">
                   <label for="formFile" class="form-label">Add File (Optional)</label>
                   <input class="form-control" type="file" name="file" id="formFile">
                </div>-->
                <span class="h6 mt-5 d-block">What are you looking to get done?</span>
                <select class="form-select mb-3" name="category">
                    <option disabled  selected>Select category</option>  
                    <?php echo $html;?>
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
                    <input type="text" name="price" value="<?php echo $price;?>" style="width:70px !important;">
                </div>
                <div class="mb-3 mt-4"> 
                    <input type="submit" name="post" class="btn btn-outline-dark" value="Post Now" style="width: 100px !important;"> 
                </div>
            </form>
        </div> 
    </div>  
</main>
<script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script> 
   <script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );

     
         setTimeout(function() {
          let alert = document.querySelector(".alert");
          alert.remove();
          }, 3000);
    </script>
