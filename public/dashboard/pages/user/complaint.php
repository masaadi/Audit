<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>BSCIC | Admin</title>
  <!-- plugins:css -->
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/bsic.png" />
  <link href='https://fonts.googleapis.com/css?family=Alegreya+Sans' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  
  <link href="../../css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
<style>
    .navbar .navbar-brand-wrapper .navbar-brand-inner-wrapper .navbar-brand img{
        width: inherit;
    }

    .progressbar {
      margin: 0;
      padding: 0;
      counter-reset: step;
      z-index: 1!important;
      padding: 10px;
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
      background-color: #55b776;
      color: #fff;
    }
    .progressbar li.active + li:after {
      background-color: #55b776;
    }
    .card .card-title{
      margin-bottom: 0px;
    }
</style>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
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
                    <i class="mdi mdi-logout text-primary"></i>
                    Subscribe
                  </a>
                  <a class="dropdown-item">
                      <i class="mdi mdi-logout text-primary"></i>
                      Print Certificate
                    </a>
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
          <li class="nav-item py-3 text-center">
                <div class="button-group">
                  <a href="../user/blog/blog.php" class="btn btn-sm btn-primary">Blog</a>
                  <a href="../user/forum/forum.php" class="btn btn-sm btn-danger">Forum</a>
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
                  <span class="menu-title">Update Business Information</span>
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
           
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          
          
          

          <div class="row">
            <div class="col-md-6">
              <div class="card" style="box-shadow: 0px 0px 3px #777;">
                <div class="card-body">
                  <div class="modal-body">
                    <h4>Write your complain</h4>
                    <form>
                      <select class="form-control mb-2">
                        <option>Select Category</option>
                        <option>Category 1</option>
                        <option>Category 2</option>
                        <option>Category 3</option>
                      </select>
                      <textarea style="width: 100%; padding: 10px; border-radius: 3px;" placeholder="write somthing..."></textarea>
                      <div class="form-group" style="margin-top:10px">
                          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                      </div>
                  </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          

          <div class="row mt-3">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card" style="box-shadow: 0px 0px 3px #777;">
                <div class="card-title p-3">
                  <h5>Complain History</h5>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr class="text-center">
                            <th>
                              Sl
                            </th>
                            <th>
                              Token No
                            </th>
                            <th>
                              Complain Date
                            </th>
                            <th>
                              Category
                            </th>
                            <th>
                              Status
                            </th>
                            <th>
                              Detail
                            </th>
                            <th>
                                Action
                              </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              1
                            </td>
                            <td>
                              202
                            </td>
                            <td>
                              09-07-23
                              </td>
                            <td>
                              Category 1
                            </td>
                            <td>
                              reviewing
                            </td>
                            <td>
                              The customer service is very bad
                            </td>
                            <td>
                              <div class="btn-group">
                                  <button class="btn btn-sm btn-warning">Edit</button><button class="btn btn-sm btn-danger">Delete</button>
                              </div>
                            </td>
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
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
  <script src="../../js/dataTables.bootstrap4.js"></script>
  <script src="../../js/star-rating.js" type="text/javascript"></script>
  <script>
    jQuery(document).ready(function () {
        $("#input-21f").rating({
            starCaptions: function (val) {
                if (val < 3) {
                    return val;
                } else {
                    return 'high';
                }
            },
            starCaptionClasses: function (val) {
                if (val < 3) {
                    return 'label label-danger';
                } else {
                    return 'label label-success';
                }
            },
            hoverOnClear: false
        });
        var $inp = $('#rating-input');

        $inp.rating({
            min: 0,
            max: 5,
            step: 1,
            size: 'lg',
            showClear: false
        });

        $('#btn-rating-input').on('click', function () {
            $inp.rating('refresh', {
                showClear: true,
                disabled: !$inp.attr('disabled')
            });
        });


        $('.btn-danger').on('click', function () {
            $("#kartik").rating('destroy');
        });

        $('.btn-success').on('click', function () {
            $("#kartik").rating('create');
        });

        $inp.on('rating.change', function () {
            alert($('#rating-input').val());
        });


        $('.rb-rating').rating({
            'showCaption': true,
            'stars': '3',
            'min': '0',
            'max': '3',
            'step': '1',
            'size': 'xs',
            'starCaptions': {0: 'status:nix', 1: 'status:wackelt', 2: 'status:geht', 3: 'status:laeuft'}
        });
        $("#input-21c").rating({
            min: 0, max: 8, step: 0.5, size: "xl", stars: "8"
        });
    });
</script>
</body>

</html>

