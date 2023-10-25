<?php
session_start();
$page_title = 'Get_Jobs';
include("connection.php");
include("include/Top_bar.php");   
if(isset($_SESSION['username'])){
    include("include/header2.php"); 
}else{ 
    include("include/login_header.php"); 
}
$page = basename($_SERVER['PHP_SELF'],'.php');

//fetch blogs
$html = "";
$categories = '';
$category='';
$pid='';
$serial = 0;
if(isset($_POST['search'])){
    $str = $_POST['search'];
    $query = "SELECT * FROM  job_posts WHERE CONCAT(title,job_discription,category)  like '%$str%'";
    $run   = mysqli_query($conn,$query);
    $count = mysqli_num_rows($run);
    if($count > 0){
      while($value = mysqli_fetch_array($run)){
        $serial = $serial + 1; 
        $pid = $value['p_id'];
        $title = $value['title'];
        $disc  = $value['job_discription']; 
        $category   = $value['category'];
        $author_id  = $value['username'];
        $publish_date  = $value['publish_date'];
        $p_date = date('d-m-Y', strtotime($publish_date));
        //
        $disc = strip_tags($disc);
            if (strlen($disc) > 100) {
                $jobCut = substr($disc, 0, 200);
                $endPoint = strrpos($jobCut, " ");
                $disc = $endPoint? substr($jobCut, 0, $endPoint) : substr($jobCut, 0);  
                } 
            
              //fetch category from cat table
                $query1 = "SELECT * FROM  categories WHERE cat_id = '".$category."' limit 5";
                $run1   = mysqli_query($conn,$query1);
                $value1 = mysqli_fetch_array($run1);
                $cat    =  $value1['category'];
                $html .='<hr><a href="single_post.php?pid='.$pid.'&sid='.$category.'" class='.$page_title.'><div class="col-lg-12 col-sm-12">
                    <span class="most_text" style="color: green;">'.$title.''.".".'</span> </a>  
                        <p>Post By : '.$p_date.'</p> 
                        <a href="single_post.php?pid='.$pid.'&sid='.$category.'">
                        <p class="text-dark">'.$disc.' '."....".'</p></a>
                        <div class="row mb-2">
                                <div class="col-12 mb-2 mt-3"> 
                                    <strong>Categories :</strong>
                                </div> 
                                <div class="col-12">
                                    <span class="btn btn-outline-success rounded">'.$cat.'</span>
                                </div> 
                        </div>
                        <div class="b_line"></div>
                    </div>           
                        ';
                }
            }else{
                $html = '<div class="alert alert-danger" >
                            Sorry! Data Not Found
                        </div>';
            }
        } 
$query2 = "SELECT * FROM  categories";
$run2   = mysqli_query($conn,$query2);
while($value2 = mysqli_fetch_array($run2)){
    $cat = $value2['category'];
    $categories .= '<option><a class="btn" href="search.php?pid='.$pid.'&sid='.$category.'">'.$cat.'</a></option>';
}
?>


<!-- blog start -->
    <!-- <div class="about_section layout_padding">
      <div class="container">
      <div class="section_heading text-center"><strong class="h2  text-white">Jobs</strong></div>
            <div class="row">
               <?php echo $html; ?>
            </div>
         </div>
      </div> -->

      <div class="container-fluid">
    <div class="container" style="clear:both;">
        <div class="row pt-5">
            <div class="col-md-2">
                 <span class="h5 d-block">Filter By</span>
                    <select class="form-select mb-3 border-outline-0 rounded-0">
                        <option disabled selected>Select category</option>
                        <?php echo $categories ; ?>
                    </select>
                
                
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                    Hourly ()
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                    Fixed-Price ()
                    </label>
                </div> 

            </div>
            <div class="col-md-9 border p-4 mb-5" style="border-radius: 20px;">
                <div class="row">
                    <div class="col-md-8 col-sm-6 mx-auto">
                        <form class="d-flex mx-auto mt-3" action="search.php" method="post">
                            <input class="form-control ms-auto me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
                <div class="row mt-5">
                    <?php echo $html ;?> 
                </div>
            </div>
        </div>
    </div>
</div>





<?php include('include/footer.php'); ?>

