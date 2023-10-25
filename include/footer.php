
        <div class="container-fluid" style="background-color: rgba(134, 242, 134, 0.490) !important;">
         <!-- =============================== Footer Section Start====================-->
          <footer>
            <div class="container">
              <div class="row p-3 justify-content-center align-items-center">
                <div class="col-md-5 col-sm-6 justify-content-center mt-5 mx-auto" style="font-family: 'Roboto Slab', serif !important; ">
                  <h4 class="h4">Information</h4>
                      <p style=" color: rgb(97, 94, 94);" >Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, voluptate?</p> 
                      <li class="list-unstyled mb-4 mt-4" style=" color: rgb(97, 94, 94);"><i class="fa-solid fa-sliders me-3 pe-2" style="color: green; "></i>Lorem ipsum dolor sit amet consectetur .</li>
                      <li class=" list-unstyled mb-4 mt-4"><i class="fa-solid fa-microphone me-3" style="color: green;"></i><a href="tel:+92 321 9402599" class=" text-decoration-none"style="font-size: 16px; color: rgb(97, 94, 94);">+92 321 9402599</a></li>
                      <li class=" list-unstyled mt-4 mb-4" style="margin-left: -8px;"><i class="fa-solid fa-headphones me-3 m-1" style="color: green;"></i></i><a href="mailto:lawhouse@live.com" class="text-light text-decoration-none" style="font-size: 16px; color: rgb(97, 94, 94) !important;">lawhouse@live.com</a></li> 
                </div>
                <div class="col-md-3 col-sm-6 mt-lg-5 text-center" style="font-family: 'Roboto Slab', serif !important; ">
                  <h4 class="h4">Useful Link</h4>
                  <li class=" list-unstyled"><a href="#" class="mt-3 d-block" style="text-decoration: none; color: rgb(97, 94, 94);">Terms & Conditions</a></li>
                  <li class=" list-unstyled"><a href="#" class="mt-3 d-block" style="text-decoration: none; color: rgb(97, 94, 94);">Privacy Policy</a></li>
                  <li class=" list-unstyled"><a href="#" class="mt-3 d-block" style="text-decoration: none; color: rgb(97, 94, 94);">Careers</a></li>
                  <li class=" list-unstyled"><a href="#" class="mt-3 d-block" style="text-decoration: none; color: rgb(97, 94, 94);">FAQs</a></li>
                  <li class=" list-unstyled"><a href="#" class="mt-3 d-block" style="text-decoration: none; color: rgb(97, 94, 94);">Site Map</a></li>           
                </div>
                <div class="col-md-4 col-sm-8 mt-lg-5" style="font-family: 'Roboto Slab', serif !important; ">
                  <h4 class="h4">Subscribe Us</h4>
                  <p style=" color: rgb(97, 94, 94);">Stay always in touch! Subscribe to our newsletter</p> 
                  <div class="input-group mb-3"> 
                    <input type="text" class="p-2 form-control rounded-0" placeholder=" Your e-mail" aria-label="Example text with button addon" aria-describedby="button-addon1">
                    <button class="btn btn-outline-secondary rounded-0 border-0" type="button" id="button-addon1" style="background-color: green; height: 8vh; width: 50px;"><i class="fa-solid fa-arrow-right rounded-0 text-light"></i></button>
                  </div>
                  <p style="color: green;">Don't worry we don't spam</p>
                </div>
              </div>
              <div class="row mt-5 justify-content-center">
                    <div class="col-lg-6 col-md-6 col-12 text-center mx-auto" style="font-family: 'Roboto Slab', serif !important; ">
                        <p><span style="color:green !important;">Copyright © 2023 | Designed By</span> Muhammad Noman </p>
                    </div> 
                  </div> 
              </div>
            </div>
          </footer>
        </div>    
     <!-- ======================== Footer Section End ================================== -->
     
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js" integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>
    <script src="../newproject/assets/js/owl.carousel.min.js"></script>
    <script>
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:false,
            autoplay:true,
            autoplayTimeout:2000,
            responsiveClass:true,
            dots:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:2
                }
            }
        })
    </script> 
    <script>
         setTimeout(function() {
          let alert = document.querySelector(".alert");
          alert.remove();
          }, 3000);

        function menuToggle(){
        const toggleMenu = document.querySelector('.menu');
        toggleMenu.classList.toggle('active')
        }

        
    </script>
    <!-- ==================Editor Script====================== -->
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script> 
   <script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
    </script>
    
</body>
</html>