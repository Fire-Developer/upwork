<?php
session_start();
include('../connection.php');
if(isset($_GET['edit_id'])){
  $sid = $_GET['edit_id'];
}

if(!isset($_SESSION['a_id']) && !isset($_SESSION['a_name'])){
  echo "<script>window.location.href='Administrator_login.php';</script>"; 
}
//////////////////////UPDATE QUERY WITH VALIDATION
$nameerror = $usernameerror = $emailerror = $img_error = '';
$namemsg   = $usernamemsg   = $emailmsg =  $imgmsg= '';
if(isset($_POST['update'])){
$user         = $_POST['name'];
$username     = $_POST['uname'];   
$usesrEmail   = $_POST['email'];
$profile      = $_FILES['profile']['name'];
$path         = "../upload_images/".($_FILES['profile']['name']);
move_uploaded_file($_FILES['profile']['tmp_name'],$path);

//update validation ends here
  $sql = "UPDATE company_account SET name = '$user', username = '$username',
                                        email = '$usesrEmail', img = '$profile' 
                                            WHERE buyer_id = '".$sid."'";

      $run = mysqli_query($conn, $sql);
        if($run){
          $alert  = ['status'=>"Data updated successfuly",'status_type'=>"alert-success"];
          $_SESSION['msgs'] = "Data updated successfuly";
          $_SESSION['msgs_type'] = "alert-success";
          header('location:manage_users.php');
        }else{
          $alert  = ['status'=>"Data updated failed",'status_type'=>"alert-danger"];
          $_SESSION['msgs'] = "Data updated failed";
          $_SESSION['msgs_type'] ="alert-danger";
          header('location:manage_users.php');
        }
    }

//select query



$query = "SELECT * FROM company_account  WHERE buyer_id = '".$sid."'";
$run   = mysqli_query($conn,$query)or die("Query unsuccessful");
$result = mysqli_fetch_array($run);
$name = $result['name'];
$profile = $result['img'];


?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../upload_images/bar-logo.PNG" type="image/bar-icon">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Update User</title>
  </head>
  <body>
  <div class="container">
        <div class="row">
            <div class="col-sm-6 mx-auto mt-2">
            <h4>Student Form</h4>
              <?php echo $namemsg . $usernamemsg . $emailmsg . $imgmsg;?> 
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="mb-1">
                    <label class="form-label">name</label>
                    <input type="text" class="form-control" name="name"  value="<?php echo $name;?>">
                    <span class="text-danger mt-2"> <?php echo $nameerror;?><span>
                </div>
                <div class="mb-1">
                    <label class="form-label">username</label>
                    <input type="text" class="form-control" name="uname"  value="<?php echo $result['username'];?>">
                    <span class="text-danger mt-2"> <?php echo $usernameerror;?><span>
                </div>
                <div class="mb-1">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control" name="email"  value="<?php echo $result['email'];?>">
                    <span class="text-danger mt-2"> <?php echo $emailerror;?><span>
                </div>

                <div class="mb-1">
                    <input type="file" class="form-control" name="profile" required value="<?php echo $result['img'];?>">
                    <img src='../upload_images/<?php echo $profile;?>' width="70">
                    <span class="text-danger mt-2"> <?php echo $img_error;?><span>
                </div>
                <button type="submit" class="btn btn-primary btn-lg mt-2" name="update">Update</button>
            </form>
            </div>
        </div>
    </div>
  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>
