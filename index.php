<?php
$page_title = 'index';
session_start();  
include("connection.php"); 
include("include/Top_bar.php");   
if(isset($_SESSION['username'])){
    include("include/header2.php"); 
}else{
    include("include/login_header.php");
}
?>
<div class="container">
<section>
    <div class="row mt-5">
        <div class="col-md-6 col-sm-12 mt-4">
            <h1 class="heading mt-5" style="font-size: 3.5rem !important; font-weight: 600 !important;">How to Get Work</h1>
            <p class="heading1">Forget the old rules. You can have the best people.
            Right now. Right here.</p>
            <button class="btn rounded-5 get-bt mt-3"><a href="#" class='text-light fsize'>GET STARTED</a></button>
                
        </div>
        <div class="col-md-6 col-sm-12 mx-auto mt-5">
            <img src="upload_images/globe@1x.jpg" class="w-100 img-fluid d-block" alt="">
        </div>
    </div>
    <div class="row">
        <span class="heading1 d-block">Trusted By</span>
        <div class="col-sm-2 col-4 mt-1">
        <img src="upload_images/microsoft.svg" width="100px"  class=" img-fluid d-block" alt="">
        </div>
        <div class="col-sm-2 col-4">
        <img src="upload_images/airbnb.svg" width="100px"  class=" img-fluid d-block" alt="">
        </div>
        <div class="col-sm-2 col-4">
        <img src="upload_images/apple.png" width="100px" class=" img-fluid d-block" alt="">
        </div>
    </div>
</section>  
</div>
<div class="container">
        <div class="row mt-5">
            <div class="col mt-5">
                <span style="font-size: 2.5rem !important; font-weight: 600 !important; font-family: 'Noto Serif', serif !important;">
                    Browse Servies By Category
                </span>
                <p><span class="looking me-2">Looking for work?</span><a href="#" style="color: green !important;"><span class="looking-bt">Browse</span>J<span class="looking-bt">obs</span></a></p>
            </div>
        </div> 
        <div class="row mt-5 mb-5">
            <div class="col-md-3 col-sm-6 col-10 mx-auto mt-3">
                <a href="#" class="text-decoration-none p-3 card text-dark card1">
                <span class="first-service card-title text-center mt-4">Web Developer</span>  
                <span class="d-block card-text text-center mt-3"> 
                    <span>
                        <i class="fa-solid fa-star" style="color: green;"></i>
                        <i class="fa-solid fa-star" style="color: green;"></i>
                        <i class="fa-solid fa-star" style="color: green;"></i>
                        <i class="fa-solid fa-star-half-stroke" style="color: green;"></i>
                        <span class="" style="color:darkred;">4.77/5 rating</span>
                    </span> 
                </span>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 col-10 mx-auto mt-3">
                <a href="#" class="text-decoration-none p-3 card text-dark card1">
                <span class="first-service card-title text-center mt-4">WordPress</span>  
                <span class="d-block card-text text-center mt-3"> 
                    <span>
                        <i class="fa-solid fa-star" style="color: green;"></i>
                        <i class="fa-solid fa-star" style="color: green;"></i>
                        <i class="fa-solid fa-star" style="color: green;"></i>
                        <i class="fa-solid fa-star-half-stroke" style="color: green;"></i>
                        <span class="" style="color:darkred;">4.77/5 rating</span>
                    </span> 
                </span>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 col-10 mx-auto mt-3">
                <a href="#" class="text-decoration-none p-3 card text-dark card1">
                <span class="first-service card-title text-center mt-4">Civil Engineering</span>  
                <span class="d-block card-text text-center mt-3"> 
                    <span>
                        <i class="fa-solid fa-star" style="color: green;"></i>
                        <i class="fa-solid fa-star" style="color: green;"></i>
                        <i class="fa-solid fa-star" style="color: green;"></i>
                        <i class="fa-solid fa-star-half-stroke" style="color: green;"></i>
                        <span class="" style="color:darkred;">4.77/5 rating</span>
                    </span> 
                </span>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 col-10 mt-3 mx-auto">
                <a href="#" class="text-decoration-none p-3 card text-dark card1">
                <span class="first-service card-title text-center mt-4">SEO</span>  
                <span class="d-block card-text text-center mt-3"> 
                    <span>
                        <i class="fa-solid fa-star" style="color: green;"></i>
                        <i class="fa-solid fa-star" style="color: green;"></i>
                        <i class="fa-solid fa-star" style="color: green;"></i>
                        <i class="fa-solid fa-star-half-stroke" style="color: green;"></i>
                        <span class="" style="color:darkred;">4.77/5 rating</span>
                    </span> 
                </span>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 col-10 mt-3 mx-auto">
                <a href="#" class="text-decoration-none p-3 card text-dark card1">
                <span class="first-service card-title text-center mt-4">Digital Marketing</span>  
                <span class="d-block card-text text-center mt-3"> 
                    <span>
                        <i class="fa-solid fa-star" style="color: green;"></i>
                        <i class="fa-solid fa-star" style="color: green;"></i>
                        <i class="fa-solid fa-star" style="color: green;"></i>
                        <i class="fa-solid fa-star-half-stroke" style="color: green;"></i>
                        <span class="" style="color:darkred;">4.77/5 rating</span>
                    </span> 
                </span>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 col-10 mt-3 mx-auto">
                <a href="#" class="text-decoration-none p-3 card text-dark card1">
                <span class="first-service card-title text-center mt-4">Graphic Designer</span>  
                <span class="d-block card-text text-center mt-3"> 
                    <span>
                        <i class="fa-solid fa-star" style="color: green;"></i>
                        <i class="fa-solid fa-star" style="color: green;"></i>
                        <i class="fa-solid fa-star" style="color: green;"></i>
                        <i class="fa-solid fa-star-half-stroke" style="color: green;"></i>
                        <span class="" style="color:darkred;">4.77/5 rating</span>
                    </span> 
                </span>
                </a>
            </div> 
            <div class="col-md-3 col-sm-6 col-10 mt-3 mx-auto">
                <a href="#" class="text-decoration-none p-3 card text-dark card1">
                <span class="first-service card-title text-center mt-4">Content Writer</span>  
                <span class="d-block card-text text-center mt-3"> 
                <span> 
                        <i class="fa-solid fa-star" style="color: green;"></i>
                        <i class="fa-solid fa-star" style="color: green;"></i>
                        <i class="fa-solid fa-star" style="color: green;"></i>
                        <i class="fa-solid fa-star" style="color: green;"></i>
                        <span class="" style="color:darkred;">4.90 rating</span>
                    </span>  
                </span>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 col-10 mt-3 mb-5 mx-auto">
                <a href="#" class="text-decoration-none p-3 card text-dark card1">
                <span class="first-service card-title text-center mt-4">Mechanical Engr</span>  
                <span class="d-block card-text text-center mt-3"> 
                    <span> 
                        <i class="fa-solid fa-star" style="color: green;"></i>
                        <i class="fa-solid fa-star" style="color: green;"></i>
                        <i class="fa-solid fa-star" style="color: green;"></i>
                        <i class="fa-solid fa-star" style="color: green;"></i>
                        <span class="" style="color:darkred;">4.30 rating</span>
                    </span> 
                </span>
                </a>
            </div>
        </div>
