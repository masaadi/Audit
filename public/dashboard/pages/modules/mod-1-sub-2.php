<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>BSCIC | Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/bsic.png" />
<style>
    .navbar .navbar-brand-wrapper .navbar-brand-inner-wrapper .navbar-brand img{
        width: inherit;
    }
</style>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
          <a class="navbar-brand brand-logo" href="../../index.php"><img src="../../images/bsic.png" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="../../index.php"><img src="../../images/bsic.png" alt="logo"/></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>  
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-4 w-100">
          <li class="nav-item nav-search d-none d-lg-block w-100">
            <span style="font-size: 20px; color:#520e00 ;">BSCIC E-Registration System</span>
            <!-- <img src="images/bsic.png" style="width: 50px;"> -->
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          
          
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="../../images/user-img.png" alt="profile"/>
              <span class="nav-profile-name">Admin</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="mdi mdi-settings text-primary"></i>
                Settings
              </a>
              <a href="../../../index.php" class="dropdown-item">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="../../index.php">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#generalCon" aria-expanded="false" aria-controls="generalCon">
              <i class="mdi mdi-settings menu-icon"></i>
              <span class="menu-title">General Configuration</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="generalCon">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-1-sub-1.php"> Organogram </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-1-sub-2.php"> Service office<br>Registration </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-1-sub-3.php"> User Registration </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-1-sub-4.php"> User Verification </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-1-sub-6.php"> Access Control </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-1-sub-7.php"> User Account<br>Recovery </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-1-sub-8.php"> Profile </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-1-sub-10.php"> Notification </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-1-sub-11.php"> Document </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-1-sub-13.php"> Payment </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-1-sub-14.php"> Service & Application<br>Tracking </a></li>
                </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#infoService" aria-expanded="false" aria-controls="infoService">
              <i class="mdi mdi-information menu-icon"></i>
              <span class="menu-title">Information Service</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="infoService">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-2-sub-1.php"> Information<br>Dissemination </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-2-sub-2.php"> User Subscription </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-2-sub-3.php"> Feedback & Review </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-2-sub-4.php"> Complaints<br>Management </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-2-sub-5.php"> Blog and User Forum </a></li>
                </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#applicationReg" aria-expanded="false" aria-controls="applicationReg">
              <i class="mdi mdi-application menu-icon"></i>
              <span class="menu-title">Application & Reg.</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="applicationReg">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-3-sub-1.php"> User Registration </a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-3-sub-2.php"> New/Renew<br>Application </a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-3-sub-3.php"> Application<br>Management </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#inspectionApproval" aria-expanded="false" aria-controls="inspectionApproval">
              <i class="mdi mdi-binoculars menu-icon"></i>
              <span class="menu-title">Inspection & Approval</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="inspectionApproval">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-4-sub-1.php"> Inspector Management </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-4-sub-2.php"> Inspection Schedule </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-4-sub-3.php"> Inspection Report </a></li>
                </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#paymentCer" aria-expanded="false" aria-controls="paymentCer">
              <i class="mdi mdi-currency-usd menu-icon"></i>
              <span class="menu-title">Payment & Certificate</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="paymentCer">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-5-sub-1.php"> Payment </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-5-sub-2.php"> Registration Certificate<br>Delivery </a></li>
                </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ekshopMan" aria-expanded="false" aria-controls="ekshopMan">
              <i class="mdi mdi-shopping menu-icon"></i>
              <span class="menu-title">Ekshop Management</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ekshopMan">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-6-sub-4.php"> Profile Update<br>Sync </a></li>
                </ul>
            </div>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body p-5">
                  <h4 class="">Service Office Registration Management</h4><br>
                  <h6 class="card-title">Add Service/Sub-Service Office</h6>
                  <form class="form-sample">
                    <p class="card-description">
                      
                    </p>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Service</label>
                          <div class="col-sm-8">
                              <select class="form-control">
                                  <option>Select Service</option>
                                  <option>Service 1</option>
                                  <option>Service 2</option>
                                  <option>Service 3</option>
                                </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Division</label>
                          <div class="col-sm-8">
                              <select class="form-control">
                                  <option>Select Division</option>
                                  <option>Dhaka</option>
                                  <option>Chittagong</option>
                                  <option>Khulna</option>
                                  <option>Sylhet</option>
                                  <option>Rangpur</option>
                                </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">District</label>
                            <div class="col-sm-8">
                              <select class="form-control">
                                <option>Select District</option>
                                <option>Dhaka</option>
                                <option>Narayanganj</option>
                                <option>Gajipur</option>
                                <option>Keraniganj</option>
                                <option>Cumilla</option>
                                <option>Feni</option>
                                <option>Chittagong</option>
                                <option>Cox'bazar</option>
                                <option>Sylhet</option>
                                <option>Rangpur</option>
                                <option>Dinajpur</option>
                              </select>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Upazila</label>
                            <div class="col-sm-8">
                                <select class="form-control">
                                  <option>Select Upazila</option>
                                  <option>Shunamganj</option>
                                  <option>Keraniganj</option>
                                  <option>Jatrabari</option>
                                </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Union</label>
                            <div class="col-sm-8">
                                <select class="form-control">
                                    <option>Select Union</option>
                                    <option>Union 1</option>
                                    <option>Union 2</option>
                                    <option>Union 3</option>
                                  </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label">Address</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control" placeholder="address here!" />
                              </div>
                            </div>
                          </div>
                      </div>
                      
                    
                   
                  </form>

                      <h4>Select on GEO Map</h4>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14607.604248453179!2d90.38425380000001!3d23.750907299999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1573453744332!5m2!1sen!2sbd" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                        <hr>
                        <h4>Service Office</h4>
                          
                        <div class="row">
                          <div class="col-md-2">
                              <div class="form-group">
                                <label>Division</label>
                                <select class="form-control">
                                  <option>Select Division</option>
                                  <option>Dhaka</option>
                                  <option>Chittagong</option>
                                  <option>Khulna</option>
                                  <option>Sylhet</option>
                                  <option>Rangpur</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                  <label>Office Type</label>
                                  <select class="form-control">
                                    <option>Select Type</option>
                                    <option>Head Office</option>
                                    <option>Regional</option>
                                    <option>Sub Regional</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <label>District</label>
                                    <select class="form-control">
                                      <option>Select District</option>
                                      <option>Dhaka</option>
                                      <option>Narayanganj</option>
                                      <option>Gajipur</option>
                                      <option>Keraniganj</option>
                                      <option>Cumilla</option>
                                      <option>Feni</option>
                                      <option>Chittagong</option>
                                      <option>Cox'bazar</option>
                                      <option>Sylhet</option>
                                      <option>Rangpur</option>
                                      <option>Dinajpur</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="form-group">
                                    <label>Upazila</label>
                                    <select class="form-control">
                                      <option>Select Upazila</option>
                                      <option>Shunamganj</option>
                                      <option>Keraniganj</option>
                                      <option>Jatrabari</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="form-group">
                                    <label>Office ID</label>
                                    <input type="text" class="form-control" placeholder="address here!" />
                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="form-group">
                                    <label>BSCIC Area</label>
                                    <input type="text" class="form-control" placeholder="address here!" />
                                  </div>
                                </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                  <input type="submit" value="search" class="btn btn-sm btn-primary mt-4">
                                </div>
                              </div>
                      </div>
              <!-- table -->
              <table id="examplee" class="table table-striped table-bordered table-responsive" style="width:100%">
                  <thead>
                      <tr>
                          <th style="width: 100px;">SL</th>
                          <th style="width: 340px;">ID</th>
                          <th style="width: 140px;">Office Type</th>
                          <th style="width: 450px;">Division</th>
                          <th style="width: 340px;">District</th>
                          <th style="width: 340px;">Upazila</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>1</td>
                          <td>212</td>
                          <td>Regional</td>
                          <td>Dhaka</td>
                          <td>Narayanganj</td>
                          <td>Narayanganj</td>
                      </tr>
                      <tr>
                          <td>2</td>
                          <td>234</td>
                          <td>Sub Regional</td>
                          <td>Dhaka</td>
                          <td>Gazipur</td>
                          <td>Konabari</td>
                      </tr>
                      
                      
                      
                      
                  </tbody>
                  <tfoot>
                      <tr>
                        <th style="width: 100px;">SL</th>
                        <th style="width: 340px;">ID</th>
                        <th style="width: 140px;">Office Type</th>
                        <th style="width: 450px;">Division</th>
                        <th style="width: 340px;">District</th>
                        <th style="width: 340px;">Upazila</th>
                      </tr>
                  </tfoot>
              </table>
              <!-- table -->
                  

                </div>
              </div>
            </div>
          </div>
          
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright ©2020 All rights reserved by BSCIC <br>
              Technical Support by <img src="../../images/a2i-new-logo_Aug2018-300x300.png" style="width: 40px;"> </span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Developed by <br><a href="http://syntechbd.com">Syntech Solutions Ltd.</a></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="../../vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="../../vendors/chart.js/Chart.min.js"></script>
  <script src="../../vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="../../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/dashboard.js"></script>
  <script src="../../js/data-table.js"></script>
  <script src="../../js/jquery.dataTables.js"></script>
  <script src="../../js/dataTables.bootstrap4.js"></script>
  <!-- End custom js for this page-->
  <script>
     $(document).ready(function() {
      $('#example').DataTable();
      $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').trigger('focus')
    })
} );
  </script>
</body>

</html>

