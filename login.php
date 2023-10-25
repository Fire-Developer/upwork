<?php
$page_title = 'seller_login'; 
session_start(); 
include('connection.php');
include('include/Top_bar.php');
if(isset($_POST['log'])){ 
   $username = $_POST['username'];
   $pass     = $_POST['password'];  
   $pwd      = md5($pass);
   $query    = "SELECT * FROM company_account WHERE username = '$username' && password = '$pwd'" ;
   $run      = mysqli_query($conn, $query);
   $row      = mysqli_fetch_assoc($run);

      if($row){   
          
          $_SESSION['id'] = $row['buyer_id']; 
          $_SESSION['role'] = $row['role']; 
          $_SESSION['username'] = $row['username']; 
          $_SESSION['status'] = $row['status'];
          echo '<script> 
                  window.location.href="index.php";
          </script>';
          
      } else{
         $_SESSION['error'] = 'Please enter valid username';
      } 
}
?>
<div class="container">
      <div class="row">
         <div class="col-12"> 
               <?php
               if(isset($_SESSION['error'])){
               $msg =  $_SESSION['error']; 
               ?>
               <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>ERROR!</strong> <?php echo $msg; ?>.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
               <?php
                  unset($_SESSION['error']);
               }
               ?>
         </div>      
      </div> 
   </div>

   
<div class="container-fluid" style="background-color:rgb(16, 84, 103) !important; min-height:100vh;">
    <div class="container pb-5">
        <div class="row "> 
            <div class="col-12">
               <div class="col-md-3 col-sm-4 col-6 mx-auto">
               <a href="index.php" class=" mx-auto" style="position: relative !important;"><span class=" ms-3" style="color: white !important; font-family: serif !important; font-size: 37px !important; font-weight: 700 !important;">Job</span><span><i class="fa-solid fa-building-columns fa-3x "style="color:rgb(4, 249, 4) !important;"></i>
               <span style="color: white !important; position: absolute !important; top: 16px; left: 115px;font-family: serif !important; font-size: 28px !important; font-weight: 700 !important;">Bank</span></span></a>   
               </div>
            </div>
            <div class="col-md-7 col-sm-11 col-12 mx-auto bg-white rounded p-md-5 p-3 mt-5">
                <h3 class="text-center text-dark p-2">Login</h3> 
                <form method="post" enctype="multipart/form-data"> 
                    <div class="mb-3">
                        <input type="text" class="form-control" name="username" placeholder="Enter username">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Enter password">
                        
                    </div>
                    <a href="#"class="d-block mb-2" style="float: right !important; color:red !important; text-decoration: underline !important;">Forgot Password?</a>
                    <button type="submit" name="log" class="btn text-center mt-3 text-white d-flex w-100 justify-content-center fs-5"  style="background-color:rgb(16, 84, 103);">Login</button>
                    <p class="mt-2 text-center">already have an account? <a href="buyer_register.php"class="btn-signup" style="color:red !important; text-decoration: underline !important;">SignUp</a></p>
                    <p class="mt-2 text-center"><a href="admin/Administrator_login.php"class="btn-signup" style="color:red !important; text-decoration: underline !important;">Administrator</a></p>
                </form>
            </div>
        </div>
        
    </div>

    
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script>
         setTimeout(function() {
          let alert = document.querySelector(".alert");
          alert.remove();
          }, 3000); 
    </script>
</body>
</html>