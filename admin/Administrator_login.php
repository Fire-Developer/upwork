<?php
session_start();
$page_title = 'Administrator_register';
include('../connection.php');
include('../include/Top_bar.php');
if(isset($_SESSION['a_name'])){
    header('location:dashboard.php');
}
$alert ="";
if(isset($_POST['login'])){
   $username = $_POST['aname'];
   $pwd = $_POST['pwd'];
   $key = '1@#4fdgfreg56{}!#@$';
   $pwd = $pwd.$key;
   $pwd = md5($pwd);
//SQL Query
    $query = "SELECT * FROM Administrator WHERE username = '".$username."' and password = '".$pwd."'";
    $run = mysqli_query($conn,$query);
    $data = mysqli_fetch_array($run);
    if($data){
       $_SESSION['a_id'] = $data['a_id'];
       $_SESSION['a_name'] = $data['username'];
       header('location:dashboard.php');
    }else{
        $alert = "<div class='alert alert-danger'>
        Username and Password are not matched
        </div>";
    }
}
?> 
   <div class="container-fluid"  style="background-color:rgb(16, 84, 103) !important; height:100vh !important;">
    <div class="container">
        <div class="row pt-5" style="">
            <div class="col-12">
               <div class="col-md-3 col-sm-4 col-6 mx-auto">
               <a class="text-decoration-none mx-auto" style="position: relative !important;"><span class=" ms-3" style="color: white !important; font-family: serif !important; font-size: 37px !important; font-weight: 700 !important;">Job</span><span><i class="fa-solid fa-building-columns fa-3x pt-2" style="color:rgb(4, 249, 4) !important;"></i>
               <span style="color: white !important; position: absolute !important; top: 4px; left: 115px;font-family: serif !important; font-size: 28px !important; font-weight: 700 !important;">Bank</span></span></a>   
               </div>
            </div>
            <div class="col-md-7 col-sm-11 col-12 mx-auto bg-white rounded p-md-5 p-3 mt-4 justify-content-center">
                <h3 class="text-center text-dark p-2">Administrator Login</h3>
                <?php echo $alert; ?>
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="aname" placeholder="Enter username">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="pwd" placeholder="Enter password">
                        
                    </div>
                    <button type="submit" name="login" class="mx-auto btn text-center mt-3 text-white d-flex justify-content-center fw-6 fs-5" style="background-color:rgb(16, 84, 103)!important;"  style="background-color:rgb(16, 84, 103);">Login Now</button>
                    <p class="mt-2 text-center">already have an account? <a href="Administrator_register.php"class="btn-signup" style="color:red !important; text-decoration: underline !important;">SignUp</a></p>
                    <p class="mt-2 text-center"><a href="../login.php"class="btn-signup" style="color:red !important; text-decoration: underline !important;">User Account</a></p>
                </form>
            </div>
        </div>
        
      </div>
  </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
        setTimeout(function() {
          let alert = document.querySelector(".alert");
          alert.remove();
          }, 3000);
    </script>
  </body>
</html>
 