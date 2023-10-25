<?php
session_start();
if(!isset($_SESSION['a_id']) && !isset($_SESSION['a_name'])){

  header('location:index.php');
}
include('../include/connection.php');
include('../include/topbar.php');
include('../include/sidebar.php');
$img_error = $imgmsg = '';
    if(isset($_POST['add'])){
        $title = $_POST['b_title'];
        $disc = $_POST['disc'];
        $cat = $_POST['cat'];
        $aid  = $_SESSION['a_id'];
        $img_name = $_FILES['b_img']['name'];
        $tmp_name = $_FILES['b_img']['tmp_name'];

        $allowed_img_extension = array("png","jpg","jpeg");
        //get img extension
        $file_extension = strtolower(pathinfo($_FILES['b_img']['name'],PATHINFO_EXTENSION));
        if(!in_array($file_extension , $allowed_img_extension )){
            $img_error = "Select Valid Image(choose only jpeg, jpg and png)";
            $imgmsg = 'error';
        }else{
            if($_FILES['b_img']['size'] > 1000000){
                $img_error = "Image size exceeds! Please upload image less than 1mb";
                $imgmsg = 'error';
               }else{
                $path = "../assets/upload_images/".($_FILES['b_img']['name']);
                if(file_exists($path)){
                   $img_error = "$profile file already exist";
                 }else{
                  move_uploaded_file($_FILES['b_img']['tmp_name'],$path);
                  $imgmsg = 'success';  
                 }
               }    
            }
            //final going to query
            if($imgmsg == 'success'){
                $sql = "INSERT INTO blogs (`blog_title`, `blog_discription`, `blog_img`, `category`, `author_id`) VALUES('".$title."','".$disc."','".$img_name."','".$cat."','".$aid."')";
                $result = mysqli_query($conn,$sql);
                     
                if($result){
                    $_SESSION['msgs'] = "Blog Added successfuly";
                    $_SESSION['msgs_type'] = "alert-success";
                    header('location:manage_blog.php');
                }else{
                    $_SESSION['msgs'] = "Blog Added failed";
                    $_SESSION['msgs_type'] ="alert-danger";
                    
                }
                }else{
                    $_SESSION['msgs'] = "An Error Occured";
                    $_SESSION['msgs_type'] ="alert-info"; 
                }
            }
    //fetch cat
    $html = '';
    $query = "SELECT * FROM categories";
    $run   = mysqli_query($conn,$query)or die("Query unsuccessful");
    while($result = mysqli_fetch_array($run)){
            $cid  = $result['cat_id'];
            $cat  = $result['category'];
            $html.='<option value="'.$cid.'">'.$cat.'</option>';
    }

?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="display-6 fs-1">Add Blog</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
          <a href="manage_categories.php" class="btn btn-sm btn-outline-secondary"style="text-decoration:none;">Back</a>
        </div>
      </div>
    </div>
    <div class="row" style="min-height:65vh;">
      
    <div class="container">
        <div class="row">
            
            <div class="col-md-8 mx-auto bg-white rounded p-3">
            <?php
                if(isset($_SESSION['msgs'])){
                $msg  = $_SESSION['msgs'];
                ?>
                <div class="alert <?php echo $_SESSION['msgs_type']; ?>" role="alert">
                    <?php echo $msg;?>
                </div>
                <?php
                unset($_SESSION['msgs']);
                }
                ?> 
                 <script src="../assets/ckeditor/ckeditor.js"></script>
                <form method="post" enctype='multipart/form-data'>
                    <div class="mb-3">
                        <label for="" class="form-label">Blog Title</label>
                        <input type="text" class="form-control" name="b_title" placeholder="Enter Blog Title">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Blog Discription</label>
                        <textarea name="disc" id="blogs"  class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Blog Image</label>
                        <input type="file" class="form-control" name="b_img">
                        <span><?php echo $img_error; ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Select Category</label>
                        <select name="cat" id=""  class="form-control">
                            <option value="">Select Category</option>
                            <?php echo $html; ?>
                        </select>
                    </div>
                    <button type="submit" name="add" class="btn btn-info text-center mt-3 text-white d-flex justify-content-center w-25">Submit</button>
                </form>
            </div>
        </div>
    </div>

    </div>
    <?php
        include('../include/footer.php');
    ?>
    <script>
        CKEDITOR.replace('blogs');
    </script>
