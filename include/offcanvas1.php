<?php include("../include/Top_bar.php");?>
<div class="container-fluid"> 
            <a class="btn ms-2 mt-2 btn-dark" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample" style=" position: fixed !important;">
            <i class="bi bi-list h3"></i>
            </a> 
                <div class="offcanvas offcanvas-start bg-dark" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" style=" width: 280px !important;">
                    <div class="offcanvas-header border-bottom">
                        <div class="">
                            <a href="#" class="ms-5 text-decoration-none text-light" style="position: relative !important;"><span class="asani2" style="font-family: serif !important; font-size: 37px !important; font-weight: 700 !important;">Job</span><span><i class="fa-solid fa-building-columns fa-3x pt-2"></i>
                            <span style=" position: absolute !important; top: 13px; left: 80px;font-family: serif !important; font-size: 28px !important; font-weight: 700 !important;">Bank</span></span></a>   
                        </div>
                    </div>
                  <div class="offcanvas-body"> 
                    <div class="dropdown mt-3"> 
                        <ul class="list-unstyled ps-0 ms-4">
                            <li class="mb-2">
                                <a class="btn btn-toggle align-items-center fs-4 text-light rounded p-2" href="../admin/dashboard.php">
                                <strong class="h5  border-3 p-0 m-0" style="">Dashboard</strong>
                                </a>
                            </li>
                            <li class="mb-2">
                                <a class="btn btn-toggle align-items-center text-light rounded p-2" style="" href="../admin/manage_users.php">
                                 <strong class="h6  border-3 p-0 m-0" style="">Manage users</strong>
                                </a>
                            </li>
                            <li class="mb-2">
                                <a class="btn btn-toggle align-items-center text-light rounded p-2" style="" href="../admin/manage_categories.php">
                                <strong class="h6  border-3 p-0 m-0"> Manage Categories</strong>
                                </a>
                            </li>
                            <!-- <li class="mb-2">
                                <a class="btn btn-toggle align-items-center text-light rounded p-2" style="" href="../admin/manage_jobs.php">
                                <strong class="h6  border-3 p-0 m-0" > Manage Jobs</strong>
                                </a>
                            </li>  -->
                        </ul>
                    </div>
                </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