</div>    
<div class="container-fluid p-3" style="background-color: #471423;">
    <div class="container">
        <div class="row">
            <div class="col-sm-5">
                <p> 
                    <a class="positi ms-4"> <span class="asani text-light">Job</span><span><i class="fa-solid fa-building-columns fa-3x text-light"></i><span class="bank text-light mt-1" style="right: -45px;">Bank</span></span></a>
                    <span class="h2 text-light d-block mt-4">A solution built for business</span>
                    <p class=" text-light mt-3">
                        Upgrade to a curated experience to access vetted talent and exclusive tools
                        <li class="check-list mt-5">
                            <i class="fa-regular fa-circle-check fa-1x text-light" style="font-size: 20px !important;"></i><span class=" ms-4 text-light">Talent matching</span>
                        </li>
                        <li class="check-list mt-3">
                            <i class="fa-regular fa-circle-check fa-1x text-light" style="font-size: 20px !important;"></i><span class=" ms-4 text-light">Dedicated account management</span>
                        </li>
                        <li class="check-list mt-3">
                            <i class="fa-regular fa-circle-check fa-1x text-light" style="font-size: 20px !important;"></i><span class=" ms-4 text-light">Team collaboration tools</span>
                        </li>
                        <li class="check-list mt-3">
                            <i class="fa-regular fa-circle-check fa-1x text-light" style="font-size: 20px !important;"></i><span class=" ms-4 text-light">Business payment solutions</span>
                        </li> 
                    </p>
                </p> 
                <button class="btn rounded-5 get-bt mt-3"><a href="#" class='text-light fsize'>Explore Job Bank</a></button>
            </div>
            <div class="col-sm-7 mt-5">
                <img src="upload_images/business-desktop-870-x1.webp" class="img-fluid d-block" alt="">
            </div>
        </div>
    </div>
</div> 
    <!-- ====================== Testimonial Section Start ============================== -->
