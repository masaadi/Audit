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
  <link href='https://fonts.googleapis.com/css?family=Alegreya+Sans' rel='stylesheet' type='text/css'>
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
      width: 77%;
      height: 2px;
      content: '';
      position: absolute;
      background-color: #7d7d7d;
      top: 15px;
      left: -39%;
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
    <!-- partial:partials/_navbar.php -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
          <a class="navbar-brand brand-logo" href="index.php"><img src="../../images/bsic.png" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="index.php"><img src="../../images/bsic.png" alt="logo"/></a>
          <!-- <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button> -->
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
              <img src="../../images/faces/face5.jpg" alt="profile"/>
              <span class="nav-profile-name">User</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="mdi mdi-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item" href="../../../index.php">
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
            <div class="card">
              <div class="card-body">
                <button class="btn btn-sm btn-primary">Blog</button>
                <button class="btn btn-sm btn-success">Form</button>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <div class="card p-2">
                <div class="card-body text-center">
                  <form action="">
                    <div class="form-group">
                      <label>SSUBSCRIBE TO GET ANY UPDATE INFORMATION ABOUT REGISTRATION</label>
                      <input type="text" class="form-control">
                    </div>
                    <input type="submit" value="submit" class="btn btn-sm btn-primary">
                  </form>
                </div>
              </div>
        </li>
          <li class="nav-item">
              <div class="card p-2">
                  <div class="card-body text-center">
                    <form action="">
                      <div class="form-group">
                        <label>Track Your Application</label>
                        <input type="text" class="form-control">
                      </div>
                      <input type="submit" value="submit" class="btn btn-sm btn-primary">
                    </form>
                  </div>
                </div>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="user-registration-from.php">
                <i class="mdi mdi-table menu-icon"></i>
                <span class="menu-title">Register Your Business</span>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#">
                  <i class="mdi mdi-table-edit menu-icon"></i>
                  <span class="menu-title">Apply For Correction</span>
                </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#">
                  <i class="mdi mdi-sync menu-icon"></i>
                  <span class="menu-title">Apply For Renew</span>
                </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#">
                  <i class="mdi mdi-currency-usd menu-icon"></i>
                  <span class="menu-title">Payment</span>
                </a>
          </li>
          <li class="nav-item">
              <div class="card p-2">
                  <div class="card-body text-center">
                    <form action="">
                      <div class="form-group">
                        <label>Print Your Certificate</label>
                        <input type="text" class="form-control">
                      </div>
                      <input type="submit" value="submit" class="btn btn-sm btn-primary">
                    </form>
                  </div>
                </div>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-3 text-right p-3"></div>
            <div class="col-md-3 text-right p-3"></div>
            <div class="col-md-6 text-right p-3">
                <div class="row">
                    <div class="col-md-3">
                        <label for="validationDefault05">Track Another ID :</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="validationDefault05" placeholder="" required>
                    </div>
                    <div class="col-md-2">
                            <input type="submit" value="submit" class="btn btn-primary">
                    </div>
                </div>
            </div>
          </div>

          <div class="row">
              <div class="col-md-12">
                  <div class="row p-3">
                      <div class="col-md-4">
                            <label for="validationDefault05">Application ID : 546892</label>
                      </div>
                      <div class="col-md-4"></div>
                      <div class="col-md-4 text-right">
                          <button class="btn btn-primary">Print</button>
                          <button class="btn btn-warning">Export PDF</button>
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
                      <li class="active">Applied</li>
                      <li>Reviewed</li>
                      <li>Approched for Inspection</li>
                      <li>Inspector Assigned</li>
                      <li>Inspected</li>
                      <li>Approve Review</li>
                      <li>Payment</li>
                      <li>Delivery</li>
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
                  <h5>Track</h5>
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
                          <td>Jacob</td>
                          <td>53275531</td>
                          <td>12 May 2017</td>
                          <td>53275531</td>
                        </tr>
                        <tr>
                          <td>Messsy</td>
                          <td>53275532</td>
                          <td>15 May 2017</td>
                          <td>53275531</td>
                        </tr>
                        <tr>
                          <td>John</td>
                          <td>53275533</td>
                          <td>14 May 2017</td>
                          <td>53275531</td>
                        </tr>
                        <tr>
                          <td>Peter</td>
                          <td>53275534</td>
                          <td>16 May 2017</td>
                          <td>53275531</td>
                        </tr>
                        <tr>
                          <td>Dave</td>
                          <td>53275535</td>
                          <td>20 May 2017</td>
                          <td>53275531</td>
                        </tr>
                      </tbody>
                    </table>
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
  <script src="../../js/chart.js"></script>
</body>

</html>

