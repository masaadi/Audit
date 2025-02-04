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

    .progressbar {
      margin: 0;
      padding: 0;
      counter-reset: step;
      z-index: 1!important;
      padding: 30px;
    }
    .progressbar li {
      list-style-type: none;
      width: 12.5%;
      float: left;
      font-size: 12px;
      position: relative;
      text-align: center;
      text-transform: uppercase;
      color: #7d7d7d;
    }
    .progressbar li:before {
      width: 30px;
      height: 30px;
      content: counter(step);
      counter-increment: step;
      line-height: 30px;
      border: 2px solid #7d7d7d;
      display: block;
      text-align: center;
      margin: 0 auto 10px auto;
      border-radius: 50%;
      background-color: white;
      z-index: 2;
    }
    .progressbar li:after {
      width: 73%;
      height: 2px;
      content: '';
      position: absolute;
      background-color: #7d7d7d;
      top: 15px;
      left: -38%;
      z-index: 1;
    }
    .progressbar li:first-child:after {
      content: none;
    }
    .progressbar li.active {
      color: green;
    }
    .progressbar li.active:before {
      border-color: #55b776;
    }
    .progressbar li.active + li:after {
      background-color: #55b776;
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
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                

                <div class="row p-3">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-title p-3">
                                <h5>Service and Application Tracking</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                <div class="col-md-3 text-right p-3"></div>
                                <div class="col-md-3 text-right p-3"></div>
                                <div class="col-md-6 text-right p-3">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="validationDefault05">Applicant ID :</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="validationDefault05" placeholder="" required>
                                        </div>
                                        <div class="col-md-4">
                                                <input type="submit" value="Track Application" class="btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                                </div>

                                

                                <div class="row">
                                <div class="col-md-12 grid-margin stretch-card">
                                    <div class="card ">
                                    <div class="row">
                                        <div class="col-md-12">
                                        <ul class="progressbar">
                                            <li class="active">Succesfull Application</li>
                                            <li>Prepare for Inspection</li>
                                            <li>Inspector</li>
                                            <li>Inspection Report</li>
                                            <li>Approved/Reject</li>
                                            <li>Payment</li>
                                            <li>Certificate</li>
                                            <li>Successfull</li>
                                        </ul>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>

                                <div class="row">
                                        <div class="col-md-12 grid-margin stretch-card">
                                          <div class="card">
                                            <div class="card-title p-3">
                                              <h5>Applicant Status</h5>
                                            </div>
                                            <div class="card-body">
                                              <div class="table-responsive">
                                                <table class="table">
                                                  <thead>
                                                    <tr>
                                                      <th>SL</th>
                                                      <th>Subject</th>
                                                      <th>Date</th>
                                                      <th>Description</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                    <tr>
                                                      <td>1</td>
                                                      <td>Tracking</td>
                                                      <td>12 May 2017</td>
                                                      <td>--------------------------------------------------------</td>
                                                    </tr>
                                                    <tr>
                                                      <td>2</td>
                                                      <td>Tracking</td>
                                                      <td>15 May 2017</td>
                                                      <td>---------------------------------------------------------------</td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                            </div>
                        </div>
                    </div>
                </div>
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

