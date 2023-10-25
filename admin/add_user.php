<?php
session_start();
if(!isset($_SESSION['a_id']) && !isset($_SESSION['a_name'])){ 
  echo "<script>window.location.href='Administrator_login.php';</script>";
}
include('../connection.php');
include('../include/sidebar_top.php');
include('../include/offcanvas1.php');

//add user
function register_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return($data);
  }
$alert = $msg = $nameerror = $usernameerror = $passworderror = $emailerror = $img_error = $imgmsg='';
if(isset($_POST['register'])){
    $adminname        = $_POST['adminName'];
    $adminusername    = $_POST['adminUname'];
    $adminemail       = $_POST['adminEmail'];
    $adminpwd         = $_POST['pwd'];
    $adminprofile     = $_FILES['profile']['name'];
    $status           = 'In-Active';

//SQL Query
  
       if($adminname != "" && $adminusername = !"" && $adminemail = !"" && $adminpwd = !"" && $adminprofile != ""){
        //name validation here
       $adminname     = mysqli_real_escape_string($conn,register_input($_POST['adminName']));
       if(!preg_match("/^[a-zA-Z-' ]*$/",$adminname)){
        $nameerror = "Type Only Letters";
        $namemsg   = 'error';
        }else{
        $namemsg   = 'success';
        }
        //username validation here
        $query = "SELECT * FROM user_registration WHERE username = '".$adminusername."'";
        $run = mysqli_query($conn,$query) or die("query failed");
        $data = mysqli_fetch_array($run);
        if($data){
            $alert = "<div class='alert alert-danger'>
            Username or email already exists
            </div>";
            die();
        
        }
        else{
        $adminusername = mysqli_real_escape_string($conn,register_input($_POST['adminUname']));
       if(!preg_match("/^[a-zA-Z]+[0-9]+$/",$adminusername)){
        $usernameerror = "Type Only ALphanumeric";
        $usernamemsg = 'error';
        }else{
        $usernamemsg = 'success';
        }
        }

        // Email validation here
        $adminemail    = mysqli_real_escape_string($conn,register_input($_POST['adminEmail']));
        $adminemail    =filter_var($adminemail,FILTER_VALIDATE_EMAIL);
        $pattern       = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/";
        if(!preg_match($pattern,$adminemail)){
        $emailerror = 'invalid email';
        }else{
        $emailmsg = 'success';  
        }

        //password validation here
        $adminpwd     = mysqli_real_escape_string($conn,$_POST['pwd']);
        // if(!preg_match("/^[a-zA-Z0-9]+[^\w]$/",$adminpwd)){
        // $pwdmsg = 'error';
        $uppercase    = preg_match('@[A-Z]@', $adminpwd);
        $lowercase    = preg_match('@[a-z]@', $adminpwd);
        $number       = preg_match('@[0-9]@', $adminpwd);
        $specialChars = preg_match('@[^\w]@', $adminpwd);
        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($adminpwd) < 8) {
            $passworderror = 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
            $pwdmsg = 'error';
        }else{
        $key = '1@#4fdgfreg56{}!#@$';
        $adminpwd = $adminpwd.$key;
        $adminpwd = md5($adminpwd);
        $pwdmsg = 'success';
        }
    // image validation
        $allowed_img_extension = array("png","jpg","jpeg");
        //get img extension
        $file_extension = pathinfo($_FILES['profile']['name'],PATHINFO_EXTENSION);
        if(!in_array($file_extension , $allowed_img_extension )){
            $img_error = "Select Valid Image(choose only jpeg, jpg and png)";
            $imgmsg = 'error';
        }else{
            if($_FILES['profile']['size'] > 500000){
                $img_error = "Image size exceeds! Please upload image less than 500kb";
                $imgmsg = 'error';
               }else{
                $path = "../assets/upload_images/".($_FILES['profile']['name']);
                if(file_exists($path)){
                   $img_error = "$profile file already exist";
                 }else{
                  move_uploaded_file($_FILES['profile']['tmp_name'],$path);
                //   $img_error = "Uploaded successfully";
                  $imgmsg = 'success';
                   
                 }
               }    
            }
            if($namemsg == 'success' && $usernamemsg == 'success' && $emailmsg == 'success' && 
            $pwdmsg == 'success' && $imgmsg == 'success'){
             $sql = "INSERT INTO user_registration (name,username,email,password,profile,status) VALUES('".$adminname."','".$adminusername."','".$adminemail."','".$adminpwd."','".$adminprofile."','".$status."')";
                $result = mysqli_query($conn,$sql);
                     
                if($result){
                    $_SESSION['msgs'] = "Data updated successfuly";
                    $_SESSION['msgs_type'] = "alert-success";
                    header('location:manage_users.php');
                }else{
                    $_SESSION['msgs'] = "Data updated failed";
                    $_SESSION['msgs_type'] ="alert-danger";
                    
                }
            }else{
                    $_SESSION['msgs'] = "An Error Occured";
                    $_SESSION['msgs_type'] ="alert-info";
            }
        }else{
            if(empty($_POST['adminName'])){
                $nameerror = "Name is required";
            }
            if(empty($_POST['adminUname'])){
                $usernameerror = "user Name is required";  
            }
            if(empty($_POST['adminEmail'])){
            $emailerror = "Email is required";  
            }
            if(empty($_POST['pwd'])){
            $passworderror = "password Name is required";  
            }
    }
     
}
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 style="color: green; font-weight: 700;">Add User</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
          <a href="manage_users.php" class="btn btn-sm btn-outline-secondary"style="text-decoration:none;">Back</a>
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
                    <p><?php echo $msg;?></p>
                <hr>
                </div>
                <?php
                unset($_SESSION['msgs']);
                }
                ?> 
                
                
                <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                        <input type="text" class="form-control" name="adminName" placeholder="Enter name"  style="padding:11px 10px;">
                        <span class="error"><?php echo $nameerror; ?></span>
                    </div>
                    <div class="mb-3">
                       
                        <input type="text" class="form-control" name="adminUname"  placeholder="Enter username"  style="padding:11px 10px;">
                        <span class="error"><?php echo $usernameerror; ?></span>
                    </div>
                    <div class="mb-3">
        
                        <input type="email" class="form-control" name="adminEmail"  placeholder="Enter email"  style="padding:11px 10px;" value=" <?php echo $msg;?>">
                        <span class="error"><?php echo $emailerror; ?></span>
                    </div>
                    <div class="mb-3">
                       
                        <input type="password" class="form-control" name="pwd"  placeholder="Enter password"  style="padding:11px 10px;">  
                        <span class="error"><?php echo $passworderror; ?></span>
                    </div>
                    <div class="mb-3">
                        
                        <input type="file" class="form-control" name="profile" required id="exampleInputEmail1" accept="image/jpg, image/jpeg,image/png" style="padding:11px 20px;"> 
                        <span class="error"><?php echo $img_error; ?></span> 
                    </div>
                    <button type="submit" name="register" class="btn btn-info text-center mt-3 text-white d-flex justify-content-center w-25 fw-6 fs-5 register_button">Register</button>
                </form>
            </div>
        </div>
    </div>




      
    </div>
        <?php
        include('../include/footer.php');
        ?>
