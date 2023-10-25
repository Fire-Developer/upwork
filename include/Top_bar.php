
<!doctype html>
<html lang="en">
<head>
  <!-- =============== Bootstrap 5.2.3 CDN====================== -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <link rel="icon" href="upload_images/bar-logo.PNG" type="image/bar-icon">

  <title>
  <?php
  
  if($page_title == 'index'){
    echo 'Home';
  }elseif($page_title == 'Job_Post'){
    echo 'Post Jobs';
    }elseif($page_title == 'Get_Jobs'){
    echo 'Get Jobs';
    }elseif($page_title == 'about'){
    echo 'About';
    }elseif($page_title == 'Job_bank'){
      echo 'Job bank';
    }
    elseif($page_title == 'manage_applicant'){
    echo 'Manage Applicant';
    }  
    elseif($page_title == 'Manage_Post'){
      echo 'Manage_Post';
      }  
      elseif($page_title == 'Manage_users'){
        echo 'Manage Users';
        }  
    elseif($page_title == 'single_post'){
      echo 'Jobs';
      } 
      elseif($page_title == 'dashboard'){
        echo 'dashboard';
        }  
        elseif($page_title == 'manage_categories'){
          echo 'manage_categories';
          }  
          elseif($page_title == 'manage_jobs'){
            echo 'manage_jobs';
            }         
    elseif($page_title == 'Logout'){
      echo 'Logout';
      }  
    elseif($page_title == 'seller_login'){
        echo 'Login';
    }
    elseif($page_title == 'buyer_register'){
      echo 'Create Account';
  }
    elseif($page_title == 'seller_register'){
      echo 'Creat Account';
    }    
?>
  </title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- =============== Font Awesome CDN====================== -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- ============== Stylesheet =====================-->
  <link rel="stylesheet" href="../newproject/assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="../newproject/assets/css/owl.theme.green.min.css">
  <link rel="stylesheet" href="../newproject/assets/css/style.css"> 
</head>
<body>
