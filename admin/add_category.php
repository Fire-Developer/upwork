<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
$page_title = 'manage_categories';
if(!isset($_SESSION['a_id']) && !isset($_SESSION['a_name'])){
    echo "<script>window.location.href='Administrator_login.php';</script>"; 
}
include('../connection.php');
include('../include/Top_bar.php');
include('../include/sidebar_top.php');
include('../include/offcanvas1.php');

    if(isset($_POST['post'])){
        $cat = $_POST['cat']; 
         //fetch cat
            $query = "SELECT * FROM categories  WHERE category = '".$cat."'";
            $run   = mysqli_query($conn,$query)or die("Query unsuccessful");
            $count = mysqli_num_rows($run);
            if($count){
                $_SESSION['msgs'] = "Category Already Exist";
                $_SESSION['msgs_type'] ="alert-info";
            }else{
                $sql = "INSERT INTO categories (category) VALUES('".$cat."')";
                $result = mysqli_query($conn,$sql);
                     
                if($result){
                    $_SESSION['msgs'] = "Category Added successfuly";
                    $_SESSION['msgs_type'] = "alert-success";
                    header('location:add_category.php');
                }else{
                    $_SESSION['msgs'] = "Category Added failed";
                    $_SESSION['msgs_type'] ="alert-danger";
                    
                }
            }
        }
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 style="color: green; font-weight: 700;">Add Category</h1>
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
                 
                <form method="post">
                    <div class="mb-3">
                        <label for="" class="form-label">Category</label>
                        <input type="text" class="form-control" name="cat" placeholder="Enter Category"  style="padding:11px 10px;">
                       
                    </div>
                    <button type="submit" name="post" class="btn btn-info text-center mt-3 text-white d-flex justify-content-center w-25 fw-6 fs-5 register_button">Submit</button>
                </form>
            </div>
        </div>
    </div>

    </div>
    <?php
    include('../include/footer.php');
    ?>
