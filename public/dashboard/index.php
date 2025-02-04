<!DOCTYPE html>
<html lang="en">  

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>BSCIC | Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/bsic.png" />
<style>
    .navbar .navbar-brand-wrapper .navbar-brand-inner-wrapper .navbar-brand img{
        width: inherit;
    }

    ul.nav li a, ul.nav li a:visited {
    color: #anycolor !important;
    }

    ul.nav li a:hover, ul.nav li a:active {
        color: #anycolor !important;
    }

    ul.nav li.active a {
        color: #anycolor !important;
    }
    
    .linked{
      box-shadow: 0px 0px 3px #777;
      transition: 0.7s;
    }
     .linked a:hover {
      color: #0056b3!important;
      text-decoration: none!important;
    }
    .linked:hover {
      box-shadow: 1px 2px 3px #777!important;
      transition: 0.7s;
      text-decoration: none!important;
    }
    .card{
      border: transparent!important;
    }
</style>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.php -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
          <a class="navbar-brand brand-logo" href="index.php"><img src="images/bsic.png" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="index.php"><img src="images/bsic.png" alt="logo"/></a>
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
          <li class="nav-item dropdown mr-4">
              <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center notification-dropdown" id="notificationDropdown" href="#" data-toggle="dropdown">
                <i class="mdi mdi-bell mx-0"></i>
                <span class="count"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="notificationDropdown">
                <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                <a class="dropdown-item">
                  <div class="item-thumbnail">
                    <div class="item-icon bg-success">
                      <i class="mdi mdi-information mx-0"></i>
                    </div>
                  </div>
                  <div class="item-content">
                    <h6 class="font-weight-normal">Application Error</h6>
                    <p class="font-weight-light small-text mb-0 text-muted">
                      Just now
                    </p>
                  </div>
                </a>
                <a class="dropdown-item">
                  <div class="item-thumbnail">
                    <div class="item-icon bg-warning">
                      <i class="mdi mdi-settings mx-0"></i>
                    </div>
                  </div>
                  <div class="item-content">
                    <h6 class="font-weight-normal">Settings</h6>
                    <p class="font-weight-light small-text mb-0 text-muted">
                      Private message
                    </p>
                  </div>
                </a>
                <a class="dropdown-item">
                  <div class="item-thumbnail">
                    <div class="item-icon bg-info">
                      <i class="mdi mdi-account-box mx-0"></i>
                    </div>
                  </div>
                  <div class="item-content">
                    <h6 class="font-weight-normal">New user registration</h6>
                    <p class="font-weight-light small-text mb-0 text-muted">
                      2 days ago
                    </p>
                  </div>
                </a>
              </div>
            </li>
          
          
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="images/user-img.png" alt="profile"/>
              <span class="nav-profile-name">Admin</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="mdi mdi-settings text-primary"></i>
                Settings
              </a>
              <a href="../index.php" class="dropdown-item">
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
            <a class="nav-link" href="index.php">
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
                <li class="nav-item"> <a class="nav-link" href="pages/modules/mod-1-sub-1.php"> Organogram </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/modules/mod-1-sub-2.php"> Service office<br>Registration </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/modules/mod-1-sub-3.php"> User Registration </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/modules/mod-1-sub-4.php"> User Verification </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/modules/mod-1-sub-6.php"> Access Control </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/modules/mod-1-sub-7.php"> User Account<br>Recovery </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/modules/mod-1-sub-8.php"> Profile </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/modules/mod-1-sub-10.php"> Notification </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/modules/mod-1-sub-11.php"> Document </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/modules/mod-1-sub-12.php"> Central Monitoring,<br>Dashboard, & Report </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/modules/mod-1-sub-13.php"> Payment </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/modules/mod-1-sub-14.php"> Service & Application<br>Tracking </a></li>
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
                <li class="nav-item"> <a class="nav-link" href="pages/modules/mod-2-sub-1.php"> Information<br>Dissemination </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/modules/mod-2-sub-2.php"> User Subscription </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/modules/mod-2-sub-3.php"> Feedback & Review </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/modules/mod-2-sub-4.php"> Complaints<br>Management </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/modules/mod-2-sub-5.php"> Blog and User Forum </a></li>
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
                <li class="nav-item"> <a class="nav-link" href="pages/modules/mod-3-sub-1.php"> User Registration </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/modules/mod-3-sub-2.php"> New/Renew<br>Application </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/modules/mod-3-sub-3.php"> Application<br>Management </a></li>
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
                <li class="nav-item"> <a class="nav-link" href="pages/modules/mod-4-sub-1.php"> Inspector Management </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/modules/mod-4-sub-2.php"> Inspection Schedule </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/modules/mod-4-sub-3.php"> Inspection Report </a></li>
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
                <li class="nav-item"> <a class="nav-link" href="pages/modules/mod-5-sub-1.php"> Payment </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/modules/mod-5-sub-2.php"> Registration Certificate<br>Delivery </a></li>
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
                <li class="nav-item"> <a class="nav-link" href="pages/modules/mod-6-sub-4.php"> Profile Update<br>Sync </a></li>
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
              <div class="card"  style="background-color: rgba(75, 280, 120, 0.1); box-shadow: 0px 0px 3px #777;">
                <div class="card-body dashboard-tabs p-0">
                  <ul class="nav nav-tabs px-4" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Total Summury</a>
                    </li>
                  </ul>
                  <div class="tab-content py-0 px-0">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                      <div class="d-flex flex-wrap justify-content-xl-between">
                        <div class="d-none d-xl-flex border-left border-right border-bottom flex-grow-1 align-items-center justify-content-center p-3 item" >
                          <i class="mdi mdi-format-float-left icon-lg mr-3 text-primary"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Total Application</small>
                            <h5 class="mr-2 mb-0">05</h5>
                          </div>
                        </div>
                        <div class="d-flex border-right border-bottom flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-account-card-details mr-3 icon-lg text-success"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Total Registration</small>
                            <h5 class="mr-2 mb-0">01</h5>
                          </div>
                        </div>
                        <div class="d-flex border-right border-bottom flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-alert mr-3 icon-lg text-danger"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Rejected Registration</small>
                            <h5 class="mr-2 mb-0">00</h5>
                          </div>
                        </div>
                        <div class="d-flex border-right border-bottom flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-replay mr-3 icon-lg text-warning"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Resubmission</small>
                            <h5 class="mr-2 mb-0">01</h5>
                          </div>
                        </div>
                        <div class="d-flex py-3 border-right border-bottom flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-redo-variant mr-3 icon-lg text-primary"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Renew</small>
                            <h5 class="mr-2 mb-0">02</h5>
                          </div>
                        </div>
                        <div class="d-flex py-3 border-right border-bottom flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-av-timer mr-3 icon-lg text-danger"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Total Expired</small>
                            <h5 class="mr-2 mb-0">00</h5>
                          </div>
                        </div>
                        <div class="d-flex py-3 border-left border-right border-bottom flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-file-check mr-3 icon-lg text-success"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Delivered Certificate</small>
                            <h5 class="mr-2 mb-0">01</h5>
                          </div>
                        </div>
                        <div class="d-flex py-3 border-right border-bottom flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-currency-usd mr-3 icon-lg text-primary"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Payment Collected</small>
                            <h5 class="mr-2 mb-0">5500</h5>
                          </div>
                        </div>
                        <div class="d-flex py-3 border-right border-bottom flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-houzz mr-3 icon-lg text-danger"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">ISC Office</small>
                            <h5 class="mr-2 mb-0">20</h5>
                          </div>
                        </div>
                        <div class="d-flex py-3 border-right border-bottom flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-houzz-box mr-3 icon-lg text-warning"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">SISC Office </small>
                            <h5 class="mr-2 mb-0">12</h5>
                          </div>
                        </div>
                        <div class="d-flex py-3 border-right border-bottom flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-account-circle mr-3 icon-lg text-primary"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Total User</small>
                            <h5 class="mr-2 mb-0">05</h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
          <div class="col-md-6 grid-margin">
            <div class="row">
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card linked" >
                    <a href="#" style="color: #E91E63;">
                      <div class="card-body text-center">
                          <span style="font-size: 78px"><i class="mdi mdi-settings"></i></span>
                          <h5>General Configuration</h5>
                      </div>
                    </a>
                    </div>
                  </div>
                    <div class="col-md-4 grid-margin stretch-card">
                    <div class="card linked">
                        <a href="#" style="color: #46c35f;">
                      <div class="card-body text-center">
                          <span style="font-size: 78px"><i class="mdi mdi-information"></i></span>
                          <h5>Information Service</h5>
                      </div>
                      </a>
                    </div>
                  </div>
                    <div class="col-md-4 grid-margin stretch-card">
                    <div class="card linked">
                        <a href="#" style="color: #6a008a;">
                      <div class="card-body text-center">
                          <span style="font-size: 78px"><i class="mdi mdi-application"></i></span>
                          <h5>Application & Registration</h5>
                      </div>
                      </a>
                    </div>
                  </div>
            </div>
            <div class="row">
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card linked">
                        <a href="#" style="color: #ffc100;">
                      <div class="card-body text-center">
                          <span style="font-size: 78px"><i class="mdi mdi-binoculars"></i></span>
                          <h5>Inspection and Approval</h5>
                      </div>
                      </a>
                    </div>
                  </div>
                  <div class="col-md-4 grid-margin stretch-card">
                      <div class="card linked">
                      <a href="#" style="color: #71c016;">
                        <div class="card-body text-center">
                            <span style="font-size: 78px"><i class="mdi mdi-currency-usd"></i></span>
                            <h5>Payment and Certificate</h5>
                        </div>
                      </a>
                      </div>
                    </div>
                      <div class="col-md-4 grid-margin stretch-card">
                      <div class="card linked">
                          <a href="#" style="color: #E91E63;">
                        <div class="card-body text-center">
                            <span style="font-size: 78px"><i class="mdi mdi-shopping"></i></span>
                            <h5>Ekshop</h5>
                        </div>
                      </a>
                      </div>
                    </div>
            </div>
          </div>


          <div class="col-md-6 grid-margin">
              <div class="card pt-4 pb-4" style="box-shadow: 0px 0px 3px #777;">
                  <div class="card-body pt-4 pb-5">
                    <h4 class="card-title">Total Applications</h4>
                    <canvas id="pieChart"></canvas>
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
              Technical Support by <img src="images/a2i-new-logo_Aug2018-300x300.png" style="width: 40px;"> </span>
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
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="../../js/chart.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/data-table.js"></script>
  <script src="js/jquery.dataTables.js"></script>
  <script src="js/dataTables.bootstrap4.js"></script>
  <!-- End custom js for this page-->
  <script>
    //pie
    var ctxP = document.getElementById("pieChart").getContext('2d');
    var myPieChart = new Chart(ctxP, {
      type: 'pie',
      data: {
        labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
        datasets: [{
          data: [300, 50, 100, 40, 120],
          backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
          hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
        }]
      },
      options: {
        responsive: true
      }
    });
  </script>
</body>

</html>

