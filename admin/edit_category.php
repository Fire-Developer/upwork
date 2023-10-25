<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
if(!isset($_SESSION['a_id']) && !isset($_SESSION['a_name'])){
  echo "<script>window.location.href='Administrator_login.php';</script>"; 
}
include('../connection.php');
include('../include/Top_bar.php'); 
include('../include/sidbar_top.php');
include('../include/offcanvas.php');
if(isset($_GET['edit_cat'])){
    $cid = $_GET['edit_cat'];
  }

if(isset($_POST['update'])){
$cat         = $_POST['cat'];

  $sql = "UPDATE categories SET category = '$cat' WHERE cat_id = '".$cid."'";
  $run = mysqli_query($conn, $sql);
        if($run){
          $_SESSION['msgs'] = "Data updated successfuly";
          $_SESSION['msgs_type'] = "alert-success";
          header('location:manage_categories.php');
        }else{
          $_SESSION['msgs'] = "Data updated failed";
          $_SESSION['msgs_type'] ="alert-danger";
        }
}
//fetch cat
$query = "SELECT * FROM categories  WHERE cat_id = '".$cid."'";
$run   = mysqli_query($conn,$query)or die("Query unsuccessful");
$result = mysqli_fetch_array($run);
$category = $result['category'];
     
?>
<main class="col-md-8 ms-sm-11 col-lg-10 mx-auto">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="mx-auto" style="color: green !important; font-weight: 700; ">Edit Category</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2 mb-1">
          <a href="manage_categories.php" class="btn btn-danger"style="text-decoration:none;">Back</a>
        </div>
      </div>
    </div>
    <div class="row" style="min-height:65vh;">
      
    <div class="container">
        <div class="row">
            <div class=" bg-white rounded p-3">
            <?php
                if(isset($_SESSION['msgs'])){
                $msg  = $_SESSION['msgs'];
                ?>
                <div class="alert <?php echo $_SESSION['msgs_type']; ?>" role="alert">
                    <p><?php echo $msg;?></p>
                <hr>
                </div>
                <?php
                unset($_SESSION['msgs']);
                }
                ?> 
                 
                <form method="post">
                    <div class="mb-3">
                        <label for="" class="form-label">Category</label>
                        <input type="text" class="form-control" name="cat" placeholder="Enter Category"  style="padding:11px 10px;" value="<?php echo $category; ?>">
                       
                    </div>
                    <button type="submit" name="update" class="btn btn-info text-center mt-3 text-white d-flex justify-content-center w-25 fw-6 fs-5 register_button">Submit</button>
                </form>
            </div>
        </div>
    </div>

    </div>
     