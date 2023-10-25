<?php
session_start();
$page_title = 'buyer_register';
include('include/Top_bar.php');
include('connection.php');
$nameError = $rolee = $phonemsg  = $emailError = $emailmsg = $userNameError = $confirmation_error =  $userNameError =  $catError = $addressError = $sub_catError =  $phoneError = $img_error = $pwdError = $con_pwdError = $city_error = $expError ='';
function register_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return($data);
}
  $fill_msg = '';
if(isset($_POST['register'])){
  $usernamemsg = '';
    $namemsg  = '';
    
    $name       = $_POST['name'];
    $u_name     = $_POST['u_name'];
    $email      = $_POST['email'];
    $phone      = $_POST['phone'];
    $pwd        = $_POST['pwd'];
    $con_pwd    = $_POST['con_pwd'];
    $city       = $_POST['city'];
    $address    = $_POST['address'];
    $role     = $_POST['role'];
    $profile    = $_FILES['img']['name'];
    $tmp_name   = $_FILES['img']['tmp_name'];
    $path       = 'upload_images/'.$profile ;
    move_uploaded_file($profile , $path);
     
    
  
  if($name != '' &&  $u_name != '' && $email != ''  && $phone != ''
    && $pwd != '' && $con_pwd != '' && $role != '' && $city != ''){
     
      $user = "/^[a-zA-Z]*$/";
      if(!preg_match($user,$name)){
         $nameError = 'Type Only Letters';
         $namemsg = 'error' ;
      }else{
         $namemsg = 'success';
      }
 
      if(!preg_match('/^[0-9]{11,11}$/',$phone)){
        echo 'Type Only Letters';
        $phoneError = 'Please Enter the valid number' ;
      }
      
      else{
        $phonemsg = 'success';
      }

      $query = "SELECT * FROM company_account WHERE username = '".$u_name."'";
      $data = mysqli_query($conn, $query);
      $count = mysqli_num_rows($data);
     
        if($count > 0){
          $userNameError = "This Username Already Exist";
        }else{
         $userNameError = "";
        $usernamemsg = 'success';
        }

        $query = "SELECT * FROM company_account WHERE email = '".$email."'";
        $data = mysqli_query($conn, $query);
        $count = mysqli_num_rows($data);
       
          if($count > 0){
            $emailError = "This Username Already Exist";
          }else{
           $emailError = "this email is avaible";
          $emailmsg = 'success';
          }

      if($pwd !== $con_pwd){
          $confirmation_error = "Password and Confirm Password not Matched";
          $pwdmsg = 'error';
      }
      else{
          $uppercase    = preg_match('@[A-Z]@', $pwd);
          $lowercase    = preg_match('@[a-z]@', $pwd);
          $number       = preg_match('@[0-9]@', $pwd);
          $specialChars = preg_match('@[^\w]@', $pwd);
          if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($pwd) < 8) {
              $pwdError = 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
              $pwdmsg = 'error';
          }
          else{
            $pwd = md5($pwd);
            $pwdmsg = 'success';
          }
          
      }
      
      $allowed_img_extension = array("png","jpg","JPG","jpeg");
      //get img extension
      $file_extension = pathinfo($_FILES['img']['name'],PATHINFO_EXTENSION);
      if(!in_array($file_extension , $allowed_img_extension )){
          $img_error = "Select Valid Image(choose only jpeg, jpg and png)";
          $imgmsg = 'error';
      }else{
          if($_FILES['img']['size'] > 500000){
              $img_error = "Image size exceeds! Please upload image less than 500kb";
              $imgmsg = 'error';
             }else{
              $target = "upload_images/".basename($_FILES['img']['name']);
              if(file_exists($target)){
                 $img_error = "$profile file already exist";
               }else{
                move_uploaded_file($_FILES['img']['tmp_name'],$target);
                $img_error = "Uploading Successfully";
                $imgmsg = 'success';
                 
               }
             }
              
          }

       //final going to print data after validation
       if($usernamemsg == 'success' && $emailmsg == 'success' &&  $pwdmsg == 'success' && $phonemsg == 'success' && $namemsg = 'success'){
          $query = "INSERT INTO company_account (name, username, email, contact, password, role, city, address, img) VALUES ('$name','$u_name','$email','$phone','$pwd', '$role','$city','$address', '$profile')";
          $data = mysqli_query($conn, $query);

          if($data){
                $_SESSION['msgs'] = "User Account Created successfuly";
                $_SESSION['msgs_type'] = "alert-success";
                header('Location:login.php');
                          
          }else{
                $_SESSION['msgs'] = "Account Created Failed";
                $_SESSION['msgs_type'] = "alert-danger";
                    
          }
      }
      else{
        $_SESSION['msgs'] = "An error occured";
        $_SESSION['msgs_type'] = "alert-danger";
      }
    
  }else{
      if(empty($_POST['name'])){
          $nameError = "Name is required";
      }
      if(empty($_POST['fname'])){
          $fatherNameError = "Father Name is required";  
      }
      if(empty($_POST['email'])){
        $emailError = "Email is required";  
      }
      if(empty($_POST['u_name'])){
        $usernameError = "User Name is required";  
      }
      if(empty($_POST['pwd'])){
        $pwdError = "Password is required";  
      }
      if(empty($_POST['con_pwd'])){
        $con_pwdError = "Confirm Password is required";  
      }
      if(empty($_POST['role'])){
        $rolee = "Confirm role is required";  
      }
      if(empty($_POST['city'])){
        $cityError = "City is required";  
      } 
      $fill_msg = '<div class="alert alert-info">
                        please fill all the data
                    </div>';
  }
}
?>
 
