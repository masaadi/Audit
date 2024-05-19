<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>BSCIC | Login</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/bsic.png" />
  <style>
    .content-wrapper{
      background-image: url("../../images/industry.jpg")!important;
      background-position: center;
      background-size: cover;
    }

    .mobile-img img{
      width: 100%;
    }
    .form-holder input{
      padding: 3px 10px;
      border-radius: 3px;
      border: 0.5px solid #777;
    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-5 mx-auto form-holder">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo" style="text-align: center;">
                <img src="../../images/bsic.png" alt="logo">
              </div>
              <h6 class="font-weight-light" style="text-align: center;">Sign up to continue</h6>
              <form class="pt-3 px-2">
                  <div class=" row">
                      <label class="col-sm-6 col-form-label">First Name :</label>
                      <div class="col-sm-6">
                          <input type="text" class="" placeholder="your first name" />
                      </div>
                    </div>
                    <div class=" row">
                        <label class="col-sm-6 col-form-label">Last Name :</label>
                        <div class="col-sm-6">
                            <input type="text" class="" placeholder="your last name" />
                        </div>
                      </div>
                      <div class="row">
                          <label class="col-sm-6 col-form-label">NID No :</label>
                          <div class="col-sm-6">
                              <input type="text" class="" placeholder="16 Digit" />
                          </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-6 col-form-label">Birth Certificate No :</label>
                            <div class="col-sm-6">
                                <input type="text" class="" placeholder="" />
                            </div>
                          </div>
                          <div class="row">
                              <label class="col-sm-6 col-form-label">E-mail :</label>
                              <div class="col-sm-6">
                                  <input type="email" class="" placeholder="yourmail@email.com" />
                              </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-6 col-form-label">Phone No :</label>
                                <div class="col-sm-6">
                                    <input type="text" class="" placeholder="01*******" />
                                </div>
                              </div>
                              <div class=" row">
                                  <label class="col-sm-6 col-form-label">User Name :</label>
                                  <div class="col-sm-6">
                                      <input type="text" class="" placeholder="create an username" />
                                  </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-6 col-form-label">Create Password :</label>
                                    <div class="col-sm-6">
                                        <input type="password" class="" placeholder="**********" />
                                    </div>
                                  </div>
                                  <div class="row">
                                      <label class="col-sm-6 col-form-label">Confirm Password :</label>
                                      <div class="col-sm-6">
                                          <input type="password" class="" placeholder="**********" />
                                      </div>
                                    </div>
                <div class="mt-3">
<!-- Button trigger modal -->
<button type="button" class="btn btn-block btn-warning btn-lg font-weight-medium auth-form-btn" data-toggle="modal" data-target="#exampleModal">
    Sign Up
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-wrap: break-word;">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Enter Verification Code</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="">
          <div class="row">
            <div class="col-md-8">
                <form>
                    <div class="form-group">
                        <p>We sent a text massage with a code to +8801******84</p>
                        <div class="form-group">
                            <label class="">Please Enter The code Below</label>
                            <div class="">
                                <input type="text" class="form-control" placeholder="code here" />
                            </div>
                          </div>
                          <div class="button-group">
                            <a href="login.php" class="btn btn-sm btn-primary">Submit</a>
                            <button class="btn btn-sm btn-danger">Cancel</button>
                          </div>

                          <a href="#" style="display: block;" class="pt-4">Resend Code</a>
                    </div>
                  </form>
            </div>
            <div class="col-md-4 mobile-img">
              <img src="../../images/mobile.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
                 
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <!-- endinject -->
</body>

</html>
