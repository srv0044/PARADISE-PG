<!--Nav Bar-->
<nav id="nav-bar" class="navbar navbar-expand-lg bg-light px-lg-3 py-lg-2 shadow-sm sticky top">
    <div class="container-fluid">
       <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php"><?php echo $settings_r['site_title'] ?></a>
       <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span> 
       </button> 
       <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link me-2" href="rooms.php">Rooms</a>
            </li>
            <li class="nav-item">
                <a class="nav-link me-2" href="facilities.php">Facilities</a>
            </li>
            <li class="nav-item">
                <a class="nav-link me-2" href="contact.php">Contact Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link me-2" href="about.php">About</a>
            </li>
          </ul>
          <div class="d-flex">
            <?php
              if(isset($_SESSION['login']) && $_SESSION['login'] == true )
              {
                $path = USERS_IMG_PATH;
                echo<<<data
                  <div class="btn-group">
                     <button type="button" class="btn btn-outline-dark shadow-none dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                        <img src="$path$_SESSION[uPic]" style="width: 25px; height: 25px;" class="me-1">
                        $_SESSION[uName]
                     </button>
                     <ul class="dropdown-menu dropdown-menu-lg-end">
                       <li><a class="dropdown-item" href="profile.php">Profile</a></li> 
                       <li><a class="dropdown-item" href="bookings.php">Bookings</a></li> 
                       <li><a class="dropdown-item" href="logout.php">Logout</a></li> 
                     </ul>
                  </div>  
                data;
              }
              else{
                echo<<<data
                  <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#loginModel">Login</button>
                 <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal" data-bs-target="#registerModel">Register</button>

                data;
              }
            ?> 
          </div> 
       </div>
    </div>
</nav>


<!--Login Pop-->
<div class="modal fade" id="loginModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="login-form">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center">
                        <i class="bi bi-person-circle fs-3 me-2">User Login</i>
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Email / Mobile</label>
                        <input type="text" name="email_mob" required class="form-control shadow-none">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Password</label>
                        <input type="password" name="pass" required class="form-control shadow-none">
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <button type="submit" class="btn btn-dark shadow-none">LOGIN</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<!--Register Pop-->
<div class="modal fade" id="registerModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="register-form">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center">
                        <i class="bi bi-person-lines-fill fs-3 me-2">User Registration</i>
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">Note: Your details must match with your ID (Aadhaar card, passport, driving license, etc.) that will be required during check-in.
                    </span>
                    <div class="container-fluid">
                       <div class="row">
                           <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 p-0">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="number" name="phonenum" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 p-0">
                                <label accept=".jpg, .jpeg, .png, .webp" class="form-label">Picture</label>
                                <input type="file" name="profile" class="form-control shadow-none"required>
                            </div>
                            <div class="col-md-12 p-0">
                                <label class="form-label">Address</label>
                                <textarea name="address" class="form-control shadow-none" rows="1" required></textarea>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Pin Code</label>
                                <input type="number" name="pincode" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 p-0">
                                <label class="form-label">Date of Birth</label>
                                <input type="date" name="dob" class="form-control shadow-none"required>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="pass" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 p-0">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" name="cpass" class="form-control shadow-none" required>
                            </div>
                            <div class="text-center my-1">
                                <button type="submit" class="btn btn-dark shadow-none">Register</button>
                            </div>
                       </div> 
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