<div class="container-fluid" style="background-color:rgb(16, 84, 103) !important; height:120vh !important;">
  <div class="container">
 
      <div class="row">
      <?php echo $fill_msg; ?>
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
      <!--<div class="col-md-5 col-sm-12 " style="background-size: 530px; background-repeat: no-repeat; padding-top:80px; background-position:justify; background-image: url(upload_images/upwork.webp); min-height:400px">-->
          <!-- <img src="upload_images/upwork.webp" class="d-block ms-5 mb-1" style="width: 70%;" alt=""> -->
      <!--    <div class="col-md-12 col-sm-12 ps-1 pe-1 mb-2" style="background-color: rgba(4, 3, 3,0.70); margin-top: 250px !important;">-->
      <!--        <h4 class="text-center mt-5 text-white">Welcome Back!</h4>-->
      <!--        <span class=" text-center text-white mb-1">To Keep Connected With US Please Login With Your Personal Info</span>-->
      <!--        <span class="text-white text-center mb-4">If You Are Already Registered Please Click Below Button For Login</span>-->
      <!--        <div class="row">-->
      <!--            <div class="col-6 m-auto">-->
      <!--                <a href="login.php" class="btn all_btn border text-white shadow text-center w-100" name="register">LOGIN</i></a>-->
      <!--            </div>-->
      <!--        </div>-->
      <!--        <div class="row mt-2">-->
      <!--            <div class="col-6 m-auto">-->
      <!--                <a href="index.php" class="btn all_btn border text-white shadow text-center w-100" >BACK <i class="fas fa-arrow-circle-right"></i></a>-->
      <!--            </div>-->
      <!--        </div>-->
      <!--    </div>-->
      <!--</div>--> 
      <div class="col-12">
               <div class="col-md-3 col-sm-4 col-6 mx-auto">
               <a class="text-decoration-none mx-auto" style="position: relative !important;"><span class=" ms-3" style="color: white !important; font-family: serif !important; font-size: 37px !important; font-weight: 700 !important;">Job</span><span><i class="fa-solid fa-building-columns fa-3x pt-2" style="color:rgb(4, 249, 4) !important;"></i>
               <span style="color: white !important; position: absolute !important; top: 4px; left: 115px;font-family: serif !important; font-size: 28px !important; font-weight: 700 !important;">Bank</span></span></a>   
               </div>
            </div>
        <div class="col-md-8 col-sm-11 col-12 mx-auto bg-white rounded p-md-5 p-3 mt-4 justify-content-center">
          <h2 class="text-center mt-2 text-muted"><strong>Create Account</strong></h2>
            
              <form action="buyer_register.php" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                  <div class="row">
                      <div class="col-6">
                          <label for="formFile" class="form-label text-muted">Profile Image</label>
                          <input class="form-control" name="img" id="formFileLg" type="file">
                          <div class="invalid-feedback">
                                  Please Enter Your image.
                          </div>
                            <span class="error"><?php echo $img_error; ?></span>
                        </div>
                  
                 
                    <div class="col-6">
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label text-muted">Name</label>
                          <input type="text" class="form-control form-control-sm" max="15"  name="name"  required>
                          <div class="invalid-feedback">
                            Please Enter Correct Name <br> <small>The name should be in alphabet form.</small>
                          </div>
                          <span class="error"><?php echo $nameError; ?></span>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label text-muted">User Name</label>
                          <input type="text" class="form-control form-control-sm" name="u_name" name="name" required>
                          <div class="invalid-feedback">
                            Please Enter User Name
                          </div>
                          <span class="error"><?php echo $userNameError; ?></span>
                        </div>
                    </div>
                  
                    
                      <div class="col-6">
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label text-muted">Email</label>
                          <input type="email" class="form-control form-control-sm" name="email" required>
                          <div class="invalid-feedback">
                            Please Enter Email
                          </div>
                          <span class="error"><?php echo $emailError; ?></span>
                        </div>
                      </div>
                  
 

                    <div class="col-6">
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label text-muted">Contact</label>
                        <input type="tel" class="form-control form-control-sm" name="phone" required>
                        <div class="invalid-feedback">
                          Please Enter Contact number.
                        </div>
                        <span class="error"><?php echo $phoneError; ?></span>
                      </div>
                    </div>

                    <div class="col-6">
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label text-muted">Password</label>
                        <input type="password" class="form-control form-control-sm" name="pwd" required>
                        <div class="invalid-feedback">
                          Please Enter Valid Password <br> <small>Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.</small>
                        </div>
                        <span class="error"><?php echo $pwdError; ?></span>
                        <small class="error lead"><?php echo $confirmation_error; ?></small>
                      </div>
                      
                    </div>

                    <div class="col-6">
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label form-label-sm text-muted">Confirm_Password</label>
                        <input type="password" class="form-control form-control-sm" name="con_pwd" required>
                          <div class="invalid-feedback">
                            Please Enter Confirm Password
                          </div>
                        <span class="error"><?php echo $con_pwdError; ?></span>
                      </div>
                    </div>

                    <div class="invalid-feedback">
                      Password And Confirm Password Not Matched
                    </div>
                  
             
                    <div class="col-6">
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label text-muted">City</label>
                          <input type="text" class="form-control form-control-sm" name="city" required>
                          <div class="invalid-feedback">
                              Please Enter Your City.
                          </div>
                        <span class="error"><?php echo $city_error; ?></span>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="mb-4">
                        <label for="exampleInputEmail1" class="form-label text-muted">Address</label>
                          <input type="text" class="form-control form-control-sm" name="address" required>
                          <div class="invalid-feedback">
                              Please Enter Your Address.
                          </div>
                      </div>
                    </div>
                  
             
                        <div class="col-6">
                          <div class="mb-3">
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="role" value="seller" id="flexRadioDefault1">
                              <label class="form-check-label text-muted" for="flexRadioDefault1">
                                Seller Account
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="role" value="buyer" id="flexRadioDefault2" checked>
                              <label class="form-check-label text-muted" for="flexRadioDefault2">
                                Buyer Account
                              </label>
                            </div>
                              <div class="invalid-feedback">
                                Please Select One of Them 
                              </div>
                            <span class="error"><?php echo $rolee; ?></span>
                          </div>
                        </div>
                  </div>
                  <div class="row">
                      <div class="col-12 mb-3">
                          <button type="submit" class="btn p-2 mt-2 w-100 text-white text-center btn-success" name="register" style="background-color:rgb(16, 84, 103)">Register</button>
                      </div>
                  </div>
            </form>
        </div>
      </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<script src="../assets/js/jquery.js"></script>
<script>
  $(document).ready(function(){
  	function loadData(type, category_id){
  		$.ajax({
  			url : "select_opt_ajax.php",
  			type : "POST",
  			data: {type : type, id : category_id},
  			success : function(data){
  				if(type == "stateData"){
  					$("#sub_category").html(data);
  				}else{
  					$("#category").append(data);
  				}
  				
  			}
  		});
  	}

  	loadData();

  	$("#category").on("change",function(){
  		var category = $("#category").val();

  		if(category != ""){
  			loadData("stateData", category);
  		}else{
  			$("#sub_category").html("");
  		}

  		
  	})
  });
</script>
</div>
</body>