<div class="container">
    <h2 class="h5 text-center mt-5 pt-5" style="color: green; font-family: 'Roboto Slab', serif !important;">Client Testimonials</h2> 
        <div class="row">
            <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="h2 text-center" style="font-family: 'Roboto Slab', serif !important;">What People Says About Us</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-8 mx-auto">
            <p class="text-center" style="color: rgb(97, 94, 94) !important; font-family: 'Roboto Slab', serif !important;">Lorem ipsum dolor sit, amet consectetur adipisicing elit Dignissimos.</p>
            </div>
        </div>
    <!-- =========================Client Section Start ================================= -->
    <div class="row mt-5 mb-5 " > 
        <div class="col-sm-10 col-12 mx-auto">
            <div class="owl-carousel owl-theme">
                <div class="item"> 
                <div class="card-body"> 
                <i class="fa-sharp fa-solid fa-star mt-4 mb-2" style="margin-left: 30%; color:green;"></i>
                <i class="fa-sharp fa-solid fa-star mt-4 mb-2" style="margin-left: 2%; color:green;"></i>
                <i class="fa-sharp fa-solid fa-star mt-4 mb-2" style="margin-left: 2%; color:green;"></i>
                <i class="fa-sharp fa-solid fa-star mt-4 mb-2" style="margin-left: 2%; color:green;"></i>
                <p class="card-text mb-3" style="color: rgb(97, 94, 94) !important; font-family: 'Roboto Slab', serif !important;">Some quick example text to build on the card title and make up the bulk of the card's content.</p> 
                    <img src="upload_images/author-02.jpg" style="width: 80px; height: 80px;" class="card-img-top mx-auto mb-3" alt="..."> 
                <p class="text-center mb-2" style="color: rgb(97, 94, 94) !important; font-family: 'Roboto Slab', serif !important;">Muhammad Noman</p>
                <p class="text-center" style="color: rgb(97, 94, 94) !important; font-family: 'Roboto Slab', serif !important;">Designer</p>
                </div> 
            </div> 
            <div class="item"> 
                <div class="card-body"> 
                <i class="fa-sharp fa-solid fa-star mt-4 mb-2" style="margin-left: 30%; color:green;"></i>
                <i class="fa-sharp fa-solid fa-star mt-4 mb-2" style="margin-left: 2%; color:green;"></i>
                <i class="fa-sharp fa-solid fa-star mt-4 mb-2" style="margin-left: 2%; color:green;"></i>
                <i class="fa-sharp fa-solid fa-star mt-4 mb-2" style="margin-left: 2%; color: green;"></i>
                <p class="card-text mb-3" style="color: rgb(97, 94, 94) !important; font-family: 'Roboto Slab', serif !important;">Some quick example text to build on the card title and make up the bulk of the card's content.</p> 
                    <img src="upload_images/author-04.jpg" style="width: 80px; height: 80px;" class="card-img-top mx-auto mb-3" alt="..."> 
                <p class="text-center mb-2" style="color: rgb(97, 94, 94) !important; font-family: 'Roboto Slab', serif !important;">Muhammad Noman</p>
                <p class="text-center" style="color: rgb(97, 94, 94) !important; font-family: 'Roboto Slab', serif !important;">Designer</p>
                </div> 
            </div> 
            <div class="item"> 
                <div class="card-body"> 
                <i class="fa-sharp fa-solid fa-star mt-4 mb-2" style="margin-left: 30%; color: green;"></i>
                <i class="fa-sharp fa-solid fa-star mt-4 mb-2" style="margin-left: 2%; color: green;"></i>
                <i class="fa-sharp fa-solid fa-star mt-4 mb-2" style="margin-left: 2%; color:green;"></i>
                <i class="fa-sharp fa-solid fa-star mt-4 mb-2" style="margin-left: 2%; color: gray;"></i>
                <p class="card-text mb-3" style="color: rgb(97, 94, 94) !important; font-family: 'Roboto Slab', serif !important;">Some quick example text to build on the card title and make up the bulk of the card's content.</p> 
                    <img src="upload_images/author-03.jpg" style="width: 80px; height: 80px;" class="card-img-top mx-auto mb-3" alt="..."> 
                <p class="text-center mb-2" style="color: rgb(97, 94, 94) !important; font-family: 'Roboto Slab', serif !important;">Muhammad Noman</p>
                <p class="text-center" style="color: rgb(97, 94, 94) !important; font-family: 'Roboto Slab', serif !important;">Designer</p>
                </div> 
            </div> 
        </div>
    </div>
    
</div>  
</div>
<!-- =========================Client Section End ================================= -->
<?php include("include/footer.php");?>

         