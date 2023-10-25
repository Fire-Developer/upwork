
<div class="container-fluid pb-2" style="border-bottom: 1px solid rgb(156, 156, 156); background-color: rgba(0,0,0,0.60) !important; z-index: 1000000 !important; position: fixed !important; top:0px !important;" >
  <nav style=" line-height: 60px !important;">
      <input type="checkbox" id="check">
      <!-- <label for="check" class="check-bt" id="menu-icon">
          <i class="fa-solid fa-bars fa-2x  bar-icon "></i>
      </label> -->
      <div class="log2">
        <a href="index.php" class="ms-4" style="position: relative !important;"><span class=" ms-3" style="color: white !important; font-family: serif !important; font-size: 37px !important; font-weight: 700 !important;">Job</span><span><i class="fa-solid fa-building-columns fa-3x pt-2"></i>
          <span style="color: white !important; position: absolute !important; top: 4px; left: 115px;font-family: serif !important; font-size: 28px !important; font-weight: 700 !important;">Bank</span></span></a>   
      </div>
      <span style="float: right !important;" class="d-block">
        <?php   
              //  $query = "SELECT * FROM  company_account";
              //   $run   = mysqli_query($conn,$query);
              //   if($value = mysqli_fetch_array($run)){ 
              //       $status = $value['status']; 
              //     if($status == 'Active'){  
                    if($_SESSION['role']){
                      $role = $_SESSION['role'];
                      if($role == "buyer"){
                        include("bprofile.php");
                      }
                      else{
                        if($role == "seller"){
                        include("profile.php");
                        }
                      }
                    } 
                //   }else{
                //     echo '<strong class="d-block mt-2">Wait For Verification....</strong>'; 
                //   }

                // }  
            ?>
        </span>
 
      
        
        
        
  </nav>
</div>    
 